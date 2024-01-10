<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Finance Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Account.php') ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Routes.php'); RoutesPage::Page("Keuangan") ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Client Search Section -->
        <?php if(($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/balance") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/balance/") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/history") || ($_SERVER["REQUEST_URI"] === BASE_URI."admin/finance/history/")): ?>
        <section id="search" class="mt-5">
            <div class="container">
                <div class="w-full">
                    <form action="" method="get" class="w-full flex flex-warp">
                        <div class="w-1/6"><select name="type-search" class="w-full text-center rounded-l-lg py-1 shadow-lg"><option value="email">Email</option><option value="name">Nama</option></select></div>
                        <div class="w-4/6"><input type="text" name="var-search" class="w-full px-4 py-1 bg-neutral-300 shadow-lg" placeholder="Cari disini" autofocus autocomplete="off"></div>
                        <div class="w-1/6"><input type="submit" value="Cari" class="w-full rounded-r-lg bg-rose-400 py-1 hover:bg-rose-300 hover:shadow-lg"></div>
                    </form>
                </div>
            </div>
        </section>
        <?php endif ?>
        <!-- End of Client Search Section -->

        <!-- Data Section -->
        <section id="data" class="mt-5">
            <div class="container">
                <div class="w-full p-2 backdrop-blur-lg bg-lime-700/50 shadow-xl rounded-lg text-slate-100">
                    <p class="text-lg font-medium">Data Top Up</p>
                    <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                        <thead class="bg-lime-800/30 font-semibold">
                            <tr>
                                <td class="rounded-tl-xl">No</td><td>Nama</td><td>Email</td><td class="rounded-tr-xl">Info</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                <td>1</td><td>Sukijan</td><td>sukijan@mail.com</td><td><button>Info</button></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bg-lime-800/30 rounded-b-xl">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- End of Data Section -->
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Templates/FooterAccount.php') ?>
    <!-- End of Footer -->
</body>

</html>