<?php

use Random\Engine\Secure;

    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFile::RequireOnce("Libs/Security.php");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data3 = $UserAPI->FetchUserDataAPI($Data2->data_username, $Data2->data_apikey); // Fetch Data from API
        $Data4 = $UserDB->WorkHistoryDB($Data2->data_email); // Fetch Data Work History

        if(isset($_POST["create-work"])){
            $name = $_POST["name"]; $date = strtotime(date("d-m-Y", strtotime($_POST["date"]))) > strtotime(date("d-m-Y")) ?  $_POST["date"] : NULL;
            $salary = $_POST["salary"]; $maxuser = $_POST["maxuser"] < 4 ?  $_POST["maxuser"] : 3;
            $desc = $_POST["desc"]; $fieldwork = $_POST["fieldwork"];

            $id  = rand(56, 9999);
            if(!empty($date)){
                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                    $size = $_FILES['file']['size'];
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    if ($extension != "png") {
                        $_SESSION["STATUS_ERR_ADDWORK"] = "Format file yang diupload harus png!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                    }
                    if ($size > (100 * 1024)) {
                        $_SESSION["STATUS_ERR_ADDWORK"] = "Ukuran file yang diupload melebihi batas (150Kb)!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                    }
                    $file = uniqid() . "." . $extension;
                    $file_tmp = $_FILES['file']['tmp_name'];
                    $DirPhoto = "Public/upload/client/$email/work/work-$id/$file";
                    
                    $Umask = umask(0);
                    mkdir("Public/upload/client/$email/work/work-$id", 0755, true);
                    umask($Umask);
    
                    if(move_uploaded_file($file_tmp ,$DirPhoto)){
                        copy("Public/index.html", "Public/upload/client/$email/work/work-$id/index.html");
                        $UserDB->CreateWorkDB($id, $Data2->data_email, $name, $date, $DirPhoto, $salary, $fieldwork, $desc, $maxuser);
                    }
                    
                }else{
                    $DirPhoto = "Public/upload/client/$email/work/work-$id/bg-work.jpg";
                    $Umask = umask(0);
                    mkdir("Public/upload/client/$email/work/work-$id", 0755, true);
                    umask($Umask);
                    copy("Public/index.html", "Public/upload/client/$email/work/work-$id/index.html");
                    copy("Public/dist/image/example-bg-work.jpg", $DirPhoto);
                    $UserDB->CreateWorkDB($id, $Data2->data_email, $name, $date, $DirPhoto, $salary, $fieldwork, $desc, $maxuser);
                }
            }else{
                $_SESSION["STATUS_ERR_ADDWORK"] = "Waktu selesai harus melebihi/sama dengan hari ini 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
            }
        }

        CallFileApp::RequireOnceData4('Views/Client/Work.php', $Data1, $Data2, $Data3, $Data4);
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }
