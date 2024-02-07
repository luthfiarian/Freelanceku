<?php
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data3 = $UserAPI->FetchUserDataAPI($Data2->data_username, $Data2->data_apikey); // Fetch Data from API
        $Data4 = $UserDB->PartnerRequestDB($Data2->data_email);

        if(isset($_POST["delete-req"])){
            $workid = ltrim($_POST["id"], "work-");
            $UserDB->PartnerRequestDelDB($Data2->data_email, $workid);
        }

        // Routes Partner
        if(($_SERVER["REQUEST_URI"] === BASE_URI."partner") || ($_SERVER["REQUEST_URI"] === BASE_URI."partner/")){
            CallFileApp::RequireOnceData4('Views/Client/Partner.php', $Data1, $Data2, $Data3, $Data4);
        }

        
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }