<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">
<head>
    <title>Freelanceku | Akun</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>
    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData2('Views/Client/Templates/Navbar.php', $Data4, $Data5) ?>
        <!-- End of Navbar -->
    </header>
    
    <?php CallFileApp::RequireOnce("Views/Client/Templates/Part/Alert.php") ?>

    <main class="mt-5">
        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Akun") ?>
        <!-- End of Routes Page Section -->
        
        <!-- Account Section -->
        <section id="accout-detail" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp ">
                    <div class="w-full md:w-1/3 h-auto mt-2 border rounded-lg py-4 px-5 text-center mr-0 md:mr-1">
                        <img src="<?php echo $Data4->data_photo ?>" alt="Foto Profil" class="mx-auto !w-[75px] md:!w-[100px] rounded-full shadow-sm">
                        <p class="mt-2">
                            <span class="font-semibold"><?php echo $Data5->data->identity->first_name . " " . $Data5->data->identity->last_name ; ?></span><br>
                            <?php echo $Data5->data->identity->username; ?> <br>
                            <?php echo $Data5->data->identity->email; ?> <br>
                            <?php echo $Data5->data->identity->phone; ?> <br>
                            <span class="text-sm"><?php $interest = (array) json_decode($Data4->data_interest); $interval = 0; for($i = 0; $i <= mysqli_num_rows($Data3); $i++){ if(isset($interest["interest_{$i}"])){ echo $interest["interest_{$i}"] . " "; if($interval == 3){break;}else{ ++$interval; } } } ?></span>
                        </p>
                    </div>
                    <div class="w-full md:w-2/3 h-auto mt-2 pb-2 pt-4 px-4 rounded-lg relative border">
                        <p class="text-lg h-auto font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Tentang Akun&nbsp;</p>
                        <div class="w-full">
                            <p class="font-semibold">Deskripsi :</p>
                            <p class="w-full px-2 py-1 border rounded-full text-sm"><?php if(!empty($Data5->data->identity->description)){ echo $Data5->data->identity->description; }else{ echo "Kosong"; } ?></p>
                            <p class="font-semibold">Alamat :</p>
                            <p class="w-full px-2 py-1 border rounded-full text-sm"><?php if(empty($Data5->data->address->street) && empty($Data5->data->address->city) && empty($Data5->data->address->province) && empty($Data5->data->address->country)){ echo "Kosong"; }else{echo $Data5->data->address->street . ", " . $Data5->data->address->city . ", " . $Data5->data->address->province . ", " . $Data5->data->address->country;} ?></p>
                            <p class="font-semibold">Akun Dibuat :</p>
                            <p class="w-full px-2 py-1 border rounded-full"><?php echo date("d-m-Y", strtotime($Data5->data->createdAt)); ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End of Account Section -->

        <!-- Portofolio Section -->
        <section id="portofolio" class="mt-5">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Portofolio&nbsp;</p>
                    <?php if(mysqli_num_rows($Data6) > 0): ?>
                    <div class="relative w-full mt-1 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Bidang
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($Porto = mysqli_fetch_assoc($Data6)): ?>
                                <tr class="odd:bg-white even:bg-gray-50 border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <?php echo $Porto["porto_name"] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo date("d-m-Y", strtotime($Porto["porto_date"])) ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $Porto["porto_field"] ?>
                                    </td>
                                    <td class="px-6 py-4 text-center flex">
                                        <div class="w-full flex">
                                            <div class="mx-auto flex">
                                                <a href="<?php echo $Porto["porto_file"] ?>" class="font-medium text-blue-600 hover:underline">Unduh</a> |
                                                <form action="" method="post" class="w-fit"><input type="hidden" name="id" value="<?php echo $Porto["id"] ?>"><input type="hidden" name="file" value="<?php echo $Porto["porto_file"] ?>"><input type="submit" name="delete-porto" value="Hapus" class="font-medium text-red-600 hover:underline"></form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <p class="w-full py-2 text-center">Tidak ada sama sekali portofolio anda disini 👀</p>
                    <?php endif ?>
                    <div class="w-full flex flex-warp">
                        <button data-modal-target="add-portofolio" data-modal-toggle="add-portofolio" class="py-2 px-4 rounded-lg mt-2 border mx-auto ease-in-out duration-300 hover:bg-secondary hover:text-primary" type="button">Tambah Portofolio</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Portofolio Section -->

        <!-- Setting Account Section -->
        <section id="setting-acc" class="mt-5">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Pengaturan Akun&nbsp;</p>
                    <div class="w-full">
                        <button data-modal-target="edit-account" data-modal-toggle="edit-account" type="button" class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-secondary">Atur Akun</button>
                        <?php if($Data4->data_paymentstatus == 1): ?><button data-modal-target="edit-bank" data-modal-toggle="edit-bank" type="button" class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-secondary">Atur Bank Akun</button><?php endif ?>
                        <button data-modal-target="delete-account" data-modal-toggle="delete-account" type="button" class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-red-500">Hapus Akun</button>
                        <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "signout" ?>"><button class="mt-1 w-full border rounded-lg px-4 py-2 text-left duration-300 ease-in-out hover:shadow-md hover:text-primary hover:bg-red-500">Keluar</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Setting Account Section -->
    </main>

    <!-- Modal -->
    <?php CallFileApp::RequireOnceData4("Views/Client/Templates/Part/AccountModals.php", $Data2, $Data3, $Data4, $Data5) ?>
    <!-- End of Modals -->
        
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