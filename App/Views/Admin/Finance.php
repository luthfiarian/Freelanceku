<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Riwayat Transaksi Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Header -->
    <header class="w-full">
        <?php CallFileApp::RequireOnceData2("Views/Admin/Templates/Header.php", $Data1, $Data2) ?>
    </header>
    <!-- End of Header -->

    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Account.php', $Data1, $Data2) ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Keuangan - Riwayat Transaksi", "finance"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Transfer Section -->
        <section id="transfer" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan email/id/id pekerjaan/status/nilai/metode"><button name="search-transfer" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full overflow-x-auto backdrop-blur-lg bg-yellow-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Transfer (<?php $QueryTransfer = mysqli_num_rows($Data3); echo $QueryTransfer ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryTransfer){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-yellow-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">Id</td><td>Id Pekerjaan</td><td>Status</td><td>Waktu Transaksi</td><td>Pengirim</td><td>Penerima</td><td>Nilai</td><td class="rounded-tr-xl">Metode</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($Transfer = mysqli_fetch_assoc($Data3)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($i == $QueryTransfer): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $Transfer["trf_id"] ?></td>
                                    <td>work-<?php echo $Transfer["trf_workid"] ?></td>
                                    <td><?php echo $Transfer["trf_status"] ?></td>
                                    <td><?php echo date('H:i - d M Y', strtotime($Transfer["trf_date"])) ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transfer["trf_fromemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transfer["trf_fromemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transfer["trf_toemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transfer["trf_toemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td>Rp. <?php echo $Transfer["trf_amount"] ?></td>
                                    <td <?php if($i == $QueryTransfer): ?> class="rounded-br-xl" <?php endif ?>><?php echo $Transfer["trf_type"] ?></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if($QueryTransfer == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="8" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Transfer Section -->

        <!-- Transaction Section -->
        <section id="transaction" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan email/id/id pekerjaan/nilai"><button name="search-transaction" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full overflow-x-auto backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Transaksi (<?php $QueryTransaction = mysqli_num_rows($Data4); echo $QueryTransaction ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryTransaction){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">Id</td><td>Id Pekerjaan</td><td>Waktu Transaksi</td><td>Pengirim</td><td>Penerima</td><td class="rounded-tr-xl">Nilai</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1; while($Transaction = mysqli_fetch_assoc($Data4)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($j == $QueryTransaction): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $Transaction["trx_id"] ?></td>
                                    <td>work-<?php echo $Transaction["trx_workid"] ?></td>
                                    <td><?php echo date('H:i d M Y', strtotime($Transaction["trx_date"])) ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transaction["trx_fromemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transaction["trx_fromemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Transaction["trx_toemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Transaction["trx_toemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td <?php if($j == $QueryTransaction): ?> class="rounded-br-xl" <?php endif ?>>Rp. <?php echo $Transaction["trx_amount"] ?></td>
                                </tr>
                                <?php $j++; endwhile ?>
                                <?php if($QueryTransaction == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="7" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Transaction Section -->
    </main>
    <!-- End of Main -->
    
    <!-- Client Detail Pop Up -->
    <?php if(isset($Data5) && isset($_POST["client-detail"])){ CallFileApp::RequireOnceData("Views/Admin/Templates/Part/ClientDetail.php", $Data5); } ?>
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