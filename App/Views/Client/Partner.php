<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Mitra</title>
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
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Daftar Pekerjaan&nbsp;</p>
                    <?php if(mysqli_num_rows($Data6)): ?>
                        <?php $i = 1; while($List = mysqli_fetch_assoc($Data6)): ?>
                            <div class="w-full flex">
                                <div class="w-8/12 py-2 border rounded-l-lg flex mr-1">
                                    <p class="w-1/4 text-center"><?php echo $i ?></p>
                                    <p class="w-1/4 text-center">Work-<?php echo $List["id"] ?></p>
                                    <p class="w-1/4 text-center"><?php echo $List["work_name"] ?></p>
                                    <p class="w-1/4 text-center"><?php echo date('d-m-Y', strtotime($List["work_finishdate"])) ?></p>
                                </div>
                                <form action="" method="post" class="w-4/12">
                                    <input type="hidden" name="workid" value="workid-<?php echo $List["id"] ?>">
                                    <button type="submit" name="work-detail" class="py-2 text-primary w-full rounded-r-lg bg-secondary ease-in-out duration-300 transition hover:bg-third">Selengkapnya</button>
                                </form>
                            </div>
                        <?php endwhile ?>
                    <?php else: ?>
                    <div class="w-full">
                        <p class="py-4 w-full text-center font-semibold">Terlihat tidak ada pekerjaan 👀</p>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <!-- End of List Work -->

        <!-- Request Work Section -->
        <setion class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Permintaan Pekerjaan&nbsp;</p>
                    <?php if(mysqli_num_rows($Data4) != 0): ?>
                        <div class="w-full flex flex-warp <?php if(mysqli_num_rows($Data4) != 0){echo "h-52 overflow-y-auto";} ?>">
                            <table class="table table-auto w-full h-fit text-center">
                                <thead class="sticky top-0">
                                    <tr>
                                        <td class="bg-secondary text-primary">Pekerjaan</td><td class="bg-secondary text-primary">Tanggal Melamar</td><td class="bg-secondary text-primary">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($ReqWork = mysqli_fetch_assoc($Data4)): ?>
                                    <tr>
                                        <td>Work-<?php echo $ReqWork["partner_workid"] ?></td>
                                        <td><?php echo $ReqWork["partner_date"] ?></td>
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