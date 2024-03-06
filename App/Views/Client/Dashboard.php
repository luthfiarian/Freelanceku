<!DOCTYPE html>
<html lang="<?php echo $Data1->seo_lang ?>">

<head>
    <title>Freelanceku | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

    <script type="text/javascript" src="<?php echo TRX_URL_APP ?>snap.js" data-client-key="<?php echo TRX_CLIENTKEY ?>"></script>
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
                    <div class="w-2/3 mr-1 flex flex-warp py-2 px-4 rounded-lg bg-gradient-to-r from-third to-secondary text-primary shadow-lg">
                        <div class="w-1/3 lg:w-1/6 mr-1 md:mr-0 self-center">
                            <img src="<?php echo $Data3->data_photo ?>" alt="Profil" class="!w-[75px] md:!w-[100px] !h-[75px] md:!h-[100px] rounded-full shadow-sm">
                        </div>
                        <div class="w-2/3 lg:w-5/6 mt-2 self-center">
                            <p class="text-sm md:text-lg">Hai! <?php echo $Data4->data->identity->first_name; ?> 🖐</p>
                            <p class="text-xs md:text-sm">
                                <span class="font-semibold"><?php echo $Data3->data_email ?> </span><br>
                                <?php echo "+" . $Data4->data->identity->phone; ?>
                            </p>
                        </div>
                    </div>
                    <div class="w-1/3 py-2 px-4 border rounded-lg bg-gradient-to-l from-third to-secondary text-primary">
                        <?php if($Data3->data_paymentstatus == 0): ?>
                        <button data-modal-target="add-payment" data-modal-toggle="add-payment" type="button" class="text-sm md:text-base rounded-full text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Tambah Pembayaran</button>
                        <?php elseif($Data3->data_paymentstatus == 1): ?>
                        <p class="w-full py-2 px-1 font-medium">Rp. <span class="text-right"><?php echo $Data3->data_balance ?></span></p>
                        <button data-modal-target="req-withdraw" data-modal-toggle="req-withdraw" type="button" class="text-xs md:text-base rounded-full text-center w-full border py-1 mt-0.5 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Tarik Saldo</button>
                        <button id="historyMoney" data-modal-target="history_money" data-modal-toggle="history_money" class="text-xs md:text-base rounded-full text-center w-full border py-1 mt-0.5 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Riwayat Keuangan</button>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Account Section -->

        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Dashboard") ?>
        <!-- End of Routes Page Section -->

        <!-- Search Work Section -->
        <section id="search-work" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="w-2/3 px-4 py-2 rounded-lg mr-1 border">
                        <form action="" method="post" class="w-full flex flex-warp">
                            <input type="search" name="work"  <?php if(isset($_POST["search"])){ echo "name='{$_POST["work"]}'"; } ?> class="text-sm md:text-base w-2/3 rounded-l-full px-4" placeholder="Cari Mitra Kerja" autofocus autocomplete="off">
                            <button type="submit" name="search" class="text-sm md:text-base w-1/3 rounded-r-full font-medium bg-secondary text-center hover:bg-forth text-primary">Cari</button>
                        </form>
                    </div>
                    <div class="w-1/3 px-1 py-2 rounded-lg border">
                        <a href="<?php echo BASE_URI . "work#create-work"?>"><button class="w-full text-xs md:text-base text-center font-semibold rounded-full py-2 border duration-300 ease-in-out hover:bg-secondary hover:text-primary">Buat Pekerjaan</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Search Work Section -->
        
        <?php if((isset($_POST["search"]) && isset($Data7))): ?>
        <!-- Search Result Section -->
        <section id="search-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Mencari : <?php echo $_POST["work"] ?>&nbsp;</p>
                    <?php if(mysqli_num_rows($Data7) == 0): ?>
                    <p class="w-full py-4 text-center font-semibold text-sm md:text-base">Maaf kata kunci yang anda cari tidak ada 😥</p>
                    <?php else: ?>
                    <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                        <?php CallFileApp::RequireOnceData4("Views/Client/Templates/Part/SearchCardWork.php", $Data3, $Data4, $Data6, $Data7) ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <!-- End of Search Result Section -->
        <?php endif ?>

        <?php if(!isset($_POST["search"]) && (isset($Data6) && isset($Data7))): ?>
        <!-- Search Result Section -->
        <section id="search-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Daftar Pekerjaan Terbaru&nbsp;</p>
                    <?php if(mysqli_num_rows($Data7) == 0): ?>
                    <p class="w-full py-4 text-center font-semibold text-sm md:text-base">Tidak ada pekerjaan terbaru</p>
                    <?php else: ?>
                    <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                        <?php CallFileApp::RequireOnceData4("Views/Client/Templates/Part/SearchCardWork.php", $Data3, $Data4, $Data6, $Data7) ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <!-- End of Search Result Section -->
        <?php endif ?>

        <!-- History Partner & Income Section -->
        <section class="mt-1">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <!-- Partner -->
                    <div class="w-full md:w-1/2 my-4 pb-2 pt-4 px-4 rounded-lg relative border mr-0.5 md:mr-1">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Mitra&nbsp;</p>
                        <div class="relative w-full mt-1 overflow-y-auto" <?php $Partner = mysqli_num_rows($Data5->work); if($Partner > 3):  ?>  style="height: 13rem;" <?php endif ?>>
                            <?php if($Partner): ?>
                            <table class="w-full table table-auto">
                                <tbody>
                                <?php
                                    $processedPartners = []; // Inisialisasi array untuk menyimpan data yang telah diproses

                                    while ($Partner = mysqli_fetch_assoc($Data5->work)) {
                                        // Pengecekan dan penambahan ke array processedPartners
                                        if (!empty($Partner["work_partner1"]) && !in_array($Partner["work_partner1"], $processedPartners)) {
                                            $processedPartners[] = $Partner["work_partner1"]; // Tambahkan ke array processedPartners
                                            echo "<tr><td class='py-2'><img width='25px' src='" . BASE_ROOT . "Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner1']}</td><td><a href='mailto:{$Partner["work_partner1"]}'><button type='button' class='py-1 px-2 rounded-lg text-primary bg-secondary hover:bg-third'>Hubungi</button></a></td></tr>";
                                        }
                                        // Lakukan hal yang sama untuk work_partner2 dan work_partner3
                                        if (!empty($Partner["work_partner2"]) && !in_array($Partner["work_partner2"], $processedPartners)) {
                                            $processedPartners[] = $Partner["work_partner2"]; // Tambahkan ke array processedPartners
                                            echo "<tr><td class='py-2'><img width='25px' src='" . BASE_ROOT . "Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner2']}</td><td><a href='mailto:{$Partner["work_partner2"]}'><button type='button' class='py-1 px-2 rounded-lg text-primary bg-secondary hover:bg-third'>Hubungi</button></a></td></tr>";
                                        }
                                        // Lakukan hal yang sama untuk work_partner3
                                        if (!empty($Partner["work_partner3"]) && !in_array($Partner["work_partner3"], $processedPartners)) {
                                            $processedPartners[] = $Partner["work_partner3"]; // Tambahkan ke array processedPartners
                                            echo "<tr><td class='py-2'><img width='25px' src='" . BASE_ROOT . "Public/dist/image/user-photo.png'></td><td class='py-1'>{$Partner['work_partner3']}</td><td><a href='mailto:{$Partner["work_partner3"]}'><button type='button' class='py-1 px-2 rounded-lg text-primary bg-secondary hover:bg-third'>Hubungi</button></a></td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php else : ?>
                            <p class="w-full text-center py-2">Tidak ada data 👀</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Income -->
                    <?php $Income = mysqli_num_rows($Data5->income); ?>
                    <div class="w-full md:w-1/2 my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Pendapatan&nbsp;</p>
                        <div class="relative w-full mt-1 overflow-y-auto" <?php if($Income > 3): ?> style="height: 13rem;" <?php endif ?>>
                            <?php if($Income) : $Date = NULL; ?>
                            <table class="table table-auto w-full">
                                <?php 
                                    while($IncomeData = mysqli_fetch_assoc($Data5->income)):
                                    if(date('M Y', strtotime($IncomeData["trx_date"])) != $Date):
                                ?>
                                <tr>
                                    <td colspan="4"><?php echo $IncomeData["trx_date"]; $Date = date('M Y', strtotime($IncomeData["trx_date"]));?></td>
                                </tr>
                                <?php endif ?>
                                <tr>
                                    <td><?php echo $IncomeData["trx_id"] ?></td>
                                    <td>Rp. <?php echo $IncomeData["trx_amount"] ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                            <?php else : ?>
                            <p class="w-full text-center py-2">Tidak ada data 👀</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of History Partner & Income -->
    </main>
    <!-- End of Main -->

    <?php if($Data3->data_paymentstatus == 1): ?>
    <!-- Withdraw Modal -->
    <div id="req-withdraw" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Withdraw content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Withdraw header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Tarik Saldo</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="req-withdraw">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Withdraw body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="">
                        <div>
                            <label for="now" class="block mb-2 text-sm font-medium text-gray-900">Saldo saat ini</label>
                            <input type="text" value="Rp. <?php echo $Data3->data_balance ?>" id="now" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" disabled>
                        </div>
                        <div>
                            <label for="balance" class="block mb-2 text-sm font-medium text-gray-900">Jumlah saldo yang di tarik</label>
                            <input type="number" inputmode="numeric" min="50000" max="<?php echo $Data3->data_balance ?>" name="balance" id="balance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="50000" required>
                        </div>
                        <div class="flex items-center">
                            <input id="link-checkbox" name="data_paymentstatus" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 " required>
                            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dengan ini saya yakin untuk melakukan tarik saldo</label>
                        </div>
                        <button name="withdraw" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tarik Saldo</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- End of Withdraw Modal -->

    <!-- History Money Modal -->
    <div id="history_money" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-full max-h-full">
            <!-- Modal History Money content -->
            <div class="relative backdrop-blur-md bg-white/75 rounded-lg shadow-lg">
                <!-- Modal History Money header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Riwayat Keuangan</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="history_money">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal History Money body -->
                <div class="p-4 md:p-5">
                    <div class="w-full flex-none md:flex">
                        <!-- History Transfer -->
                        <script type="text/javascript" src="<?php echo TRX_URL_APP ?>snap.js" data-client-key="<?php echo TRX_CLIENTKEY ?>"></script>
                        <?php $TransferRows = mysqli_num_rows($Data5->transfer); $TransferDisabled = (empty($TransferRows) ? "disabled" : "") || isset($_POST["transfer"]) ? "" : "";?>
                        <div class="w-full md:w-1/2 mr-0 md:mr-2">
                            <h2 class="w-fit font-medium py-1 px-2 bg-forth text-primary rounded-lg">Riwayat Transfer</h2>
                            <form action="" method="post" class="w-full flex mt-1"><input type="text" name="history" id="" class="py-1 px-2 w-2/3 rounded-l-full ease-in-out duration-300 transition hover:shadow-md" autocomplete="off" value="<?php echo (isset($_POST["transfer"]) && isset($_POST["history"])) ? $_POST["history"] : "" ?>" placeholder="Cari Riwayat Transfer" <?php echo $TransferDisabled ?>><button type="submit" name="transfer" class="w-1/3 rounded-r-full text-primary bg-secondary hover:bg-third hover:shadow-md"<?php echo $TransferDisabled ?>>Cari</button></form>
                            <?php if($TransferRows) :  ?>
                            <div class="w-full mt-2 rounded-lg" <?php if($TransferRows > 5): ?> style="height: 10rem; overflow-y: auto;" <?php endif ?>>
                                <table class="table table-auto w-full text-center text-ellipsis text-sm lg:text-base mx-auto rounded-lg">
                                    <thead class="bg-emerald-600 text-primary font-medium sticky top-0">
                                        <tr>
                                            <td class="rounded-tl-xl">No</td><td>Id</td><td>Id Pekerjaan</td><td>Penerima</td><td>Status</td><td>Nominal</td><td>Waktu</td><td class="rounded-tr-xl">Info</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; while($Trf = mysqli_fetch_assoc($Data5->transfer)): ?>
                                        <tr class="ease-in-out text-center duration-150 transition hover:bg-opacity-80 bg-emerald-400">
                                            <td <?php if($i == $TransferRows): ?> class="rounded-bl-lg" <?php endif ?>><?php echo $i ?></td>
                                            <td><?php echo $Trf["trf_id"] ?></td>
                                            <td><?php echo $Trf["trf_workid"] ?></td>
                                            <td><?php echo $Trf["trf_toemail"] ?></td>
                                            <td><?php echo $Trf["trf_status"] ?></td>
                                            <td>Rp. <?php echo $Trf["trf_amount"] ?></td>
                                            <td><?php echo date('d-m-y H:i', strtotime($Trf["trf_date"])) ?></td>
                                            <td <?php if($i == $TransferRows): ?> class="rounded-br-lg" <?php endif ?>><?php if($Trf["trf_status"] == "Berlangsung") : $Token = $Trf["trf_token"] ?> <button type="button" onclick="window.snap.pay('<?php echo $Token ?>')" class="py-1 px-2 text-primary bg-secondary hover:bg-third rounded-lg">Bayar</button> <?php else: ?>-<?php endif ?></td>
                                        </tr>
                                        <?php $i++; endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else :  ?>
                            <p class="w-full py-4 rounded-lg border text-center mt-1.5">Tidak ada data 👀</p>
                            <?php endif ?>
                        </div>
                        <!-- History Bill -->
                        <div class="w-full md:w-1/2">
                            <h2 class="w-fit font-medium py-1 px-2 bg-forth text-primary rounded-lg">Riwayat Tarik Saldo</h2>
                            <?php $BillRows = mysqli_num_rows($Data5->bill); $BillDisabled = (empty($BillRows) ? "disabled" : "") || isset($_POST["bill"]) ? "" : "";?>
                            <form action="" method="post" class="w-full flex mt-1"><input type="text" name="history" id="" class="py-1 px-2 w-2/3 rounded-l-full ease-in-out duration-300 transition hover:shadow-md" value="<?php echo (isset($_POST["bill"]) && isset($_POST["history"])) ? $_POST["history"] : "" ?>" autocomplete="off" placeholder="Cari Riwayat Transfer" <?php echo $BillDisabled ?>><button type="submit" name="bill" class="w-1/3 rounded-r-full text-primary bg-secondary hover:bg-third hover:shadow-md" <?php echo $BillDisabled ?>>Cari</button></form>
                            <?php if($BillRows) :  ?>
                            <div class="w-full mt-2 rounded-lg" <?php if($BillRows > 5): ?> style="height: 10rem; overflow-y: auto;" <?php endif ?>>
                                <table class="table table-auto w-full text-center text-ellipsis text-sm lg:text-base mx-auto rounded-lg">
                                    <thead class="bg-emerald-600 text-primary font-medium sticky top-0">
                                        <tr>
                                            <td class="rounded-tl-xl">No</td><td>Faktur</td><td>Status</td><td>Nominal</td><td>Waktu</td><td class="rounded-tr-xl">Info</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j = 1; while($Bill = mysqli_fetch_assoc($Data5->bill)): ?>
                                        <tr class="ease-in-out text-center duration-150 transition hover:bg-opacity-80 bg-emerald-400">
                                            <td <?php if($j == $BillRows): ?> class="rounded-bl-lg" <?php endif ?>><?php echo $j ?></td>
                                            <td><?php echo $Bill["bill_trxid"] ?></td>
                                            <td><?php echo $Bill["bill_status"] ?></td>
                                            <td>Rp. <?php echo $Bill["bill_amount"] ?></td>
                                            <td><?php echo date('d-m-y H:i', strtotime($Bill["bill_date"])) ?></td>
                                            <td <?php if($j == $BillRows): ?> class="rounded-br-lg" <?php endif ?>><?php if($Bill["bill_status"] == "Berhasil") : ?> <form action="" class="w-full" method="post"><input type="hidden" name="invoice" value="<?php echo $Bill["bill_trxid"] ?>"><button type="submit" class="py-1 px-2 text-primary bg-secondary hover:bg-third rounded-lg">Faktur</button></form> <?php else: ?>-<?php endif ?></td>
                                        </tr>
                                        <?php $j++; endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else :  ?>
                            <p class="w-full py-4 rounded-lg border text-center mt-1.5">Tidak ada data 👀</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End of History Money Modal -->
    <?php endif; if(isset($_POST["invoice"])): ?>
    <button data-modal-target="invoice" data-modal-toggle="invoice" id="invoiceButton" type="button" class="hidden" hidden>Invoice</button>
    <!-- Withdraw Modal -->
    <div id="invoice" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Withdraw content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Withdraw header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Faktur - [<?php echo $Data5->invoice->bill_trxid ?>]</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="invoice">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Withdraw body -->
                <div class="p-4 md:p-5">
                    <p class="w-full text-center text-lg md:text-xl text-green-400">Berhasil Menarik Saldo</p>
                    <p class="w-full text-center text-sm">Telah Dikirim ke (<?php echo $Data3->data_paymentid ?>)</p>
                    <p class="w-full text-center">Rp. <?php echo $Data5->invoice->bill_amount ?></p>
                    <div class="w-full flex mt-2">
                        <a href="<?php echo BASE_ROOT . $Data5->invoice->bill_file ?>" class="mx-auto">
                            <button type="button" class="py-2 flex px-4 text-primary bg-red-500 hover:shadow-lg hover:bg-red-700">
                                <svg viewBox="0 0 1024 1024" width="25px" height="25px" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M731.15 585.97c-100.99 0-182.86 81.87-182.86 182.86s81.87 182.86 182.86 182.86 182.86-81.87 182.86-182.86-81.87-182.86-182.86-182.86z m0 292.57c-60.5 0-109.71-49.22-109.71-109.71s49.22-109.71 109.71-109.71c60.5 0 109.71 49.22 109.71 109.71s-49.21 109.71-109.71 109.71z" fill="#ffffff"></path><path d="M718.01 778.55l-42.56-38.12-36.6 40.86 84.02 75.26 102.98-118.46-41.4-36zM219.51 474.96h219.43v73.14H219.51z" fill="#ffffff"></path><path d="M182.61 365.86h585.62v179.48h73.14V145.21c0-39.96-32.5-72.48-72.46-72.48h-27.36c-29.18 0-55.04 16.73-65.88 42.59-5.71 13.64-27.82 13.66-33.57-0.02-10.86-25.86-36.71-42.57-65.88-42.57h-18.16c-29.18 0-55.04 16.73-65.88 42.59-5.71 13.64-27.82 13.66-33.57-0.02-10.86-25.86-36.71-42.57-65.88-42.57H375.3c-29.18 0-55.04 16.73-65.88 42.59-5.71 13.64-27.82 13.66-33.57-0.02-10.86-25.86-36.71-42.57-65.88-42.57H182.4c-39.96 0-72.48 32.52-72.48 72.48v805.14h401.21v-73.14H183.04l-0.43-511.35z m25.81-222.29c14.25 34.09 47.32 56.11 84.23 56.11 36.89 0 69.96-22.02 82.66-53.8l15.86-2.3c14.25 34.09 47.32 56.11 84.23 56.11 36.89 0 69.96-22.02 82.66-53.8l16.59-2.3c14.25 34.09 47.32 56.11 84.23 56.11 36.89 0 69.96-22.02 82.66-53.8l26.68-0.66v147.5H182.54l-0.13-146.84 26.01-2.33z" fill="#ffffff"></path></g></svg>
                                Unduh Faktur
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End of Withdraw Modal -->
    <?php endif ?>

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

    <!-- Search Transfer, Bill, Invoice, & Transaction Javascript -->
    <?php if(isset($_POST["transfer"]) || isset($_POST["bill"]) || isset($_POST["trx"])): ?>
    <script>window.onload = function () {document.getElementById("historyMoney").click(); };</script>
    <?php elseif(isset($_POST["invoice"])): ?>
    <script>window.onload = function () {document.getElementById("invoiceButton").click(); };</script>
    <?php endif ?>
    <!-- End of Search Transfer, Bill, Invoice & Transaction Javascript -->

</body>

</html>