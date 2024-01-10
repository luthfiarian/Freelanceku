<?php

    class Security{
        public static function XSS($Word){return htmlspecialchars(filter_var(stripslashes($Word), FILTER_SANITIZE_URL));}
    }