<?php
    /**
     * User Finance - Income Controller
     */
    if((isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-808080-")) && (($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/income/") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/income"))){
        // Current Email Log in
        $currentEmail = ltrim($_SESSION["fk-session"], "fk-808080-");
        // Require File From Models
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        
        // Call Class
        $Site       = new Site;     // Class Site       Database.php
        $AdminDB    = new AdminDB;  // Class AdminDB    Database.php
        $AdminAPI   = new AdminAPI; // Class AdminAPI   Api.php
        
        $Tax = (object) $Site->Tax(); 
        $ResultIncome   = $Site->FetchAllIncomeDB(NULL);
        $ResultPayout   = $AdminDB->FetchAllPayoutBillDB();
        $ResultAmountUser= $AdminDB->FetchAllAmountUserDB();

        // Count Net Income
        $NetIncome = 0; while($amount = mysqli_fetch_assoc($ResultIncome)){ $NetIncome += $amount["income_amount"]; }
        // Count Payout User
        $Payout = 0; while($payout_amount = mysqli_fetch_assoc($ResultPayout)){ $Payout += $payout_amount["bill_amount"]; }
        // Count Amount User
        $AmountUser = 0; while($amountuser_amount = mysqli_fetch_assoc($ResultAmountUser)){ $AmountUser += $amountuser_amount["data_balance"]; }

        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API
        $Data3 = (object) array(
            "net_income"        => (int) $NetIncome,
            "midtrans"          => mysqli_num_rows($ResultIncome) * $Tax->tax_midtrans,
            "amount_user"       => $AmountUser,
            "payout_user"       => $Payout,
            "income"            => $ResultIncome,
            "tax"               => $Tax,
            "bank"              => $Site->Bank()
        );
        // Client Detail
        if(isset($_POST["client-detail"])){
            $Data4 = $Site->FetchAllIncomeDB(NULL);

            $DataDetail = (object) $AdminDB->FetchUserDataDB($_POST["email"]);
            $Data5      = (object) array(
                "userdb"    => $DataDetail,
                "userapi"   => $AdminAPI->FindUserAPI($Data1->data_apikey, $DataDetail->data_username),
                "portofolio"=> (object) $AdminDB->FetchAllDataPortoDB("porto_user='{$_POST["email"]}'"),
                "work"      => (object) $AdminDB->FetchAllDataWorkDB("work_host='{$_POST["email"]}'"),
                "partner"   => (object) $AdminDB->FetchAllDataPartnerDB("partner_email='{$_POST["email"]}'"),
                "transfer"  => (object) $AdminDB->FetchAllDataTransferDB("trf_fromemail='{$_POST["email"]}'"),
                "income"    => (object) $AdminDB->FetchAllDataTransactionDB("trx_toemail='{$_POST["email"]}'")
            );
            CallFileApp::RequireOnceData5("Views/Admin/FinanceIncome.php", $Data1, $Data2, $Data3, $Data4, $Data5); 
            exit();
        }
        // Search Income
        else if(isset($_POST["search-income"])){
            $Search = $_POST["search"];
            $Data4 = $Site->FetchAllIncomeDB("income_trxid LIKE '%$Search%' OR income_fromemail LIKE '%$Search%' OR income_amount LIKE '%$Search%'");
            CallFileApp::RequireOnceData4("Views/Admin/FinanceIncome.php", $Data1, $Data2, $Data3, $Data4);
            exit();
        }
        // Update and Add Bank
        else if(isset($_POST["tax-config"])){
            if(!empty($_POST["id_method"]) || !empty($_POST["method"])){
                if(!empty($_POST["id_method"]) && !empty($_POST["method"])){
                    $TaxPay         = $_POST["tax_pay"];        $Method     = $_POST["method"];
                    $TaxMidtrans    = $_POST["tax_midtrans"];   $IdMethod   = $_POST["id_method"];
                    $Action = (object) array(
                        "status"    => "add",
                        "query"     => "'$Method', '$IdMethod'"
                    );
                    $Site->UpdateTax($TaxPay, $TaxMidtrans);
                    $Site->ActionBank($Action); 
                    $_SESSION["STATUS_FINANCE"] = "Berhasil memperbarui pajak dan menambah bank 👍";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/income");
                    exit();
                }else{
                    $_SESSION["STATUS_ERR_FINANCE"] = "Jika anda menambahkan bank maka Nama dan Kodenya harus terisi 😯";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/income");
                    exit();
                }
            }else{
                $TaxPay = $_POST["tax_pay"];
                $TaxMidtrans = $_POST["tax_midtrans"];
                $Site->UpdateTax($TaxPay, $TaxMidtrans);
                $_SESSION["STATUS_FINANCE"] = "Berhasil memperbarui pajak 👍";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/income");
                exit();
            }
        }
        // Delete Bank
        else if(isset($_POST["delete-bank"])){
            $Action = (object) array(
                "status"    => "delete",
                "query"     => "WHERE id='{$_POST["id"]}'"
            );
            $Site->ActionBank($Action);
            $_SESSION["STATUS_FINANCE"] = "Berhasil menghapus bank {$_POST["bank_name"]}";
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/income");
            exit();
        }
        // Default
        else{
            $Data4 = $Site->FetchAllIncomeDB(NULL);
            CallFileApp::RequireOnceData4("Views/Admin/FinanceIncome.php", $Data1, $Data2, $Data3, $Data4);
            exit();
        }

    }
    /**
     * User Finance - Bill Controller
     */
    else if((isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-808080-")) && (($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/bill/") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/bill"))){
        // Current Email Log in
        $currentEmail = ltrim($_SESSION["fk-session"], "fk-808080-");
        // Require File From Models
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        CallFileApp::RequireOnce("Models/Midtrans.php");
        
        // Call Class
        $Site       = new Site;     // Class Site       Database.php
        $AdminDB    = new AdminDB;  // Class AdminDB    Database.php
        $AdminAPI   = new AdminAPI; // Class AdminAPI   Api.php

        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API
        $Data3 = (object) array(
            "bill_confirm"  => isset($_POST["bill-confirm"]) ?  $AdminDB->FetchAllDataBillDB("WHERE bill_status='Proses' AND (bill_trxid LIKE '%{$_POST["bill-search"]}%' OR bill_email LIKE '%{$_POST["bill-search"]}%' OR bill_amount LIKE '%{$_POST["bill-search"]}%')") : $AdminDB->FetchAllDataBillDB("WHERE bill_status='Proses'"),
            "bill_finish"  => isset($_POST["bill-finish"]) ?  $AdminDB->FetchAllDataBillDB("WHERE bill_status='Berhasil' AND (bill_trxid LIKE '%{$_POST["bill-search"]}%' OR bill_email LIKE '%{$_POST["bill-search"]}%' OR bill_amount LIKE '%{$_POST["bill-search"]}%' OR bill_admin LIKE '%{$_POST["bill-search"]}%')") : $AdminDB->FetchAllDataBillDB("WHERE bill_status='Berhasil'"),
        );

        // Client Detail
        if(isset($_POST["client-detail"])){
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
            CallFileApp::RequireOnceData4("Views/Admin/FinanceBill.php", $Data1, $Data2, $Data3, $Data4); 
            exit();
        }
        // Select Bill
        else if(isset($_POST["paynow"])){
            $Data4 = $AdminDB->FetchAllDataBillDB("WHERE bill_trxid='{$_POST["bill_trxid"]}' AND bill_status='Proses'");
            if(mysqli_num_rows($Data4) == 1){
                $User = (object) $AdminDB->FetchUserDataDB($_POST["bill_email"]); 
                $Data4 = (object) array(
                    "bill"      => (object) mysqli_fetch_assoc($Data4),
                    "userdb"    => $User,
                    "bank"      => (object) $Site->SearchBank($User->data_paymentcode)
                );
                CallFileApp::RequireOnceData4("Views/Admin/FinanceBill.php", $Data1, $Data2, $Data3, $Data4);
                exit();
            }else{
                $_SESSION["STATUS_ERR_FINANCE"] = "Tidak ada data yang ditemukan 😯";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                exit();
            }
        }
        // Upload File Pay
        else if(isset($_POST["upload"])){
            $User = (object) $AdminDB->FetchUserDataDB($_POST["email"]); 
            $Bill = (object) mysqli_fetch_assoc($AdminDB->FetchAllDataBillDB("WHERE bill_trxid='{$_POST["bill_trxid"]}' AND bill_status='Proses'"));
            if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
                $size = $_FILES['file']['size'];
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if ($extension != "pdf") {
                    $_SESSION["STATUS_ERR_FINANCE"] = "Format file yang diupload harus pdf!";
                    header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                    exit();
                }else{
                    if ($size > (2 * (1024 * 1024))) {
                        $_SESSION["STATUS_ERR_FINANCE"] = "Ukuran file yang diupload melebihi batas (2Mb)!";
                        header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                        exit();
                    }else{
                        $file = uniqid() . "." . $extension;
                        $file_tmp = $_FILES['file']['tmp_name'];
                        $DirFile = "Public/upload/client/$User->data_email/bill/" . $file;
                        if(move_uploaded_file($file_tmp, $DirFile)){
                            // Add Transaction to API
                            $AdminAPI->AddBillTransactionAPI($_POST["bill_trxid"], $currentEmail, $User->data_email, $Bill->bill_amount, $Data1->data_apikey);
                            // Update Transaction DB
                            $AdminDB->UpdateUserBillStatusDB($_POST["bill_trxid"], "Berhasil", $DirFile, $currentEmail);
                            $_SESSION["STATUS_FINANCE"] = "Berhasil berkas bukti pembayaran {$User->data_email}";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                            exit();
                        }else{
                            $_SESSION["STATUS_ERR_FINANCE"] = "Terjadi galat saat upload file 😥";
                            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                            exit();
                        }
                    }
                }
            }else{
                $_SESSION["STATUS_ERR_FINANCE"] = "Format file yang diupload harus pdf!";
                header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/finance/bill");
                exit();
            }
        }
        // Default
        else{
            CallFileApp::RequireOnceData3("Views/Admin/FinanceBill.php", $Data1, $Data2, $Data3);
            exit();
        }

    }
    /**
     * User Finance Controller
     */
    else if((isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-808080-")) && (($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/"))){
        // Current Email Log in
        $currentEmail = ltrim($_SESSION["fk-session"], "fk-808080-");
        // Require File From Models
        CallFileApp::RequireOnce("Models/Database.php");
        CallFileApp::RequireOnce("Models/Api.php");
        
        // Call Class
        $Site       = new Site;     // Class Site       Database.php
        $AdminDB    = new AdminDB;  // Class AdminDB    Database.php
        $AdminAPI   = new AdminAPI; // Class AdminAPI   Api.php
        
        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API

        // Client Detail
        if(isset($_POST["client-detail"])){
            $Data3 = $AdminDB->FetchAllDataTransferDB(NULL);
            $Data4 = $AdminDB->FetchAllDataTransactionDB(NULL);

            $DataDetail = (object) $AdminDB->FetchUserDataDB($_POST["email"]);
            $Data5      = (object) array(
                "userdb"    => $DataDetail,
                "userapi"   => $AdminAPI->FindUserAPI($Data1->data_apikey, $DataDetail->data_username),
                "portofolio"=> (object) $AdminDB->FetchAllDataPortoDB("porto_user='{$_POST["email"]}'"),
                "work"      => (object) $AdminDB->FetchAllDataWorkDB("work_host='{$_POST["email"]}'"),
                "partner"   => (object) $AdminDB->FetchAllDataPartnerDB("partner_email='{$_POST["email"]}'"),
                "transfer"  => (object) $AdminDB->FetchAllDataTransferDB("trf_fromemail='{$_POST["email"]}'"),
                "income"    => (object) $AdminDB->FetchAllDataTransactionDB("trx_toemail='{$_POST["email"]}'")
            );
            CallFileApp::RequireOnceData5("Views/Admin/Finance.php", $Data1, $Data2, $Data3, $Data4, $Data5); 
            exit();
        }
        // Search Transfer
        else if(isset($_POST["search-transfer"])){
            $Search = str_contains($_POST["search"], "work-") ? ltrim($_POST["search"], "work-") : $_POST["search"];
            $Data3 = $AdminDB->FetchAllDataTransferDB("trf_id LIKE '%$Search%' OR trf_workid LIKE '%$Search%' OR trf_fromemail LIKE '%$Search%' OR trf_toemail LIKE '%$Search%' OR trf_status LIKE '%$Search%' OR trf_amount LIKE '%$Search%' OR trf_type LIKE '%$Search%'");
            $Data4 = $AdminDB->FetchAllDataTransactionDB(NULL);
            CallFileApp::RequireOnceData4("Views/Admin/Finance.php", $Data1, $Data2, $Data3, $Data4);
            exit();
        }
        // Search Transaction
        else if(isset($_POST["search-transaction"])){
            $Search = str_contains($_POST["search"], "work-") ? ltrim($_POST["search"], "work-") : $_POST["search"];
            $Data3 = $AdminDB->FetchAllDataTransferDB(NULL);
            $Data4 = $AdminDB->FetchAllDataTransactionDB("trx_id LIKE '%$Search%' OR trx_workid LIKE '%$Search%' OR trx_fromemail LIKE '%$Search%' OR trx_toemail LIKE '%$Search%' OR trx_amount LIKE '%$Search%'");

            CallFileApp::RequireOnceData4("Views/Admin/Finance.php", $Data1, $Data2, $Data3, $Data4);
            exit();
        }
        // Default
        else{
            $Data3 = $AdminDB->FetchAllDataTransferDB(NULL);
            $Data4 = $AdminDB->FetchAllDataTransactionDB(NULL);

            CallFileApp::RequireOnceData4("Views/Admin/Finance.php", $Data1, $Data2, $Data3, $Data4);
            exit();
        }

    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }