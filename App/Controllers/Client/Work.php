<?php

use Random\Engine\Secure;
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
        $email = ltrim($_SESSION["fk-session"], "fk-FFFFFF-");

        CallFileApp::RequireOnce('Models/Database.php');
        CallFileApp::RequireOnce("Models/Api.php");
        $Site = new Site; 
        $UserDB = new ClientDB; 
        $UserAPI = new ClientAPI;
        
        $Data1 = (object) $Site->Seo(); // SEO Website
        $Data2 = (object) $UserDB->FetchUserDataDB($email);   // Fetch Data from DB
        $Data3 = $UserAPI->FetchUserDataAPI($Data2->data_username, $Data2->data_apikey); // Fetch Data from API
        $Data4 = $UserDB->WorkHistoryDB($Data2->data_email);
        

        if(isset($_POST["create-work"])){
            $name = $_POST["name"]; $date = strtotime(date("d-m-Y", strtotime($_POST["date"]))) > strtotime(date("d-m-Y")) ?  $_POST["date"] : NULL;
            $salary = $_POST["salary"]; $maxuser = $_POST["maxuser"] < 4 ?  $_POST["maxuser"] : 3;
            $desc = $_POST["desc"]; $fieldwork = $_POST["fieldwork"]; $id = mt_rand(56, 9999); 

            if(!empty($date)){
                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                    $size = $_FILES['file']['size'];
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    if ($extension != "png") {
                        $_SESSION["STATUS_ERR_ADDWORK"] = "Format file yang diupload harus png!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                        exit();
                    }else{
                        if ($size > (100 * 1024)) {
                            $_SESSION["STATUS_ERR_ADDWORK"] = "Ukuran file yang diupload melebihi batas (100Kb)!";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                            exit();
                        }else{
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
                        }
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
                $_SESSION["STATUS_ERR_ADDWORK"] = "Waktu selesai harus melebihi dengan hari ini 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                exit();
            }
        }
        // Update of Work
        else if(isset($_POST["update-work"])){
            $id = ltrim($_POST["id"], "work-");
            $name = $_POST["name"]; $date = strtotime(date("d-m-Y", strtotime($_POST["date"]))) > strtotime(date("d-m-Y")) ?  $_POST["date"] : NULL;
            $salary = $_POST["salary"]; $desc = $_POST["desc"]; $fieldwork = $_POST["fieldwork"]; $background = $_POST["background"];
            if(!empty($date)){
                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                    $size = $_FILES['file']['size'];
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    if ($extension != "png") {
                        $_SESSION["STATUS_ERR_UPDATEWORK"] = "Format file yang diupload harus png!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                        exit();
                    }else{
                        if ($size > (100 * 1024)) {
                            $_SESSION["STATUS_ERR_UPDATEWORK"] = "Ukuran file yang diupload melebihi batas (100Kb)!";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                            exit();
                        }else{
                            $file = uniqid() . "." . $extension;
                            $file_tmp = $_FILES['file']['tmp_name'];
                            $DirPhoto = "Public/upload/client/$email/work/work-$id/$file";
            
                            if(unlink($background)){
                                if(move_uploaded_file($file_tmp, $DirPhoto)){
                                    $UserDB->WorkUpdateDB($Data2->data_email, $id, $name, $date, $DirPhoto, $salary, $fieldwork, $desc);
                                }
                            }
                        }
                    }
                    
                }else{
                    $UserDB->WorkUpdateDB($Data2->data_email, $id, $name, $date, NULL, $salary, $fieldwork, $desc);
                }
            }else{
                $_SESSION["STATUS_ERR_UPDATEWORK"] = "Waktu selesai harus melebihi dengan hari ini 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                exit();
            }
        }
        // Delete of Work
        else if(isset($_POST["delete-work"])){
            $id = ltrim($_POST["id"], "work-");
            if(Security::String((int) $_POST["status"]) == 1){
                $UserDB->WorkDelDB($Data2->data_email, $id);
            }else{
                $_SESSION["STATUS_ERR_DELWORK"] = "Selesaikan dahulu proyek work-$id anda, jika anda ingin menghapusnya ❌";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                exit();
            }
        }
        // Work Finish
        else if(isset($_POST["finish-work"])){
            $id = ltrim($_POST["id"], "work-");
            $UserDB->WorkFinishDB($Data2->data_email, $id);
        }

        // Detail id Work to Session
        if(isset($_POST["work-detail"])){
            $_SESSION["WORK_DETAIL"] = $_POST["work-id"];
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
            exit();
        }

        // Routes to Work Page
        if(($_SERVER["REQUEST_URI"] === BASE_URI."work") || ($_SERVER["REQUEST_URI"] === BASE_URI."work/")){
            unset($_SESSION["WORK_DETAIL"]);
            CallFileApp::RequireOnceData4('Views/Client/Work.php', $Data1, $Data2, $Data3, $Data4);
            exit();
        }

        // Routes to Detail Work Page
        if((($_SERVER["REQUEST_URI"] === BASE_URI."work/detail") || ($_SERVER["REQUEST_URI"] === BASE_URI."work/detail/"))){
            if(isset($_SESSION["WORK_DETAIL"])){
                $Data5 = $UserDB->WorkDetailDB($Data2->data_email, $_SESSION["WORK_DETAIL"]);
                if(mysqli_num_rows($Data5) == 1){
                    CallFileApp::RequireOnceData4('Views/Client/WorkDetail.php', $Data1, $Data2, $Data3, (object) mysqli_fetch_assoc($Data5));
                }else{
                    CallFileApp::RequireOnce("Views/Error/NonGranted.php");
                }
            }else{
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                exit();
            }
        }
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }
