<?php
    class MasterAPI{
        protected $ConnAPI, $KeyAPI, $CookieAPI;

        protected function initAPINonRoute(){
            CallFile::RequireOnce('../Config/Api.php');
            CallFile::RequireOnce('../Config/Host.php');
            CallFile::RequireOnce('../Models/Database.php');
            return true;
        }
        protected function initAPIRoute(){
            CallFileApp::RequireOnce('Config/Api.php');
            CallFileApp::RequireOnce('Config/Host.php');
            CallFileApp::RequireOnce('Models/Database.php');
            return true;
        }

        // Signin User
        public function SigninAPI($email, $password){
            $this->initAPINonRoute();
            // Declare Array Assosiative for Signin
            $userSignin = array(
                "email"     => $email,
                "password"  => $password
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

            // Status Singnin
            preg_match('/"status":"(.*?)",/', $execSignin, $statussignin);
            // Status Role
            preg_match('/"role":"(.*?)",/', $execSignin, $statusrole);

            if($statussignin[1] === "SUCCESS"){
                // Fetch Cookie to Access Data from API
                $logHeader = substr($execSignin, 0, curl_getinfo($curlInitSignin, CURLINFO_HEADER_SIZE));
                preg_match('/Expires=(.*?);/', $logHeader, $exptime);
                preg_match('/SessionID=(.*?);/', $logHeader, $token);
                
                $this->CookieAPI = "SessionID=" . $token[1];

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
            return json_decode($execFetchUserData);
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
                "first_name"=>  $fname,
                "last_name" =>  $lname,
                "email"     =>  $email,
                "username"  =>  $username,
                "phone"     =>  $phone,
                "password"  =>  $password,
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
            }else{
                $interest_none = (object) array("interest" => "Minat Kerja Anda Kosong!");
                $_SESSION["STATUS_SIGNUP_ERR"] = empty($interest) ? array_push($ResultSignup->message, $interest_none) : $ResultSignup ; curl_close($curlInitSignup);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }
        
            // Create Directory by Email
            $Umask = umask(0);
            mkdir("../../Public/upload/client/" . $email, 0755, true);
            mkdir("../../Public/upload/client/" . $email . "work", 0755, true);
            mkdir("../../Public/upload/client/" . $email . "transaction", 0755, true);
            umask($Umask);
            
            // Copy index.html
            copy("../../Public/index.html", "../../Public/upload/client/". $email ."/index.html");
            copy("../../Public/index.html", "../../Public/upload/client/". $email ."/work/index.html");
            copy("../../Public/index.html", "../../Public/upload/client/". $email ."/transaction/index.html");
            // Copy photo profile
            copy("../../Public/dist/image/user-photo.png", "../../Public/upload/client/". $email ."/photo.png");
            $_SESSION['register']       = 0;
            $_SESSION['register-email'] = $email;

            curl_close($curlInitSignup);
            return header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "register-success");
        }
    }
