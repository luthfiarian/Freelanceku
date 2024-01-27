<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Pekerjaan</title>

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
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Pekerjaan") ?>
        <!-- End of Routes Page Section -->
        
        <!-- Create Work Section -->
        <section id="create-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Buat Pekerjaan&nbsp;</p>
                    <form action="" method="post" class="w-full">
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="name" class="text-sm block">Judul Pekerjaan</label>
                                <input type="text" name="name" id="name" class="px-4 rounded-full mt-2 w-full" required>
                            </div>
                            <div class="w-1/2">
                                <label for="date" class="text-sm block">Waktu Kerja Selesai</label>
                                <input type="date" name="date" id="date" class="px-4 rounded-full mt-2 w-full" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp mt-1">
                            <div class="w-1/2 mr-1">
                                <label for="photo" class="block">Foto Latar Belakang</label>
                                <input type="file" name="photo" id="photo" class="px-4 rounded-full mt-2 w-full border" required>
                                <small class="text-red-500">*Maksimal ukuran foto 100kb</small>
                            </div>
                            <div class="w-1/2">
                                <label for="salary" class="block">Upah</label>
                                <input type="number" name="salary" id="salary" class="px-4 rounded-full mt-2 w-full border" required>
                            </div>
                        </div>
                        <label for="des-jsob">Deskripsi Pekerjaan</label>
                        <textarea name="des-job" id="des-job" cols="30" rows="1" class="px-4 rounded-lg mt-2 w-full border" required></textarea>
                        <input type="submit" value="Buat Pekerjaan" class="w-full text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">
                    </form>
                </div>
            </div>
        </section>
        <!-- End of Work Section -->

        <!-- History Work Section -->
        <section id="history-work" class="mt-1">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Riwayat Pekerjaan&nbsp;</p>
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