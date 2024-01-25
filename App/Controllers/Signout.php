<?php
    if($_SESSION["fk-session"]){
        session_unset();
        session_destroy();
        unset($_SESSION);
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }else{
        CallFileApp::RequireOnce('Views/Error/NonGranted.php');
    }