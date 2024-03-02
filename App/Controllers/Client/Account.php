<?php
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 = $Site->Bank();
        $Data3 = $Site->Interest();
        $Data4 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data5 = $UserAPI->FetchUserDataAPI($Data4->data_username, $Data4->data_apikey); // Fetch Data from API
        $Data6 = $UserDB->FetchPortoUserDB($email);  // Fetch Data Porto from DB

        CallFileApp::RequireOnceData6('Views/Client/Account.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6);
        // Add Portofolio
        if(isset($_POST["add-porto"]) && isset($_FILES["file"])){
            $porto_name = $_POST["name"];
            $porto_date = $_POST["date"];
            $porto_field= $_POST["field"];
            
            $size = $_FILES['file']['size'];

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ($extension != "pdf") {
                $_SESSION["STATUS_ERR_ADDPORTO"] = "Format file yang diupload harus PDF!";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            }else{
                if ($size > (500 * 1024)) {
                    $_SESSION["STATUS_ERR_ADDPORTO"] = "Ukuran file yang diupload melebihi batas (500Kb)!";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                }else{
                    $file = uniqid() . "." . $extension;
                    $file_tmp = $_FILES['file']['tmp_name'];
                    move_uploaded_file($file_tmp, "Public/upload/client/$Data4->data_email/portofolio/" . $file);
                    
                    $UserDB->AddPortoUserDB($Data4->data_email, $porto_name, $porto_date, $porto_field, $file);
                }
            }

        }
        // Delete Portofolio
        else if(isset($_POST["delete-porto"])){
            $file = $_POST["file"];
            $id = $_POST["id"];
            $UserDB->DeletePortoUserDB($id, $file);
        }
        // Delete Account
        else if(isset($_POST["del-account"])){
            $email_del = $_POST["email_del"]; $username_del = $_POST["username_del"];
            if($email_del === $email && $username_del === $Data4->data_username){
                $path = "Public/upload/client/$email";
                function rmdir_recursive($dir) {
                    foreach(scandir($dir) as $file) {
                        if ('.' === $file || '..' === $file) continue;
                        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                        else unlink("$dir/$file");
                    }
                    rmdir($dir);
                }
                rmdir_recursive($path);
                $UserAPI->DeleteUserAPI($email_del, $username_del, $Data4->data_apikey, NULL);
            }else{
                $_SESSION["STATUS_DEL_ACC"] = "Persiksa kembali email dan nama pengguna anda 👀";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            }
        }
        // Edit Account
        else if(isset($_POST["edit-account"])){
            $first_name = $_POST["first_name"]; $last_name = $_POST["last_name"];
            $phone = "62".$_POST["phone"]; $description = isset($_POST["desc"]) ? $_POST["desc"] : NULL;
            $street = $_POST["street"]; $city = $_POST["city"]; $province = $_POST["province"];
            $country = $_POST["country"]; $interest = [];

            $InterestData = 0;
            for ($i = 1; $i <= mysqli_num_rows($Site->Interest()); $i++) {
                if (!empty($_POST["interest-{$i}"])) {
                    ++$InterestData;
                    if ($InterestData == 4) {
                        break;
                    }
                    $interest["interest_{$i}"] = $_POST["interest-{$i}"];
                }
            }

            // Check Interest Work
            if($InterestData == 0){
                $_SESSION["STATUS_ERR_UPDATE"] = "Minat kerja kosong!"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            }else{
                // Send Data to API
                if($UserAPI->UpdateDataUserAPI($Data4->data_apikey, $Data4->data_username, $first_name, $last_name, $phone, $description, $street, $city, $province, $country)){
                    // Check Photo
                    if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                        $size = $_FILES['file']['size'];
                        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        if ($extension != "png") {
                            $_SESSION["STATUS_ERR_UPDATE"] = "Format file yang diupload harus png!";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                            exit();
                        }else{
                            if ($size > (100 * 1024)) {
                                $_SESSION["STATUS_ERR_UPDATE"] = "Ukuran file yang diupload melebihi batas (100Kb)!";
                                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                                exit();
                            }else{
                                $file = uniqid() . "." . $extension;
                                $file_tmp = $_FILES['file']['tmp_name'];
                                if(unlink($Data4->data_photo) && move_uploaded_file($file_tmp, "Public/upload/client/$Data4->data_email/image/" . $file)){
                                    $UserDB->UpdateDataUserDB($Data4->data_email, $file, json_encode($interest));
                                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                                }else{
                                    $_SESSION["STATUS_ERR_UPDATE"] = "Terjadi galat saat upload file 😥";
                                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                                }
                            }
                        }
                    }else{
                        $UserDB->UpdateDataUserDB($Data4->data_email, NULL, json_encode($interest));
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                    } 
                }else{
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                }
            }


        }
        // Edit Bank
        else if(isset($_POST["edit-payment"])){
            CallFile::RequireOnce("Libs/Security.php");
            $PaymentID = $_POST["data_paymentid"];
            $PaymentCode = $_POST["bank"];
            $UserDB->UpdatePayment($Data4->data_email, 1,$PaymentCode,$PaymentID);
        }
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }