<?php
    if(isset($_POST["signup"])){
        require_once '../../Libs/Call.php';
        require_once '../../Libs/Session.php';
        require_once '../../Libs/Security.php';
        CallFile::RequireOnce("../Models/Database.php");
        Session::Start();

        // Fetch Data Interest DB
        $Site = new Site;
        // Init Varibel Post
        $first_name = Security::String($_POST['first_name']);
        $last_name  = Security::String($_POST['last_name']);
        $email      = Security::String($_POST['email']);
        $username   = Security::String($_POST['username']);
        $phone      = "62" . Security::String($_POST['phone']);
        $password   = Security::String($_POST['password']);

        $interval_interest = 0;
        for ($i = 1; $i <= mysqli_num_rows($Site->InterestNonRoute()); $i++) {
            if (!empty($_POST["interest-{$i}"])) {
                ++$interval_interest;
                if ($interval_interest == 4) {
                    break;
                }
                $interest["interest_{$i}"] = Security::String($_POST["interest-{$i}"]);
            }
        }

        CallFile::RequireOnce('../Models/Api.php');
        $Signup = new ClientAPI;
        $Signup->SignupAPI($first_name, $last_name, $email, $username, $phone, $interest, $password);
    
    }