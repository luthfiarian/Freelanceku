<?php
    /* 
    *   Close Session Register
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    if(isset($_SESSION["register"])){ $_SESSION["register"]++; if(($_SESSION["register"] === 3) || ($_SESSION["register"]) >= 3){ session_unset(); } }

    /* 
    *   Operator Ternary
    *   For Indexing Page From URL
    */
    $GetCategory = isset($_GET['category']) ? BASE_URI."?category={$_GET['category']}" : BASE_URI;

    $IndexRegisterSuccess = ($_SERVER["REQUEST_URI"] === BASE_URI."register-success/") ? BASE_URI."register-success/" : BASE_URI."register-success"; 

    $IndexUserSignout = ($_SERVER["REQUEST_URI"] === BASE_URI."signout/") ? BASE_URI."signout/" : BASE_URI."signout"; 

    $IndexClientDashboard  = ($_SERVER["REQUEST_URI"] === BASE_URI."dashboard/") ? BASE_URI."dashboard/" : BASE_URI."dashboard"; 
    $IndexClientWork = ($_SERVER["REQUEST_URI"] === BASE_URI."work/") ? BASE_URI."work/" : BASE_URI."work"; 
    $IndexClientPartner = ($_SERVER["REQUEST_URI"] === BASE_URI."partner/") ? BASE_URI."partner/" : BASE_URI."partner"; 
    $IndexClientAccount = ($_SERVER["REQUEST_URI"] === BASE_URI."account/") ? BASE_URI."account/" : BASE_URI."account"; 
    
    /* 
    *   Routes
    */
switch ($_SERVER["REQUEST_URI"]) {
    // Home Page
    case BASE_URI:
        CallFileApp::RequireOnce('Controllers/Home.php');
        break;
    // Search Category
    case $GetCategory:
        CallFileApp::RequireOnce('Controllers/Home.php');
        break;


    // Register Success page
    case $IndexRegisterSuccess:
        CallFileApp::RequireOnce('Controllers/RegisterSuccess.php');
        break;
    
    

    // Client Page
    case $IndexClientDashboard:
        CallFileApp::RequireOnce('Controllers/Client/Dashboard.php');
        break;
    case $IndexClientWork:
        CallFileApp::RequireOnce('Controllers/Client/Work.php');
        break;
    case $IndexClientPartner:
        CallFileApp::RequireOnce('Controllers/Client/Partner.php');
        break;
    case $IndexClientAccount:
        CallFileApp::RequireOnce('Controllers/Client/Account.php');
        break;

    // User Signout Route
    case $IndexUserSignout:
        CallFileApp::RequireOnce('Controllers/Signout.php');
        break;


    // Error Page
    default:
        header('HTTP/1.0 404 Not Found');
        CallFileApp::RequireOnce('Controllers/Error.php');
        break;
}