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
    if((float) phpversion() >= 8.1){
        ob_start("ob_gzhandler");
        CallFileApp::RequireOnce('Init.php');
    }else{
?>
        <title>Freelance Platform Apps</title>
        <link rel="shortcut icon" href="Public/dist/image/favicon.png" type="image/x-icon">
        <p>Sorry, your PHP version is <?php echo phpversion() ?>, please update the version to at least 8.1.25 or 8.1.25 and above</p>
        <a href="https://www.php.net/downloads.php" target="_blank" rel="noopener noreferrer">Go to php page download</a>
<?php
    }
?>