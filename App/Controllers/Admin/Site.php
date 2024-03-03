<?php
    /**
     * Site Admin Controller
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

        $Data1 = (object) $AdminDB->FetchUserDataDB($currentEmail);   // Fetch Data from DB
        $Data2 = $AdminAPI->FetchUserDataAPI($Data1->data_username, $Data1->data_apikey); // Fetch Data from API
        $Data3 = (object) array(
            "seo"           => (object) $Site->SEO(),
            "identity"      => (object) $Site->Identity(),
            "interest"      => (object) $Site->Interest(),
            "visitor"       => $DataVisitor
        );
        // Update Seo Site
        if(isset($_POST["update-seo"])){
            $seo_name = $_POST["seo_name"]; $seo_type = $_POST["seo_type"]; $seo_locale = $_POST["seo_locale"];
            $seo_host = $_POST["seo_host"]; $seo_author = $_POST["seo_author"];
            $seo_keyword  = $_POST["seo_keyword"]; $seo_des = $_POST["seo_des"];

            $Site->UpdateSEO($seo_name, $seo_type, $seo_locale, $seo_host, $seo_author, $seo_keyword, $seo_des);
            $_SESSION["STATUS_SITE"] = "Berhasil mengubah seo situs web 👍"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit();
        }
        // Update Site
        else if(isset($_POST["update-site"])){
            $identity_phone = $_POST["identity_phone"]; $identity_email = $_POST["identity_email"];
            $identity_maps_link = $_POST["identity_maps_link"]; $identity_maps_embed = $_POST["identity_maps_embed"];
            $identity_address = $_POST["identity_address"];
            $identity_ig = !empty($_POST["identity_ig"]) ? $_POST["identity_ig"] : NULL; $identity_linkedin = !empty($_POST["identity_linkedin"]) ? $_POST["identity_linkedin"] : NULL;
            $identity_x = !empty($_POST["identity_x"]) ? $_POST["identity_x"] : NULL; $identity_fb = !empty($_POST["identity_fb"]) ? $_POST["identity_fb"] : NULL;

            $Site->UpdateIdentity($identity_phone, $identity_email, $identity_maps_link, $identity_maps_embed, $identity_address, $identity_ig, $identity_linkedin, $identity_x, $identity_fb);
            $_SESSION["STATUS_SITE"] = "Berhasil mengubah identitas situs web 👍"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit();
        }
        // Reset Visitor
        else if(isset($_POST["reset-visitor"])){
            if(unlink("Public/dist/json/visitor.json") && copy("Public/dist/json/visitor_backup.json", "Public/dist/json/visitor.json")){
                $_SESSION["STATUS_SITE"] = "Berhasil atur ulang pengunjung 👍"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit();
            }else { 
                $_SESSION["STATUS_ERR_SITE"] = "Tidak dapat mengatur ulang pengunjung ❌"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit(); 
            }
        }
        else if(isset($_POST["add-interest"])){
            $Action = (object) array(
                "status"    => "add",
                "query"     => "'{$_POST["interest_name"]}'"
            );
            $Site->ActionInterest($Action);
            $_SESSION["STATUS_SITE"] = "Berhasil menambahkan minat kerja 👍"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit();
        }
        // Delete Interest
        else if(isset($_POST["delete-interest"])){
            $Action = (object) array(
                "status"    => "delete",
                "query"     => "WHERE id='{$_POST["id"]}'"
            );
            $Site->ActionInterest($Action);
            $_SESSION["STATUS_SITE"] = "Berhasil menghapus data minat kerja 👍"; header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "admin/site"); exit();
        }
        // Default
        else{
            CallFileApp::RequireOnceData3("Views/Admin/Site.php", $Data1, $Data2, $Data3);
            exit();
        }
    }
    else{
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
        exit();
    }