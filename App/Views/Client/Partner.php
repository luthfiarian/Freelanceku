<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Mitra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Mitra") ?>
        <!-- End of Routes Page Section -->

        <?php if(($Data2->data_paymentstatus == 0) && empty($Data3->data->address->street)): ?>
            <setion class="mt-2">
                <div class="container">
                    <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                        <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Peringatan&nbsp;</p>
                        <p class="w-full text-center font-semibold my-2">Segera lengkapi data anda 🖐😄</p>
                        <div class="w-full">
                            <?php if($Data2->data_paymentstatus == 0): ?>
                            <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "dashboard" ?>"><button class="text-sm md:text-base rounded-full text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Tambahkan Data Pembayaran Anda</button></a>
                            <?php endif ?>
                            <?php if(empty($Data3->data->address->street)): ?>
                            <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "account" ?>"><button class="text-sm md:text-base rounded-full mt-2 text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Lengkapi Data Alamat Anda</button></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </setion>
        <?php else : ?>

        <section id="list-partner">
            
        </section>

        <?php endif ?>
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