<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Tagihan Pelanggan Admin</title>

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
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Keuangan - Tagihan Pelanggan", "finance/bill"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->
        
        <!-- Confirm Transaction Bill Section -->
        <section id="confirm-bill" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="bill-search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan faktur/email/nilai"><button type="submit" name="bill-confirm" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Permintaan Tagihan (<?php $QueryBillConfirm = mysqli_num_rows($Data3->bill_confirm); echo $QueryBillConfirm ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryBillConfirm){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">Faktur</td><td>Pemohon</td><td>Tanggal</td><td>Nilai</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($Confirm = mysqli_fetch_assoc($Data3->bill_confirm)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($i == $QueryBillConfirm): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $Confirm["bill_trxid"] ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Confirm["bill_email"] ?>"><input type="submit" name="client-detail" value="<?php echo $Confirm["bill_email"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td><?php echo date('H:i d M Y', strtotime($Confirm["bill_date"])) ?></td>
                                    <td>Rp. <?php echo $Confirm["bill_amount"] ?></td>
                                    <td <?php if($i == $QueryBillConfirm): ?> class="rounded-br-xl" <?php endif ?>><form action="" method="post"><input type="hidden" name="bill_email" value="<?php echo $Confirm["bill_email"] ?>"><input type="hidden" name="bill_trxid" value="<?php echo $Confirm["bill_trxid"] ?>"><button name="paynow" type="submit" class="rounded-lg px-2 text-primary bg-secondary">Bayar</button></form></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if($QueryBillConfirm == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="5" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Confirm Transaction Bill Section -->

        <!-- Finish Transaction Bill Section -->
        <section id="finish-bill" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="bill-search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan faktur/email/nilai"><button name="bill-finish" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                    <p class="text-lg">Tagihan Selesai (<?php $QueryBillFinish = mysqli_num_rows($Data3->bill_finish); echo $QueryBillFinish ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryBillFinish){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">Faktur</td><td>Pemohon</td><td>Tanggal</td><td>Nilai</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1; while($Finish = mysqli_fetch_assoc($Data3->bill_finish)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($j == $QueryBillFinish): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $Finish["bill_trxid"] ?></td>
                                    <td><form action="" method="post"><input type="hidden" name="email" value="<?php echo $Finish["bill_email"] ?>"><input type="submit" name="client-detail" value="<?php echo $Finish["bill_email"] ?>" class="rounded-lg px-2 bg-secondary cursor-help"></form></td>
                                    <td><?php echo date('H:i d M Y', strtotime($Finish["bill_date"])) ?></td>
                                    <td>Rp. <?php echo $Finish["bill_amount"] ?></td>
                                    <td <?php if($j == $QueryBillFinish): ?> class="rounded-br-xl" <?php endif ?>><a href="<?php echo BASE_ROOT . $Finish["bill_file"] ?>"><button type="button" class="rounded-lg px-2 text-primary bg-secondary">Lihat Bukti</button></a></td>
                                </tr>
                                <?php $j++; endwhile ?>
                                <?php if($QueryBillFinish == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="5" class="text-center rounded-b-xl">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Finish Transaction Bill Section -->
    </main>
    <!-- End of Main -->

    <?php if(isset($_POST["paynow"])): ?>
    <!-- Modal Bill -->
    <button data-modal-target="paybill" data-modal-toggle="paybill" id="paybillButton" type="button">a</button>
    <!-- Pay Bill Modal -->
    <div id="paybill" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Pay Bill content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Pay Bill header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Faktur Tagihan - [<?php echo $Data4->bill->bill_trxid ?>]</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="paybill">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Pay Bill body -->
                <div class="p-4 md:p-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="user" class="block">Pemohon</label>
                            <input type="text" id="user" class="w-full rounded-full py-2 px-4" value="<?php echo $Data4->bill->bill_email ?>" disabled>
                        </div>
                        <div>
                            <label for="amount" class="block">Nominal</label>
                            <input type="text" id="amount" class="w-full rounded-full py-2 px-4" value="Rp. <?php echo $Data4->bill->bill_amount ?>" disabled>
                        </div>
                        <div>
                            <label for="date" class="block">Tanggal</label>
                            <input type="text" id="date" class="w-full rounded-full py-2 px-4" value="<?php echo date('H:i d M Y', strtotime($Data4->bill->bill_date)) ?>" disabled>
                        </div>
                        <div>
                            <label for="paymentid" class="block">Rekening</label>
                            <input type="text" id="paymentid" class="w-full rounded-full py-2 px-4" value="<?php echo "{$Data4->bank->bank_name} - ({$Data4->userdb->data_paymentcode}) {$Data4->userdb->data_paymentid}" ?>" disabled>
                        </div>
                        <div>
                            <label for="file" class="block">Unggah Bukti Berkas*</label>
                            <input type="file" id="file" name="file" class="w-full rounded-lg border py-2 px-4" accept=".pdf" required>
                            <small class="text-red-500">*Berkas PDF dan maksimal 2Mb</small>
                        </div>
                        <input type="hidden" name="bill_trxid" value="<?php echo $Data4->bill->bill_trxid ?>">
                        <input type="hidden" name="email" value="<?php echo $Data4->userdb->data_email ?>">
                        <button type="submit" name="upload" class="w-full py-2 rounded-lg text-primary bg-secondary hover:bg-third">Konfirmasi Tagihan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- End of Modal Bill -->
    
    <?php endif ?>

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
    <script type="text/javascript">window.onload = function () {document.getElementById("userDetail").click(); }; $(document).ready(function() {$("#userDetail").click(); }); window.onload = function() { document.getElementById("paybillButton").click();}; $(document).ready(function() {$("#paybillButton").click(); });</script>
    <!-- End of Javascript -->
</body>

</html>