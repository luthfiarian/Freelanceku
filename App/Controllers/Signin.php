<?php
    if(isset($_POST["signin"])){
        require_once '../../Libs/Call.php';
        require_once '../../Libs/Session.php';
        require_once '../../Libs/Security.php';
        
        Session::Start();
        
        // Ini Variable Post
        $email      = Security::String($_POST["email"]);
        $password   = Security::String($_POST["password"]);

        CallFile::RequireOnce('../Models/Api.php');
        $Signin = new MasterAPI;
        $Signin->SigninAPI($email, $password);
    }