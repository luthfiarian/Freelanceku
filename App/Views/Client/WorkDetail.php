<!DOCTYPE html>
<html lang="<?php echo $Data1->seo_lang ?>">

<head>
    <title>Freelanceku | Detail Pekerjaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>
    
    <script type="text/javascript" src="<?php echo TRX_URL_APP ?>snap.js" data-client-key="<?php echo TRX_CLIENTKEY ?>"></script>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data2, $Data3) ?>
        <!-- End of Navbar -->
    </header>
    
    <?php if($Data4->work_status == 0){if(date("Y-m-d") >= date("Y-m-d", strtotime($Data4->work_finishdate))){ $_SESSION["STATUS_ERR_REQWORK"] = "Mohon segera dikonfirmasi selesai pekerjaan, karena jadwalnya adalah hari ini. Jika tidak segera melakukan perpanjangan waktu di sunting pekerjaan!"; }} ?>
    
    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Detail Pekerjaan - #work-$Data4->id - " . ($Data4->work_status == 0 ? "Berjalan" : "Selesai")) ?>
        <!-- End of Routes Page Section -->
        
        <!-- About Work Section -->
        <section id="about-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Tentang Pekerjaan&nbsp;</p>
                    <div class="w-full flex">
                        <div class="w-1/3 md:w-1/4 mr-1">
                            <div class="w-full h-fit border rounded-lg group ease-linear duration-300 hover:shadow-lg relative">
                                <p class="text-xs md:text-base text-center font-semibold absolute top-[40%] z-10 left-0 right-0 text-primary ease-linear duration-300 group-hover:p-0.5 group-hover:bg-primary group-hover:text-black">#WORK-<?php echo $_SESSION["WORK_DETAIL"] ?></p>
                                <img src="<?php echo BASE_ROOT . $Data4->work_image ?>" width="150px" height="150px" class="mx-auto rounded-lg -z-20 grayscale ease-in-out duration-300 group-hover:grayscale-0" alt="Latar belakang #work-<?php echo $_SESSION["WORK_DETAIL"] ?>">
                            </div>
                        </div>
                        <div class="w-2/3 md:w-3/4 flex">
                            <table class="table table-auto w-full text-sm md:text-base">
                                <tr><td colspan="3"><p class="font-semibold"><?php echo $Data4->work_name ?></p></td></tr>
                                <tr><td>Tanggal Dibuat</td><td>:</td><td><?php echo $Data4->work_startdate ?></td></tr>
                                <tr><td>Tanggal Selesai</td><td>:</td><td><?php echo $Data4->work_finishdate ?></td></tr>
                                <tr><td>Deskripsi</td><td>:</td><td class="text-justify"><?php echo $Data4->work_des ?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of About Work Section -->

        <!-- Partner Section -->
        <section id="update-work" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp my-4">
                    <!-- Partner Work -->
                    <div class="w-full md:w-2/3 mr-1 pb-2 pt-4 px-4 rounded-lg relative border h-auto">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Mitra Pekerjaan&nbsp;</p>
                        <?php if (!empty($Data4->work_partner1) || !empty($Data4->work_partner2) || !empty($Data4->work_partner3)) : ?>
                            <?php 
                                if(!empty($Data4->work_partner1)){
                                    CallFileApp::RequireOnceData5("Views/Client/Templates/Part/WorkDetailPartner.php", (object) $Data5->FetchUserDataDB($Data4->work_partner1), (object) $Data5->WorkPartnerDetailDB($_SESSION["WORK_DETAIL"], $Data4->work_partner1), $Data4, $Data2, $Data6);
                                }
                                if(!empty($Data4->work_partner2)){
                                    CallFileApp::RequireOnceData5("Views/Client/Templates/Part/WorkDetailPartner.php", (object) $Data5->FetchUserDataDB($Data4->work_partner2), (object) $Data5->WorkPartnerDetailDB($_SESSION["WORK_DETAIL"], $Data4->work_partner2), $Data4, $Data2, $Data6);
                                }
                                if(!empty($Data4->work_partner3)){
                                    CallFileApp::RequireOnceData5("Views/Client/Templates/Part/WorkDetailPartner.php", (object) $Data5->FetchUserDataDB($Data4->work_partner3), (object) $Data5->WorkPartnerDetailDB($_SESSION["WORK_DETAIL"], $Data4->work_partner3), $Data4, $Data2, $Data6);
                                }
                            ?>
                        <?php else : ?>
                            <p class="w-full text-center py-2 text-base md:text-lg">Belum ada mitra 👨‍🔧</p>
                        <?php endif ?>
                    </div>
                    <!-- Partner Request -->
                    <div class="w-full md:w-1/3 pb-2 pt-4 px-4 rounded-lg relative border h-auto">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Permintaan Mitra&nbsp;</p>
                        <?php $PartnerRequest = $Data5->WorkPartnerRequestDB($_SESSION["WORK_DETAIL"], "0");  ?>
                        <?php if (mysqli_num_rows($PartnerRequest) != 0) : ?>
                            <div class="w-full h-52 overflow-y-auto">
                                <?php while($WorkReq = mysqli_fetch_assoc($PartnerRequest)): ?>
                                <?php CallFileApp::RequireOnceData5("Views/Client/Templates/Part/WorkDetailRequest.php", (object) $WorkReq, $Data5, $Data4, $Data2, $Data6) ?>
                                <?php endwhile ?>
                            </div>
                        <?php else : ?>
                            <p class="w-full text-center py-2 text-base md:text-lg">Belum ada mitra 👨‍🔧</p>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- End of Partner Section -->

        <!-- Update Work Section -->
        <section id="update-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Sunting Pekerjaan&nbsp;</p>
                    <form action="" method="post" class="w-full" enctype="multipart/form-data" style="display: none;">
                        <div class="w-full flex flex-warp">
                            <input type="hidden" name="id" value="work-<?php echo $Data4->id ?>">
                            <input type="hidden" name="background" value="<?php echo $Data4->work_image ?>">
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
                                <input type="number" inputmode="numeric" max="50000000" min="50000" name="salary" id="salary" value="<?php echo $Data4->work_salary ?>" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp mt-1">
                            <div class="w-1/2 mr-1">
                                <label for="maxuser" class="text-xs md:text-sm block">Jumlah Mitra*</label>
                                <input type="number" name="maxuser" id="maxuser" value="<?php echo $Data4->work_maxuser ?>" min="1" max="3" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" disabled>
                            </div>
                            <div class="w-1/2">
                                <label for="fieldwork" class="text-xs md:text-sm block">Bidang Pekerjaan*</label>
                                <input type="text" name="fieldwork" id="fieldwork" value="<?php echo $Data4->work_field ?>" class="px-4 text-xs md:text-base rounded-full mt-2 w-full border" required placeholder="UI/UX, Desain, Front-end">
                            </div>
                        </div>
                        <label class="text-xs md:text-sm" for="des-jsob">Deskripsi Pekerjaan*</label>
                        <textarea name="desc" id="des-job" cols="30" rows="1" class="px-4 text-xs md:text-base rounded-lg mt-2 w-full border" required><?php echo $Data4->work_des ?></textarea>
                        <?php if($Data4->work_status == 0): ?>
                            <input type="submit" name="update-work" value="Edit Pekerjaan" class="w-full mt-2 text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">
                        <?php endif ?>
                    </form>
                    <?php if($Data4->work_status == 0): ?>
                        <?php if (!empty($Data4->work_partner1) || !empty($Data4->work_partner2) || !empty($Data4->work_partner3)) : ?>
                        <form action="" method="post" class="w-full" style="display: none;"><input type="hidden" name="id" class="w-full" value="<?php echo "work-" . $Data4->id ?>"><button name="finish-work" type="submit" class="w-full mt-2 text-center bg-green-600 text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-opacity-80">Selesaikan Pekerjaan</button></form>
                        <?php elseif (empty($Data4->work_partner1) || empty($Data4->work_partner2) || empty($Data4->work_partner3)): ?>
                        <div class="w-full flex">
                            <form action="" method="post" class="w-1/2 mr-1" style="display: none;"><input type="hidden" name="id" class="w-full" value="<?php echo "work-" . $Data4->id ?>"><input type="hidden" name="status" value="<?php echo $Data4->work_status ?>"><button name="delete-work" type="submit" class="w-full mt-2 text-center bg-red-600 text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-opacity-80">Hapus Pekerjaan</button></form>
                            <form action="" method="post" class="w-1/2" style="display: none;"><input type="hidden" name="id" class="w-full" value="<?php echo "work-" . $Data4->id ?>"><button name="finish-work" type="submit" class="w-full mt-2 text-center bg-green-600 text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-opacity-80">Selesaikan Pekerjaan</button></form>
                        </div>
                        <?php endif ?>
                    <?php elseif(($Data4->work_status == 1) && (empty($Data4->work_partner1) && empty($Data4->work_partner2) && empty($Data4->work_partner3))): ?>
                    <form action="" method="post" class="w-full" style="display: none;"><input type="hidden" name="id" class="w-full" value="<?php echo "work-" . $Data4->id ?>"><input type="hidden" name="status" value="<?php echo $Data4->work_status ?>"><button name="delete-work" type="submit" class="w-full mt-2 text-center bg-red-600 text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-opacity-80">Hapus Pekerjaan</button></form>
                    <?php endif ?>
                    <button id="showContentBtn" class="w-full mt-2 text-center bg-black text-primary py-2 rounded-full duration-300 ease-in-out hover:bg-secondary">Lihat Pekerjaan</button>
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
    <script>
        document.getElementById("showContentBtn").addEventListener("click", function() {
            document.querySelectorAll("form").forEach(function(e) {
                "none" === e.style.display ? e.style.display = "block" : e.style.display = "none"
            })
        });
    </script>
    <!-- End of Javascript -->
</body>

</html>