<?php
    CallFileApp::RequireOnce('Models/Database.php');
    $Site = new Site; $Data1 = $Site->Seo(); $Data2 = $Site->Interest();
    CallFileApp::RequireOnceData2('Views/Home.php', $Data1, $Data2);