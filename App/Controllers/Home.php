<?php
    CallFileApp::RequireOnce('Models/Database.php');
    $Site = new Site; $Work = new MasterDB;
    $Data1 = (object) $Site->Seo(); 
    $Data2 = $Site->Interest();
    $Data3 = (object) $Site->Identity();

    // Count Visitor
    function getIP(){
        $ipaddress='';
        foreach(array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR')as $key){
            if(isset($_SERVER[$key])){
                $ipaddress=$_SERVER[$key];
                break;
            }
        }
        return 
        $ipaddress?:'UNKNOWN';}
    $json_data  = (object) json_decode(file_get_contents("Public/dist/json/visitor.json"), true);
    $visitor    = $json_data->visitor; 
    $ipaddresses= $json_data->ipaddress; 
    $currentIP  = getIP();
    
    if(!in_array($currentIP, array_column($ipaddresses, 'ip'))){
        $ipaddresses[] = ['ip' => $currentIP]; 
        $visitor++; 
        file_put_contents("Public/dist/json/visitor.json", json_encode(['visitor' => $visitor, 'ipaddress' => $ipaddresses], JSON_PRETTY_PRINT));
    }
    // End of Count Visitor

    if(isset($_GET["category"])){
        // Look for work if you have logged in
        if(isset($_GET["category"]) && isset($_SESSION["fk-session"]) && isset($_COOKIE["API-COOKIE"]) && str_contains($_SESSION["fk-session"], "fk-FFFFFF-")){
            $_SESSION["SEARCH"] = $_GET["category"];
            header("Location: " . PROTOCOL_URL . "://" . BASE_URL . "dashboard");
            exit();
        }else{
            $Data4 = $Work->GlobalSearchWorkDB($_GET["category"]);
            CallFileApp::RequireOnceData4('Views/Home.php', $Data1, $Data2, $Data3, $Data4);
        }
    }else{
        CallFileApp::RequireOnceData3('Views/Home.php', $Data1, $Data2, $Data3);
    }
    
