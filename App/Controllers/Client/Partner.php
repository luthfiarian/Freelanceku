<?php
    CallFileApp::RequireOnce('Models/Database.php');
    $Site = new Site; $Data = $Site->Seo();
    CallFileApp::RequireOnceData('Views/Client/Partner.php', $Data);