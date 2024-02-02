<?php
    class Site{
        private $ConnDB;

        private function initDBRoute(){CallFileApp::RequireOnce('Config/Database.php');return $this->ConnDB = CONN_DB_SITE;}
        private function initDBNonRoute(){CallFile::RequireOnce('../Config/Database.php'); return $this->ConnDB = CONN_DB_SITE;}
        // Fetch Data SEO
        public function SEO(){ $this->initDBRoute(); return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". SEO_SITE_DB)); }
        // Fetch Data BANK
        public function Bank(){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_SITE_DB); }
        // Fetch Data Interest 
        public function Interest(){$this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". INTEREST_SITE_DB); }
        // Fetch Data Interest Non Route
        public function InterestNonRoute(){$this->initDBNonRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". INTEREST_SITE_DB); }
    }

    class MasterDB{
        protected $ConnDB;

        protected function initDBNonRoute(){
            CallFile::RequireOnce('../Config/Database.php');
            return $this->ConnDB = CONN_DB_USER;
        }
        protected function initDBRoute(){
            CallFile::RequireOnce('Libs/Security.php');
            CallFileApp::RequireOnce('Config/Database.php');
            return $this->ConnDB = CONN_DB_USER;
        }

        public function FetchUserDataDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            $Query = mysqli_query($this->ConnDB, "SELECT * FROM " . DATA_USER_DB . " WHERE data_email='$email'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return mysqli_fetch_assoc($Query);
        }

        public function DeleteUserDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            $QueryWork = mysqli_query($this->ConnDB, "DELETE FROM " . WORK_USER_DB . " WHERE work_host='$email'");
            $QueryPorto = mysqli_query($this->ConnDB, "DELETE FROM " . PORTO_USER_DB . " WHERE porto_user='$email'");
            $QueryUser = mysqli_query($this->ConnDB, "DELETE FROM " . DATA_USER_DB . " WHERE data_email='$email'");
            if((!$QueryWork) || (!$QueryPorto) || (!$QueryUser)){echo "<script>alert('Terjadi galat pada server')</script>";}
            session_unset(); session_destroy(); unset($_SESSION);
            return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        }

        public function UpdateDataUserDB($email, $photo, $interest){
            if(!empty($photo)){
                $DirPhoto = "Public/upload/client/$email/image/" . $photo;
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_interest='$interest', data_photo='$DirPhoto' WHERE data_email='$email'");
                if(!$Query){echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }else{
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_interest='$interest' WHERE data_email='$email'");
                if(!$Query){echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }
        }
    }

    class ClientDB extends MasterDB{

        public function SignupDB($email, $username ,$apikey, $interest){
            $this->initDBNonRoute();
            $data_photo = "Public/upload/client/". $email ."/image/photo.png";
            $Query = mysqli_query($this->ConnDB,  "INSERT INTO " . DATA_USER_DB . " (data_email, data_username, data_apikey, data_interest, data_paymentstatus, data_photo) VALUES ('$email', '$username','$apikey', '$interest', '0', '$data_photo')" );
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return true;
        }

        public function UpdatePayment($email, $status, $paymentcode, $paymentid){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $status = Security::StringDB($this->ConnDB, $status); $paymentcode = Security::StringDB($this->ConnDB, $paymentcode); $paymentid = Security::StringDB($this->ConnDB, $paymentid);
            if($status == 0){
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_paymentstatus='1', data_paymentcode='$paymentcode', data_paymentid='$paymentid' WHERE data_email='$email'");
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_ADD_PAYMENT"] = "Berhasil menambahkan gerbang pembayaran 👍";
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
            }else{
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_paymentcode='$paymentcode', data_paymentid='$paymentid' WHERE data_email='$email'");
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_ADD_PAYMENT"] = "Berhasil edit metode pembayaran 😄";
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            }
        }

        public function CreateWorkDB($id, $email, $name, $date, $photo, $salary, $fieldwork, $desc, $maxuser){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $name = Security::StringDB($this->ConnDB, $name); $salary = Security::StringDB($this->ConnDB, $salary); $fieldwork = Security::StringDB($this->ConnDB, $fieldwork); $desc = Security::StringDB($this->ConnDB, $desc);
            $maxuser = Security::StringDB($this->ConnDB, $maxuser);
            
            $id  = rand(56, 9999); $start = date("d-m-Y");

            $Umask = umask(0);
            mkdir("../../Public/upload/client/$email/work/work-$id", 0755, true);
            umask($Umask);

            copy("../../Public/index.html", "../../Public/upload/client/$email/work/work-$id/index.html");

            if(!empty($photo)){
                $table = " (id, work_name, work_host, work_des, work_field, work_salary, work_status, work_maxuser, work_startdate, work_finishdate, work_image) ";
                $value = " ('$id', '$name', '$email', '$desc', '$fieldwork', '$salary', '0', '$maxuser','$start', '$date', '$photo') ";
                $Query = mysqli_query($this->ConnDB, "INSERT INTO " . WORK_USER_DB . $table ."VALUES" . $value);
                if($Query){
                    $_SESSION["STATUS_ADDWORK"] = "Berhasil menambahkan pekerjaan baru 🎉";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                    return exit();
                }else{
                    $_SESSION["STATUS_ERR_ADDWORK"] = "Terjadi galat pada upload file pada server 😥";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                    return exit();
                }
            }else{
                $table = " (id, work_name, work_host, work_des, work_field, work_salary, work_status, work_maxuser, work_startdate, work_finishdate, work_image) ";
                $value = " ('$id', '$name', '$email', '$desc', '$fieldwork', '$salary', 0, '$maxuser','$start', '$date', '$photo') ";
                $Query = mysqli_query($this->ConnDB, "INSERT INTO " . WORK_USER_DB . $table ."VALUES" . $value);
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_ADDWORK"] = "Berhasil menambahkan pekerjaan baru 🎉";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
                return exit();
            }
        }

        public function WorkHistoryDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE work_host='$email'");
        }       

        public function WorkDetailDB($email, $id){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE work_host='$email' AND id='$id'");
        }        

        public function FetchPortoUserDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . PORTO_USER_DB . " WHERE porto_user='$email'");
        }

        public function AddPortoUserDB($email, $name, $date, $field, $file){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $name = Security::StringDB($this->ConnDB, $name); $field = Security::StringDB($this->ConnDB, $field);
            $DirFile = "Public/upload/client/$email/portofolio/$file";
            $Query = mysqli_query($this->ConnDB, "INSERT INTO ". PORTO_USER_DB . " (porto_user, porto_name, porto_date, porto_field, porto_file) VALUES ('$email', '$name', '$date', '$field', '$DirFile')");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $_SESSION["STATUS_ADD_PORTO"] = "Berhasil menambahkan portofolio 👍";
            return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
        }

        public function DeletePortoUserDB($id, $file){
            $this->initDBRoute();
            if(unlink($file)){
                $Query = mysqli_query($this->ConnDB, "DELETE FROM " . PORTO_USER_DB . " WHERE id='$id'");
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_DEL_PORTO"] = "Berhasil menghapus portofolio 👍";
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            }
        }
    }