<?php

    /**
     * Midtrans Configuration
     *  @param $ServerKey
     *  @param $ClientKey
     * 
     */

     $ServerKey  = "";
     $ClientKey  = "";
     $Sandbox    = "https://app.sandbox.midtrans.com/snap/";
     $Production = "https://app.midtrans.com/snap/";
 
     define("TRX_SERVERKEY", $ServerKey);
     define("TRX_CLIENTKEY", $ClientKey);
     define("TRX_URL_APP", STATUS_APP ? $Production : $Sandbox);