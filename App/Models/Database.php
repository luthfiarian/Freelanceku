<?php
    class Site{
        private $ConnDB;

        public function __construct(){ CallFileApp::RequireOnce('Config/Database.php'); return $this->ConnDB = CONN_DB_SITE; }
        
        // Fetch Data SEO
        public function SEO(){ return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". SEO_SITE_DB)); }
        // Fetch Data BANK
        public function Bank(){ return mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_SITE_DB); }
    }

    class MasterDB{
        protected $ConnDB;

        protected function initDBNonRoute(){
            CallFile::RequireOnce('../Config/Database.php');
            return $this->ConnDB = CONN_DB_USER;
        }
        protected function initDBRoute(){
            CallFileApp::RequireOnce('Config/Database.php');
            return $this->ConnDB = CONN_DB_USER;
        }
    }

    class ClientDB extends MasterDB{

        public function SignupDB($email, $username ,$apikey, $interest){
            $this->initDBNonRoute();
            $data_photo = "Public/upload/client/". $email ."/photo.png";
            $Query = mysqli_query($this->ConnDB,  "INSERT INTO " . DATA_USER_DB . " (data_email, data_username, data_apikey, data_interest, data_walletstatus, data_photo) VALUES ('$email', '$username','$apikey', '$interest', '0', '$data_photo')" );
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return true;
        }

        public function FetchUserDataDB($email){
            $this->initDBRoute();
            $Query = mysqli_query($this->ConnDB, "SELECT * FROM " . DATA_USER_DB . " WHERE data_email='$email'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return mysqli_fetch_assoc($Query);
        }

        public function AddPayment($id, $paymentid){
            $this->initDBRoute();
            $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_paymentstatus='1', data_paymentid='$paymentid' WHERE id='$id'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $_SESSION["STATUS_ADD_PAYMENT"] = "Berhasil menambahkan gerbang pembayaran 👍";
            return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
        }

        public function WorkHistory($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE work_host='$email'");
        }
    }