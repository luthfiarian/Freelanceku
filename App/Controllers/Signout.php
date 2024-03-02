<?php
    Session::Start();
    if($_SESSION["fk-session"]){
        CallFileApp::RequireOnce("Models/Api.php");
        setcookie("API-COOKIE", NULL, -1, "/");
        if(isset($_COOKIE["TOKEN_TRX"])){ setcookie("TOKEN_TRX", NULL, -1, "/"); }
        session_unset();
        session_destroy();
        unset($_SESSION, $_COOKIE);
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        $Signout = new MasterAPI; $Signout->SignoutAPI();
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }