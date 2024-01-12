<?php
    if(isset($_SESSION['register'])){
        CallFileApp::RequireOnce('Views/RegisterSuccess.php');
    }else{
        CallFileApp::RequireOnce('Views/Error/NonGranted.php');
    }