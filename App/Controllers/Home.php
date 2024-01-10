<?php
    CallFileApp::RequireOnce('Models/Database.php');
    $Site = new Site; $Data = $Site->Seo();
    CallFileApp::RequireOnceDataUnset('views/Home.php', $Data);