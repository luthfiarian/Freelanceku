<?php

    /**
     * Midtrans Configuration
     *  @param $ServerKey
     *  @param $ClientKey
     *  @param $MerchantID
     */

     $ServerKey  = "";
     $ClientKey  = "";
     $MerchantID = "";
     $Sandbox    = "https://app.sandbox.midtrans.com/snap/";
     $Production = "https://app.midtrans.com/snap/";
 
     define("TRX_SERVERKEY", $ServerKey);
     define("TRX_CLIENTKEY", $ClientKey);
     define("TRX_MERCHANTID", $MerchantID);
     define("TRX_URL_APP", STATUS_APP ? $Production : $Sandbox);