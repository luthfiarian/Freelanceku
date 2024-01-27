<?php
    if(isset($_POST["signin"])){
        require_once '../../Libs/Call.php';
        require_once '../../Libs/Security.php';
        require_once '../../Libs/Session.php';
        Session::Start();
        
        // Ini Variable Post
        $email      = Security::XSS($_POST["email"]);
        $password   = Security::XSS($_POST["password"]);

        CallFile::RequireOnce('../Models/Api.php');
        $Signin = new MasterAPI;
        $Signin->SigninAPI($email, $password);
    }