<!-- Login Modal -->
<div id="signup-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Login content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Login header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">Daftar</h3>
            </div>
            <!-- Login body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="App/Controllers/Register.php" method="post">
                    <div>
                        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">Nama Depan</label>
                        <input type="text" name="first_name" id="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Nama Depan" required>
                    </div>
                    <div>
                        <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Nama Belakang</label>
                        <input type="text" name="last_name" id="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Nama Belankang" required>
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Nama Pengguna" required>
                        <small class="text-red-500">*Nama pengguna tidak menggunakan karakter khusus</small>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Nomor Ponsel</label>
                        <div class="w-full flex">
                            <input type="text" class="w-1/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5" value="+62" disabled>
                            <input type="number" name="phone" id="phone" class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5" placeholder="Nomor Ponsel" required>
                        </div>
                    </div>
                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Alamat" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi Anda</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div> 
