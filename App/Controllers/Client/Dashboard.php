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


        CallFileApp::RequireOnceData5('Views/Client/Dashboard.php', $Data1, $Data2, $Data3, $Data4, $Data5);
        
        // Add Payment Gateway
        if(isset($_POST["addpayment"])){
            CallFile::RequireOnce("Libs/Security.php");
            $PaymentID = Security::XSS($_POST["data_paymentid"]);
            $PaymentCode = Security::XSS($_POST["bank"]);
            $UserDB->UpdatePayment($Data3->data_email, 0,$PaymentCode,$PaymentID);
        }
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }