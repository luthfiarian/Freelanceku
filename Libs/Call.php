<?php
    // Class Call File
    class CallFile{
        // Method Require
        public static function Require($Call){ return require($Call); }
        // Method Require_Once
        public static function RequireOnce($Call){ return require_once($Call); }
        // Method Include
        public static function Include($Call){ return include($Call); }
        // Method Include_Once
        public static function IncludeOne($Call){ return include_once($Call); }
    }
    // Class Call File Directory App
    class CallFileApp{
        // Method Require
        public static function Require($Call){ return require("App/".$Call); }
        // Method Require_Once
        public static function RequireOnce($Call){ return require_once("App/".$Call); }
        // Method Require_Once With Data
        public static function RequireOnceData($Call, $Data){ $Data = $Data; require_once("App/".$Call); return true; }
        // Method Require_Once With 2 Data
        public static function RequireOnceData2($Call, $Data1, $Data2){ $Data1 = $Data1; $Data2 = $Data2; require_once("App/".$Call); return true; }
        // Method Require_Once With 3 Data
        public static function RequireOnceData3($Call, $Data1, $Data2, $Data3){ $Data1 = $Data1; $Data2 = $Data2; $Data3 = $Data3; require_once("App/".$Call); return true; }
        // Method Require_Once With 4 Data
        public static function RequireOnceData4($Call, $Data1, $Data2, $Data3, $Data4){ $Data1 = $Data1; $Data2 = $Data2; $Data3 = $Data3; $Data4 = $Data4; require_once("App/".$Call); return true; }
        // Method Require_Once With 5 Data
        public static function RequireOnceData5($Call, $Data1, $Data2, $Data3, $Data4, $Data5){ $Data1 = $Data1; $Data2 = $Data2; $Data3 = $Data3; $Data4 = $Data4; $Data5 = $Data5; require_once("App/".$Call); return true; }
        // Method Require_Once With 6 Data
        public static function RequireOnceData6($Call, $Data1, $Data2, $Data3, $Data4, $Data5, $Data6){ $Data1 = $Data1; $Data2 = $Data2; $Data3 = $Data3; $Data4 = $Data4; $Data5 = $Data5; $Data6 = $Data6; require_once("App/".$Call); return true; }
        // Method Require_Once With Data Unset
        public static function RequireOnceDataUnset($Call, $Data){ $Data = $Data; require_once("App/".$Call); unset($Data); return true; }
        // Method Include
        public static function Include($Call){ return include("App/".$Call); }
        // Method Include_Once
        public static function IncludeOne($Call){ return include_once("App/".$Call); }
    }
    // Class Call Besides php File
    class CallAny{
        public static function File($Call){ return BASE_URI.$Call; }
        public static function FileApp($Call){ return "App/".$Call; }
    }

