<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Akun</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>
    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data2, $Data3) ?>
        <!-- End of Navbar -->
    </header>

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Akun") ?>
        <!-- End of Routes Page Section -->
        
        <!-- Account Section -->
        <section id="accout-detail" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp ">
                    <div class="w-full md:w-1/3 h-auto mt-2 border rounded-lg py-4 px-5 text-center mr-0 md:mr-1">
                        <img src="<?php echo $Data2->data_photo ?>" alt="Foto Profil" class="mx-auto !w-[75px] md:!w-[100px] rounded-full shadow-sm">
                        <p class="mt-2">
                            <span class="font-semibold"><?php echo $Data3->data->identity->first_name . " " . $Data3->data->identity->last_name ; ?></span><br>
                            <?php echo $Data3->data->identity->email; ?> <br>
                            <?php echo $Data3->data->identity->phone; ?>
                        </p>
                    </div>
                    <div class="w-full md:w-2/3 h-auto mt-2 pb-2 pt-4 px-4 rounded-lg relative border">
                        <p class="text-lg h-auto font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Tentang Akun&nbsp;</p>
                        <div class="w-full">
                            
                        </div>
                    </div>
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