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
        $Site = new Site;
        $WebhooksDB = new WebhooksDB;
        $AdminAPI = new AdminAPI;
        
        $Tax = (object) $Site->Tax();

        $Notification = (object) Midtrans::Notification();

        $TrxData = (object) mysqli_fetch_assoc($WebhooksDB->FetchTransferDB($Notification->order_id));
        // Check if the data has been input via the GET order_id method above
        if($TrxData->trf_status === "Berhasil"){
            $WebhooksDB->UpdateTransferWebhooksDB($Notification->order_id, $Notification->type);
        }
        // if not, then the system automatically inputs data and updates data
        else{
            $Trxid = $Notification->order_id;
            $TransferData = (object) mysqli_fetch_assoc($WebhooksDB->FetchAllDataTransferDB("trf_id='$Trxid'"));
            $IncomeAmount = ($TransferData->trf_amount - $Tax->tax_midtrans) / (1 + ($Tax->tax_pay / 100)) * ($Tax->tax_pay / 100);
            $TrxAmount = ($TransferData->trf_amount -  $Tax->tax_midtrans) * ($Tax->tax_pay / 100);
            
            if($Notification->statusDB === "Berhasil"){
              $WebhooksDB->AddTransactionDB($Trxid, $TransferData->trf_workid, $TransferData->trf_fromemail, $TransferData->trf_toemail, (int) $TrxAmount);  
              $WebhooksDB->AddBalanceDB($TransferData->trf_toemail,  (int) $TrxAmount);
              $Site->AddIncome($Trxid, $TransferData->trf_fromemail, (int) $IncomeAmount);
            }else{

            }

            $WebhooksDB->UpdateTransferDB($Trxid, $Notification->statusDB);
            // $TrxAPI->UpdateTransactionAPI($Data1->data_apikey, $Trxid, $StatusAPI);
        }
    }

    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }