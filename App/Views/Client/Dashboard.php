<!DOCTYPE html>
<html <?= $AMP = $Data['seo_amp'] ? "amp" : "";  ?> lang="<?= $Data['seo_lang'] ?>">

<head>
    <title>Freelanceku | Dashboard</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>
        
</head>
</head>

<body>
    <!-- Navbar & Aside -->
    <?php CallFileApp::RequireOnce('Views/Client/Templates/Navbar.php') ?>
    <!-- End of Navbar & Aside -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce("Views/Templates/Part/Javascript.php"); ?>
    <!-- End of Javascript -->
</body>

</html>