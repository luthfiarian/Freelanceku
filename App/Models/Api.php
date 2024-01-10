<?php
    /**
     * Class For Register New Freelancer
     */
    class Client{
        private $ConnAPI;

        public function __construct(){
            CallFile::ReqireOnce('../Config/Api.php');
            CallFile::ReqireOnce('../Config/Host.php');
            $this->ConnAPI = json_decode(file_get_contents(API_ROUTE_USER), true);
            return true;
        }
        
        private function ClientSigninRegister($fname, $lname, $email, $username, $phone, $address, $password){
            // Data Routes Users API
            $user = array(
                "email"     =>  "babang@mail.com",
                "password"  =>  "babang213",
            );

            // Process of Add User Routes
            $encodeData = json_encode($user);
            $curlInit   = curl_init(API_ROUTE_SIGNIN);
            curl_setopt($curlInit, CURLOPT_POST, true);
            curl_setopt($curlInit, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInit, CURLOPT_POSTFIELDS, $encodeData);
            curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
            $execData   = curl_exec($curlInit);

            curl_close($curlInit);
            unset($user);

            return $this->ClientRegisterData($fname, $lname, $email, $username, $phone, $address, $password);
        }

        private function ClientRegisterData($fname, $lname, $email, $username, $phone, $address, $password){
            // Data Routes freelancers API
            $data = array(
                "first_name"    => $fname,
                "last_name"     => $lname,
                "email"         => $email,
                "phone"         => $phone,
                "country"       => $address
            );

            // Process of Add Data Freelancer Routes
            $encodeData = json_encode($data);
            $curlInit   = curl_init(API_ROUTE_USER);
            curl_setopt($curlInit, CURLOPT_POST, true);
            curl_setopt($curlInit, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInit, CURLOPT_POSTFIELDS, $encodeData);
            curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
            $execData   = curl_exec($curlInit);
            
            // Create Directory by Email
            $Umask = umask(0);
            mkdir("../../Public/upload/client/" . $email, 0755, true);
            umask($Umask);

            // Copy index.html
            copy("../../Public/index.html", "../../Public/upload/Client/". $email ."/index.html");

            curl_close($curlInit);
            unset($data);

            return header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "verify");
        }

        // Register Freelancers
        public function Register($fname, $lname, $email, $username, $phone, $address, $password){
            
            // Data Routes Users API
            $user = array(
                "username"  =>  $username,
                "email"     =>  $email,
                "password"  =>  $password,
                "role"      =>  "freelancer"
            );
            
            // Process of Add User Routes
            $encodeData = json_encode($user);
            $curlInit   = curl_init(API_ROUTE_SIGNUP);
            curl_setopt($curlInit, CURLOPT_POST, true);
            curl_setopt($curlInit, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curlInit, CURLOPT_POSTFIELDS, $encodeData);
            curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
            $execData   = curl_exec($curlInit);
            
            curl_close($curlInit);
            unset($user);

            return $this->ClientSigninRegister($fname, $lname, $email, $username, $phone, $address, $password);
        }

        
    }

    class AdminAPI{
        private $ConnAPIUser, $ConnAPIAdmin;

        public function __construct(){
            CallFileApp::RequireOnce('Config/Api.php');
            $this->ConnAPIUser = json_decode(file_get_contents(API_ROUTE_USER), true);
            $this->ConnAPIAdmin = json_decode(file_get_contents(API_ROUTE_ADMIN), true);
            return true;
        }

        public function Login($email, $password){
            
        }

        // List of Function for dashboard page
        // Function for count freelancers
        public function CountUser(){return count($this->ConnAPIUser['data']);}
        // Function for count admin
        public function CountAdmin(){return count($this->ConnAPIAdmin['data']);}

    }