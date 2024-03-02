<!-- Signup user modal -->
<div id="signup-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal signup user content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal signup user header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Daftar</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="signup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal signup user body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="App/Controllers/Signup.php">
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
                    <div class="w-full">
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="w-full inline-flex items-center px-4 py-2 text-sm font-medium text-center text-primary bg-secondary rounded-lg hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary" type="button">Minat Pekerjaan 
                            <svg class="w-2.5 h-2.5 ms-2.5 text-right" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60">
                            <ul class="h-fit px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
                                <?php while ($Interest = mysqli_fetch_assoc($Data)) : ?>
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
                    </div>
                    <div>
                        <label for="passwordClient" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="passwordClient" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,14}" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 14 karakter" required>
                        <small class="text-red-500">*Password (<8,>12) [A-Z],[a-z],[0-9],[!#$.]</small>
                        <div class="w-full mt-2 flex self-center">
                            <input type="checkbox" id="show" class="mr-1 self-center" onclick="seePasswordClient()">
                            <label for="show" class="self-center">Perlihatkan Password</label>
                        </div>
                    </div>
                    <button type="submit" name="signup" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
                <p class="w-full mt-2 text-right">Sudah memiliki akun? <button data-modal-target="login-modal" data-modal-toggle="login-modal" data-modal-hide="signup-modal" class="font-semibold" type="button">Masuk</button></p>
            </div>
        </div>
    </div>
</div>
<script>function seePasswordClient(){var t=document.getElementById("passwordClient");"password"===t.type?t.type="text":t.type="password"}</script>
<!-- End of Signup User Modal -->

<?php if(STATUS_APP == 0 || isset($_SESSION["portal-admin"])): ?>
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
                <form class="space-y-4" method="post" action="App/Controllers/Signup.php">
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
                        <label for="passwordAdmin" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="passwordAdmin" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,14}" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 14 karakter" required>
                        <small class="text-red-500">*Password (<8,>12) [A-Z],[a-z],[0-9],[!#$.]</small>
                        <div class="w-full mt-2 flex self-center">
                            <input type="checkbox" id="show" class="mr-1 self-center" onclick="seePasswordAdmin()">
                            <label for="show" class="self-center">Perlihatkan Password</label>
                        </div>
                    </div>
                    <div>
                        <label for="admin" class="block mb-2 text-sm font-medium text-gray-900">Kunci Admin</label>
                        <input type="text" name="admin_key" id="admin" placeholder="Isi dengan kunci yang telah ditentukan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 14 karakter" title="Kunci Admin : Kunci berada di App/Config/Admin.php" required>
                    </div>
                    <button type="submit" name="signup_admin" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
                <p class="w-full mt-2 text-right">Sudah memiliki akun? <button data-modal-target="login-modal" data-modal-toggle="login-modal" data-modal-hide="signup-admin" class="font-semibold" type="button">Masuk</button></p>
            </div>
        </div>
    </div>
</div>
<!-- End of Signup Admin Modal -->
<?php endif ?>
<script>function seePasswordAdmin(){var t=document.getElementById("passwordAdmin");"password"===t.type?t.type="text":t.type="password"}</script>