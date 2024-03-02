<?php
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
        $Data4 = $UserDB->PartnerRequestDB($Data2->data_email);
        $Data5 = $UserDB->PartnerListWorkDB($Data2->data_email);
        $Data6 = $UserDB->PartnerWorkListDB($Data2->data_email,0);
        $Data7 = $UserDB->PartnerWorkListDB($Data2->data_email,1);

        if(isset($_POST["work-detail"])){
            $workid = ltrim($_POST["workid"], "work-");
            $_SESSION["WORK_DETAIL_PARTNER"] = $_POST["workid"];
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
        }
        // Close Work Detail
        if(isset($_POST["close-detail"])){
            unset($_SESSION["WORK_DETAIL_PARTNER"]);
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
            exit();
        }
        // Work Detail
        else if(isset($_SESSION["WORK_DETAIL_PARTNER"])){
            $workid = ltrim($_SESSION["WORK_DETAIL_PARTNER"], "workid-");
            
            $Data8 = (object) $UserDB->PartnerDetailDB($Data2->data_email, $workid);
            $Data9 = $UserDB->PartnerWorkDetailDB($Data2->data_email, $workid);

            // Send a Message to Superior
            if(isset($_POST["send-message"])){
                $UserDB->PartnerUpdateMessageDB($Data2->data_email, $_POST["id"], $_POST["message"]);
            }
            // Upload File
            else if(isset($_POST["upload-file"]) && isset($_FILES["file"])){
                $size = $_FILES['file']['size'];
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if ($extension != "zip") {
                    $_SESSION["STATUS_ERR_UPDATEWORK"] = "Format file yang diupload harus ZIP!";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
                    exit();
                }else{
                    if ($size > (20 * (1024 * 1024))) {
                        $_SESSION["STATUS_ERR_UPDATEWORK"] = "Ukuran file yang diupload melebihi batas (20Mb)!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
                        exit();
                    }else{
                        $file = uniqid() . "." . $extension;
                        $fileComplete = "Public/upload/client/$Data2->data_email/partner/" . $file;
                        $file_tmp = $_FILES['file']['tmp_name'];
                        if(!empty($Data8->partner_file)){
                            if(move_uploaded_file($file_tmp, "Public/upload/client/$Data2->data_email/partner/" . $file) && unlink($Data8->partner_file)){
                                $UserDB->PartnerUpdateFileDB($Data2->data_email, $_POST["id"], $fileComplete);
                            }
                        }else{
                            move_uploaded_file($file_tmp, "Public/upload/client/$Data2->data_email/partner/" . $file);
                            $UserDB->PartnerUpdateFileDB($Data2->data_email, $_POST["id"], $fileComplete);
                        }
                    }
                }
            }
            // Delete Request Work
            else if(isset($_POST["delete-req"])){
                $workid = ltrim($_POST["id"], "work-");
                $UserDB->PartnerRequestDelDB($Data2->data_email, $workid);
            }
            CallFileApp::RequireOnceData9('Views/Client/Partner.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6, $Data7, $Data8, (object) mysqli_fetch_assoc($Data9));
            exit();
        }
        // Delete Request Work
        else if(isset($_POST["delete-req"])){
            $workid = ltrim($_POST["id"], "work-");
            $UserDB->PartnerRequestDelDB($Data2->data_email, $workid);
        }
        
        CallFileApp::RequireOnceData7('Views/Client/Partner.php', $Data1, $Data2, $Data3, $Data4, $Data5, $Data6, $Data7);


        
    }else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
    }