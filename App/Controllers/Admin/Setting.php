<?php
    // if(isset($_SESSION["AF77DC4-DBM4WV-DWDASC-FSACDASD"]) == "admin"){
        if(isset($_POST['site'])){
            $Data = array(
                'seo_lang' => $_POST['seo_lang'], 'seo_amp' => $_POST['seo_amp'], 'seo_name' => $_POST['seo_name'], 'seo_type' => $_POST['seo_type'],
                'seo_locale' => $_POST['seo_locale'], 'seo_des' =>  $_POST['seo_des']
            );
            CallFileApp::RequireOnce('Models/Database.php');
            $TempSite = new Site; $TempData = $TempSite->ChangeSEO($Data);
        }else if(isset($_POST['addbank'])){
            CallFileApp::RequireOnce('Models/Database.php');
            $Alert = "<script>alert('Gambar anda tidak memenuhi syarat!')</script>";
            $ImageExtension = pathinfo($_FILES['bank_image']['name'], PATHINFO_EXTENSION);
            $ImageSize      = $_FILES['bank_image']['size'];
            if($ImageExtension != 'png'){ echo $Alert; return header("Location: ". PROTOCOL_URL . "://" .BASE_URL . "admin/setting/"); } else if($ImageSize >= 200000) { echo $Alert; return header("Location: ". PROTOCOL_URL . "://" .BASE_URL . "admin/setting/"); }
            $ImageFullFile = strtolower($_POST['bank_username']) . "." . $ImageExtension;
            $Data = array('bank_name' => $_POST['bank_name'], 'bank_username' => strtolower($_POST['bank_username']), 'bank_account' => $_POST['bank_account']);
            
            $TempSite = new Bank; $TempSite->AddBank($Data, $_FILES['bank_image']['tmp_name'], $ImageFullFile);
        }else if(isset($_POST['deletebank'])){
            $id = $_POST['id'];
            CallFileApp::RequireOnce('Models/Database.php');

            $TempSite = new Bank; $TempSite->DeleteBank($id);
        }else{
            CallFileApp::RequireOnce('Models/Database.php');
            $Site = new Site; $SiteBank = new Bank; $SEO = $Site->SEO(); $BANK = $SiteBank->BANKROWS() > 0 ? $SiteBank->BANK() : false;
            CallFileApp::RequireOnceData2('Views/Admin/Setting.php', $SEO, $BANK);
            unset($Site, $SEO, $BANK);
        }
    // }else{
    //     header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "admin");
    // }