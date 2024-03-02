<?php
    class MasterAPI{
        protected $ConnAPI, $KeyAPI, $CookieAPI;

        protected function initAPINonRoute(){
            CallFile::RequireOnce('../Config/Api.php');
            CallFile::RequireOnce('../Config/Host.php');
            CallFile::RequireOnce('../Models/Database.php');
            CallFile::RequireOnce('../../Libs/Security.php');
            return true;
        }
        protected function initAPIRoute(){
            CallFileApp::RequireOnce('Config/Api.php');
            CallFileApp::RequireOnce('Config/Host.php');
            CallFileApp::RequireOnce('Models/Database.php');
            CallFile::RequireOnce('Libs/Security.php');
            return true;
        }

        // Signin User
        public function SigninAPI($email, $password){
            if(isset($_SESSION["register"]) && isset($_SESSION["register-email"])){ unset($_SESSION["register"], $_SESSION["register-email"]); }
            $this->initAPINonRoute();
            // Declare Array Assosiative for Signin
            $userSignin = array(
                "email"     => Security::String($email),
                "password"  => Security::String($password)
            );

            // Process of Signin User to API
            $encodeUserSignin = json_encode($userSignin);
            $curlInitSignin   = curl_init(API_USER_SIGNIN);
            curl_setopt($curlInitSignin, CURLOPT_POST, true);
            curl_setopt($curlInitSignin, CURLOPT_HEADER, true);
            curl_setopt($curlInitSignin, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInitSignin, CURLOPT_POSTFIELDS, $encodeUserSignin);
            curl_setopt($curlInitSignin, CURLOPT_RETURNTRANSFER, true);
            $execSignin   = curl_exec($curlInitSignin);
            $_SESSION["Look-Data"] = json_decode($execSignin, true);
            // Status Singnin
            preg_match('/"status":"(.*?)",/', $execSignin, $statussignin);
            // Status Role
            preg_match('/"role":"(.*?)",/', $execSignin, $statusrole);

            if($statussignin[1] === "SUCCESS"){
                // Fetch Cookie to Access Data from API
                $logHeader = substr($execSignin, 0, curl_getinfo($curlInitSignin, CURLINFO_HEADER_SIZE));
                preg_match('/Expires=(.*?);/', $logHeader, $exptime);
                preg_match('/token=(.*?);/', $logHeader, $token);
                
                $this->CookieAPI = "token=" . $token[1];

                // Login as Administrator
                if($statusrole[1] === "r-fa00"){
                    setcookie("API-COOKIE", $this->CookieAPI, strtotime($exptime[1]), "/");
                    $_SESSION["fk-session"] = "fk-808080-{$email}";
                    curl_close($curlInitSignin);
                    return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/dashboard");
                }
                // Login as User Freelance
                else if($statusrole[1] === "r-fa07"){
                    setcookie("API-COOKIE", $this->CookieAPI, strtotime($exptime[1]), "/");
                    $_SESSION["fk-session"] = "fk-FFFFFF-{$email}";
                    curl_close($curlInitSignin);
                    return header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
                }
            }else{
                $_SESSION["STATUS_SIGNIN_ERR"] = "Gagal login, Mohon periksa kembali email & password anda!"; curl_close($curlInitSignin);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }
        }

        public function FetchUserDataAPI($username, $apikey){
            $this->initAPIRoute();
            $curlInitFetchUserData   = curl_init(API_USER_SPECIAL);
            curl_setopt($curlInitFetchUserData, CURLOPT_URL, API_USER_SPECIAL . $username);
            curl_setopt($curlInitFetchUserData, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}"));
            curl_setopt($curlInitFetchUserData, CURLOPT_RETURNTRANSFER, true);
            $execFetchUserData = curl_exec($curlInitFetchUserData);
            curl_close($curlInitFetchUserData);
            $FetchData = json_decode($execFetchUserData);
            if($FetchData->status == "UNAUTHORIZE"){
                $_SESSION["STATUS_SIGNIN_ERR"] = "Terjadi galat, mohon masuk kembali";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "signout");
                return exit();
            }else{
                return $FetchData;
            }
        }

        public function DeleteUserAPI($email, $username, $apikey){
            $this->initAPIRoute();
            $DeleteUser = array("username" => Security::String($username));
            $curlInitDelUser   = curl_init(API_USER_SPECIAL . $username);
            curl_setopt($curlInitDelUser, CURLOPT_POST, true);
            curl_setopt($curlInitDelUser, CURLOPT_POSTFIELDS, json_encode($DeleteUser));
            curl_setopt($curlInitDelUser, CURLOPT_URL, API_USER_SPECIAL . $username);
            curl_setopt($curlInitDelUser, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curlInitDelUser, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitDelUser, CURLOPT_RETURNTRANSFER, true);
            $execDelUser= curl_exec($curlInitDelUser);
            curl_close($curlInitDelUser);

            $User = new MasterDB; 
            return $User->DeleteUserDB($email);
        }

        public function UpdateDataUserAPI($apikey, $username, $first_name, $last_name, $phone, $description, $street, $city, $province, $country){
            $this->initAPIRoute();
            $UpdateDataUser = array(
                "new_first_name"=> Security::String($first_name),
                "new_last_name" => Security::String($last_name),
                "new_phone"     => Security::String($phone),
                "new_street"    => Security::String($street),
                "new_city"      => Security::String($city),
                "new_province"  => Security::String($province),
                "new_country"   => Security::String($country),
                "new_description"=> Security::String($description),
            );
            $curlInitUpdUser    = curl_init(API_USER_SPECIAL);
            $encodeUpdUser      = json_encode($UpdateDataUser);
            curl_setopt($curlInitUpdUser, CURLOPT_POST, true);
            curl_setopt($curlInitUpdUser, CURLOPT_POSTFIELDS, $encodeUpdUser);
            curl_setopt($curlInitUpdUser, CURLOPT_URL, API_USER_SPECIAL . $username);
            curl_setopt($curlInitUpdUser, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($curlInitUpdUser, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitUpdUser, CURLOPT_RETURNTRANSFER, true);
            $execUpdateUser= curl_exec($curlInitUpdUser);
            curl_close($curlInitUpdUser);
            $ResultUpdateUserData = json_decode($execUpdateUser);

            if($ResultUpdateUserData->status === "SUCCESS"){
                return true;
            }else{
                $_SESSION["STATUS_ERR_UPDATE"] = "Terjadi galat, mohon periksa kembali!";
                exit();
                return false;
            }
        }

        public function SignoutAPI(): never{
            $this->initAPIRoute();
            $curlInitSignout    = curl_init(API_USER_SIGNOUT);
            curl_setopt($curlInitSignout, CURLOPT_URL, API_USER_SIGNOUT);
            curl_setopt($curlInitSignout, CURLOPT_RETURNTRANSFER, true);
            $ResultSignout = curl_exec($curlInitSignout);
            curl_close($curlInitSignout);
            die;
        }

        public function FindUserAPI($apikey, $username){
            $this->initAPIRoute(); $username = Security::String($username);
            $curlInitSearch     = curl_init(API_USER_SEARCH. $username);
            curl_setopt($curlInitSearch, CURLOPT_URL, API_USER_SEARCH . "?username=" . $username);
            curl_setopt($curlInitSearch, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitSearch, CURLOPT_RETURNTRANSFER, true);
            $execFindUser   = curl_exec($curlInitSearch);
            curl_close($curlInitSearch);
            return json_decode($execFindUser);
        }
    }
    /**
     * Class For Register New Freelancer
     */
    
    class ClientAPI extends MasterAPI{

        // Signup User
        public function SignupAPI($fname, $lname, $email, $username, $phone, $interest, $password){
            $this->initAPINonRoute();
            // Create User API
            $userSignup = array(
                "first_name"=>  Security::String($fname),
                "last_name" =>  Security::String($lname),
                "email"     =>  Security::String($email),
                "username"  =>  Security::String($username),
                "phone"     =>  Security::String($phone),
                "street"    =>  NULL,
                "city"      =>  NULL,
                "province"  =>  NULL,
                "country"   =>  NULL,
                "password"  =>  Security::String($password),
                "description"=> NULL
            );
            
            // Process of Add User to API
            $encodeUserSignup = json_encode($userSignup);
            $curlInitSignup   = curl_init(API_USER_SIGNUP);
            curl_setopt($curlInitSignup, CURLOPT_POST, true);
            curl_setopt($curlInitSignup, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInitSignup, CURLOPT_POSTFIELDS, $encodeUserSignup);
            curl_setopt($curlInitSignup, CURLOPT_RETURNTRANSFER, true);
            $execSignup   = curl_exec($curlInitSignup);
            $ResultSignup = json_decode($execSignup);

            // Check Data User in API
            if($ResultSignup->status === "SUCCESS" && isset($interest) && !empty($interest)){
                // Inserting Values ​​Into Private Class Variables
                $this->KeyAPI = $ResultSignup->data->apiKey;
                // Add Email & API Key into DB

                $ClientDB = new ClientDB; $ClientDB->SignupDB($email, $username, $this->KeyAPI, json_encode($interest));
            }else if(empty($interest)){
                $_SESSION["STATUS_SIGNUP_ERR"] = (object) array("status" => "INVALID", "message" => (object) array("interest" => "Minat Kerja Anda Kosong!")); curl_close($curlInitSignup);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }else if($ResultSignup->status === "INVALID"){
                $_SESSION["STATUS_SIGNUP_ERR"] = $ResultSignup; curl_close($curlInitSignup);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }else{
                $interest_none = (object) array("interest" => "Minat Kerja Anda Kosong!");
                $_SESSION["STATUS_SIGNUP_ERR"] = empty($interest) ? array_push($ResultSignup->message, $interest_none) : $ResultSignup ; curl_close($curlInitSignup);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }
        
            // Create Directory by Email
            $Umask = umask(0);
            mkdir("../../Public/upload/client/" . $email, 0755, true);
            mkdir("../../Public/upload/client/" . $email . "/work", 0755, true);
            mkdir("../../Public/upload/client/" . $email . "/image", 0755, true);
            mkdir("../../Public/upload/client/" . $email . "/partner", 0755, true);
            mkdir("../../Public/upload/client/" . $email . "/portofolio", 0755, true);
            mkdir("../../Public/upload/client/" . $email . "/bill", 0755, true);
            umask($Umask);
            
            // Copy index.php
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/index.php");
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/work/index.php");
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/image/index.php");
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/partner/index.php");
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/portofolio/index.php");
            copy("../../Public/index.php", "../../Public/upload/client/". $email ."/bill/index.php");
            // Copy photo profile
            copy("../../Public/dist/image/user-photo.png", "../../Public/upload/client/". $email ."/image/photo.png");
            $_SESSION['register']       = 0;
            $_SESSION['register-email'] = $email;

            curl_close($curlInitSignup);
            return header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "register-success");
        }
    }

    class TransactionAPI extends ClientAPI{

        public function UpdateTransactionAPI($apikey, $Trxid, $Status){
            $UpdateTransaction = array(
                "new_status"    => $Status
            );

            $curlInitUpdateTrx   = curl_init(API_UPDATE_TRX.$Trxid);
            curl_setopt($curlInitUpdateTrx, CURLOPT_POST, true);
            curl_setopt($curlInitUpdateTrx, CURLOPT_URL, API_UPDATE_TRX.$Trxid);
            curl_setopt($curlInitUpdateTrx, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitUpdateTrx, CURLOPT_POSTFIELDS, json_encode($UpdateTransaction));
            curl_setopt($curlInitUpdateTrx, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($curlInitUpdateTrx, CURLOPT_RETURNTRANSFER, true);
            $execAddTrx   = curl_exec($curlInitUpdateTrx);
            return curl_close($curlInitUpdateTrx);
        }

        public function AddTransactionAPI($Token, $Workid, $WorkName, $Trxid, $Email, $EmailPartner, $Amount, $AmountwTax, $apikey){
            $DataTransaction = array(
                "payment_id"    =>  $Trxid,
                "sender_email"  =>  $Email,
                "receiver_email"=>  $EmailPartner,
                "amount"        =>  $Amount,
                "message"       =>  $WorkName . "-[$Workid]-($Token)",
                "status"        =>  "PENDING"
            );

            $curlInitAddTrx   = curl_init(API_USER_TRXNEW);
            curl_setopt($curlInitAddTrx, CURLOPT_POST, true);
            curl_setopt($curlInitAddTrx, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitAddTrx, CURLOPT_POSTFIELDS, json_encode($DataTransaction));
            curl_setopt($curlInitAddTrx, CURLOPT_RETURNTRANSFER, true);
            $execAddTrx   = curl_exec($curlInitAddTrx);
            curl_close($curlInitAddTrx);
            
            $sessionTransaction = array(
                "id"            =>  $Trxid,
                "token"         =>  $Token,
                "snap_appears"  =>  true,
                "amount_wtax"   =>  $AmountwTax,
                "amount"        =>  $Amount,
                "email"         =>  $Email,
                "email_partner" =>  $EmailPartner
            );

            $Transfer = new TransactionDB;

            $_SESSION["TRX_DATA"] = $sessionTransaction;
            $_SESSION["STATUS_TRX_PAY"] = "Pembayaran sedang berlangsung, segera untuk diselesaikan";
            return $Transfer->AddTransferDB($Trxid, $Workid, $Token, $Email, $EmailPartner, $AmountwTax);
        }

        public function AddBillTransactionAPI($Trxid, $Email, $EmailUser, $Amount, $apikey){
            $DataTransaction = array(
                "payment_id"    =>  $Trxid,
                "sender_email"  =>  $Email,
                "receiver_email"=>  $EmailUser,
                "amount"        =>  $Amount,
                "message"       =>  "Tarik Saldo",
                "status"        =>  "DONE"
            );

            $curlInitAddBill   = curl_init(API_USER_TRXNEW);
            curl_setopt($curlInitAddBill, CURLOPT_POST, true);
            curl_setopt($curlInitAddBill, CURLOPT_HTTPHEADER, array("api-key:" . $apikey, "Cookie: {$_COOKIE["API-COOKIE"]}", 'Content-Type: application/json'));
            curl_setopt($curlInitAddBill, CURLOPT_POSTFIELDS, json_encode($DataTransaction));
            curl_setopt($curlInitAddBill, CURLOPT_RETURNTRANSFER, true);
            $execAddBill  = curl_exec($curlInitAddBill);
            curl_close($curlInitAddBill);
            
            return true;
        }
    }

    class AdminAPI extends TransactionAPI{
        // Signup Admin
        public function SignupAdminAPI($fname, $lname, $email, $username, $phone, $password, $from){
            $this->initAPINonRoute();
            // Create Admin API
            $userSignup = array(
                "first_name"=>  Security::String($fname),
                "last_name" =>  Security::String($lname),
                "email"     =>  Security::String($email),
                "username"  =>  Security::String($username),
                "phone"     =>  Security::String($phone),
                "street"    =>  NULL,
                "city"      =>  NULL,
                "province"  =>  NULL,
                "country"   =>  NULL,
                "password"  =>  Security::String($password),
                "description"=> NULL,
                "role"      => 'SUFKU_DEV'
            );
            
            // Process of Add Admin to API
            $encodeUserSignup = json_encode($userSignup);
            $curlInitSignup   = curl_init(API_USER_SIGNUP);
            curl_setopt($curlInitSignup, CURLOPT_POST, true);
            curl_setopt($curlInitSignup, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInitSignup, CURLOPT_POSTFIELDS, $encodeUserSignup);
            curl_setopt($curlInitSignup, CURLOPT_RETURNTRANSFER, true);
            $execSignup   = curl_exec($curlInitSignup);
            $ResultSignup = json_decode($execSignup);

            // Check Data Admin in API
            if($ResultSignup->status === "SUCCESS"){
                // Inserting Values ​​Into Private Class Variables
                $this->KeyAPI = $ResultSignup->data->apiKey;
                // Add Email & API Key into DB

                $ClientDB = new ClientDB; $ClientDB->SignupDB($email, $username, $this->KeyAPI, NULL);
            }else if($ResultSignup->status === "INVALID"){
                $_SESSION["STATUS_SIGNUP_ERR"] = $ResultSignup; curl_close($curlInitSignup);
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
                return exit();
            }else{
                $_SESSION["STATUS_SIGNUP_ERR"] = "Terjadi galat saat melakukan pendaftaran ❌"; curl_close($curlInitSignup);
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
                return exit();
            }
        
            // Create Directory by Email
            $Umask = umask(0);
            mkdir("../../Public/upload/admin/" . $email, 0755, true);
            mkdir("../../Public/upload/admin/" . $email . "/image", 0755, true);
            umask($Umask);
            
            // Copy index.php
            copy("../../Public/index.php", "../../Public/upload/admin/". $email ."/index.php");
            copy("../../Public/index.php", "../../Public/upload/admin/". $email ."/image/index.php");
            // Copy photo profile
            copy("../../Public/dist/image/user-photo.png", "../../Public/upload/admin/". $email ."/image/photo.png");
            
            curl_close($curlInitSignup);
            if(empty($from)){
                $_SESSION['register']       = 0;
                $_SESSION['register-email'] = $email;
    
                header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "register-success");
                return exit();
            }else{
                unset($_SESSION["signup_admin"], $_SESSION["admin_key"], $_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['email'], $_SESSION['username'], $_SESSION['phone'], $_SESSION['password']);
                $_SESSION["STATUS_USER"] = "Berhasil membuat akun admin";
                header("Location: " . PROTOCOL_URL . "://" .BASE_URL . $from);
                return exit();
            }
        }
    }
