<?php
    /**
    *   Close Session Register
    *   @param 'Libs/Session.php'
    *   @method  CallFileApp::RequireOnce
    */
    if(isset($_SESSION["register"])){ $_SESSION["register"]++; if(($_SESSION["register"] === 3) || ($_SESSION["register"]) >= 3){ session_unset(); } }

    /* 
    *   Operator Ternary
    *   For Indexing Page From URL
    */

    // Search Homepage Routing
    $SearchHomePage = isset($_GET['category']) ? BASE_URI."?category={$_GET['category']}" : BASE_URI;

    $GetSignupAdmin = isset($_GET["portal-admin"]) ? ($_GET["portal-admin"] === ADMIN_KEY ? $_SESSION["portal-admin"] = true : BASE_URI) : BASE_URI ; 

    // Webhook Midtrans / Notification for Transaction
    $WebhookTransactionMidtrans = ($_SERVER["REQUEST_URI"] === BASE_URI."transaction/") ? BASE_URI."transaction/" : BASE_URI."transaction";

    // Landing Routing After Signup
    $IndexRegisterSuccess = ($_SERVER["REQUEST_URI"] === BASE_URI."register-success/") ? BASE_URI."register-success/" : BASE_URI."register-success"; 
    // User Sign out
    $IndexUserSignout = ($_SERVER["REQUEST_URI"] === BASE_URI."signout/") ? BASE_URI."signout/" : BASE_URI."signout"; 
    // Routes for User
    $IndexClientDashboard  = ($_SERVER["REQUEST_URI"] === BASE_URI."dashboard/") ? BASE_URI."dashboard/" : BASE_URI."dashboard"; 
    $IndexClientWork = ($_SERVER["REQUEST_URI"] === BASE_URI."work/") ? BASE_URI."work/" : BASE_URI."work"; 
    $IndexClientWorkDetail = ($_SERVER["REQUEST_URI"] === BASE_URI."work/detail/") ? BASE_URI."work/detail/" : BASE_URI."work/detail"; 
    $IndexClientPartner = ($_SERVER["REQUEST_URI"] === BASE_URI."partner/") ? BASE_URI."partner/" : BASE_URI."partner"; 
    $IndexClientAccount = ($_SERVER["REQUEST_URI"] === BASE_URI."account/") ? BASE_URI."account/" : BASE_URI."account"; 
    // Routes for Administrator
    $IndexAdminDashboard = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/dashboard/") ? BASE_URI."admin/dashboard/" : BASE_URI."admin/dashboard";
    $IndexAdminClient = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/client/") ? BASE_URI."admin/client/" : BASE_URI."admin/client";
    $IndexAdminUser = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/user/") ? BASE_URI."admin/user/" : BASE_URI."admin/user";
    $IndexAdminSite = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/site/") ? BASE_URI."admin/site/" : BASE_URI."admin/site";
    $IndexAdminAccount = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/account/") ? BASE_URI."admin/account/" : BASE_URI."admin/account";
    $IndexAdminFinance = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/") ? BASE_URI."admin/finance/" : BASE_URI."admin/finance";
    $IndexAdminFinanceBill = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/bill/") ? BASE_URI."admin/finance/bill/" : BASE_URI."admin/finance/bill";
    $IndexAdminFinanceIncome = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/income/") ? BASE_URI."admin/finance/income/" : BASE_URI."admin/finance/income";
    

    /* 
    *   Routes
    */
switch ($_SERVER["REQUEST_URI"]) {
    // Home Page
    case BASE_URI:
        CallFileApp::RequireOnce('Controllers/Home.php');
        break;
    // Search Category
    case $SearchHomePage:
        CallFileApp::RequireOnce('Controllers/Home.php');
        break;
    // Portal Admin for Signup
    case $GetSignupAdmin:
        header("Location: " . PROTOCOL_URL . "://" . BASE_URL);
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
    case $IndexClientWorkDetail:
        CallFileApp::RequireOnce('Controllers/Client/Work.php');
        break;
    case $IndexClientPartner:
        CallFileApp::RequireOnce('Controllers/Client/Partner.php');
        break;
    case $IndexClientAccount:
        CallFileApp::RequireOnce('Controllers/Client/Account.php');
        break;

    // Admin Page
    case $IndexAdminDashboard:
        CallFileApp::RequireOnce('Controllers/Admin/Dashboard.php');
        break;
    case $IndexAdminClient:
        CallFileApp::RequireOnce('Controllers/Admin/Client.php');
        break;
    case $IndexAdminUser:
        CallFileApp::RequireOnce('Controllers/Admin/User.php');
        break;
    case $IndexAdminFinance:
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminFinanceBill:
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminFinanceIncome:
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminSite:
        CallFileApp::RequireOnce('Controllers/Admin/Site.php');
        break;
    case $IndexAdminAccount:
        CallFileApp::RequireOnce('Controllers/Admin/Account.php');
        break;

    // Transaction Confirmation
    case isset($_GET["order_id"]):
        CallFileApp::RequireOnce('Controllers/Transaction.php');
        break;
    case $WebhookTransactionMidtrans:
        CallFileApp::RequireOnce('Controllers/Transaction.php');
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