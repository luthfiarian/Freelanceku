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
    $Name_DB        = "freelanceku";

    // Definition Information Data of Database
    define("HOST_DB", $Host_DB);
    define("PORT_DB", $Port_DB);
    define("USER_DB", $Username_DB);
    define("PASS_DB", $Password_DB);
    define("NAME_DB", $Name_DB);

    $Conn = mysqli_connect(HOST_DB, USER_DB, PASS_DB, NAME_DB, PORT_DB);
    
    define("CONN_DB", $Conn);

    if(!CONN_DB){die("Tidak dapat terhubung database : CONN_DB->connect_error");}

    // Definition Tables of Databases
    define("SEO_TABLE_DB", "site_seo");
    define("BANK_TABLE_DB", "site_bank");