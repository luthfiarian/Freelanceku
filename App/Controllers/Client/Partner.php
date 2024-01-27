<?php
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $User = new ClientDB; 
        $UserData = new MasterAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 = (object) $User->FetchUserDataDB($email);   // Fetch Data from DB
        $Data3 = $UserData->FetchUserDataAPI($Data2->data_username, $Data2->data_apikey); // Fetch Data from API


        CallFileApp::RequireOnceData3('Views/Client/Partner.php', $Data1, $Data2, $Data3);
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }