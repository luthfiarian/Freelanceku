<?php
    /**
     * File Config API
     * @api https://github.com/rayzio-jax/freelance-api
     */

    // API BASE URL -> example : https://google.com/
    $Api    = "";
    // Admin Key from API
    $AdminKeyAPI = "";

    // API Routes
    $Signup     = "auth/register/";
    $Signin     = "auth/login/";
    $Signout    = "auth/logout/";
    $AllUsers   = "users?size=MAX_DATA_IN_PAGE&page=CURRENT_PAGE&sortBy=username&sortOrder=asc";
    $TrxLog     = "transaction/";
    $TrxUpd     = "transaction/status/";
    $TrxNew     = "transaction/new";
    $Find       = "user/find";

    // API Routes User (Special) - GET, PATCH (UPDATE), DELETE
    $SPECIAL_FUN_USER = "user/"; // add behind it based on the username

    define("API_ADMIN_KEY", $AdminKeyAPI);
    define("API_USER_SIGNUP", $Api.$Signup);
    define("API_USER_SIGNIN", $Api.$Signin);
    define("API_USER_SIGNOUT", $Api.$Signout);
    define("API_ALLUSER_DATA", $Api.$AllUsers);
    define("API_USER_TRXLOG", $Api.$TrxLog);
    define("API_UPDATE_TRX", $Api.$TrxUpd);
    define("API_USER_TRXNEW", $Api.$TrxNew);
    define("API_USER_SPECIAL", $Api.$SPECIAL_FUN_USER);
    define("API_USER_SEARCH", $Api.$Find);


