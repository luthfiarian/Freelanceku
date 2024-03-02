<!-- Login modal -->
<div id="login-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal login content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal login header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Masuk</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="login-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal login body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="App/Controllers/Signin.php">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" inputmode="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" placeholder="name@company.com" title="Gunakan email yang valid (ini@sebuah.email)" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,14}" title="Harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, satu simbol, dan minimal 8 dan maksimal 12 karakter" required>
                        <div class="w-full mt-2 flex self-center">
                            <input type="checkbox" id="show" class="mr-1 self-center" onclick="seePassword()">
                            <label for="show" class="self-center">Perlihatkan Password</label>
                        </div>
                    </div>
                    <button name="signin" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                </form>
                <p class="w-full text-right mt-2">Belum memiliki akun? <button data-modal-target="signup-modal" data-modal-toggle="signup-modal" data-modal-hide="login-modal" class="text-blue-700 font-semibold" type="button">Buat</button></p>
            </div>
        </div>
    </div>
</div> 
<script>function seePassword(){var t=document.getElementById("password");"password"===t.type?t.type="text":t.type="password"}</script>