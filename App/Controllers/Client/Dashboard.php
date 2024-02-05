<?php
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
        $Data5 = $UserDB->WorkHistoryDB($Data3->data_email); // Fetch Data Work History
        
        // Add Payment Gateway
        if(isset($_POST["addpayment"])){
            CallFile::RequireOnce("Libs/Security.php");
            $PaymentID = $_POST["data_paymentid"];
            $PaymentCode = $_POST["bank"];
            $UserDB->UpdatePayment($Data3->data_email, 0,$PaymentCode,$PaymentID);
        }
        // Search Work
        else if(isset($_POST["search"])){
            if(($Data3->data_paymentstatus == 1) && !empty($Data4->data->address->street)){
                $work = $_POST["work"];
                $Data6 = $UserDB->PartnerSearchDB($Data3->data_email, $work);

                CallFileApp::RequireOnceData6('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6);
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
        }else{
            CallFileApp::RequireOnceData5('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5);
        }
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }