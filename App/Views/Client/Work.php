<!DOCTYPE html>
<html <?php echo $AMP = $Data['seo_amp'] ? "amp" : "";  ?> lang="<?php echo $Data['seo_lang'] ?>">
<head>
    <title>Freelanceku | Pekerjaan</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>
    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>
<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnce('Views/Client/Templates/Navbar.php') ?>
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

        <!-- List Section -->
        <section id="list-work" class="mt-2">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Daftar Pekerjaan&nbsp;</p>
                    <div class="relative w-full mt-1 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Penerima
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Waktu
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-white even:bg-gray-50 border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of List Section -->
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