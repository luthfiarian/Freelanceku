<?php

    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");

        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");
        $Site = new Site;
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        $TrxAPI = new TransactionAPI;
        $TrxDB = new TransactionDB;

        $Data1 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data2 = $UserAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API

        $Tax = (object) $Site->Tax();
        
        if(isset($_GET["order_id"]) && isset($_SESSION["TRX_DATA"])){
            $Trxid = $_GET["order_id"];
            // For Client
            if(str_contains($Trxid, "work-")){
                $DataTransfer = (object) mysqli_fetch_assoc($TrxDB->FetchTransferDB($_SESSION["TRX_DATA"]["id"]));
                if(($DataTransfer->trf_fromemail == $_SESSION["TRX_DATA"]["email"]) && ($DataTransfer->trf_toemail == $_SESSION["TRX_DATA"]["email_partner"]) && ($DataTransfer->trf_amount == $_SESSION["TRX_DATA"]["amount_wtax"])){
                    $StatusAPI = "DONE";
                    $StatusDB  = NULL;
                    if($_GET["transaction_status"] === "settlement"){
                        $StatusAPI = "DONE";
                        $StatusDB  = "Berhasil";
                        $TrxDB->AddTransactionDB($_SESSION["TRX_DATA"]["id"], $_SESSION["WORK_DETAIL"], $_SESSION["TRX_DATA"]["email"], $_SESSION["TRX_DATA"]["email_partner"], $_SESSION["TRX_DATA"]["amount"]);
                        $IncomeAmount = ($_SESSION["TRX_DATA"]["amount_wtax"] - $Tax->tax_midtrans) / (1 + ($Tax->tax_pay / 100)) * ($Tax->tax_pay / 100);
                        $Site->AddIncome($_SESSION["TRX_DATA"]["id"], $_SESSION["TRX_DATA"]["email"], (int) $IncomeAmount);
                        $UserDB->AddBalanceDB($_SESSION["TRX_DATA"]["email_partner"], $_SESSION["TRX_DATA"]["amount"]);
                        $_SESSION["STATUS_WORK"] = "Pembayaran berhasil 🎉";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . $_GET["from"]);
                    }else if($_GET["transaction_status"] === "deny"){
                        $StatusAPI = "FAILED";
                        $StatusDB  = "Ditolak";
                    }else if($_GET["transaction_status"] === "expire"){
                        $StatusAPI = "UNPROCESSED";
                        $StatusDB  = "Berakhir";
                    }else if($_GET["transaction_status"] === "cancel"){
                        $StatusAPI = "UNPROCESSED";
                        $StatusDB  = "Batal";
                    }
    
                    $TrxAPI->UpdateTransactionAPI($Data1->data_apikey, $Trxid, $StatusAPI);
                    $TrxDB->UpdateTransferDB($Trxid, $StatusDB);
                    unset($_SESSION["STATUS_TRX_PAY"], $_SESSION["TRX_DATA"]);
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . $_GET["from"]);
                    exit();
                }else{
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . $_GET["from"]);
                    exit();
                }
            }else{
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . $_GET["from"]);
                exit();
            }
        }
    }
    // HTTP Notification / Webhooks from Midtrans
    else if((($_SERVER["REQUEST_URI"] === BASE_URI."transaction") || ($_SERVER["REQUEST_URI"] === BASE_URI."transaction/"))){
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        CallFileApp::RequireOnce("Models/Midtrans.php");
        CallFileApp::RequireOnce("Config/Webhook.php");
        $Site = new Site;
        $WebhookDB = new WebhookDB;
        $WebhookAPI = new WebhookAPI;
        
        $Tax = (object) $Site->Tax();

        $Notification = (object) Midtrans::Notification();

        // Check the Account of Webhook
        if(mysqli_num_rows($WebhookDB->CheckAccountWebhookDB(EMAIL_WEBHOOK)) == 1){
            // Fetch Data from DB
            $Webhook = (object) mysqli_fetch_assoc($WebhookDB->CheckAccountWebhookDB(EMAIL_WEBHOOK));
            // Fetch Data Transfer from trf_id
            $TrfData = (object) mysqli_fetch_assoc($WebhookDB->FetchTransferDB($Notification->order_id));
            // Fetch Data Work for salary
            $Work = (object) mysqli_fetch_assoc($WebhookDB->FetchAllDataWorkDB("work_host='{$TrfData->trf_fromemail}'"));
            // Check if callback Midtrans give value
            if($TrfData->trf_status === "Berhasil"){
                // Only change trf_type in DB
                $WebhookDB->UpdateTypeWebhookDB($Notification->order_id, $Notification->type);
            }
            // Alternative if callback Midtrans cant give value
            else{
                // Check if payment settlement from Midtrans
                if($Notification->statusDB === "Berhasil"){
                    $IncomeAmount = (int) $Work->work_salary * ($Tax->tax_pay / 100);
                    // Add income site
                    $Site->AddIncome($Notification->order_id, $TrfData->trf_fromemail, $IncomeAmount);
                    // Add transaction DB User
                    $WebhookDB->AddTransactionDB($Notification->order_id, $TrfData->trf_workid, $TrfData->trf_fromemail, $TrfData->trf_toemail, $Work->work_salary);
                    // Add Balance Partner
                    $WebhookDB->AddBalanceDB($TrfData->trf_toemail, $Work->work_salary);
                }
                // If payment not settlement from Midtrans just update Transfer, API status transaction
                $WebhookDB->UpdateTransferWebhookDB($Notification->order_id, $Notification->statusDB, $Notification->type);
                $WebhookAPI->WebhookUpdateTrxAPI(EMAIL_WEBHOOK, PASS_WEBHOOK, $Webhook->data_apikey, $Notification->order_id, $Notification->statusAPI);
            }
        }
        // If account not match as admin or not created
        else{
            // Send message to DB
            $Trxid = $Notification->order_id;
            $Site->AddMessageWebhook($Trxid, "Webhook tidak dikonfigurasi atau akun yang digunakan tidak sesuai");
        }
    }

    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }