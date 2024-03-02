<?php
    /**
     * User Admin Controller
     */
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-808080-")){
        // Current Email Log in
        $currentEmail = ltrim($_SESSION["fk-session"], "fk-808080-");
        // Require File From Models
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        
        // Call Class
        $Site       = new Site;     // Class Site       Database.php
        $AdminDB    = new AdminDB;  // Class AdminDB    Database.php
        $AdminAPI   = new AdminAPI; // Class AdminAPI   Api.php

        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API

        // Search User Admin
        if(isset($_POST["search-admin"])){
            $Search = $_POST["search"];
            $Data3 = $AdminDB->FetchAllDataUserDB("data_user='Admin' AND (data_email LIKE '%$Search%' OR data_username LIKE '%$Search%') ORDER BY id DESC");
            CallFileApp::RequireOnceData3("Views/Admin/User.php", $Data1, $Data2, $Data3);  
        }
        // Signup Admin
        else if(isset($_POST["signup_admin"])){
            $_SESSION["signup_admin"]= $_POST["signup_admin"];
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['last_name']  = $_POST['last_name'];
            $_SESSION['email']      = $_POST['email'];
            $_SESSION['username']   = $_POST['username'];
            $_SESSION['phone']      = $_POST['phone'];
            $_SESSION['password']   = $_POST['password'];
            $_SESSION["admin_key"]  = $_POST["admin_key"];

            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "App/Controllers/Signup.php");
            exit();
        }
        // Default
        else{
            $Data3 = $AdminDB->FetchAllDataUserDB("data_user='Admin' ORDER BY id DESC");
            CallFileApp::RequireOnceData3("Views/Admin/User.php", $Data1, $Data2, $Data3);  
        }
    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }