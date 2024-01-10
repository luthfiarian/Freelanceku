<?php
    if(isset($_POST["email"])){
        require_once '../../Libs/Call.php';
        require_once '../../Libs/Security.php';
        require_once '../../Libs/Session.php';
        Session::Start();

        // Init Varibel Post
        $first_name = Security::XSS($_POST['first_name']);
        $last_name  = Security::XSS($_POST['last_name']);
        $username   = Security::XSS($_POST['username']);
        $email      = Security::XSS($_POST['email']);
        $phone      = "0" . Security::XSS($_POST['phone']);
        $address    = Security::XSS($_POST['address']);
        $password   = Security::XSS($_POST['password']);
    
        CallFile::ReqireOnce('../Models/Api.php');
        $AddData = new Client;
        $AddData->Register($first_name, $last_name,$username, $email, $phone, $address, $password);
    
    }