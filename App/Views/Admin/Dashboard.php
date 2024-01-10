<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Dashboard Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>
<body>
    <!-- Main -->
    <main class="w-full">

        <!-- Account Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Account.php') ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Routes.php'); RoutesPage::Page("Dashboard") ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Information Section -->
        <section id="info" class="mt-5">
            <div class="container">
                <div class="w-full">
                    <div class="w-full flex mt-2 text-white">
                        <!-- Number of Freelance Workers -->
                        <div class="w-1/4 rounded-lg bg-green-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-lg font-medium">Freelancer</p>
                            <p class="text-lg">2</p>
                        </div>
                        <!-- Number of Admin -->
                        <div class="w-1/4 rounded-lg bg-slate-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-lg font-medium">Admin</p>
                            <p class="text-lg">2</p>
                        </div>
                        <!-- Number of Visitor -->
                        <div class="w-1/4 rounded-lg bg-teal-500 py-4 px-2 shadow-md mr-0.5">
                            <p class="text-lg font-medium">Pengunjung</p>
                            <p class="text-lg">2</p>
                        </div>
                        <!-- Income -->
                        <div class="w-1/4 rounded-lg bg-yellow-500 py-4 px-2 shadow-md">
                            <p class="text-lg font-medium">Pendapatan</p>
                            <p class="text-lg">Rp. 200</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Information Section -->

        <!-- User Section -->
        <section id="user" class="mt-5">
            <div class="container">
                <div class="w-full flex-none md:flex">
                    <!-- Freelancers -->
                    <div class="w-full md:w-1/2 backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2 mr-0 md:mr-1">
                        <p class="text-lg">Freelancer</p>
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama</td><td>Email</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td>1</td><td>Sukijan</td><td>sukijan@mail.com</td><td>Info</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bg-emerald-600/30 rounded-b-xl">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Admin -->
                    <div class="w-full md:w-1/2 backdrop-blur-lg bg-amber-500/50 shadow-xl rounded-lg p-2 mt-4 md:mt-0">
                        <p class="text-lg">Admin</p>
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-amber-600/30 font-semibold">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama</td><td>Email</td><td class="rounded-tr-xl">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td>1</td><td>Sukijan</td><td>sukijan@mail.com</td><td><button>Info</button></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bg-amber-600/30 rounded-b-xl">1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of User Section -->

        <!-- Income Section -->
        <section id="income" class="my-5">
            <div class="container">
                <div class="w-full p-2 backdrop-blur-lg shadow-xl bg-blue-400/60 rounded-lg">
                    <p>Riwayat Transaksi</p>
                    <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                        <thead class="bg-blue-500/30 font-semibold">
                            <tr>
                                <td class="rounded-tl-xl">No</td><td>Faktur</td><td>Email</td><td>Nama</td><td>Keterangan</td><td>Nominal</td><td class="rounded-tr-xl">Info</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="ease-in-out duration-150 transition hover:bg-blue-200">
                                <td>1</td><td>TRX-2342</td><td>admin@mail.com</td><td>Joni</td><td>Top Up</td><td>Rp 500.000</td><td>Info</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="rounded-b-xl bg-blue-500/30">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- End of Income Section -->

    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Templates/FooterAccount.php') ?>
    <!-- End of Footer -->
</body>
</html>