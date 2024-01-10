<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Freelancer Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Account.php') ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Routes.php'); RoutesPage::Page("Freelancer") ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

    </main>
    <!-- End of Main -->
    
    <!-- Footer -->
        <?php CallFileApp::RequireOnce('Views/Templates/FooterAccount.php') ?>
    <!-- End of Footer -->
</body>

</html>