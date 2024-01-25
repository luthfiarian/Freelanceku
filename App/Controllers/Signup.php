<?php
    if(isset($_POST["signup"])){
        require_once '../../Libs/Call.php';
        require_once '../../Libs/Security.php';
        require_once '../../Libs/Session.php';
        Session::Start();

        // Init Varibel Post
        $first_name = Security::XSS($_POST['first_name']);
        $last_name  = Security::XSS($_POST['last_name']);
        $email      = Security::XSS($_POST['email']);
        $username   = Security::XSS($_POST['username']);
        $phone      = "62" . Security::XSS($_POST['phone']);
        $password   = Security::XSS($_POST['password']);

        for ($i = 1; $i <= 5; $i++) {
            if (!empty($_POST["interest-{$i}"])) {
                ++$interval_interest;
                if ($interval_interest == 4) {
                    break;
                }
                $interest["interest-{$i}"] = Security::XSS($_POST["interest-{$i}"]);
            }
        }

        CallFile::ReqireOnce('../Models/Api.php');
        $Signup = new ClientAPI;
        $Signup->SignupAPI($first_name, $last_name, $email, $username, $phone, $interest, $password);
    
    }