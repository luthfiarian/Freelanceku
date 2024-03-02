<?php
    require_once '../../Libs/Call.php';
    require_once '../../Libs/Session.php';
    require_once '../../Libs/Security.php';
    require_once '../Config/Host.php'; 
    CallFile::RequireOnce("../Models/Database.php");
    Session::Start();

    /**
     * Signup for User Freelance
     */
    if(isset($_POST["signup"])){
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
    /**
     * Signup for admin
     */
    else if(isset($_POST["signup_admin"])){

        if($_POST["admin_key"] == ADMIN_KEY){
            // Init Varibel Post
            $first_name = Security::String($_POST['first_name']);
            $last_name  = Security::String($_POST['last_name']);
            $email      = Security::String($_POST['email']);
            $username   = Security::String($_POST['username']);
            $phone      = "62" . Security::String($_POST['phone']);
            $password   = Security::String($_POST['password']);

            CallFile::RequireOnce('../Models/Api.php');
            $Signup = new AdminAPI;
            if(isset($_SESSION['portal-admin'])){ unset($_SESSION['portal-admin']); }
            $Signup->SignupAdminAPI($first_name, $last_name, $email, $username, $phone, $password, NULL);
        }else {
            $_SESSION["STATUS_SIGNUP_ERR"] = "Kunci admin tidak sama ❌";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            exit();
        }
    }
    /**
     * Signup admin from user-admin page
     */
    else if(isset($_SESSION["signup_admin"])){

        if($_SESSION["admin_key"] == ADMIN_KEY){
            // Init Varibel Post
            $first_name = Security::String($_SESSION['first_name']);
            $last_name  = Security::String($_SESSION['last_name']);
            $email      = Security::String($_SESSION['email']);
            $username   = Security::String($_SESSION['username']);
            $phone      = "62" . Security::String($_SESSION['phone']);
            $password   = Security::String($_SESSION['password']);
            
            CallFile::RequireOnce('../Models/Api.php');
            $Signup = new AdminAPI;
            $Signup->SignupAdminAPI($first_name, $last_name, $email, $username, $phone, $password, "admin/user");
        }else {
            $_SESSION["STATUS_SIGNIN_ERR"] = "Kunci admin tidak sama ❌";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/user");
            exit();
        }
    }