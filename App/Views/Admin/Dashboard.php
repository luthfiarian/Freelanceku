<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Dashboard Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
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
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Dashboard", "dashboard"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Information Section -->
        <section id="info" class="mt-5">
            <div class="container">
                <div class="w-full">
                    <div class="w-full flex mt-2 text-white">
                        <!-- Number of Freelance Workers -->
                        <div class="w-1/4 rounded-lg bg-green-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-sm md:text-base lg:text-lg font-medium">Freelancer</p>
                            <p class="text-sm md:text-base lg:text-lg"><?php echo $Data3->user ?></p>
                        </div>
                        <!-- Number of Admin -->
                        <div class="w-1/4 rounded-lg bg-slate-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-sm md:text-base lg:text-lg font-medium">Admin</p>
                            <p class="text-sm md:text-base lg:text-lg"><?php echo $Data3->admin ?></p>
                        </div>
                        <!-- Number of Visitor -->
                        <div class="w-1/4 rounded-lg bg-teal-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-sm md:text-base lg:text-lg font-medium">Pengunjung</p>
                            <p class="text-sm md:text-base lg:text-lg"><?php echo $Data3->visitor ?></p>
                        </div>
                        <!-- Income -->
                        <div class="w-1/4 rounded-lg bg-yellow-500 py-4 px-2 shadow-md">
                            <p class="text-sm md:text-base lg:text-lg font-medium">Pendapatan</p>
                            <p class="text-sm md:text-base lg:text-lg">Rp. <?php echo $Data3->income ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Information Section -->

        <!-- User Section -->
        <section id="user" class="mt-5">
            <div class="container">
                <div class="w-full flex-none md:flex">
                    <!-- Freelancers -->
                    <div class="w-full md:w-1/2 overflow-x-auto backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                        <p class="text-lg">Pengguna Terbaru</p>
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama Penguna</td><td>Email</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($User = mysqli_fetch_assoc($Data4)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/15/30">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $User["data_username"] ?></td>
                                    <td><?php echo $User["data_email"] ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $User["data_email"] ?>"><input type="submit" name="client-detail" value="Info" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if(mysqli_num_rows($Data4) == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="4" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                                <tr>
                                    <td colspan="4" class="bg-emerald-600/30 rounded-b-xl"><a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "admin/client" ?>">Selengkapnya</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Admin -->
                    <div class="w-full md:w-1/2 backdrop-blur-lg bg-amber-500/50 shadow-xl rounded-lg p-2 mt-4 md:mt-0">
                        <p class="text-lg">Admin Terbaru</p>
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-amber-600/30 font-semibold">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama Pengguna</td><td class="rounded-tr-xl">Email</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1; while($Admin = mysqli_fetch_assoc($Data5)): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td><?php echo $j ?></td>
                                    <td><?php echo $Admin["data_username"] ?></td>
                                    <td><?php echo $Admin["data_email"] ?></td>
                                </tr>
                                <?php $j++; endwhile ?>
                                <?php if(mysqli_num_rows($Data5) == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="3" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                                <tr>
                                    <td colspan="4" class="bg-amber-600/30 rounded-b-xl"><a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "admin/user" ?>">Selengkapnya</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of User Section -->

        <!-- Income Section -->
        <section id="income" class="my-5">
            <div class="container">
                <div class="w-full overflow-x-auto p-2 backdrop-blur-lg shadow-xl bg-blue-400/60 rounded-lg">
                    <p>Riwayat Transaksi Terbaru</p>
                    <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                        <thead class="bg-blue-500/30 font-semibold">
                            <tr>
                                <td class="rounded-tl-xl">No</td><td>Faktur</td><td>Pengirim</td><td>Penerima</td><td>Waktu</td><td>Deskripsi</td><td class="rounded-tr-xl">Nominal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $k = 1; while($Transaction = mysqli_fetch_assoc($Data6)): ?>
                            <tr class="ease-in-out duration-150 transition hover:bg-blue-200">
                                <td><?php echo $k ?></td>
                                <td><?php echo $Transaction["trx_id"] ?></td>
                                <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transaction["trx_fromemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transaction["trx_fromemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transaction["trx_toemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transaction["trx_toemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                <td><?php echo date('d M Y H:i', strtotime($Transaction["trx_date"])) ?></td>
                                <td>Work-<?php echo $Transaction["trx_workid"] ?></td>
                                <td>Rp <?php echo $Transaction["trx_amount"] ?></td></td>
                            </tr>
                            <?php $k++; endwhile ?>
                            <?php if(mysqli_num_rows($Data6) == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="7" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                            <?php endif ?>
                            <tr>
                                <td colspan="7" class="rounded-b-xl bg-blue-500/30"><a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "admin/finance" ?>">Selengkapnya</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- End of Income Section -->

    </main>
    <!-- End of Main -->

    <!-- Client Detail Pop Up -->
    <?php if(isset($Data7) && isset($_POST["client-detail"])){ CallFileApp::RequireOnceData("Views/Admin/Templates/Part/ClientDetail.php", $Data7); } ?>
    <!-- End of Client Detail Pop Up -->


    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); ?>
    <!-- End of Navbar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Footer.php') ?>
    <!-- End of Footer -->
</body>
</html>