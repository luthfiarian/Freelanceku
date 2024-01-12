<?php
    /**
     * Class For Register New Freelancer
     */
    class ClientAPI{
        private $ConnAPI, $KeyAPI, $CookieAPI;

        public function __construct(){
            CallFile::ReqireOnce('../Config/Api.php');
            CallFile::ReqireOnce('../Config/Host.php');
            CallFile::ReqireOnce('../Models/Database.php');
            return true;
        }
        
        private function SigninAPI($email, $password, $from){
            // Data Routes Users API
            $userLogin = array(
                "email"     =>  $email,
                "password"  =>  $password,
            );


            // Process of Login to API
            $encodeUserLogin = json_encode($userLogin);
            $curlInitLogin   = curl_init(API_ROUTE_SIGNIN);
            curl_setopt($curlInitLogin, CURLOPT_POST, true);
            curl_setopt($curlInitLogin, CURLOPT_HEADER, true);
            curl_setopt($curlInitLogin, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInitLogin, CURLOPT_POSTFIELDS, $encodeUserLogin);
            curl_setopt($curlInitLogin, CURLOPT_RETURNTRANSFER, true);
            $execLogin   = curl_exec($curlInitLogin);
            $logHeader = substr($execLogin, 0, curl_getinfo($curlInitLogin, CURLINFO_HEADER_SIZE));
            preg_match('/Expires=(.*?);/', $logHeader, $exptime);
            preg_match('/SessionTokenId=(.*?);/', $logHeader, $token);
            // 
            $this->CookieAPI = "SessionTokenId=" . $token[1];
            

            if($from === "register"){
                curl_close($curlInitLogin);
                return true;
            }else if($from === "login"){
                setcookie("API-COOKIE", $this->CookieAPI, strtotime($exptime[1]), "/");
                curl_close($curlInitLogin);
                return true;
            }else{
                $_SESSION["STATUS-LOGIN"] = curl_getinfo($curlInitLogin, CURLINFO_HTTP_CODE);
                curl_close($curlInitLogin);
                return true;
            }
        }

        // Signup Freelancers
        public function SignupAPI($fname, $lname, $email, $username, $phone, $address, $password){
            // Create User API
            $userSignup = array(
                "username"  =>  $username,
                "email"     =>  $email,
                "password"  =>  $password,
                "role"      =>  "freelancer"
            );
            
            // Process of Add User Routes
            $encodeUserSignup = json_encode($userSignup);
            $curlInitSignup   = curl_init(API_ROUTE_SIGNUP);
            curl_setopt($curlInitSignup, CURLOPT_POST, true);
            curl_setopt($curlInitSignup, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInitSignup, CURLOPT_POSTFIELDS, $encodeUserSignup);
            curl_setopt($curlInitSignup, CURLOPT_RETURNTRANSFER, true);
            $execSignup   = curl_exec($curlInitSignup);

            // Check Data User API
            $ResultSignup = json_decode($execSignup);
            if($ResultSignup->status === "SUCCESS"){
                curl_close($curlInitSignup);
                // Inserting Values ​​Into Private Class Variables
                $this->KeyAPI = $ResultSignup->data->apiKey;
                // Add Email & API Key into DB
                $ClientDB = new ClientDB; $ClientDB->SignupDB($email, $this->KeyAPI);
                // Login to API by New Register
                $this->SigninAPI($email, $password, "register");
            }else{
                $_SESSION['STATUS-SIGNUP'] = curl_getinfo($curlInitSignup, CURLINFO_HTTP_CODE);
                curl_close($curlInitSignup);
                return header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
            }

            // Create User Freelancers API
            $userFreelance = array(
                "first_name"    => $fname,
                "last_name"     => $lname,
                "email"         => $email,
                "phone"         => $phone,
                "country"       => $address
            );

            // Process of Add Data Freelancers
            $encodeFreelance    = json_encode($userFreelance);
            $curlInitFreelance  = curl_init(API_ROUTE_FREELANCER);       
            curl_setopt($curlInitFreelance, CURLOPT_POST, true);
            curl_setopt($curlInitFreelance, CURLOPT_HEADER, true);
            curl_setopt($curlInitFreelance, CURLOPT_HTTPHEADER, array('Authorization:  '. $this->KeyAPI, 'Cookie: '. $this->CookieAPI, 'Content-Type: application/json'));
            curl_setopt($curlInitFreelance, CURLOPT_POSTFIELDS, $encodeFreelance);
            curl_setopt($curlInitFreelance, CURLOPT_RETURNTRANSFER, true);
            $execFreelance      = curl_exec($curlInitFreelance);
            $infoCurl = curl_getinfo($curlInitFreelance, CURLINFO_HTTP_CODE);

            // Create Directory by Email
            $Umask = umask(0);
            mkdir("../../Public/upload/client/" . $email, 0755, true);
            umask($Umask);
            
            // Copy index.html
            copy("../../Public/index.html", "../../Public/upload/Client/". $email ."/index.html");
            $_SESSION['register']       = 0;
            $_SESSION['register-email'] = $email;
            
            curl_close($curlInitFreelance);

            return header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "register-success");
        }

        
    }
