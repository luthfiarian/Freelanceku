<!-- Add Portofolio modal -->
    <div id="add-portofolio" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Add Portofolio content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Add Portofolio header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Tambah Portofolio</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-portofolio">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Add Portofolio body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="" enctype="multipart/form-data">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Portofolio</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="CV. Surya xxx" required>
                        </div>
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                            <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="field" class="block mb-2 text-sm font-medium text-gray-900">Bidang</label>
                            <input type="text" name="field" id="field" placeholder="Front-end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="file" class="block mb-2 text-sm font-medium text-gray-900">Berkas Portofolio</label>
                            <input type="file" name="file" id="file" placeholder="Front-end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" accept=".pdf" required>
                            <small class="text-red-500">*Hanya mendukung file (pdf) dan maksimal 500Kb</small>
                        </div>
                        <button name="add-porto" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambahkan Portofolio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if($Data3->data_paymentstatus == 1): ?>
    <!-- Edit Bank modal -->
    <div id="edit-bank" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal Edit Bank content -->
            <div class="relative bg-primary rounded-lg shadow">
                <!-- Modal Edit Bank header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Edit Bank</h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-bank">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal Edit Bank body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="">
                        <div>
                            <label for="bank" class="block mb-2 text-sm font-medium text-gray-900">Bank</label>
                            <select name="bank" id="bank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                                <?php while($Bank = mysqli_fetch_assoc($Data1)): ?>
                                <option value="<?php echo $Bank["bank_code"] ?>"><?php echo $Bank["bank_name"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <div>
                            <label for="data_paymentid" class="block mb-2 text-sm font-medium text-gray-900">Nomor Rekening Bank</label>
                            <input type="text" name="data_paymentid" value="<?php echo $Data3->data_paymentid ?>" id="data_paymentid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="81231xxxx" required>
                        </div>
                        <button name="edit-payment" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

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
                                <input type="text" value="<?php echo $Data4->data->identity->first_name; ?>" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Depan Anda" required>
                            </div>
                            <div class="w-1/2">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Belakang</label>
                                <input type="text" name="last_name" value="<?php echo $Data4->data->identity->last_name; ?>" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Belakang Anda" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-warp">
                            <div class="w-1/2 mr-1">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" value="<?php echo $Data4->data->identity->email; ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="ini@sebuah.email" disabled>
                            </div>
                            <div class="w-1/2">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" name="username" value="<?php echo $Data4->data->identity->username; ?>" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="Nama Pengguna" disabled>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="phone" class="w-full block mb-2 text-sm font-medium text-gray-900">Ponsel</label>
                            <div class="w-full flex flex-warp">
                                <div class="w-1/6 mr-1">
                                    <input type="text" id="phone" value="+62" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" disabled>
                                </div>
                                <div class="w-5/6">
                                    <input type="number" name="phone" value="<?php echo ltrim($Data4->data->identity->phone, 62) ?>" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="8123xxxxxx" required>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="w-full inline-flex items-center px-4 py-2 text-sm font-medium text-center text-primary bg-secondary rounded-lg hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary" type="button">Minat Pekerjaan
                                <svg class="w-2.5 h-2.5 ms-2.5 text-right" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60">
                                <ul class="h-fit px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
                                    <?php while ($Interest = mysqli_fetch_assoc($Data2)) : ?>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                                <input id="<?php echo $Interest["interest_name"] ?>" type="checkbox" name="interest-<?php echo $Interest["id"] ?>" value="<?php echo $Interest["interest_name"] ?>" class="w-4 h-4 text-third bg-primary border-secondary rounded focus:ring-secondary focus:ring-2">
                                                <label for="<?php echo $Interest["interest_name"] ?>" class="w-full ms-2 text-sm font-medium text-gray-900 rounded"><?php echo $Interest["interest_name"] ?></label>
                                            </div>
                                        </li>
                                    <?php endwhile ?>
                                </ul>
                            </div>
                            <small class="text-red-500">*Minimal 1 dan maksimal 3</small>
                            <div class="w-full mt-2">
                                <label for="desc" class="w-full block mb-2 text-sm font-medium text-gray-900">Deskripsi Akun</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" name="desc" id="desc" cols="30" rows="1" placeholder="Ceritakan sedikit tentang anda 😄🖐" required><?php echo $Data4->data->identity->description; ?></textarea>
                            </div>
                            <div class="w-full mt-2">
                                <label for="address" class="w-full block mb-2 text-sm font-medium text-gray-900">Alamat Anda</label>
                                <div class="w-full flex flex-warp">
                                    <input type="text" name="street" value="<?php echo $Data4->data->address->street; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Jalan" required>
                                    <input type="text" name="city" value="<?php echo $Data4->data->address->city; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Kota" required>
                                    <input type="text" name="province" value="<?php echo $Data4->data->address->province; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 mr-0.5 p-2.5" placeholder="Provinsi" required>
                                    <input type="text" name="country" value="<?php echo $Data4->data->address->country; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-1/4 p-2.5" placeholder="Negara" required>
                                </div>
                            </div>
                            <div class="w-full mt-2">
                                <label for="photo" class="w-full block mb-2 text-sm font-medium text-gray-900">Foto Profil Anda</label>
                                <input type="file" name="file" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" accept="image/png">
                                <small class="text-red-500">*Hanya mendukung file gambar (png) maks 150Kb</small>
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