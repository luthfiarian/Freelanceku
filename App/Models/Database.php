<?php

use Midtrans\Transaction;
use Random\Engine\Secure;

    class Site{
        private $ConnDB;

        private function initDBRoute(){CallFileApp::RequireOnce('Config/Database.php');return $this->ConnDB = CONN_DB_SITE;}
        private function initDBNonRoute(){CallFile::RequireOnce('../Config/Database.php'); return $this->ConnDB = CONN_DB_SITE;}
        // Fetch Data SEO
        public function SEO(){ $this->initDBRoute(); return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". SEO_SITE_DB)); }
        // Fetch Data SITE IDENTITY
        public function Identity(){ $this->initDBRoute(); return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM ". IDENTITY_SITE_DB)); }
        // Update Data Site Identity
        public function UpdateIdentity($identity_phone, $identity_email, $identity_maps_link, $identity_maps_embed, $identity_address, $identity_ig, $identity_linkedin, $identity_x, $identity_fb){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "UPDATE ". IDENTITY_SITE_DB . " SET identity_phone='$identity_phone', identity_email='$identity_email', identity_maps_link='$identity_maps_link', identity_maps_embed='$identity_maps_embed', identity_address='$identity_address', identity_ig='$identity_ig', identity_linkedin='$identity_linkedin', identity_x='$identity_x', identity_fb='$identity_fb' WHERE id='1'"); }
        // Update Data SEO
        public function UpdateSEO($seo_name, $seo_type, $seo_locale, $seo_host, $seo_author, $seo_keyword, $seo_des){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "UPDATE ". SEO_SITE_DB . " SET seo_name='$seo_name', seo_type='$seo_type', seo_locale='$seo_locale', seo_host='$seo_host', seo_author='$seo_author', seo_keyword='$seo_keyword', seo_des='$seo_des' WHERE id='1'"); }
        // Fetch Data BANK
        public function Bank(){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_SITE_DB); }
        // Search Data Bank
        public function SearchBank($BankCode){ $this->initDBRoute(); return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . BANK_SITE_DB . " WHERE bank_code='$BankCode'")); }
        // Any Action Bank With Object $Action->status (update, delete, add)
        public function ActionBank($Action){ $this->initDBRoute(); if($Action->status == "update"){ return mysqli_query($this->ConnDB, "UPDATE " . BANK_SITE_DB . " SET " . $Action->query); } else if($Action->status == "delete"){ return mysqli_query($this->ConnDB, "DELETE FROM " . BANK_SITE_DB . " " . $Action->query); } else if($Action->status == "add"){ return mysqli_query($this->ConnDB, "INSERT INTO " . BANK_SITE_DB . " (bank_name, bank_code) VALUES ({$Action->query}) "); } else { $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". BANK_SITE_DB); } }
        // Fetch Data Tax
        public function Tax(){ $this->initDBRoute(); return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . TAX_SITE_DB)); }
        // Changer Data Tax
        public function UpdateTax($TaxPay, $TaxMidtrans){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "UPDATE " . TAX_SITE_DB . " SET tax_pay='$TaxPay', tax_midtrans='$TaxMidtrans' WHERE id='1'" ); }
        // Fetch site_income
        public function FetchAllIncomeDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . INCOME_SITE_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . INCOME_SITE_DB); } }
        // Add Income
        public function AddIncome($Trxid, $FromEmail, $Amount){ $this->initDBRoute(); $Date = date('d M Y H:i'); return mysqli_query($this->ConnDB, "INSERT INTO " . INCOME_SITE_DB . " (income_trxid, income_fromemail, income_amount, income_date) VALUES ('$Trxid', '$FromEmail', '$Amount', '$Date')"); }
        // Fetch Data Interest 
        public function Interest(){$this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". INTEREST_SITE_DB); }
        // Any Action Interest
        public function ActionInterest($Action){$this->initDBRoute();  if($Action->status == "update"){ return mysqli_query($this->ConnDB, "UPDATE " . INTEREST_SITE_DB . " SET " . $Action->query); } else if($Action->status == "delete"){ return mysqli_query($this->ConnDB, "DELETE FROM " . INTEREST_SITE_DB . " " . $Action->query); } else if($Action->status == "add"){ return mysqli_query($this->ConnDB, "INSERT INTO " . INTEREST_SITE_DB . " (interest_name) VALUES ({$Action->query}) "); } else { $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". INTEREST_SITE_DB); } }
        // Fetch Data Interest Non Route
        public function InterestNonRoute(){$this->initDBNonRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM ". INTEREST_SITE_DB); }
    }

    class MasterDB{
        protected $ConnDB;

        protected function initDBNonRoute(){
            CallFile::RequireOnce('../Config/Database.php');
            CallFile::RequireOnce('../../Libs/Security.php');
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
            if(str_contains($_SESSION["fk-session"], "fk-FFFFFF-")){
                $email = Security::StringDB($this->ConnDB, $email);
                $QueryWork = mysqli_query($this->ConnDB, "DELETE FROM " . WORK_USER_DB . " WHERE work_host='$email'");
                $QueryPorto = mysqli_query($this->ConnDB, "DELETE FROM " . PORTO_USER_DB . " WHERE porto_user='$email'");
                $QueryUser = mysqli_query($this->ConnDB, "DELETE FROM " . DATA_USER_DB . " WHERE data_email='$email'");
                if((!$QueryWork) || (!$QueryPorto) || (!$QueryUser)){echo "<script>alert('Terjadi galat pada server')</script>";}
                session_unset(); session_destroy(); unset($_SESSION); setcookie("API-COOKIE", NULL, -1, "/");
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
                exit();
            }else if(str_contains($_SESSION["fk-session"], "fk-808080-")){
                $email = Security::StringDB($this->ConnDB, $email);
                $QueryUser = mysqli_query($this->ConnDB, "DELETE FROM " . DATA_USER_DB . " WHERE data_email='$email'");
                if(!$QueryUser){echo "<script>alert('Terjadi galat pada server')</script>";}
                session_unset(); session_destroy(); unset($_SESSION); setcookie("API-COOKIE", NULL, -1, "/");
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
                exit();
            }
        }

        public function UpdateDataUserDB($email, $photo, $interest){
            $this->initDBRoute();
            // User
            if((!empty($photo) && !empty($interest)) && str_contains($_SESSION["fk-session"], "fk-FFFFFF-")){
                $DirPhoto = "Public/upload/client/$email/image/" . $photo;
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_interest='$interest', data_photo='$DirPhoto' WHERE data_email='$email'");
                if(!$Query){echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }else if(empty($photo) && str_contains($_SESSION["fk-session"], "fk-FFFFFF-")){
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_interest='$interest' WHERE data_email='$email'");
                if(!$Query){echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }
            // Admin
            else if(!empty($photo) && str_contains($_SESSION["fk-session"], "fk-808080-")){
                $DirPhoto = "Public/upload/admin/$email/image/" . $photo;
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_photo='$DirPhoto' WHERE data_email='$email'");
                if(!$Query){echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }else if(empty($photo) && str_contains($_SESSION["fk-session"], "fk-808080-")){
                $_SESSION["STATUS_UPDATE"] = "Data telah berhasil diubah 🎉";
                return true;
            }
        }

        public function GlobalSearchWorkDB($Word){
            $this->initDBRoute();
            $Word = Security::StringDB($this->ConnDB, $Word);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE work_name LIKE '%$Word%' OR work_field LIKE '%$Word%' AND work_status='0'");
        }
    }

    class ClientDB extends MasterDB{

        public function SignupDB($email, $username ,$apikey, $interest){
            $this->initDBNonRoute();
            $data_photo = "Public/upload/client/". $email ."/image/photo.png";
            $user = "User";
            // Admin
            if((empty($interest) && isset($_POST["signup_admin"])) || $_SESSION["signup_admin"]){ 
                $interest = array("isAdmin" => true); $interest = json_encode($interest); 
                $data_photo = "Public/upload/admin/". $email ."/image/photo.png";
                $user = "Admin";
            }
            $Query = mysqli_query($this->ConnDB,  "INSERT INTO " . DATA_USER_DB . " (data_email, data_username, data_apikey, data_interest, data_paymentstatus, data_photo, data_user, data_balance) VALUES ('$email', '$username','$apikey', '$interest', '0', '$data_photo', '$user', '0')" );
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
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                return exit();
            }else{
                $Query = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_paymentcode='$paymentcode', data_paymentid='$paymentid' WHERE data_email='$email'");
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_ADD_PAYMENT"] = "Berhasil edit metode pembayaran 😄";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                return exit();
            }
        }

        public function FetchUserTransferDB($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSFER_USER_DB . " WHERE trf_fromemail='$email' ORDER BY id DESC");
        }

        public function SearchUserTransferDB($email, $search){
            $this->initDBRoute(); $search = Security::StringDB($this->ConnDB, $search);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSFER_USER_DB . " WHERE (trf_fromemail='$email') AND (trf_id LIKE '%$search%' OR trf_workid LIKE '%$search%' OR trf_toemail LIKE '%$search%' OR trf_status LIKE '%$search%' OR trf_amount LIKE '%$search%') ORDER BY id DESC");
        }

        public function SearchUserBillDB($email, $search){
            $this->initDBRoute(); $search = Security::StringDB($this->ConnDB, $search);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . BILL_USER_DB . " WHERE (bill_email='$email') AND (bill_trxid LIKE '%$search%' OR bill_status LIKE '%$search%' OR bill_amount LIKE '%$search%') ORDER BY id DESC");
        }

        public function ViewInvoiceUserBillDB($email, $search){
            $this->initDBRoute(); $search = Security::StringDB($this->ConnDB, $search);
            return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . BILL_USER_DB . " WHERE (bill_email='$email') AND (bill_trxid='$search')"));
        }

        public function FetchUserBillDB($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " .BILL_USER_DB. " WHERE bill_email='$email'");
        }

        public function AddBalanceDB($email, $Amount){
            $this->initDBRoute();
            $Find = (object) mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . DATA_USER_DB . " WHERE data_email='$email' AND data_user='User'"));
            $Balance = $Find->data_balance + $Amount;
            return mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_balance='$Balance' WHERE data_email='$email' AND data_user='User'");
        }

        public function AddUserBillDB($email, $amount, $balance){
            $this->initDBRoute(); $Amount = Security::StringDB($this->ConnDB, $amount);
            $Date = date('d M Y H:i'); $Balance = $balance - $Amount; $inv = "INV-" . rand(87,999) . "-" . rand(76, 400);
            $Bill = mysqli_query($this->ConnDB, "INSERT INTO " . BILL_USER_DB . " (bill_trxid, bill_email, bill_date, bill_amount, bill_status) VALUES ('$inv', '$email', '$Date', '$Amount', 'Proses')");
            $User = mysqli_query($this->ConnDB, "UPDATE " . DATA_USER_DB . " SET data_balance='$Balance' WHERE data_email='$email'");
            if(!$Bill && !$User){
                $_SESSION["STATUS_ERR_DASHBOARD"] = "Terjadi galat pada sistem ❌";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                return exit();
            }else{
                $_SESSION["STATUS_DASHBOARD"] = "Berhasil melakukan tarik dana mohon tunggu sedang diproses waktu kerja kami 😄";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                return exit();
            }
        }

        public function IncomeHistoryDB($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSACTION_USER_DB . " WHERE trx_toemail='$email'");
        }

        public function CreateWorkDB($id, $email, $name, $date, $photo, $salary, $fieldwork, $desc, $maxuser){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $name = Security::StringDB($this->ConnDB, $name); $salary = Security::StringDB($this->ConnDB, $salary); $fieldwork = Security::StringDB($this->ConnDB, $fieldwork); $desc = Security::StringDB($this->ConnDB, $desc);
            $maxuser = Security::StringDB($this->ConnDB, $maxuser); $start = date("d-m-Y");

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

        public function WorkUpdateDB($email, $id, $name, $date, $photo, $salary, $field, $desc){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $name = Security::StringDB($this->ConnDB, $name); $date = Security::StringDB($this->ConnDB, $date);
            $salary = Security::StringDB($this->ConnDB, $salary); $field = Security::StringDB($this->ConnDB, $field); $desc = Security::StringDB($this->ConnDB, $desc);
            if(!empty(Security::StringDB($this->ConnDB, $photo))){
                $UpdateData = "work_name='$name', work_des='$desc', work_field='$field', work_image='$photo', work_salary='$salary', work_finishdate='$date'";
                $Query = mysqli_query($this->ConnDB, "UPDATE " . WORK_USER_DB . " SET " . $UpdateData . " WHERE work_host='$email' AND id='$id'");
                if($Query){
                    $_SESSION["STATUS_UPDATEWORK"] = "Berhasil mengubah pekerjaan work-$id 🎉";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                    return exit();
                }else{
                    $_SESSION["STATUS_ERR_UPDATEWORK"] = "Terjadi galat mengubah pekerjaan work-$id ❌";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                    return exit();
                }
            }else{
                $UpdateData = "work_name='$name', work_des='$desc', work_field='$field', work_salary='$salary', work_finishdate='$date'";
                $Query = mysqli_query($this->ConnDB, "UPDATE " . WORK_USER_DB . " SET " . $UpdateData . " WHERE work_host='$email' AND id='$id'");
                if (!$Query) {echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_UPDATEWORK"] = "Berhasil mengubah pekerjaan work-$id 🎉";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                
                return exit();
            }
        }
        
        public function WorkPartnerRequestDB($workid, $status){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_workid='$workid' AND partner_reqstatus='$status'");
        }
        
        public function WorkAcceptPartnerDB($id, $emailpartner, $emailhost, $workid, $partner){
            $this->initDBRoute();
            $emailpartner = Security::StringDB($this->ConnDB, $emailpartner);
            $QueryWork = mysqli_query($this->ConnDB, "UPDATE " . WORK_USER_DB . " SET work_partner$partner='$emailpartner' WHERE work_host='$emailhost' AND id='$workid'");
            $QueryPartner = mysqli_query($this->ConnDB, "UPDATE " . PARTNER_USER_DB . " SET partner_reqstatus=1, partner_message=NULL WHERE id='$id' AND partner_email='$emailpartner'");
            if($QueryWork && $QueryPartner){
                $_SESSION["STATUS_REQWORK"] = "Berhasil menambah mitra, selamat bekerja 😄";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
                return exit();
            }
        }

        public function WorkPartnerDetailDB($workid, $email){
            $this->initDBRoute();
            return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_workid='$workid' AND partner_email='$email'"));
        }

        public function WorkRejectPartnerDB($id, $name){
            $this->initDBRoute(); 
            $Query = mysqli_query($this->ConnDB, "UPDATE " . PARTNER_USER_DB . " SET partner_reqstatus=2 WHERE id='$id'");
            if(!$Query){$_SESSION["STATUS_ERR_REQWORK"] = "Terjadi Galat Pada Server ❌";}
            $_SESSION["STATUS_REQWORK"] = "Anda berhasil menolak lamaran $name 😥";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
            return exit();
        }

        public function WorkAddMessagePartnerDB($id, $name,$message){
            $this->initDBRoute();
            $message = Security::StringDB($this->ConnDB, $message);
            $Query = mysqli_query($this->ConnDB, "UPDATE " . PARTNER_USER_DB . " SET partner_revmessage='$message' WHERE id='$id'");
            if(!$Query){$_SESSION["STATUS_ERR_UPDATEWORK"] = "Terjadi Galat Pada Server ❌";}
            $_SESSION["STATUS_UPDATEWORK"] = "Anda berhasil memberi pesan kepada $name";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
            return exit();
        }

        public function WorkFinishDB($email, $id){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            $Query = mysqli_query($this->ConnDB, "UPDATE " . WORK_USER_DB . " SET work_status='1' WHERE work_host='$email' AND id='$id'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $_SESSION["STATUS_FINISHWORK"] = "Selamat pekerjaan work-$id telah selesai 🎉";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
            return exit();
        }

        public function WorkDelDB($email, $id){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            $Query = mysqli_query($this->ConnDB, "DELETE FROM " . WORK_USER_DB . " WHERE work_host='$email' AND id='$id'");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $_SESSION["STATUS_DELWORK"] = "Berhasil menghapus pekerjaan work-$id 👍";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work");
            return exit();
        }

        public function PartnerRequestDB ($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_email='$email' AND (partner_reqstatus='0' OR partner_reqstatus='2')");
        }

        public function PartnerSearchDB($email, $search){
            $this->initDBRoute(); if(isset($_SESSION["SEARCH"])){ unset($_SESSION["SEARCH"]); }
            $email = Security::StringDB($this->ConnDB, $email); $search = Security::StringDB($this->ConnDB, $search);
            $SearchData = " WHERE work_host LIKE '%$search%' OR work_name LIKE '%$search%' OR work_field LIKE '%$search%' OR work_salary LIKE '%$search%' AND work_status='0'";
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . $SearchData);
        }

        public function SearchWorkDefaultDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); 
            $SearchData = " ORDER BY id DESC";
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . $SearchData);
        }
        

        // List of Partner Work
        public function PartnerListWorkDB($email){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_email='$email'");
        }

        // List of Work Partner Finish
        public function PartnerWorkListDB($email, $status){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE (work_partner1='$email' OR work_partner2='$email' OR work_partner3='$email') AND work_status='$status'");
        }

        // List of Work Partner
        public function PartnerWorkDetailDB($email, $id){
            $this->initDBRoute();
            return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE (work_partner1='$email' AND id='$id') OR (work_partner2='$email' AND id='$id' ) OR (work_partner3='$email' AND id='$id')");
        }

        // Detail Partner 
        public function PartnerDetailDB($email, $id){
            $this->initDBRoute();
            return mysqli_fetch_assoc(mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_email='$email' AND partner_workid='$id'"));
        }

        // Detail Send Message Partner
        public function PartnerUpdateMessageDB($email, $id, $message){
            $this->initDBRoute(); $message = Security::StringDB($this->ConnDB, $message);
            $Query = mysqli_query($this->ConnDB, "UPDATE " . PARTNER_USER_DB . " SET partner_message='$message' WHERE partner_email='$email' AND id='$id'");
            if($Query){
                $_SESSION["STATUS_UPDATEWORK"] = "Berhasil mengrim pesan 📧";
            }else{
                $_SESSION["STATUS_ERR_UPDATEWORK"] = "Terjadi galat pada server ❌";
            }
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
            return exit();
        }

        // Detail Send Message Partner
        public function PartnerUpdateFileDB($email, $id, $file){
            $this->initDBRoute();
            $Query = mysqli_query($this->ConnDB, "UPDATE " . PARTNER_USER_DB . " SET partner_file='$file' WHERE partner_email='$email' AND id='$id'");
            if($Query){
                $_SESSION["STATUS_UPDATEWORK"] = "Berhasil mengunggah berkas 😄";
            }else{
                $_SESSION["STATUS_ERR_UPDATEWORK"] = "Terjadi galat pada server ❌";
            }
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
            return exit();
        }
        

        // Partner Request for a Job
        public function PartnerRequestJoinDB($email, $workid, $message, $username){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $workid = Security::StringDB($this->ConnDB, $workid);
            $message = Security::StringDB($this->ConnDB, $message); $date = date("d-m-Y");

            $PartnerData = "('$workid', '0', '$date', '$email', '$message', '$username')";
            if(mysqli_num_rows(mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE partner_email='$email' AND partner_workid='$workid'")) == 0){
                $Query = mysqli_query($this->ConnDB, "INSERT INTO " . PARTNER_USER_DB . " (partner_workid, partner_reqstatus, partner_date, partner_email, partner_message, partner_username) VALUES " . $PartnerData );
                if($Query){
                    $_SESSION["STATUS_REQWORK"] = "Anda berhasil melamar ke proyek #work-$workid, mohon tunggu balasan dari pemilik proyek 😄";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                    return exit();
                }else{
                    $_SESSION["STATUS_ERR_REQWORK"] = "Terjadi galat pada server ❌";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                    return exit();
                }
            }else{
                $_SESSION["STATUS_ERR_REQWORK"] = "Anda telah melamar pada proyek #work-$workid, mohon tunggu balasan pemilik proyek 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                return exit();
            }
        }

        // Partner Delete Request a Job
        public function PartnerRequestDelDB($email, $workid){
            $this->initDBRoute();
            $Query = mysqli_query($this->ConnDB, "DELETE FROM " . PARTNER_USER_DB . " WHERE partner_email='$email' AND partner_workid='$workid'");
            if($Query){
                $_SESSION["STATUS_REQWORK"] = "Anda telah menghapus lamaran ke proyek #work-$workid 😥";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
                return exit();
            }else{
                $_SESSION["STATUS_ERR_REQWORK"] = "Terjadi galat pada server ❌";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "partner");
                return exit();
            }
        }

        // Collect Data of Portofolio
        public function FetchPortoUserDB($email){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . PORTO_USER_DB . " WHERE porto_user='$email'");
        }

        // Add Portofolio
        public function AddPortoUserDB($email, $name, $date, $field, $file){
            $this->initDBRoute();
            $email = Security::StringDB($this->ConnDB, $email); $name = Security::StringDB($this->ConnDB, $name); $field = Security::StringDB($this->ConnDB, $field);
            $DirFile = "Public/upload/client/$email/portofolio/$file";
            $Query = mysqli_query($this->ConnDB, "INSERT INTO ". PORTO_USER_DB . " (porto_user, porto_name, porto_date, porto_field, porto_file) VALUES ('$email', '$name', '$date', '$field', '$DirFile')");
            if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
            $_SESSION["STATUS_ADD_PORTO"] = "Berhasil menambahkan portofolio 👍";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
            return exit();
        }

        // Delete Portofolio
        public function DeletePortoUserDB($id, $file){
            $this->initDBRoute();
            if(unlink($file)){
                $Query = mysqli_query($this->ConnDB, "DELETE FROM " . PORTO_USER_DB . " WHERE id='$id'");
                if(!$Query){ echo "<script>alert('Terjadi galat pada server')</script>";}
                $_SESSION["STATUS_DEL_PORTO"] = "Berhasil menghapus portofolio 👍";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "account");
                return exit();
            }
        }
    }

    class TransactionDB extends ClientDB{
        public function FetchTransferDB($Trxid){
            $this->initDBRoute(); $Trxid = Security::StringDB($this->ConnDB, $Trxid);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSFER_USER_DB . " WHERE trf_id='$Trxid'");
        }

        public function FetchTransactionDB($Trxid){
            $this->initDBRoute(); $Trxid = Security::StringDB($this->ConnDB, $Trxid);
            return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSACTION_USER_DB . " WHERE trx_id='$Trxid'");
        }

        public function AddTransferDB($Trxid, $Workid, $MidtransToken, $FromEmail, $ToEmail, $AmountwTax){
            $this->initDBRoute(); $ToEmail = Security::StringDB($this->ConnDB, $ToEmail); $date = date('d M Y H:i');
            $Table = " (trf_id, trf_workid, trf_token, trf_fromemail, trf_toemail, trf_status, trf_amount, trf_date) ";
            $Value = " ('$Trxid', '$Workid', '$MidtransToken', '$FromEmail', '$ToEmail', 'Berlangsung', '$AmountwTax', '$date')";
            $Query = mysqli_query($this->ConnDB, "INSERT INTO " . TRANSFER_USER_DB . $Table . "VALUES" . $Value);
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "work/detail");
            return exit();
        }

        public function UpdateTransferDB($Trxid, $Status){
            $this->initDBRoute(); $Trxid = Security::StringDB($this->ConnDB, $Trxid);
            return mysqli_query($this->ConnDB, "UPDATE " . TRANSFER_USER_DB . " SET trf_status='$Status' WHERE trf_id='$Trxid'");
        }

        public function UpdateUserBillStatusDB($Trxid, $Status, $File, $Admin){
            $this->initDBRoute(); $Trxid = Security::StringDB($this->ConnDB, $Trxid);
            return mysqli_query($this->ConnDB, "UPDATE " . BILL_USER_DB . " SET bill_status='$Status', bill_file='$File', bill_admin='$Admin' WHERE bill_trxid='$Trxid'");
        }

        public function AddTransactionDB($Trxid, $Workid, $FromEmail, $ToEmail, $Amount){
            $this->initDBRoute(); 
            $Trxid      = Security::StringDB($this->ConnDB, $Trxid);
            $FromEmail  = Security::StringDB($this->ConnDB, $FromEmail);
            $ToEmail    = Security::StringDB($this->ConnDB, $ToEmail);
            $Date = date("d M Y H:i");
            return mysqli_query($this->ConnDB, "INSERT INTO " . TRANSACTION_USER_DB . " (trx_id, trx_workid, trx_date, trx_fromemail, trx_toemail, trx_amount) VALUES ('$Trxid', '$Workid', '$Date', '$FromEmail', '$ToEmail', '$Amount' )");
        }

    }

    class AdminDB extends TransactionDB{
        // Fetch user_data in DB
        public function FetchAllDataUserDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . DATA_USER_DB . " WHERE " . $Where); }else{ return mysqli_query($this->ConnDB, "SELECT * FROM " . DATA_USER_DB); } }
        // Fetch user_data Amount in DB
        public function FetchAllAmountUserDB(){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT data_balance FROM " . DATA_USER_DB . " WHERE data_user='User'"); }
        // Fetch user_transfer
        public function FetchAllDataTransferDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSFER_USER_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSFER_USER_DB); } }
        // Fetch user_transaction
        public function FetchAllDataTransactionDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSACTION_USER_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSACTION_USER_DB); } }
        // Fetch user_transaction
        public function FetchNewTransactionDB(){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT * FROM " . TRANSACTION_USER_DB . " ORDER BY id DESC"); }
        // Fetch user_porto
        public function FetchAllDataPortoDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . PORTO_USER_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . PORTO_USER_DB); } }
        // Fetch user_work
        public function FetchAllDataWorkDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . WORK_USER_DB); } }
        // Fetch user_partner
        public function FetchAllDataPartnerDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB . " WHERE " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . PARTNER_USER_DB); } }
        // Fetch user_bill
        public function FetchAllDataBillDB($Where){ $this->initDBRoute(); if(!empty($Where)){ return mysqli_query($this->ConnDB, "SELECT * FROM " . BILL_USER_DB . " " . $Where); } else { return mysqli_query($this->ConnDB, "SELECT * FROM " . BILL_USER_DB); } }
        // Fetch user_bill Payout
        public function FetchAllPayoutBillDB(){ $this->initDBRoute(); return mysqli_query($this->ConnDB, "SELECT bill_amount FROM " . BILL_USER_DB . " WHERE bill_status='Berhasil'"); }
    }

    class WebhooksDB extends AdminDB{

        public function UpdateTransferWebhooksDB($Trxid, $Type){
            $this->initDBRoute(); $Trxid = Security::StringDB($this->ConnDB, $Trxid); $Type = Security::StringDB($this->ConnDB, $Type);
            return mysqli_query($this->ConnDB, "UPDATE " . TRANSFER_USER_DB . " SET trf_type='$Type' WHERE trf_id='$Trxid'");
        }
    }