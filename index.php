<?php
    /**
     * @copyright Freelanceku - 2024
     * @author Muhammad Alvin Azzamul Azmi
     * @author Muhammad Agung Laksono
     * @author Luthfi Arian Nugraha
     */
    
    require_once('Libs/Call.php');

    /* 
    *   Call File Init.php
    *   @param 'Init.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    if(phpversion() >= 8.0){
        ob_start("ob_gzhandler");
        CallFileApp::RequireOnce('Init.php');
    }else{
        echo "<title>Freelance Platform Apps</title>";
        echo "<p> Sorry, your PHP version is " . phpversion() . ", please update the version to at least 8.0 or 8.0 and above </p>";
        echo "<a herf='https://www.php.net/downloads.php'>Go to php page download</a>";
    }