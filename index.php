<?php
    /* 
    *   Call library Call.php 
    *   @Params 'Libs/Call.php'
    *   @Funct  require_once
    */
    require_once('Libs/Call.php');

    /* 
    *   Call File Init.php
    *   @Params 'Init.php'
    *   @Funct  CallFileApp::RequireOnce
    */
    ob_start("ob_gzhandler");
    CallFileApp::RequireOnce('Init.php');