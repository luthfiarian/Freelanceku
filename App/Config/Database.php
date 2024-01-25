<?php
    /**
     * File of Connection Into Database
     * Note : This Website Just Use MySQL and API for Databases
     * @Params : Host_DB, Port_DB, Username_DB, Password_db, Name_DB, Conn
     */
    $Host_DB        = "localhost";
    $Port_DB        = "3306";
    $Username_DB    = "root";
    $Password_DB    = "toor";
    $Name_DB_Site   = "freelanceku_site";
    $Name_DB_User   = "freelanceku_user";

    // Definition Information Data of Database Site
    define("HOST_DB", $Host_DB);
    define("PORT_DB", $Port_DB);
    define("USER_DB", $Username_DB);
    define("PASS_DB", $Password_DB);
    define("NAME_DB_SITE", $Name_DB_Site);

    // Connection to DB Site
    $Conn_Site = mysqli_connect(HOST_DB, USER_DB, PASS_DB, NAME_DB_SITE, PORT_DB);
    define("CONN_DB_SITE", $Conn_Site);
    if(!CONN_DB_SITE){die("Tidak dapat terhubung database : ". CONN_DB_SITE->connect_error);}

    // Definition Tables of Databases
    define("SEO_SITE_DB", "site_seo");
    define("SET_SITE_DB", "site_setting");

    // Definition Information Data of Database User
    define("NAME_DB_USER", $Name_DB_User);
    // Connection to DB User
    $Conn_User = mysqli_connect(HOST_DB, USER_DB, PASS_DB, NAME_DB_USER, PORT_DB);
    define("CONN_DB_USER", $Conn_User);
    if(!CONN_DB_USER){die("Tidak dapat terhubung database : ".CONN_DB_USER->connect_error);}
    
    define("DATA_USER_DB", "user_data");