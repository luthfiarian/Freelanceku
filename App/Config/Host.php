<?php 
    /**
     * Config Host 
     */

    $Host   = "localhost";         // Input Only Host Domain / Host Subdomain (example www.google.com / sub.google.com) Without Protocol(http/https) and Slash or Back-Slash
    $Uri    = "/freelanceku/";    // Uri input must be with a slash, start of uri and end of uri (example /freelanceku/)
    $Root   = "/freelanceku/";    // Base of folder root youre save this project
    $Status = 0;                // 0 = Development / 1 = Production
    $Protocol = ((isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'http');
    $CurentUrl = $Protocol . "://" . $Host . $Uri;

    date_default_timezone_set('Asia/Jakarta');

    /* 
    *   Constant variable  BASE_URL, BASE_URI
    *   For routes index page
    */
    define('BASE_HOST', $Host);
    define('BASE_URI', $Uri);
    define('BASE_URL', $Host.$Uri);
    define('BASE_ROOT', $Root);
    define('CURRENT_URL', $CurentUrl);
    define('PROTOCOL_URL', $Protocol);
    define('STATUS_APP', $Status);

    // Admin
    require_once 'Admin.php';
    // Midtrans
    CallFile::RequireOnce(dirname(__FILE__) . "\Midtrans.php");