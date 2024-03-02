<?php 
    /**
     * Config Host 
     */

    $Host = "localhost";         // Input Only Host Domain / Host Subdomain (example www.google.com / sub.google.com) Without Protocol(http/https) and Slash or Back-Slash
    $Uri  = "/freelanceku/";    // Uri input must be with a slash, start of uri and end of uri (example /freelanceku/)
    $Status = 0;                // 0 = Development / 1 = Production
    $CurentUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $Protocol = (empty($_SERVER['HTTPS']) ? 'http' : 'https');

    date_default_timezone_set('Asia/Jakarta');

    /* 
    *   Constant variable  BASE_URL, BASE_URI
    *   For routes index page
    */
    define('BASE_HOST', $Host);
    define('BASE_URI', $Uri);
    define('BASE_URL', $Host.$Uri);
    define('CURRENT_URL', $CurentUrl);
    define('PROTOCOL_URL', $Protocol);
    define('STATUS_APP', $Status);

    // Admin
    require_once 'Admin.php';
    // Midtrans
    CallFile::RequireOnce(dirname(__FILE__) . "\Midtrans.php");