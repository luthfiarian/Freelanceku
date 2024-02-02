<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Detail Pekerjaan</title>
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

    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Detail Pekerjaan - #work-$Data4->id - " . ($Data4->work_status == 0 ? "Berjalan" : "Selesai")) ?>
        <!-- End of Routes Page Section -->
        
        <!-- Update Work Section -->
        <section id="update-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Update Pekerjaan&nbsp;</p>
                    <form action="" method="post" class="w-full" enctype="multipart/form-data" style="display: none;">
                        <div class="w-full flex flex-warp">
                            <input type="hidden" name="id" value="work-<?php echo $Data4->id ?>">
                            <div class="w-1/2 mr-1">
                                <label for="name" class="text-xs md:text-sm block">Nama Pekerjaan*</label>
                                <input type="text" name="name" value="<?php echo $Data4->work_name ?>" id="name" class="px-4 text-xs md:text-base rounded-full mt-2 w-full" required placeholder="Nama Pekerjaan anda">
                            </div>
                            <div class="w-1/2">
                                <label for="date" class="text-xs md:text-sm block">Waktu Kerja Selesai*</label>
                                <input type="date" name="date" id="date" value="<?php echo date("d-m-Y", strtotime($Data4->work_finishdate)); ?>" class="px-4 text-xs md:text-base rounded-full mt-2 w-full" required>
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
                                <input type="number" name="salary" id="salary" value="<?php echo $Data4->work_salary ?>" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp mt-1">
                            <div class="w-1/2 mr-1">
                                <label for="maxuser" class="text-xs md:text-sm block">Jumlah Mitra*</label>
                                <input type="number" name="maxuser" id="maxuser" value="<?php echo $Data4->work_maxuser ?>" min="1" max="3" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required>
                            </div>
                            <div class="w-1/2">
                                <label for="fieldwork" class="text-xs md:text-sm block">Bidang Pekerjaan*</label>
                                <input type="text" name="fieldwork" id="fieldwork" value="<?php echo $Data4->work_field ?>" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required placeholder="UI/UX, Desain, Front-end">
                            </div>
                        </div>
                        <label class="text-xs md:text-sm" for="des-jsob">Deskripsi Pekerjaan*</label>
                        <textarea name="desc" id="des-job" cols="30" rows="1" class="px-4 text-xs md:text-base rounded-lg mt-2 w-full border" required><?php echo $Data4->work_des ?></textarea>
                        <input type="submit" name="update-work" value="Edit Pekerjaan" class="w-full mt-2 text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">
                    </form>
                    <form action="" method="post" style="display: none;"><input type="hidden" name="id" class="w-full" value="<?php echo "work-" . $Data4->id ?>"><button name="delete-work" type="submit" class="w-full mt-2 text-center bg-red-600 text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-opacity-80">Hapus Pekerjaan</button></form>
                    <button id="showContentBtn" class="w-full mt-2 text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">Lihat Konten</button>
                </div>
            </div>
        </section>
        <!-- End of Update Work Section -->

    </main>
        
    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/NavbarBottom.php") ?>
    <!-- End of Nabar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Footer.php") ?>
    <!-- End of Footer -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce("Views/Templates/Part/Javascript.php"); ?>
    <!-- Hidden Content of Update Work -->
    <script>document.getElementById("showContentBtn").addEventListener("click",function(){document.querySelectorAll("form").forEach(function(e){"none"===e.style.display?e.style.display="block":e.style.display="none"})});</script>
    <!-- End of Javascript -->
</body>
</html>