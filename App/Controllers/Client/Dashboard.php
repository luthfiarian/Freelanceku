<?php
    // Search Work from Home
    if(isset($_SESSION["SEARCH"])){ $_POST += array( "search" => "" , "work" => $_SESSION["SEARCH"]); }
    
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 =  $Site->Bank();        // Paymet of Website
        $Data3 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data4 = $UserAPI->FetchUserDataAPI($Data3->data_username, $Data3->data_apikey); // Fetch Data from API

        $Data5 = (object) array(
            "work"      => $UserDB->WorkHistoryDB($Data3->data_email),
            "income"    => $UserDB->IncomeHistoryDB($Data3->data_email),
            "bill"      => isset($_POST["bill"])        ? $UserDB->SearchUserBillDB($Data3->data_email, $_POST["history"]) : $UserDB->FetchUserBillDB($Data3->data_email),
            "transfer"  => isset($_POST["transfer"])    ? $UserDB->SearchUserTransferDB($Data3->data_email, $_POST["history"]) : $UserDB->FetchUserTransferDB($Data3->data_email)
        );
        // Add Payment Gateway
        if(isset($_POST["addpayment"])){
            CallFile::RequireOnce("Libs/Security.php");
            $PaymentID = $_POST["data_paymentid"];
            $PaymentCode = $_POST["bank"];
            $UserDB->UpdatePayment($Data3->data_email, 0,$PaymentCode,$PaymentID);
        }
        // Withdraw Balance Request
        else if(isset($_POST["withdraw"])){
            $Balance = $_POST["balance"];
            if(($Balance >= 50000) && ($Balance <= $Data3->data_balance)){
                $UserDB->AddUserBillDB($Data3->data_email, $_POST["balance"], $Data3->data_balance);
            }else{
                $_SESSION["STATUS_ERR_DASHBOARD"] = "Pastikan tarik tunai lebih dari sama dengan Rp. 50.000 dan kurang dari sama dengan saldo anda saat ini ";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                exit();
            }
        }
        // Search Work
        else if(isset($_POST["search"])){
            if(($Data3->data_paymentstatus == 1) && !empty($Data4->data->address->street)){
                $work = $_POST["work"];

                $Data6 = $UserDB->FetchPortoUserDB($email);  // Fetch Data Porto from DB
                $Data7 = $UserDB->PartnerSearchDB($Data3->data_email, $work);

                CallFileApp::RequireOnceData7('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6, $Data7);
            }else{
                if($Data3->data_paymentstatus == 0){
                    $_SESSION["STATUS_ERR_SEARCH"] = "Mohon lengkapi pembayaran";
                    if(empty($Data4->data->address->street)){
                        $_SESSION["STATUS_ERR_SEARCH"] = "Mohon lengkapi pembayaran dan alamat anda 🙏";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                        exit();
                    }else{
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                        exit();
                    }
                }
            }
        }
        // Request Partner
        else if(isset($_POST["request-partner"])){
            $email = $Data3->data_email; $workid = ltrim($_POST["id"], "work-");
            $message = !empty($_POST["message"]) ? $_POST["message"] : NULL;

            $UserDB->PartnerRequestJoinDB($email, $workid, $message, $Data3->data_username);
        }
        // View Invoice
        else if(isset($_POST["invoice"])){
            $FetchBill = (object) $UserDB->ViewInvoiceUserBillDB($Data3->data_email, $_POST["invoice"]);
            if($FetchBill->bill_status == "Berhasil"){
                $Data5 = (object) array(
                    "work"      => $UserDB->WorkHistoryDB($Data3->data_email),
                    "income"    => $UserDB->IncomeHistoryDB($Data3->data_email),
                    "bill"      => isset($_POST["bill"])        ? $UserDB->SearchUserBillDB($Data3->data_email, $_POST["history"]) : $UserDB->FetchUserBillDB($Data3->data_email),
                    "transfer"  => isset($_POST["transfer"])    ? $UserDB->SearchUserTransferDB($Data3->data_email, $_POST["history"]) : $UserDB->FetchUserTransferDB($Data3->data_email),
                    "invoice"   => $FetchBill
                );
                CallFileApp::RequireOnceData5('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5);
            }
        }
        else if(($Data3->data_paymentstatus == 1) && !empty($Data4->data->address->street)){
            $Data6 = $UserDB->FetchPortoUserDB($email);  // Fetch Data Porto from DB
            $Data7 = $UserDB->SearchWorkDefaultDB($Data3->data_email);
            CallFileApp::RequireOnceData7('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6, $Data7);
        }
        else{
            CallFileApp::RequireOnceData5('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5);
        }
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }