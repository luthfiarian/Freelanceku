<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Freelancer Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
</head>

<body>
    <!-- Header -->
    <header class="w-full">
        <?php CallFileApp::RequireOnceData2("Views/Admin/Templates/Header.php", $Data1, $Data2) ?>
    </header>
    <!-- End of Header -->

    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Account.php', $Data1, $Data2) ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Akun", "account"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- Account Detail Section -->
        <section id="account-detail" class="mt-5">
            <div class="container">
                <div class="w-full flex">
                    <!-- Profile -->
                    <div class="w-1/3 h-full rounded-lg shadow-lg backdrop-blur-md bg-slate-600/80 py-4 px-2 mr-2 self-center">
                        <div class="w-full flex"><img src="<?php echo BASE_URI . $Data1->data_photo ?>" alt="Foto Profil" class="w-1/3 md:w-1/5 rounded-full shadow-md mx-auto"></div>
                        <p class="w-2/3 mx-auto mt-2 py-1 px-2 text-xs md:text-base text-center text-primary rounded-full bg-secondary"><?php echo $Data2->data->identity->first_name . " " . $Data2->data->identity->last_name ?></p>
                        <p class="w-2/3 mx-auto mt-2 py-1 px-2 text-xs md:text-base text-center text-primary rounded-full bg-secondary line-clamp-1"><?php echo $Data2->data->identity->phone ?></p>
                        <p class="w-2/3 mx-auto mt-2 py-1 px-2 text-xs md:text-base text-center text-primary rounded-full bg-secondary line-clamp-1"><?php echo $Data2->data->identity->email ?></p>
                        <p class="w-2/3 mx-auto mt-2 py-1 px-2 text-xs md:text-base text-center text-primary rounded-full bg-secondary"><?php echo $Data2->data->identity->username ?></p>
                    </div>
                    <!-- Data User -->
                    <div class="w-2/3 text-primary text-xs md:text-base">
                        <div class="w-full rounded-lg shadow-lg backdrop-blur-md bg-slate-600/80 p-4 text-xs md:text-base">
                            <label for="address" class="font-semibold">Alamat</label>
                            <p id="address" class="text-forth w-full rounded-full py-1 px-4 bg-primary"><?php if(empty($Data2->data->address->street) && empty($Data2->data->address->city) && empty($Data2->data->address->province) && empty($Data2->data->address->country)){ echo "Kosong"; }else{echo $Data2->data->address->street . ", " . $Data2->data->address->city . ", " . $Data2->data->address->province . ", " . $Data2->data->address->country;} ?></p>
                            <label for="created_account" class="font-semibold mt-1">Akun Dibuat</label>
                            <p id="created_account" class="text-forth w-full rounded-full py-1 px-4 bg-primary"><?php echo date("d-m-Y", strtotime($Data2->data->createdAt)); ?></p>
                            <label for="des_account" class="font-semibold mt-1">Deskripsi</label>
                            <p id="des_account" class="text-forth w-full rounded-lg py-1 px-4 bg-primary"><?php if(!empty($Data2->data->identity->description)){ echo $Data2->data->identity->description; }else{ echo "Kosong"; } ?></p>
                        </div>
                        <div class="w-full flex-none md:flex mt-2 py-2 border px-4 rounded-lg">
                            <div class="w-full md:w-1/2 lg:w-fit flex-none md:flex">
                                <button data-modal-target="edit-account" data-modal-toggle="edit-account"  type="button" class="mt-1 md:mt-0 w-full md:w-fit text-xs md:text-base py-2 px-4 mr-2 rounded-full bg-secondary ease-in-out duration-300 transition hover:bg-third hover:shadow-md">Ubah Akun</button>
                                <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "Docs/admin/#" ?>"><button type="button" class="mt-1 md:mt-0 w-full md:w-fit text-xs md:text-base py-2 px-4 mr-2 rounded-full bg-secondary ease-in-out duration-300 transition hover:bg-third hover:shadow-md">Panduan Admin</button></a>
                            </div>
                            <div class="w-full md:w-1/2 lg:w-fit flex-none md:flex">
                                <button data-modal-target="delete-account" data-modal-toggle="delete-account" type="button" class="mt-1 md:mt-0 w-full md:w-fit text-xs md:text-base py-2 px-4 mr-2 rounded-full bg-red-500 ease-in-out duration-300 transition hover:bg-red-700 hover:shadow-md">Hapus Akun</button>
                                <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "signout" ?>"><button type="button" class="mt-1 md:mt-0 w-full md:w-fit text-xs md:text-base py-2 px-4 rounded-full bg-red-500 ease-in-out duration-300 transition hover:bg-red-700 hover:shadow-md">Keluar</button></a>             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Account Detail Section -->

    </main>
    <!-- End of Main -->
    
    <!-- Modal -->
    <!-- Edit Account modal -->
    <div id="edit-account" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Edit Account content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Edit Account header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Atur Akun</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-account">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Edit Account body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="" enctype="multipart/form-data">
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Depan</label>
                                <input type="text" value="<?php echo $Data2->data->identity->first_name; ?>" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Depan Anda" required>
                            </div>
                            <div class="w-1/2">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Belakang</label>
                                <input type="text" name="last_name" value="<?php echo $Data2->data->identity->last_name; ?>" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Belakang Anda" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" value="<?php echo $Data2->data->identity->email; ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="ini@sebuah.email" disabled>
                            </div>
                            <div class="w-1/2">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" name="username" value="<?php echo $Data2->data->identity->username; ?>" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Pengguna" disabled>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="phone" class="w-full block mb-2 text-sm font-medium text-gray-900">Ponsel</label>
                            <div class="w-full flex flex-warp">
                                <div class="w-1/6 mr-1">
                                    <input type="text" id="phone" value="+62" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" disabled>
                                </div>
                                <div class="w-5/6">
                                    <input type="number" name="phone" value="<?php echo ltrim($Data2->data->identity->phone, 62) ?>" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="8123xxxxxx" required>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="w-full mt-2">
                                <label for="desc" class="w-full block mb-2 text-sm font-medium text-gray-900">Deskripsi Akun</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" name="desc" id="desc" cols="30" rows="1" placeholder="Ceritakan sedikit tentang anda 😄🖐"><?php echo $Data2->data->identity->description; ?></textarea>
                            </div>
                            <div class="w-full mt-2">
                                <label for="address" class="w-full block mb-2 text-sm font-medium text-gray-900">Alamat Anda</label>
                                <div class="w-full flex flex-warp">
                                    <input type="text" name="street" value="<?php echo $Data2->data->address->street; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Jalan" required>
                                    <input type="text" name="city" value="<?php echo $Data2->data->address->city; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Kota" required>
                                    <input type="text" name="province" value="<?php echo $Data2->data->address->province; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Provinsi" required>
                                    <input type="text" name="country" value="<?php echo $Data2->data->address->country; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 p-2.5" placeholder="Negara" required>
                                </div>
                            </div>
                            <div class="w-full mt-2">
                                <label for="photo" class="w-full block mb-2 text-sm font-medium text-gray-900">Foto Profil Anda</label>
                                <input type="file" name="file" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" accept="image/png">
                                <small class="text-red-500">*Hanya mendukung file gambar (png) maks 100Kb</small>
                            </div>
                        </div>
                        <button name="edit-account" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ubah Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Account modal -->
    <div id="delete-account" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Delete Account content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Delete Account header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Hapus Akun</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-account">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Delete Account body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email_del" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="ini@email.ya" required>
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                            <input type="text" name="username_del" id="username" placeholder="ininamapengguna" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                        </div>
                        <div class="flex items-center">
                            <input id="link-checkbox" name="agree" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 " required>
                            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dengan ini saya untuk yakin menghapus akun saya</label>
                        </div>
                        <button name="del-account" type="submit" class="w-full text-primary bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modals -->

    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); ?>
    <!-- End of Navbar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Footer.php') ?>
    <!-- End of Footer -->
</body>

</html>