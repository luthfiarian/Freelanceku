<?php
    /* 
    * File Konfigurasi API
    */

    // API BASE URL -> contoh : https://google.com/
    $Api    = "https://freelance-api-production.up.railway.app/v1/";

    // API Routes
    $Admin  = "users";
    $User   = "freelancers";
    $Login  = "auth/login";
    $Regis  = "auth/register";

    define('API_URL', $Api);
    define('API_ROUTE_ADMIN', $Api.$Admin);
    define('API_ROUTE_USER', $Api.$User);
    define('API_ROUTE_SIGNIN', $Api.$Login);
    define('API_ROUTE_SIGNUP', $Api.$Regis);