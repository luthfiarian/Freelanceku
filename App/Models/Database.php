<?php
    class Site{
        private $ConnDB;

        public function __construct(){ CallFileApp::RequireOnce('Config/Database.php'); return $this->ConnDB = CONN_DB; }
        
        // Fetch Data SEO
        public function SEO(){ return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". SEO_TABLE_DB)); }


        // Change Data SEO
        public function ChangeSEO($Data){
            $seo_lang = $Data['seo_lang']; $seo_amp = $Data['seo_amp']; $seo_name = $Data['seo_name']; $seo_type = $Data['seo_type'];
            $seo_locale = $Data['seo_locale']; $seo_des = $Data['seo_des'];
            $Query = mysqli_query($this->ConnDB, "UPDATE site_seo SET seo_lang = '$seo_lang', seo_amp = '$seo_amp', seo_name = '$seo_name', seo_type = '$seo_type', seo_locale = '$seo_locale', seo_des = '$seo_des' WHERE id=1");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            unset($Data, $seo_lang, $seo_amp, $seo_name, $seo_type, $seo_locale, $seo_des, $Query);
            return header("Location: ". PROTOCOL_URL . "://" .BASE_URL . "admin/setting/");
        }
    }

    class ClientDB{
        private $ConnDB;

        public function __construct(){
            CallFile::ReqireOnce('../Config/Database.php');
            return $this->ConnDB = CONN_DB;
        }

        public function SignupDB($ApiKey, $email){
            $Query = mysqli_query($this->ConnDB,  "INSERT INTO " . USER_TABLE_DB . " (user_email, user_apikey) VALUES ('$ApiKey', '$email')" );
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return true;
        }

        public function SigninDB($email){
            $Query = mysqli_query($this->ConnDB, "SELECT * FROM " . USER_TABLE_DB . " WHERE user_email = '$email'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            return mysqli_fetch_assoc($Query);
        }
    }