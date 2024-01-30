<?php
    /* 
    *   Memanggil Memanggil File Host
    *   @Dir    'Config'
    *   @Params 'Host.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFileApp::RequireOnce('Config/Host.php');
    ini_set('display_errors', STATUS_APP);
    /* 
    *   Memanggil Memanggil File Session.php
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFile::RequireOnce('Libs/Session.php');
    Session::Start();
    /* 
    *   Memanggil Memanggil File Routes
    *   @Dir    'Routes'
    *   @Params 'Routes.php'
    *   @Funct  CallFileApp::ReqireOnce
    */
    CallFileApp::RequireOnce('Routes/Routes.php');
