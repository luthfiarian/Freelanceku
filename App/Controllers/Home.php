<?php
    CallFileApp::RequireOnce('Models/Database.php');
    $Site = new Site; $Work = new MasterDB;
    $Data1 = $Site->Seo(); 
    $Data2 = $Site->Interest();

    if(isset($_GET["category"])){
        // Look for work if you have logged in
        if(isset($_GET["category"]) && isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"])){
            $_SESSION["SEARCH"] = $_GET["category"];
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
            exit();
        }else{
            $Data3 = $Work->GlobalSearchWorkDB($_GET["category"]);
            CallFileApp::RequireOnceData3('Views/Home.php', $Data1, $Data2, $Data3);
        }
    }else{
        CallFileApp::RequireOnceData2('Views/Home.php', $Data1, $Data2);
    }
    
