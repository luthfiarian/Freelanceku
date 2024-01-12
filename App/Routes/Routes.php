<?php
    /* 
    *   Memanggil Memanggil File Host
    *   @Dir    'Config'
    *   @Params 'Host.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFileApp::RequireOnce('Config/Host.php');
    ini_set('display_errors', STATUS_APP);
    /* 
    *   Memanggil Memanggil File Session.php
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFile::ReqireOnce('Libs/Session.php');
    Session::Start();
    /* 
    *   Menonaktifkan Session Verify
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    if(isset($_SESSION["register"])){ $_SESSION["register"]++; if(($_SESSION["register"] === 3) || ($_SESSION["register"]) >= 3){ session_unset(); } }

    /* 
    *   Operator Ternary
    *   @Params  $GetCategory : User melakukan pencarian kategori freelance
    *   @Params  $IndexAdmin : Indexing Admin Page
    *   @Params  $IndexAdminDashboard : Indexing Admin Dashboard Page
    */
    $GetCategory = isset($_GET['category']) ? BASE_URI."?category={$_GET['category']}" : BASE_URI;

    $IndexRegisterSuccess = ($_SERVER["REQUEST_URI"] === BASE_URI."register-success/") ? BASE_URI."register-success/" : BASE_URI."register-success"; 

    $IndexAdmin  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/") ? BASE_URI."admin/" : BASE_URI."admin"; 
    $IndexAdminDashboard  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/dashboard/") ? BASE_URI."admin/dashboard/" : BASE_URI."admin/dashboard"; 
    $IndexAdminClient  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/client/") ? BASE_URI."admin/client/" : BASE_URI."admin/client"; 
    $IndexAdminUser  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/user/") ? BASE_URI."admin/user/" : BASE_URI."admin/user"; 
    $IndexAdminFinance  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/") ? BASE_URI."admin/finance/" : BASE_URI."admin/finance"; 
    $IndexAdminFinanceBalance  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/balance/") ? BASE_URI."admin/finance/balance/" : BASE_URI."admin/finance/balance"; 
    $IndexAdminFinanceHistory  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/history/") ? BASE_URI."admin/finance/history/" : BASE_URI."admin/finance/history"; 
    $IndexAdminFinanceIncome  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/income/") ? BASE_URI."admin/finance/income/" : BASE_URI."admin/finance/income"; 
    $IndexAdminSetting  = ($_SERVER["REQUEST_URI"] === BASE_URI."admin/setting/") ? BASE_URI."admin/setting/" : BASE_URI."admin/setting"; 

    $IndexClientDashboard  = ($_SERVER["REQUEST_URI"] === BASE_URI."dashboard/") ? BASE_URI."dashboard/" : BASE_URI."dashboard"; 
    /* 
    *   Membuat Routing
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
        

    // Admin Page
    case $IndexAdmin: // Login to Admin Page
        CallFileApp::RequireOnce('Controllers/Admin/Admin.php');
        break;
    case $IndexAdminDashboard: // Dashboard Admin
        CallFileApp::RequireOnce('Controllers/Admin/Dashboard.php');
        break;
    case $IndexAdminClient: // List of Client
        CallFileApp::RequireOnce('Controllers/Admin/Client.php');
        break;
    case $IndexAdminUser: // List of Admin
        CallFileApp::RequireOnce('Controllers/Admin/User.php');
        break;
    case $IndexAdminFinance: // Confrim Top Up Client
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminFinanceBalance: // Add Balance Client
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminFinanceHistory: // History of Payment Client
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminFinanceIncome: // Income
        CallFileApp::RequireOnce('Controllers/Admin/Finance.php');
        break;
    case $IndexAdminSetting: // Setting of Website
        CallFileApp::RequireOnce('Controllers/Admin/Setting.php');
        break;
    

    // Client Page
    case $IndexClientDashboard:
        CallFileApp::RequireOnce('Controllers/Client/Dashboard.php');
        break;

    // Error Page
    default:
        header('HTTP/1.0 404 Not Found');
        CallFileApp::RequireOnce('Controllers/Error.php');
        break;
}