<!DOCTYPE html>
<html lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Pekerjaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data2, $Data3) ?>
        <!-- End of Navbar -->
    </header>

    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Pekerjaan") ?>
        <!-- End of Routes Page Section -->
        
        <!-- Create Work Section -->
        <section id="create-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Buat Pekerjaan&nbsp;</p>
                    <?php if(($Data2->data_paymentstatus == 1) && !empty($Data3->data->address->street)): ?>
                    <form action="" method="post" class="w-full" enctype="multipart/form-data">
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="name" class="text-xs md:text-sm block">Nama Pekerjaan*</label>
                                <input type="text" name="name" id="name" class="px-4 text-xs md:text-base rounded-full mt-2 w-full" required placeholder="Nama Pekerjaan anda">
                            </div>
                            <div class="w-1/2">
                                <label for="date" class="text-xs md:text-sm block">Waktu Kerja Selesai*</label>
                                <input type="date" name="date" id="date" class="px-4 text-xs md:text-base rounded-full mt-2 w-full" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp mt-1">
                            <div class="w-1/2 mr-1">
                                <label for="photo" class="text-xs md:text-sm block">Foto Latar Belakang</label>
                                <input type="file" name="file" id="photo" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" accept="image/png">
                                <small class="text-[10px] md:text-base text-red-500">*Hanya mendukung file gambar (png) maks 100Kb</small>
                            </div>
                            <div class="w-1/2">
                                <label for="salary" class="text-xs md:text-sm block">Upah*</label>
                                <input type="number" inputmode="numeric" max="50000000" min="50000" name="salary" id="salary" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp mt-1">
                            <div class="w-1/2 mr-1">
                                <label for="maxuser" class="text-xs md:text-sm block">Jumlah Mitra*</label>
                                <input type="number" name="maxuser" id="maxuser" min="1" max="3" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required>
                            </div>
                            <div class="w-1/2">
                                <label for="fieldwork" class="text-xs md:text-sm block">Bidang Pekerjaan*</label>
                                <input type="text" name="fieldwork" id="fieldwork" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required placeholder="UI/UX, Desain, Front-end">
                            </div>
                        </div>
                        <label class="text-xs md:text-sm" for="des-jsob">Deskripsi Pekerjaan*</label>
                        <textarea name="desc" id="des-job" cols="30" rows="1" class="text-justify px-4 text-xs md:text-base rounded-lg mt-2 w-full border" required></textarea>
                        <input type="submit" name="create-work" value="Buat Pekerjaan" class="w-full mt-2 text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">
                    </form>
                    <?php else: ?>
                    <p class="w-full text-center font-semibold my-2">Segera lengkapi data anda 🖐😄</p>
                    <div class="w-full">
                        <?php if($Data2->data_paymentstatus == 0): ?>
                        <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "dashboard" ?>"><button class="text-sm md:text-base rounded-full text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Tambahkan Data Pembayaran Anda</button></a>
                        <?php endif ?>
                        <?php if(empty($Data3->data->address->street)): ?>
                        <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "account" ?>"><button class="text-sm md:text-base rounded-full mt-2 text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Lengkapi Data Alamat Anda</button></a>
                        <?php endif ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <!-- End of Work Section -->

        <!-- History Work Section -->
        <section id="history-work" class="mt-1">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Riwayat Pekerjaan&nbsp;</p>
                    <div class="w-full <?php if(mysqli_num_rows($Data4) > 0){echo "grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4";} else {echo "flex flex-warp py-4";} ?>">
                        <!-- Card Work -->
                        <?php if(mysqli_num_rows($Data4) > 0){ CallFileApp::RequireOnceData("Views/Client/Templates/Part/CardWork.php", $Data4); } ?>
                        <?php if(mysqli_num_rows($Data4) == 0): ?>
                        <p class="py-4 w-full text-center font-semibold">Terlihat tidak ada pekerjaan 👀</p>
                        <?php endif ?>
                        <!-- End of Card Work -->
                    </div>
                    <div class="w-full flex flex-warp mt-5">
                        <nav aria-label="Page navigation example" class="mx-auto">
                            <ul class="flex items-center -space-x-px h-8 text-sm">
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of History Work -->
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