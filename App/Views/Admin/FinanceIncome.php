<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Freelancer Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
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
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Keuangan - Pendapatan", "finance/income"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Overall Income & Midtrans Section -->
        <section id="income-midtrans" class="mt-5">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="py-2 px-4 w-1/2 mr-2 rounded-lg shadow-lg text-primary bg-emerald-600">
                        <p class="text-sm md:text-base font-medium md:font-semibold w-full">Jumlah Pendapatan Situs</p>
                        <p class="w-full">Rp. <span class="text-right"><?php echo $Data3->net_income ?></span></p>
                    </div>
                    <div class="py-2 px-4 w-1/2 rounded-lg shadow-lg text-primary bg-third">
                        <p class="text-sm md:text-base font-medium md:font-semibold w-full">Jumlah Biaya Midtrans</p>
                        <p class="w-full">Rp. <span class="text-right"><?php echo $Data3->midtrans ?></span></p>
                    </div>
                </div>
                <div class="w-full flex flex-warp mt-2">
                    <div class="py-2 px-4 w-1/2 mr-2 rounded-lg shadow-lg text-primary bg-slate-600">
                        <p class="text-sm md:text-base font-medium md:font-semibold w-full">Jumlah Uang Pelanggan</p>
                        <p class="w-full">Rp. <span class="text-right"><?php echo $Data3->amount_user ?></span></p>
                    </div>
                    <div class="py-2 px-4 w-1/2 rounded-lg shadow-lg text-primary bg-rose-400">
                        <p class="text-sm md:text-base font-medium md:font-semibold w-full">Jumlah Uang Keluar Pelanggan</p>
                        <p class="w-full">Rp. <span class="text-right"><?php echo $Data3->payout_user ?></span></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Overal Income & Midtrans Section -->

        <!-- Tax Section -->
        <section id="tax" class="mt-5">
            <div class="container">
                <div class="w-full flex-none md:flex">
                    <!-- Tax Configuration -->
                    <div class="w-full md:w-1/2 rounded-lg p-4 shadow-lg mr-0 md:mr-2 bg-teal-600 text-sm md:text-base">
                        <form action="" method="post" class="w-full">
                            <div>
                                <label for="tax" class="block text-primary">Pajak Situs*</label>
                                <div class="w-full flex"><input type="number" name="tax_pay" id="tax" inputmode="numeric" min="1" max="100" value="<?php echo $Data3->tax->tax_pay ?>" placeholder="Presentase 1-100" class="w-10/12 rounded-l-full px-4 py-1" required><p class="w-2/12 text-center self-center py-1 rounded-r-full bg-primary">/ 100</p></div>
                            </div>
                            <div>
                                <label for="midtrans" class="block text-primary">Pajak Mitrans*</label>
                                <input type="number" name="tax_midtrans" id="midtrans" inputmode="numeric" min="0" max="100000" value="<?php echo $Data3->tax->tax_midtrans ?>" class="w-full rounded-full px-4 py-1" required>
                            </div>
                            <div>
                                <label for="method" class="block text-primary">Tambah Metode Pembayaran</label>
                                <div class="w-full flex">
                                    <input type="text" name="method" id="method" placeholder="Nama Bank" class="w-1/2 rounded-l-full px-4 py-1">
                                    <input type="tel" name="id_method" id="method" inputmode="numeric" min="1" max="100000" placeholder="Kode Virtual Account" class="w-1/2 rounded-r-full px-4 py-1">
                                </div>
                            </div>
                            <button type="submit" name="tax-config" class="w-full rounded-full mt-2 py-1 bg-secondary text-primary ease-in-out duration-300 transition hover:bg-third">Ubah dan Tambah</button>
                        </form>
                    </div>
                    <!-- List of Bank -->
                    <div class="w-full md:w-1/2 backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 text-sm md:text-base mt-2 md:mt-0">
                        <p class="text-lg">Bank (<?php $QueryBank = mysqli_num_rows($Data3->bank); echo $QueryBank ?>)</p>
                        <div class="w-full" style="<?php if(10 <= $QueryBank){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                            <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                                <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                    <tr>
                                        <td class="rounded-tl-xl">No</td><td>Nama Bank</td><td>Kode Virtual Account</td><td class="rounded-tr-xl">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1; while($Bank = mysqli_fetch_assoc($Data3->bank)): ?>
                                    <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                        <td <?php if($k == $QueryBank): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $k ?></td>
                                        <td><?php echo $Bank["bank_name"] ?></td>
                                        <td><?php echo $Bank["bank_code"] ?></td>
                                        <td <?php if($k == $QueryBank): ?> class="rounded-br-xl" <?php endif ?>><form action="" method="post"><input type="hidden" name="id" value="<?php echo $Bank["id"] ?>"><input type="hidden" name="bank_name" value="<?php echo $Bank["bank_name"] ?>"><button type="submit" name="delete-bank" class="text-primary py-0.5 px-1 bg-red-500 hover:bg-red-700 rounded-lg">Hapus</button></form></td>
                                    </tr>
                                    <?php $k++; endwhile ?>
                                    <?php if($QueryBank == 0): ?>
                                    <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                        <td colspan="4" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Tax Section -->

        <!-- Income Section -->
        <section id="income" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan email/id/nilai"><button name="search-income" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Pendapatan (<?php $QueryIncome = mysqli_num_rows($Data4); echo $QueryIncome ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryIncome){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">Id</td><td>Waktu Transaksi</td><td>Pengirim</td><td class="rounded-tr-xl">Nilai</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1; while($Income = mysqli_fetch_assoc($Data4)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($j == $QueryIncome): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $Income["income_trxid"] ?></td>
                                    <td><?php echo date('H:i d M Y', strtotime($Income["income_date"])) ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Income["income_fromemail"] ?>"><input type="submit" name="client-detail" value="<?php echo $Income["income_fromemail"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td <?php if($j == $QueryIncome): ?> class="rounded-br-xl" <?php endif ?>>Rp. <?php echo $Income["income_amount"] ?></td>
                                </tr>
                                <?php $j++; endwhile ?>
                                <?php if($QueryIncome == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="4" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Income Section -->
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
</body>

</html>