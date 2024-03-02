<?php
    /**
     * File of Connection Into Database
     * Note : This Website Just Use MySQL and API for Databases
     * @param : Host_DB, Port_DB, Username_DB, Password_db, Name_DB
     */
    $Host_DB_Site       = "localhost";
    $Port_DB_Site       = "3306";
    $Username_DB_Site   = "root";
    $Password_DB_Site   = "";
    $Name_DB_Site       = "freelanceku_site";

    $Host_DB_User       = "localhost";
    $Port_DB_User       = "3306";
    $Username_DB_User   = "root";
    $Password_DB_User   = "";
    $Name_DB_User       = "freelanceku_user";

    // Constant Variable of Database Site
    define("HOST_DB_SITE", $Host_DB_Site);
    define("PORT_DB_SITE", $Port_DB_Site);
    define("USER_DB_SITE", $Username_DB_Site);
    define("PASS_DB_SITE", $Password_DB_Site);
    define("NAME_DB_SITE", $Name_DB_Site);

    // Constant Variable of Database User
    define("HOST_DB_USER", $Host_DB_User);
    define("PORT_DB_USER", $Port_DB_User);
    define("USER_DB_USER", $Username_DB_User);
    define("PASS_DB_USER", $Password_DB_User);
    define("NAME_DB_USER", $Name_DB_User);

    // Connection to DB Site
    $Conn_Site = mysqli_connect(HOST_DB_SITE, USER_DB_SITE, PASS_DB_SITE, NAME_DB_SITE, PORT_DB_SITE);
    define("CONN_DB_SITE", $Conn_Site);
    if(!CONN_DB_SITE){die("Tidak dapat terhubung database : ". CONN_DB_SITE->connect_error);}

    // Constant Variable of Tables of Databases
    define("SEO_SITE_DB", "site_seo");
    define("BANK_SITE_DB", "site_bank");
    define("SET_SITE_DB", "site_setting");
    define("INTEREST_SITE_DB", "site_interest");
    define("TAX_SITE_DB", "site_tax");
    define("INCOME_SITE_DB", "site_income");
    define("IDENTITY_SITE_DB", "site_identity");

    // Connection to DB User
    $Conn_User = mysqli_connect(HOST_DB_USER, USER_DB_USER, PASS_DB_USER, NAME_DB_USER, PORT_DB_USER);
    define("CONN_DB_USER", $Conn_User);
    if(!CONN_DB_USER){die("Tidak dapat terhubung database : ".CONN_DB_USER->connect_error);}
    
    define("DATA_USER_DB", "user_data");
    define("WORK_USER_DB", "user_work");
    define("PORTO_USER_DB", "user_porto");
    define("PARTNER_USER_DB", "user_partner");
    define("TRANSACTION_USER_DB", "user_transaction");
    define("TRANSFER_USER_DB", "user_transfer");
    define("BILL_USER_DB", "user_bill");