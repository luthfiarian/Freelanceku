<?php 
    /* 
    *   @Params $Host          : Host / Domain
    *   @Params $Uri           : Sebagai Basis Foldernya 
    *   @Params $Port          : Port yang digunakan
    *   @Params $CurrentURL    : Mendeteksi Secara Lengkap URL
    */
    $Host = "localhost";
    $Uri  = "/freelanceku/";
    $Status = 1; // 1 = Development - 0 = Production
    $CurentUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $Protocol = (empty($_SERVER['HTTPS']) ? 'http' : 'https');

    /* 
    *   Mendefinisikan BASE_URL, BASE_URI
    *   Sebagai basis url, folder website
    */
    define('BASE_HOST', $Host);
    define('BASE_URI', $Uri);
    define('BASE_URL', $Host.$Uri);
    define('CURRENT_URL', $CurentUrl);
    define('PROTOCOL_URL', $Protocol);
    define('STATUS_APP', $Status);