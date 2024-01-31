<?php
    /* 
    *   Call File Host
    *   @Dir    'App/Config'
    *   @Params 'Host.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFileApp::RequireOnce('Config/Host.php');
    ini_set('display_errors', STATUS_APP);
    /* 
    *   Call File Session
    *   @Params 'Libs/Session.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    CallFile::RequireOnce('Libs/Session.php');
    Session::Start();
    /* 
    *   Call File Routes
    *   @Dir    'App/Routes'
    *   @Params 'Routes.php'
    *   @Funct  CallFileApp::ReqireOnce
    */
    CallFileApp::RequireOnce('Routes/Routes.php');
