<?php
    /* 
    * File Konfigurasi API
    */

    // API BASE URL -> contoh : https://google.com/
    $Api    = "https://freelance-api-production.up.railway.app/v1/";

    // API Routes
    $Signup     = "auth/register/";
    $Signin     = "auth/login/";
    $Signout    = "auth/logout/";
    $AllUsers   = "users?size=MAX_DATA_IN_PAGE&page=CURRENT_PAGE&sortBy=username&sortOrder=asc";
    $TrxLog     = "transaction/";
    $TrxNew     = "transaction/new";
    // API Routes User (Special) - GET, PATCH (UPDATE), DELETE
    $SPECIAL_FUN_USER = "user/"; // add behind it based on the username

    define("API_USER_SIGNUP", $Api.$Signup);
    define("API_USER_SIGNIN", $Api.$Signin);
    define("API_USER_SIGNOUT", $Api.$Signout);
    define("API_ALLUSER_DATA", $Api.$AllUsers);
    define("API_USER_TRXLOG", $Api.$TrxLog);
    define("API_USER_TRXNEW", $Api.$TrxNew);
    define("API_USER_SPECIAL", $Api.$SPECIAL_FUN_USER);


