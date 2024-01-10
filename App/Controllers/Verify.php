<?php
    if(isset($_SESSION['verify'])){
        CallFileApp::RequireOnce('Views/Verify.php');
    }else{
        CallFileApp::RequireOnce('Views/Error/NonGranted.php');
    }