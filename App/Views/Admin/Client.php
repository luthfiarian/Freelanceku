<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Pengguna Pelanggan Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Header -->
    <header class="w-full">
        <?php CallFileApp::RequireOnceData2("Views/Admin/Templates/Header.php", $Data1, $Data2) ?>
    </header>
    <!-- End of Header -->
    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Account.php', $Data1, $Data2) ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Pengguna", "client"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- User Section -->
        <section id="user" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan nama pengguna atau email"><button name="search-client" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Pengguna Freelance (<?php $QueryUser = mysqli_num_rows($Data3->user); echo $QueryUser ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryUser){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama Penguna</td><td>Email</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($User = mysqli_fetch_assoc($Data3->user)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($i == $QueryUser): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $i ?></td>
                                    <td><?php echo $User["data_username"] ?></td>
                                    <td><?php echo $User["data_email"] ?></td>
                                    <td <?php if($i == $QueryUser): ?> class="rounded-br-xl" <?php endif ?>><form action="" method="post"><input type="hidden" name="email" value="<?php echo $User["data_email"] ?>"><input type="submit" name="client-detail" value="Info" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if($QueryUser == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="4" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of User Section -->
        
        <!-- Work Section -->
        <section id="work" class="mt-5">
            <div class="container">
                <div class="w-full">
                    <div class="w-full mb-2">
                        <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan nama/email/bidang/id/tawaran pekerjaan"><button name="search-work" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                    </div>
                    <div class="w-full backdrop-blur-lg bg-yellow-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                        <p class="text-lg">Daftar Pekerjaan Pengguna (<?php $QueryWork = mysqli_num_rows($Data3->work); echo $QueryWork ?>)</p>
                        <div class="w-full max-w-full overflow-x-auto" style="<?php if(10 <= $QueryWork){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                            <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                                <thead class="bg-yellow-600/30 font-semibold sticky top-0">
                                    <tr>
                                        <td class="rounded-tl-xl">Id</td><td>Nama</td><td>Pemilik</td><td>Bidang</td><td>Status</td><td>Maks Mitra</td><td>Mitra 1</td><td>Mitra 2</td><td>Mitra 3</td><td class="rounded-tr-xl">Tawaran</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $j = 1; while($Work = mysqli_fetch_assoc($Data3->work)): ?>
                                    <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                        <td <?php if($j == $QueryWork): ?> class="rounded-bl-xl" <?php endif ?>>work-<?php echo $Work["id"] ?></td>
                                        <td><?php echo $Work["work_name"] ?></td>
                                        <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Work["work_host"] ?>"><input type="submit" name="client-detail" value="<?php echo $Work["work_host"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                        <td><?php echo $Work["work_field"] ?></td>
                                        <td><?php echo $Work["work_status"] == 0 ? "Berjalan" : "Selesai" ?></td>
                                        <td><?php echo $Work["work_maxuser"] ?></td>
                                        <td><?php if(!empty($Work["work_partner1"])): ?><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Work["work_partner1"] ?>"><input type="submit" name="client-detail" value="<?php echo $Work["work_partner1"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form><?php else : echo " - "; endif ?></td>
                                        <td><?php if(!empty($Work["work_partner2"])): ?><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Work["work_partner2"] ?>"><input type="submit" name="client-detail" value="<?php echo $Work["work_partner2"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form><?php else : echo " - "; endif ?></td>
                                        <td><?php if(!empty($Work["work_partner3"])): ?><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Work["work_partner3"] ?>"><input type="submit" name="client-detail" value="<?php echo $Work["work_partner3"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form><?php else : echo " - "; endif ?></td>
                                        <td <?php if($j == $QueryWork): ?> class="rounded-br-xl" <?php endif ?>>Rp. <?php echo $Work["work_salary"] ?></td>
                                    </tr>
                                    <?php $j++; endwhile ?>
                                    <?php if($QueryWork == 0): ?>
                                    <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                        <td colspan="10" class="text-center">Terlihat tidak ada data disini 👀</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Work Section -->

        <!-- Partner Section -->
        <section id="partner" class="mt-5">
            <div class="container">
                <div class="w-full">
                    <div class="w-full mb-2">
                        <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan nama pengguna/email/id pekerjaan"><button name="search-partner" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                    </div>
                    <div class="w-full backdrop-blur-lg bg-rose-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                        <p class="text-lg">Daftar Mitra (<?php $QueryPartner = mysqli_num_rows($Data3->partner); echo $QueryPartner ?>)</p>
                        <div class="w-full max-w-full overflow-x-auto" style="<?php if(10 <= $QueryPartner){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                            <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto overflow-x-auto">
                                <thead class="bg-rose-600/30 font-semibold sticky top-0">
                                    <tr>
                                        <td class="rounded-tl-xl">Id</td><td>Nama Penguna</td><td>Email</td><td>Status</td><td>Tanggal</td><td class="rounded-tr-xl">Berkas</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1; while($Partner = mysqli_fetch_assoc($Data3->partner)): ?>
                                    <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                        <td <?php if($k == $QueryPartner): ?> class="rounded-bl-xl" <?php endif ?>>work-<?php echo $Partner["partner_workid"] ?></td>
                                        <td><?php echo $Partner["partner_username"] ?></td>
                                        <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Partner["partner_email"] ?>"><input type="submit" name="client-detail" value="<?php echo $Partner["partner_email"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                        <td><?php echo ($Partner["partner_reqstatus"] == 0 ? "Proses" : $Partner["partner_reqstatus"] == 1) ? "Diterima" : "Ditolak" ?></td>
                                        <td><?php echo date('d M Y', strtotime($Partner["partner_date"])) ?></td>
                                        <td <?php if($k == $QueryPartner): ?> class="rounded-br-xl" <?php endif ?>><a href="<?php echo !empty($Partner["partner_file"]) ? BASE_ROOT . $Partner["partner_file"] : "#" ?>" class="py-1 px-2 rounded-lg text-primary bg-secondary">Unduh Berkas</a></td>
                                    </tr>
                                    <?php $k++; endwhile ?>
                                    <?php if($QueryPartner == 0): ?>
                                    <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                        <td colspan="6" class="text-center">Terlihat tidak ada data disini 👀</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Partner Section -->

    </main>
    <!-- End of Main -->

    <!-- Client Detail Pop Up -->
    <?php if(isset($Data4) && isset($_POST["client-detail"])){ CallFileApp::RequireOnceData("Views/Admin/Templates/Part/ClientDetail.php", $Data4); } ?>
    <!-- End of Client Detail Pop Up -->
    
    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); ?>
    <!-- End of Navbar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Footer.php') ?>
    <!-- End of Footer -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
    <!-- End of Javascript -->
</body>

</html>