<?php
    /**
     * Account Admin Controller
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
        // Edit Account
        if(isset($_POST["edit-account"])){
            $first_name = $_POST["first_name"]; $last_name = $_POST["last_name"];
            $phone = "62".$_POST["phone"]; $description = isset($_POST["desc"]) ? $_POST["desc"] : NULL;
            $street = $_POST["street"]; $city = $_POST["city"]; $province = $_POST["province"];
            $country = $_POST["country"];

            // Send Data to API
            if($AdminAPI->UpdateDataUserAPI($Data1->data_apikey, $Data1->data_username, $first_name, $last_name, $phone, $description, $street, $city, $province, $country)){
                // Check Photo
                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                    $size = $_FILES['file']['size'];
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    if ($extension != "png") {
                        $_SESSION["STATUS_ERR_ACCOUNT"] = "Format file yang diupload harus png!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account");
                        exit();
                    }else{
                        if ($size > (100 * 1024)) {
                            $_SESSION["STATUS_ERR_ACCOUNT"] = "Ukuran file yang diupload melebihi batas (100Kb)!";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account");
                            exit();
                        }else{
                            $file = uniqid() . "." . $extension;
                            $file_tmp = $_FILES['file']['tmp_name'];
                            if(unlink($Data1->data_photo) && move_uploaded_file($file_tmp, "Public/upload/admin/$Data1->data_email/image/" . $file)){
                                $AdminDB->UpdateDataUserDB($Data1->data_email, $file, NULL);
                                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account"); exit();
                            }else{
                                $_SESSION["STATUS_ERR_ACCOUNT"] = "Terjadi galat saat upload file 😥";
                                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account"); exit();
                            }
                        }
                    }
                }else{
                    $AdminDB->UpdateDataUserDB($Data2->data_email, NULL, NULL);
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account"); exit();
                } 
            }else{
                $_SESSION["STATUS_ERR_ACCOUNT"] = "Terjadi galat pada server 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account"); exit();
            }
        }
        // Delete Account
        else if(isset($_POST["del-account"])){
            $email_del = $_POST["email_del"]; $username_del = $_POST["username_del"];
            if($email_del === $currentEmail && $username_del === $Data1->data_username){
                $path = "Public/upload/admin/$currentEmail";
                function rmdir_recursive($dir) {
                    foreach(scandir($dir) as $file) {
                        if ('.' === $file || '..' === $file) continue;
                        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                        else unlink("$dir/$file");
                    }
                    rmdir($dir);
                }
                rmdir_recursive($path);
                $AdminAPI->DeleteUserAPI($email_del, $username_del, $Data1->data_apikey);
            }else{
                $_SESSION["STATUS_ERR_ACCOUNT"] = "Persiksa kembali email dan nama pengguna anda 👀";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/account");
            }
        }
        CallFileApp::RequireOnceData2("Views/Admin/Account.php", $Data1, $Data2);
    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }