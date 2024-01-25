<?php
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; $Data1 = (object) $Site->Seo();
        $User = new ClientDB; $Data2 = (object) $User->FetchUserDataDB($email);
        $UserData = new MasterAPI; $Data3 = $UserData->FetchUserDataAPI($Data2->data_username, $Data2->data_apikey);

        CallFileApp::RequireOnceData3('Views/Client/Dashboard.php', $Data1, $Data2, $Data3);
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }