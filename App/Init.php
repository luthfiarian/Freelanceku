<?php
    /* 
    *   Call File Host
    *   @Dir    'App/Config'
    *   @Params 'Host.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFileApp::RequireOnce('Config/Host.php');
    /* 
    *   Call File Session
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFile::RequireOnce('Libs/Session.php');
    Session::Start();
    
    // ERROR REPORTING
    ini_set('display_errors', !STATUS_APP);
    ini_set('display_startup_errors', !STATUS_APP);
    !STATUS_APP ? error_reporting(E_ALL) : false;
    
    /* 
    *   Call File Routes
    *   @Dir    'App/Routes'
    *   @Params 'Routes.php'
    *   @Funct  CallFileApp::ReqireOnce
    */
    CallFileApp::RequireOnce('Routes/Routes.php');
