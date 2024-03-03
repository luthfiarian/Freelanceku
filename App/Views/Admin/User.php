<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Pengguna Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>

<body>
    <!-- Header -->
    <header class="w-full">
        <?php CallFileApp::RequireOnceData2("Views/Admin/Templates/Header.php", $Data1, $Data2) ?>
    </header>
    <!-- End of Header -->
    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Account.php', $Data1, $Data2) ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Admin", "user"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Add Admin Section -->
        <section id="add-admin" class="mt-5">
            <div class="container">
                <div class="w-full flex">
                    <button data-modal-target="signup-admin" data-modal-toggle="signup-admin" type="button" class="py-2 px-4 mx-auto text-primary bg-secondary rounded-full ease-in-out duration-300 transition hover:bg-third hover:shadow-lg">Tambah Pengguna Admin</button>
                </div>
            </div>
        </section>
        <!-- End of Admin Section -->

        <!-- User Section -->
        <section id="user" class="mt-5">
            <div class="container">
                <div class="w-full mb-2">
                    <form method="post" class="w-full flex"><input type="text" name="search" class="py-2 px-4 w-10/12 rounded-l-full" autocomplete="off" autofocus placeholder="Cari bedasarkan nama pengguna atau email"><button name="search-admin" type="submit" class="w-2/12 rounded-r-full bg-secondary text-primary hover:bg-third">Cari</button></form>
                </div>
                <div class="w-full backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg p-2">
                    <p class="text-lg">Admin (<?php $QueryUser = mysqli_num_rows($Data3); echo $QueryUser ?>)</p>
                    <div class="w-full" style="<?php if(10 <= $QueryUser){ echo "height: 20rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Nama Penguna</td><td class="rounded-tr-xl">Email</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($User = mysqli_fetch_assoc($Data3)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($i == $QueryUser): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $i ?></td>
                                    <td><?php echo $User["data_username"] ?></td>
                                    <td <?php if($i == $QueryUser): ?> class="rounded-br-xl" <?php endif ?>><?php echo $User["data_email"] ?></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if($QueryUser == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="4" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of User Section -->

    </main>
    <!-- End of Main -->

    <!-- Modals -->
    <!-- Signup admin modal -->
    <div id="signup-admin" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal signup admin content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal signup admin header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Daftar Sebagai Admin</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="signup-admin">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal signup admin body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="">
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Depan</label>
                                <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Depan Anda" required>
                            </div>
                            <div class="w-1/2">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Belakang</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Belakang Anda" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" inputmode="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="ini@sebuah.email" required>
                            </div>
                            <div class="w-1/2">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Pengguna" required>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="phone" class="w-full block mb-2 text-sm font-medium text-gray-900">Ponsel</label>
                            <div class="w-full flex flex-warp">
                                <div class="w-1/6 mr-1">
                                    <input type="text" id="phone" value="+62" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" disabled>
                                </div>
                                <div class="w-5/6">
                                    <input type="tel" name="phone" inputmode="numeric" id="phone" minlength="11" maxlength="12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" pattern="[8][1-9].{9,}" placeholder="812-3xxx-xxx" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,14}" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 14 karakter" required>
                            <small class="text-red-500">*Password (<8,>12) [A-Z],[a-z],[0-9],[!#$.]</small>
                        </div>
                        <div>
                            <label for="admin" class="block mb-2 text-sm font-medium text-gray-900">Kunci Admin</label>
                            <input type="text" name="admin_key" id="admin" placeholder="Isi dengan kunci yang telah ditentukan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 14 karakter" title="Kunci Admin : Kunci berada di App/Config/Admin.php" required>
                        </div>
                        <button type="submit" name="signup_admin" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Signup User Modal -->
    <!-- End of Modals -->
    
    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); ?>
    <!-- End of Navbar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Footer.php') ?>
    <!-- End of Footer -->

    <!-- Javascript -->
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
    <!-- End of Javascript -->
</body>

</html>