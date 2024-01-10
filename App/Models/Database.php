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

    class Bank{
        private $ConnDB;

        public function __construct(){ CallFileApp::RequireOnce('Config/Database.php'); return $this->ConnDB = CONN_DB; }
        // Fetch Data Bank
        public function BANK() { return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_TABLE_DB)); }
        // Fetch Data Bank by ID
        public function BANKID($Data) { return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_TABLE_DB . " WHERE id='$Data'")); }
        // Check Data Bank
        public function BANKROWS(){ return mysqli_num_rows(mysqli_query($this->ConnDB, "SELECT * FROM " . BANK_TABLE_DB )); }

        // Add Data Bank
        public function AddBank($Data, $ImageFile, $ImageFullFile){
            $bank_name = $Data['bank_name']; $bank_username = $Data['bank_username']; $bank_account = $Data['bank_account'];
            $Query = mysqli_query($this->ConnDB, "INSERT INTO " . BANK_TABLE_DB . " (bank_name, bank_username, bank_account, bank_image) VALUES ('$bank_name', '$bank_username', '$bank_account', '$ImageFullFile')");
            move_uploaded_file($ImageFile, "Public/dist/image/" . $ImageFullFile);
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            unset($Data, $ImageFile, $ImageFullFile, $Query);
            return header("Location: ". PROTOCOL_URL . "://" .BASE_URL . "admin/setting/");
        }
        // Delete Bank
        public function DeleteBank($Data){
            $Query = mysqli_query($this->ConnDB, "DELETE FROM ". BANK_TABLE_DB . " WHERE id='$Data'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $Image = $this->BANKID($Data);
            unlink(BASE_URI."Public/dist/image/".$Image['bank_image']);
            unset($Data, $Query);
            return header("Location: ". PROTOCOL_URL . "://" .BASE_URL . "admin/setting/");
        }
    }