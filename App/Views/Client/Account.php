<!DOCTYPE html>
<html <?php echo $AMP = $Data['seo_amp'] ? "amp" : "";  ?> lang="<?php echo $Data['seo_lang'] ?>">
<head>
    <title>Freelanceku | Akun</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>
    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnce('Views/Client/Templates/Navbar.php') ?>
        <!-- End of Navbar -->
    </header>

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Akun") ?>
        <!-- End of Routes Page Section -->
        
        <!-- Account Section -->
        <section id="create-work" class="mt-2">
            <div class="container">
                <div class="w-1/2 mx-auto border rounded-lg py-4 px-5 text-center">
                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Foto Profil" class="mx-auto !w-[75px] md:!w-[100px] rounded-full shadow-sm">
                    <p class="mt-2">
                        <span class="font-semibold">Andi</span><br>
                        andi@gmail.com <br>
                        081-1212-12312-32
                    </p>
                </div>
            </div>
        </section>
        <!-- End of Account Section -->

        <!-- Setting Account Section -->
        <section id="setting-acc" class="mt-5">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Pengaturan Akun&nbsp;</p>
                    <div class="w-full">
                        <button type="button" class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-secondary">Atur Akun</button>
                        <button type="button" class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-red-500">Keluar</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Setting Account Section -->
    </main>
        
    <!-- Navbar Bottom -->
        <?php CallFileApp::RequireOnce("Views/Client/Templates/NavbarBottom.php") ?>
    <!-- End of Nabar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Footer.php") ?>
    <!-- End of Footer -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce("Views/Templates/Part/Javascript.php"); ?>
    <!-- End of Javascript -->
</body>
</html>