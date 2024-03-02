<?php

    class Midtrans{
        public function __construct(){
            CallFile::RequireOnce('Libs/Security.php');
            CallFile::RequireOnce("vendor/midtrans/midtrans-php/Midtrans.php");
        }

        /**
         * Function for New Transaction
         */
        public static function Transaction($Trxid, $Amount, $first_name, $last_name, $Email, $EmailPartner, $phone, $Tax, $TaxMidtrans, $from){
            $self = new static();
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = TRX_SERVERKEY;
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = STATUS_APP;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details'   => array(
                    'order_id'          => $Trxid,
                    'gross_amount'      => ($Amount * $Tax/100) + $TaxMidtrans + $Amount,
                ),
                'item_details'          => array(
                    0                   => array(
                        'id'            => $Trxid,
                        'price'         => ($Amount * $Tax/100),
                        'quantity'      => 1,
                        'name'          => 'Pajak'
                    ),
                    1                   => array(
                        'id'            => $Trxid,
                        'price'         => $TaxMidtrans,
                        'quantity'      => 1,
                        'name'          => 'Biaya Administrasi'
                    ),
                    2                   => array(
                        'id'            => $Trxid,
                        'price'         => $Amount,
                        'quantity'      => 1,
                        'name'          => $EmailPartner
                    )     
                ),
                'customer_details'      => array(
                    'first_name'        => $first_name,
                    'last_name'         => $last_name,
                    'email'             => $Email,
                    'phone'             => $phone,
                ),
                'callbacks'             => array(
                    'finish'            => PROTOCOL_URL . "://" . BASE_URL . "$from?from=$from"
                )
            );
            
            return \Midtrans\Snap::getSnapToken($params);
        }
        /**
         * Function for Notication
         */
        public static function Notification(){
            $self = new static();
            \Midtrans\Config::$isProduction = STATUS_APP;
            \Midtrans\Config::$serverKey = TRX_SERVERKEY;
            $notif = new \Midtrans\Notification();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;

            if ($transaction == 'capture') {
                if ($type == 'credit_card'){
                  if($fraud == 'accept'){
                    $Data = array(
                        "order_id"  => $order_id,
                        "type"      => $type,
                        "statusAPI" => "DONE",
                        "statusDB"  => "Berhasil"
                    );
                    return $Data;
                    }
                  }
            }
            else if ($transaction == 'settlement'){
                $Data = array(
                    "order_id"  => $order_id,
                    "type"      => $type,
                    "statusAPI" => "DONE",
                    "statusDB"  => "Berhasil"
                );
                return $Data;
            }
            else if ($transaction == 'deny') {
                $Data = array(
                    "order_id"  => $order_id,
                    "type"      => $type,
                    "statusAPI" => "FAILED",
                    "statusDB"  => "Ditolak"
                );
                return $Data;
            }
            else if ($transaction == 'expire') {
                $Data = array(
                    "order_id"  => $order_id,
                    "type"      => $type,
                    "statusAPI" => "UNPROCESSED",
                    "statusDB"  => "Berakhir"
                );
                return $Data;
            }
            else if ($transaction == 'cancel') {
                $Data = array(
                    "order_id"  => $order_id,
                    "type"      => $type,
                    "statusAPI" => "UNPROCESSED",
                    "statusDB"  => "Batal"
                );
                return $Data;
            }
            else{
                return exit();
            }
        }
    }