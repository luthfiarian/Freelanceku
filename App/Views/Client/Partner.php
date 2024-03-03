<!DOCTYPE html>
<html lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Mitra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data2, $Data3) ?>
        <!-- End of Navbar -->
    </header>

    <!-- Alert Status -->
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>
    <!-- End of Alert Status -->

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Mitra") ?>
        <!-- End of Routes Page Section -->

        <!-- List of Work  -->
        <section class="mt-2">
            <div class="container">
                <div class="w-full flex-none md:flex">
                    <!-- Work Run -->
                    <div class="w-full md:w-1/2 mt-4 pb-2 pt-4 px-4 rounded-lg relative border mr-1">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Daftar Pekerjaan Berlangsung&nbsp;</p>
                        <?php if(mysqli_num_rows($Data6)): $DataWork = mysqli_num_rows($Data6); ?>
                            <div class="w-full overflow-y-auto overflow-x-hidden" style="height: <?php if($DataWork == 3){ echo "150px"; }else if($DataWork == 5){ echo "205px"; } ?>;">
                                <table class="table table-auto w-full">
                                    <?php $i = 1; while($List = mysqli_fetch_assoc($Data6)): ?>
                                    <tr class="group">
                                        <td><?php echo $i ?></td>
                                        <td><p class="p-0.5 w-fit rounded-lg ease-linear duration-150 group-hover:bg-forth group-hover:text-primary group-hover:shadow-md">Work-<?php echo $List["id"] ?></p></td>
                                        <td><?php echo $List["work_name"] ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($List["work_finishdate"])) ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="workid" value="work-<?php echo $List["id"] ?>">
                                                <button type="submit" name="work-detail" class="h-auto py-2 text-primary w-full rounded-r-lg bg-secondary ease-in-out duration-300 transition hover:bg-third">Lihat</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endwhile ?>
                                </table>
                            </div>
                        <?php else: ?>
                        <div class="w-full">
                            <p class="py-4 w-full text-center font-semibold">Terlihat tidak ada pekerjaan 👀</p>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- Work Finish -->
                    <div class="w-full md:w-1/2 mt-4 pb-2 pt-4 px-4 rounded-lg relative border mr-1">
                        <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Daftar Pekerjaan Selesai&nbsp;</p>
                        <?php if(mysqli_num_rows($Data7)): $DataWork = mysqli_num_rows($Data7); ?>
                            <div class="w-full overflow-y-auto overflow-x-hidden" style="height: <?php if($DataWork == 3){ echo "150px"; }else if($DataWork == 5){ echo "205px"; } ?>;">
                                <table class="table table-auto w-full">
                                    <?php $i = 1; while($List = mysqli_fetch_assoc($Data7)): ?>
                                    <tr class="group">
                                        <td><?php echo $i ?></td>
                                        <td><p class="p-0.5 w-fit rounded-lg ease-linear duration-150 group-hover:bg-forth group-hover:text-primary group-hover:shadow-md">Work-<?php echo $List["id"] ?></p></td>
                                        <td><?php echo $List["work_name"] ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($List["work_finishdate"])) ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="workid" value="work-<?php echo $List["id"] ?>">
                                                <button type="submit" name="work-detail" class="h-auto py-2 text-primary w-full rounded-r-lg bg-secondary ease-in-out duration-300 transition hover:bg-third">Lihat</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endwhile ?>
                                </table>
                            </div>
                        <?php else: ?>
                        <div class="w-full">
                            <p class="py-4 w-full text-center font-semibold">Terlihat tidak ada pekerjaan Selesai 👀</p>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of List Work -->
        
        <?php if(isset($_POST["work-detail"]) || isset($_SESSION["WORK_DETAIL_PARTNER"])): $Status = $Data9->work_status == 0 ? "Berlangsung" : "Selesai" ?>
        <!-- Work Detail Section -->
        <section class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border mr-0 md:mr-1">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;<?php echo strtoupper("#WORK-" . ltrim($_SESSION["WORK_DETAIL_PARTNER"], "workid-")) . " - $Status" ?>&nbsp;</p>
                    <div class="w-full flex">
                        <div class="w-1/3 md:w-1/4 mr-1">
                            <div class="w-full h-fit border rounded-lg group ease-linear duration-300 hover:shadow-lg relative">
                                <p class="text-xs md:text-base text-center font-semibold absolute top-[40%] z-10 left-0 right-0 text-primary ease-linear duration-300 group-hover:p-0.5 group-hover:bg-primary group-hover:text-black">#WORK-<?php echo ltrim($_SESSION["WORK_DETAIL_PARTNER"], "workid-") ?></p>
                                <img src="<?php echo BASE_URI . $Data9->work_image ?>" width="150px" height="150px" class="mx-auto rounded-lg -z-20 grayscale ease-in-out duration-300 group-hover:grayscale-0" alt="Latar belakang #work-<?php echo $_SESSION["WORK_DETAIL_PARTNER"] ?>">
                            </div>
                        </div>
                        <div class="w-2/3 md:w-3/4 flex">
                            <table class="table table-auto w-full text-sm md:text-base">
                                <tr><td colspan="2"><p class="font-semibold"><?php echo $Data9->work_name ?></p></td><td><p class="px-2 py-0.5 rounded-lg bg-secondary shadow-md w-fit text-primary right-0"><?php echo $Data9->work_finishdate ?></p></td><td><form action="" method="post" class="w-full flex"><button type="submit" name="close-detail" class="py-0.5 px-4 rounded-lg bg-red-600 text-primary right-0">Tutup</button></form></td></tr>
                                <tr><td colspan="4"><?php echo $Data9->work_des ?></td></tr>
                                <tr>
                                    <td>Aksi :</td>
                                    <td colspan="3">
                                        <a href="mailto:<?php echo $Data9->work_host ?>"><button type="button" class="py-0.5 px-2 bg-secondary text-primary rounded-lg ease-in-out duration-150 hover:bg-third">📧 Hubungi</button></a>
                                        <button data-modal-target="message-<?php echo $Data8->id ?>" data-modal-toggle="message-<?php echo $Data8->id ?>" type="button" class="py-0.5 px-2 bg-secondary text-primary rounded-lg ease-in-out duration-150 hover:bg-third">📝 Pesan</button>
                                        <?php if($Data9->work_status == 0): ?>
                                        <button data-modal-target="upload-<?php echo $Data8->id ?>" data-modal-toggle="upload-<?php echo $Data8->id ?>" type="button" class="py-0.5 px-2 bg-secondary text-primary rounded-lg ease-in-out duration-150 hover:bg-third">📁 Unggah Berkas</button>
                                        <?php elseif(($Data9->work_status == 1) && !empty($Data8->partner_file) ): ?>
                                        <a href="<?php echo BASE_URI . $Data8->partner_file ?>"><button type="button" class="py-0.5 px-2 bg-green-500 text-primary rounded-lg ease-in-out duration-150 hover:bg-green-600">📁 Unduh Berkas</button></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/Part/PartnerModalDetail.php", $Data8) ?>
        <!-- End of Work Detail Section -->
        <?php endif ?>

        <!-- Request Work Section -->
        <setion class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-base md:text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Permintaan Pekerjaan&nbsp;</p>
                    <?php if(mysqli_num_rows($Data4) != 0): ?>
                        <div class="w-full flex flex-warp <?php if(mysqli_num_rows($Data4) != 0){echo "h-52 overflow-y-auto";} ?> rounded-lg shadow-md mb-1">
                            <table class="table table-auto w-full h-fit text-center">
                                <thead class="sticky top-0 font-medium">
                                    <tr>
                                        <td class="bg-secondary text-primary">Pekerjaan</td><td class="bg-secondary text-primary">Tanggal Melamar</td><td class="bg-secondary text-primary">Status</td><td class="bg-secondary text-primary">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($ReqWork = mysqli_fetch_assoc($Data4)): ?>
                                    <tr class="ease-in-out duration-300 delay-100">
                                        <td>Work-<?php echo $ReqWork["partner_workid"] ?></td>
                                        <td><?php echo $ReqWork["partner_date"] ?></td>
                                        <td><?php if($ReqWork["partner_reqstatus"] == 0){ echo "Proses"; } else if($ReqWork["partner_reqstatus"] == 2) { echo "Ditolak"; } ?></td>
                                        <td><form action="" method="post"><input type="hidden" name="id" value="work-<?php echo $ReqWork["partner_workid"] ?>"><button name="delete-req" type="submit" class="py-1 px-2 rounded-lg text-primary bg-red-500 duration-300 ease-in-out transition hover:bg-opacity-80">Hapus Lamaran</button></form></td>
                                    </tr>
                                <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                    <p class="w-full text-center py-4 font-semibold">Anda Terlihat Belum Melamar di Proyek Manapun 👀</p>
                    <div class="w-full py-2 flex flex-warp">
                        <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "dashboard" ?>" class="mx-auto"><button class="py-2 px-4 rounded-lg border ease-in-out transition duration-300 hover:text-primary hover:bg-secondary">Cari Lamaran</button></a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </setion>
        <!-- End of Request Work Section -->
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