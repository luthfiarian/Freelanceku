<?php
    if($_SESSION["fk-session"]){
        setcookie("API-COOKIE", NULL, -1, "/");
        session_unset();
        session_destroy();
        unset($_SESSION);
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }else{
        CallFileApp::RequireOnce('Views/Error/NonGranted.php');
    }