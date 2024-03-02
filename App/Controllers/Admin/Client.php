<?php
    /**
     * Client Controller
     */
    if(isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-808080-")){
        // Current Email Log in
        $currentEmail = ltrim($_SESSION["fk-session"], "fk-808080-");
        // Require File From Models
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        
        // Call Class
        $Site       = new Site;     // Class Site       Database.php
        $AdminDB    = new AdminDB;  // Class AdminDB    Database.php
        $AdminAPI   = new AdminAPI; // Class AdminAPI   Api.php

        // Fetch Data Visitor
        $DataVisitor  = (object) json_decode(file_get_contents("Public/dist/json/visitor.json"), true);
        
        // Count Income
        $Income = 0; $Tax = (object) $Site->Tax(); $ResultIncome = $AdminDB->FetchAllDataTransferDB("trf_status='Berhasil'");
        while($amount = mysqli_fetch_assoc($ResultIncome)){ $Income += ($amount["trf_amount"] - $Tax->tax_midtrans) / (1 + ($Tax->tax_pay / 100)) * ($Tax->tax_pay / 100); }
        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API

        // Client Detail
        if(isset($_POST["client-detail"])){
            $Data3 = (object) array(
                "user"      =>  $AdminDB->FetchAllDataUserDB("data_user='User' ORDER BY id DESC"),
                "work"      =>  $AdminDB->FetchAllDataWorkDB(NULL),
                "partner"   =>  $AdminDB->FetchAllDataPartnerDB(NULL)
            );
            $DataDetail = (object) $AdminDB->FetchUserDataDB($_POST["email"]);
            $Data4      = (object) array(
                "userdb"    => $DataDetail,
                "userapi"   => $AdminAPI->FindUserAPI($Data1->data_apikey, $DataDetail->data_username),
                "portofolio"=> (object) $AdminDB->FetchAllDataPortoDB("porto_user='{$_POST["email"]}'"),
                "work"      => (object) $AdminDB->FetchAllDataWorkDB("work_host='{$_POST["email"]}'"),
                "partner"   => (object) $AdminDB->FetchAllDataPartnerDB("partner_email='{$_POST["email"]}'"),
                "transfer"  => (object) $AdminDB->FetchAllDataTransferDB("trf_fromemail='{$_POST["email"]}'"),
                "income"    => (object) $AdminDB->FetchAllDataTransactionDB("trx_toemail='{$_POST["email"]}'")
            );
            CallFileApp::RequireOnceData4("Views/Admin/Client.php", $Data1, $Data2, $Data3, $Data4);
        }

        // Search Client
        if(isset($_POST["search-client"])){
            $Search = $_POST["search"];
            $Data3 = (object) array(
                "user"      =>  $AdminDB->FetchAllDataUserDB("data_user='User' AND (data_email LIKE '%$Search%' OR  data_username LIKE '%$Search%') ORDER BY id DESC"),
                "work"      =>  $AdminDB->FetchAllDataWorkDB(NULL),
                "partner"   =>  $AdminDB->FetchAllDataPartnerDB(NULL)
            );
            CallFileApp::RequireOnceData3("Views/Admin/Client.php", $Data1, $Data2, $Data3);
        }
        // Search Work
        else if(isset($_POST["search-work"])){
            $Search = str_contains($_POST["search"], "work-") ? ltrim($_POST["search"], "work-") : $_POST["search"];
            $Data3 = (object) array(
                "user"      =>  $AdminDB->FetchAllDataUserDB("data_user='User'"),
                "work"      =>  $AdminDB->FetchAllDataWorkDB("id LIKE '%$Search%' OR work_name LIKE '%$Search%' OR work_host LIKE '%$Search%' OR work_field LIKE '%$Search%' OR work_salary LIKE '%$Search%'"),
                "partner"   =>  $AdminDB->FetchAllDataPartnerDB(NULL)
            );
            CallFileApp::RequireOnceData3("Views/Admin/Client.php", $Data1, $Data2, $Data3);
        }
        // Search Partner
        else if(isset($_POST["search-partner"])){
            $Search = str_contains($_POST["search"], "work-") ? ltrim($_POST["search"], "work-") : $_POST["search"];
            $Data3 = (object) array(
                "user"      =>  $AdminDB->FetchAllDataUserDB("data_user='User'"),
                "work"      =>  $AdminDB->FetchAllDataWorkDB(NULL),
                "partner"   =>  $AdminDB->FetchAllDataPartnerDB("partner_email LIKE '%$Search%' OR partner_username LIKE '%$Search%' OR partner_workid LIKE '%$Search%'")
            );
            CallFileApp::RequireOnceData3("Views/Admin/Client.php", $Data1, $Data2, $Data3);
        }
        // Default
        else{
            $Data3 = (object) array(
                "user"      =>  $AdminDB->FetchAllDataUserDB("data_user='User' ORDER BY id DESC"),
                "work"      =>  $AdminDB->FetchAllDataWorkDB(NULL),
                "partner"   =>  $AdminDB->FetchAllDataPartnerDB(NULL)
            );
            CallFileApp::RequireOnceData3("Views/Admin/Client.php", $Data1, $Data2, $Data3);
        }


    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }