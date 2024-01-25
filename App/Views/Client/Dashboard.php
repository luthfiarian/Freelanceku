<!DOCTYPE html>
<html <?php echo $AMP = $Data1->seo_amp ? "amp" : "";  ?> lang="<?php echo $Data1->seo_lang ?>">

<head>
    <title>Freelanceku | Dashboard</title>

    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php"); ?>

    <?php if ($AMP) : ?><script async src="https://cdn.ampproject.org/v0.js"></script><?php endif ?>

</head>

<body>
    <header>
        <!-- Navbar -->
        <?php CallFileApp::RequireOnceData('Views/Client/Templates/Navbar.php', $Data2) ?>
        <!-- End of Navbar -->
    </header>

    <!-- Main -->
    <main class="mt-5">
        <!-- Account Section -->
        <section id="account">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="w-2/3 mr-1 flex flex-warp py-2 px-4 border rounded-lg">
                        <div class="w-1/3 lg:w-1/6">
                            <img src="<?php echo $Data2->data_photo ?>" alt="Profil" class="!w-[75px] md:!w-[100px] rounded-full shadow-sm">
                        </div>
                        <div class="w-2/3 lg:w-5/6 mt-2">
                            <p class="text-sm md:text-lg">Hai! <?php echo $Data3->data->identity->first_name; ?> 🖐</p>
                            <p class="text-xs md:text-sm">
                                <span class="font-semibold"><?php echo $Data2->data_email ?> </span><br>
                                <?php echo "+" . $Data3->data->identity->phone; ?>
                            </p>
                        </div>
                    </div>
                    <div class="w-1/3 py-2 px-4 border rounded-lg">
                        <div class="w-full flex">
                            <p class="font-semibold text-xs md:text-base w-1/2">Saldo:</p>
                            <p class="text-right text-xs md:text-base w-1/2">Rp.0</p>
                        </div>
                        <button class="text-sm md:text-base rounded-full text-center w-full border py-1 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Daftar e-Wallet</button>
                        <button class="text-sm md:text-base rounded-full text-center w-full border py-1 mt-0.5 duration-150 ease-in-out hover:text-primary hover:shadow-md hover:bg-secondary">Transfer</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Account Section -->

        <!-- Routes Page Section -->
        <?php CallFileApp::RequireOnceData("Views/Client/Templates/RoutesPage.php", "Dashboard") ?>
        <!-- End of Routes Page Section -->

        <!-- Task Section -->
        <section id="task" class="mt-2">
            <div class="container">
                <div class="w-full flex flex-warp">
                    <div class="w-2/3 px-1 py-2 rounded-lg border mr-1">
                        <form action="" method="get" class="w-full flex flex-warp">
                            <input type="search" name="search" class="text-sm md:text-base w-2/3 rounded-l-full px-4" placeholder="Cari Mitra Kerja" autofocus autocomplete="off">
                            <input type="submit" value="Cari" class="text-sm md:text-base w-1/3 rounded-r-full border text-center duration-300 ease-in-out hover:bg-secondary hover:text-primary">
                        </form>
                    </div>
                    <div class="w-1/3 px-1 py-2 rounded-lg border">
                        <a href="<?php echo BASE_URI . "work#create-work"?>"><button class="w-full text-sm md:text-base text-center font-semibold rounded-full py-2 border duration-300 ease-in-out hover:bg-secondary hover:text-primary">Buat Pekerjaan</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Task Section -->

        <!-- History Work Section -->
        <section id="history-work" class="mt-1">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Riwayat Pekerjaan&nbsp;</p>
                    <div class="w-full flex flex-warp">
                        <!-- Card Work -->
                        <div class="w-4/12 md:w-3/12 rounded-lg pb-2 border shadow-md bg-gradient-to-tr from-primary to-slate-300">
                            <img src="https://flowbite.com/docs/images/blog/image-1.jpg" width="100%" alt="Latar Belakang Pekerjaan" class="rounded-t-lg hover:grayscale-[50%]">
                            <div class="w-full p-1">
                                <p class="font-semibold">Manipulasi</p>
                                <p class="text-sm">Ini Deskripsi</p>
                                <div class="border my-2 py-1 flex px-2 w-full rounded-lg">
                                    <span class="md:w-1/3 lg:w-1/2 self-center">
                                        <svg width="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                                            <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                                            <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                                            <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                                        </svg>
                                    </span>
                                    <span class="md:w-2/3 lg:w-1/2 text-right text-xs md:text-sm lg:text-base"><?php echo date('d-m-Y') ?></span>
                                </div>
                                <div class="border my-2 py-1 flex px-2 w-full rounded-lg">
                                    <span class="w-1/2 self-center">
                                        <svg fill="#000000" width="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" class="">
                                            <path d="M23.313 26.102l-6.296-3.488c2.34-1.841 2.976-5.459 2.976-7.488v-4.223c0-2.796-3.715-5.91-7.447-5.91-3.73 0-7.544 3.114-7.544 5.91v4.223c0 1.845 0.78 5.576 3.144 7.472l-6.458 3.503s-1.688 0.752-1.688 1.689v2.534c0 0.933 0.757 1.689 1.688 1.689h21.625c0.931 0 1.688-0.757 1.688-1.689v-2.534c0-0.994-1.689-1.689-1.689-1.689zM23.001 30.015h-21.001v-1.788c0.143-0.105 0.344-0.226 0.502-0.298 0.047-0.021 0.094-0.044 0.139-0.070l6.459-3.503c0.589-0.32 0.979-0.912 1.039-1.579s-0.219-1.32-0.741-1.739c-1.677-1.345-2.396-4.322-2.396-5.911v-4.223c0-1.437 2.708-3.91 5.544-3.91 2.889 0 5.447 2.44 5.447 3.91v4.223c0 1.566-0.486 4.557-2.212 5.915-0.528 0.416-0.813 1.070-0.757 1.739s0.446 1.267 1.035 1.589l6.296 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.809zM30.312 21.123l-6.39-3.488c2.34-1.841 3.070-5.459 3.070-7.488v-4.223c0-2.796-3.808-5.941-7.54-5.941-2.425 0-4.904 1.319-6.347 3.007 0.823 0.051 1.73 0.052 2.514 0.302 1.054-0.821 2.386-1.308 3.833-1.308 2.889 0 5.54 2.47 5.54 3.941v4.223c0 1.566-0.58 4.557-2.305 5.915-0.529 0.416-0.813 1.070-0.757 1.739 0.056 0.67 0.445 1.267 1.035 1.589l6.39 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.779h-4.037c0.61 0.46 0.794 1.118 1.031 2h3.319c0.931 0 1.688-0.757 1.688-1.689v-2.503c-0.001-0.995-1.689-1.691-1.689-1.691z"></path>
                                        </svg>
                                    </span>
                                    <span class="w-1/2 text-right">0</span>
                                </div>
                                <a href="#" class="w-full text-right text-sm inline-flex items-center px-3 py-2 font-medium text-primary bg-secondary rounded-lg hover:bg-forth focus:ring-4 focus:outline-none focus:ring-secondary">
                                    Lihat
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
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

        <!-- History Payment Section -->
        <section id="history-payment" class="mt-1">
            <div class="container">
                <div class="w-full my-4 pb-2 pt-4 px-4 rounded-lg relative border">
                    <p class="text-lg font-semibold absolute top-[-14px] z-10 bg-primary">&nbsp;Riwayat Keuangan&nbsp;</p>
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
        <!-- End of History Payment -->
    </main>
    <!-- End of Main -->

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