<?php
    /* 
    *   Mengecek login admin
    */
    
    if(isset($_SESSION["AF77DC4-DBM4WV-DWDASC-FSACDASD"]) == "admin"){
        header("Location: " . PROTOCOL_URL . "://" .BASE_URL . "admin/dashboard");
    }else{
        CallFileApp::RequireOnce('Views/Admin/Login.php');
    }