<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Pengaturan Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Account.php') ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Routes.php'); RoutesPage::Page("Pengaturan") ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Setting Menu Section -->
        <section id="setting" class="mt-5">
            <div class="container">
                <div class="w-full py-4 rounded-lg backdrop-blur-lg bg-slate-400/50 shadow-xl">
                    <form action="" method="post" class="w-full flex flex-wrap px-4">
                        <p class="text-lg w-full font-medium mb-2">Pengaturan Situs</p>
                        <!-- Language for searching -->
                        <div class="w-1/2"><label for="language">Basis bahasa situs dalam pencarian</label></div>
                        <div class="w-1/2 mt-1 flow-root"><select name="seo_lang" id="languange" class="float-right rounded-full w-1/2 px-2"><?php if($Data1['seo_lang'] == "id"): ?><option value="id">Bahasa Indonesia</option><option value="en">English</option><?php elseif($Data1['seo_lang'] == "en"): ?><option value="en">English</option><option value="id">Bahasa Indonesia</option><?php endif ?></select></div>
                        <!-- Google AMP -->
                        <div class="w-1/2"><label for="amp">Percepat situs web (AMP Library)</label></div>
                        <div class="w-1/2 mt-1 flow-root"><select name="seo_amp" id="amp" class="float-right rounded-full w-1/2 px-2"><?php if($Data1['seo_amp']): ?><option value="1">Nyalakan</option><option value="0">Matikan</option><?php elseif(!$Data1['seo_amp']): ?><option value="0">Matikan</option><option value="1">Nyalakan</option><?php endif ?></select></div>
                        
                        <p class="text-lg w-full font-medium my-2">SEO Situs Web (OpenGraph)</p>
                        <!-- Name Website -->
                        <div class="w-1/2"><label for="tax-percent">Nama Situs Web</label></div>
                        <div class="w-1/2 mt-1 flow-root"><input type="text" name="seo_name" value="<?php echo $Data1['seo_name'] ?>" id="name-site" class="float-right w-1/2 px-4 py-0.5 rounded-full" placeholder="Nama Situs Web" autocomplete="off"></div>
                        <!-- Type of Website -->
                        <div class="w-1/2"><label for="type-site">Tipe Situs Web</label></div>
                        <div class="w-1/2 mt-1 flow-root"><input type="text" name="seo_type" value="<?php echo $Data1['seo_type'] ?>" id="type-site" class="float-right w-1/2 px-4 py-0.5 rounded-full" placeholder="Tipe Situs Web" autocomplete="off"></div>
                        <!-- Country of Website -->
                        <div class="w-1/2"><label for="locale-site">Lokasi Situs Web</label></div>
                        <div class="w-1/2 mt-1 flow-root"><input type="text" name="seo_locale" value="<?php echo $Data1['seo_locale'] ?>" id="locale-site" class="float-right w-1/2 px-4 py-0.5 rounded-full" placeholder="Lokasi Situs Web" autocomplete="off"></div>
                        <!-- Description of Website -->
                        <div class="w-1/2"><label for="description-site">Deskripsi Situs Web</label></div>
                        <div class="w-1/2 mt-1 flow-root"><input type="text" name="seo_des" value="<?php echo $Data1['seo_des'] ?>" id="description-site" class="float-right w-1/2 px-4 py-0.5 rounded-full" placeholder="Deskripsi Situs Web" autocomplete="off"></div>
                        
                        <div class="w-full mt-5 flex"><input type="submit" name="site" value="Simpan" class="mx-auto py-1 px-4 rounded-full text-white bg-blue-700 ease-in-out duration-300 transition hover:bg-blue-400 hover:shadow-lg"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End of Setting Menu Section -->

        <!-- List of Bank Section -->
        <?php if(is_array($Data2)): ?>
        <section id="list-bank" class="mt-5">
            <div class="container">
                <div class="w-full py-4 rounded-lg backdrop-lg bg-rose-400/95 shadow-lg">
                    <div  class="w-full flex flex-wrap px-4">
                        <p class="text-lg w-full font-medium mb-2">Data Bank</p>
                        <div class="w-1/3"><p class="w-full text-center">Nama</p></div><div class="w-1/3 mx-auto"><p class="w-full text-center">Rekening</p></div><div class="w-1/3 mx-auto"><p class="w-full text-center">Logo</p></div>
                        <?php $i = 0; while($Data2):  ?>
                        <div class="w-1/3"><p class="w-full text-center"><?php echo $Data2['bank_name']; ?></p></div><div class="w-1/3"><p class="w-full text-center"><?php echo $Data2['bank_account']; ?></p></div><div class="w-1/3 flex"><img src="<?php echo BASE_URI ?>Public/dist/image/<?php echo $Data2['bank_image']; ?>" alt="Logo <?php echo $Data2['bank_name']; ?>" class="!w-[100px] !h-[50px] mx-auto rounded-lg"></div>
                        <?php $i++; if($i < count($Data2)){ break; } endwhile ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif ?>
        <!-- End of List of Bank Section -->

        <!-- Finance Section -->
        <section id="finance" class="my-5">
            <div class="container">
                <div class="w-full py-4 rounded-lg backdrop-lg bg-neutral-400/95 shadow-lg">
                    <form action="" method="post" class="w-full flex flex-wrap px-4">
                        <p class="text-lg w-full font-medium mb-2">Keuangan</p>
                        <!-- Tax Transaction -->
                        <div class="w-1/2"><label for="tax-percent">Tetapkan Pajak Presentase (%)</label></div>
                        <div class="w-1/2 mt-1 flow-root"><input type="text" name="tax-percent" id="tax-percent" class="float-right w-1/2 px-4 py-0.5 rounded-full" placeholder="11%" autocomplete="off"></div>
                        
                        <div class="w-1/2"><p>Pengaturan Bank</p></div>
                        <div class="w-1/2 mt-1 flow-root"><div class="float-right text-center"><button data-modal-target="addbank-modal" data-modal-toggle="addbank-modal" class="py-1 px-4 rounded-l-full ease-in-out duration-300 transition bg-green-500 hover:shadow-lg" type="button">Tambah</button><button data-modal-target="deletebank-modal" data-modal-toggle="deletebank-modal" class="py-1 px-4 rounded-r-full ease-in-out duration-300 transition bg-red-500 hover:shadow-lg" type="button">Hapus</button></div></div>

                        <div class="w-full mt-5 flex"><input type="submit" value="Simpan" class="mx-auto py-1 px-4 rounded-full text-white bg-blue-700 ease-in-out duration-300 transition hover:bg-blue-400 hover:shadow-lg"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End of Finance Section -->
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Templates/FooterAccount.php') ?>
    <!-- End of Footer -->

    <!-- Add Bank Modal -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/AddBank.php') ?>
    <!-- End of Add Bank Modal -->

    <!-- Delete Bank Modal -->
    <?php CallFileApp::RequireOnceData('Views/Admin/Templates/Part/DeleteBank.php', $Data2) ?>
    <!-- End of Delete Bank Modal -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
    <!-- End  of Javascript -->
</body>

</html>