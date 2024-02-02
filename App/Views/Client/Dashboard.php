<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">

<head>
    <title>Freelanceku | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>

<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data3, $Data4) ?>
        <!-- End of Navbar -->
    </header>
    
    <!-- Alert Status -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>
    <!-- End of Alert Status -->

    <!-- Main -->
    <main class="mt-5">
        <!-- Account Section -->
        <section id="account">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="w-2/3 mr-1 flex flex-warp py-2 px-4 border rounded-lg">
                        <div class="w-1/3 lg:w-1/6 mr-1 md:mr-0">
                            <img src="<?php echo $Data3->data_photo ?>" alt="Profil" class="!w-[75px] md:!w-[100px] !h-[75px] md:!h-[100px] rounded-full shadow-sm">
                        </div>
                        <div class="w-2/3 lg:w-5/6 mt-2">
                            <p class="text-sm md:text-lg">Hai! <?php echo $Data4->data->identity->first_name; ?> 🖐</p>
                            <p class="text-xs md:text-sm">
                                <span class="font-semibold"><?php echo $Data3->data_email ?> </span><br>
                                <?php echo "+" . $Data4->data->identity->phone; ?>
                            </p>
                        </div>
                    </div>
                    <div class="w-1/3 py-2 px-4 border rounded-lg">
                        <?php if($Data3->data_paymentstatus == 0): ?>
                        <button data-modal-target="add-payment" data-modal-toggle="add-payment" type="button" class="text-sm md:text-base rounded-full text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Tambah Pembayaran</button>
                        <?php elseif($Data3->data_paymentstatus == 1): ?>
                        <button class="text-xs md:text-base rounded-full text-center w-full border py-1 mt-0.5 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Riwayat Keuangan</button>
                        <button class="text-xs md:text-base rounded-full text-center w-full border py-1 mt-0.5 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Transfer</button>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Account Section -->

        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Dashboard") ?>
        <!-- End of Routes Page Section -->

        <!-- Task Section -->
        <section id="task" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="w-2/3 px-1 py-2 rounded-lg border mr-1">
                        <form action="" method="get" class="w-full flex flex-warp">
                            <input type="search" name="search" class="text-sm md:text-base w-2/3 rounded-l-full px-4" placeholder="Cari Mitra Kerja" autofocus autocomplete="off">
                            <input type="submit" value="Cari" class="text-sm md:text-base w-1/3 rounded-r-full border text-center duration-300 ease-in-out hover:bg-secondary hover:text-primary">
                        </form>
                    </div>
                    <div class="w-1/3 px-1 py-2 rounded-lg border">
                        <a href="<?php echo BASE_URI . "work#create-work"?>"><button class="w-full text-xs md:text-base text-center font-semibold rounded-full py-2 border duration-300 ease-in-out hover:bg-secondary hover:text-primary">Buat Pekerjaan</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Task Section -->

        <!-- History Partner & Income Section -->
        <section class="mt-1">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <!-- Partner -->
                    <div class="w-full md:w-1/2 my-4 pb-2 pt-4 px-4 rounded-lg relative border mr-0.5 md:mr-1">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Mitra&nbsp;</p>
                        <div class="relative w-full mt-1 overflow-y-auto h-52">
                            <table class="w-full table table-auto">
                                <tbody>
                                    <?php while($Partner = mysqli_fetch_assoc($Data5)): ?>
                                        <tr>
                                            <?php if(!empty($Partner["work_partner1"])){ echo "<td class='py-2'><img width='25px' src='Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner1']}</td>"; } ?>
                                        </tr>
                                        <tr>
                                            <?php if(!empty($Partner["work_partner2"])){ echo "<td class='py-2'><img width='25px' src='Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner2']}</td>"; } ?>
                                        </tr>
                                        <tr>
                                            <?php if(!empty($Partner["work_partner3"])){ echo "<td class='py-2'><img width='25px' src='Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner3']}</td>"; } ?>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Income -->
                    <div class="w-full md:w-1/2 my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Pendapatan&nbsp;</p>
                        <div class="relative w-full mt-1 overflow-y-auto h-52">

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of History Partner & Income -->
    </main>
    <!-- End of Main -->

    <?php if($Data3->data_paymentstatus == 0): ?>
    <!-- Modal Add Bank -->
    <?php CallFileApp::RequireOnceData("Views/Client/Templates/Part/AddPayment.php", $Data2) ?>
    <!-- End of Add Bank -->
    <?php endif ?>

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