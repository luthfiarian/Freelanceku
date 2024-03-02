<?php
    /**
     * Dashboard Controller
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
        // Fetch Income
        $ResultIncome   = $Site->FetchAllIncomeDB(NULL);
        // Fetch Tax
        $Tax = (object) $Site->Tax();

        // Count Income
        $NetIncome = 0; while($amount = mysqli_fetch_assoc($ResultIncome)){ $NetIncome += $amount["income_amount"]; }

        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API
        $Data3 = (object) array(
            "user"      => mysqli_num_rows($AdminDB->FetchAllDataUserDB("data_user='User'")),
            "admin"     => mysqli_num_rows($AdminDB->FetchAllDataUserDB("data_user='Admin'")),
            "visitor"   => $DataVisitor->visitor,
            "income"    => (int) $NetIncome,
            "tax_pay"       => $Tax->tax_pay,
            "tax_midtrans"  => $Tax->tax_midtrans
        );
        $Data4 = $AdminDB->FetchAllDataUserDB("data_user='User' ORDER BY id DESC LIMIT 10");
        $Data5 = $AdminDB->FetchAllDataUserDB("data_user='Admin' ORDER BY id DESC LIMIT 10");
        $Data6 = $AdminDB->FetchNewTransactionDB();

        // Client Detail
        if(isset($_POST["client-detail"])){
            $DataDetail = (object) $AdminDB->FetchUserDataDB($_POST["email"]);
            $Data7      = (object) array(
                "userdb"    => $DataDetail,
                "userapi"   => $AdminAPI->FindUserAPI($Data1->data_apikey, $DataDetail->data_username),
                "portofolio"=> (object) $AdminDB->FetchAllDataPortoDB("porto_user='{$_POST["email"]}'"),
                "work"      => (object) $AdminDB->FetchAllDataWorkDB("work_host='{$_POST["email"]}'"),
                "partner"   => (object) $AdminDB->FetchAllDataPartnerDB("partner_email='{$_POST["email"]}'"),
                "transfer"  => (object) $AdminDB->FetchAllDataTransferDB("trf_fromemail='{$_POST["email"]}'"),
                "income"    => (object) $AdminDB->FetchAllDataTransactionDB("trx_toemail='{$_POST["email"]}'")
            );
            CallFileApp::RequireOnceData7("Views/Admin/Dashboard.php", $Data1, $Data2, $Data3, $Data4, $Data5, $Data6, $Data7); 
            exit();
        }
        else{
            CallFileApp::RequireOnceData6("Views/Admin/Dashboard.php", $Data1, $Data2, $Data3, $Data4, $Data5, $Data6);  
        }

    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }