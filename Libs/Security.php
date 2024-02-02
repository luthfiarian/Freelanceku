<?php
    class Security{
        public static function StringDB($ConnDB, $Word){
           $Word = preg_replace('/[$#^{}\;"<>`~]/', '', $Word);
           $Word = htmlspecialchars($Word, ENT_QUOTES, 'UTF-8');
           $Word = mysqli_real_escape_string($ConnDB, $Word);
           return $Word;
        }
        public static function String($Word){
           $Word = preg_replace('/[$#^&*{}\;"<>`~]/', '', $Word);
           $Word = htmlspecialchars($Word, ENT_QUOTES, 'UTF-8');
           return $Word;
        }
    }