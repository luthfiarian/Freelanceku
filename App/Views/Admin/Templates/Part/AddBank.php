<!-- Add bank modal -->
<div id="addbank-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah bank
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="" enctype="multipart/form-data" >
                    <div>
                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Bank</label>
                        <input type="text" name="bank_name" id="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Titil" required>
                    </div>
                    <div>
                        <label for="bank_username" class="block mb-2 text-sm font-medium text-gray-900">Username Bank</label>
                        <input type="text" name="bank_username" id="bank_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="titil" required>
                        <smal class="text-xs text-red-500">*Berikan username tanpa spasi, karakter khusus, dan angka</smal>
                    </div>
                    <div>
                        <label for="bank_account" class="block mb-2 text-sm font-medium text-gray-900">Rekening Bank</label>
                        <input type="text" name="bank_account" id="bank_account" placeholder="4356xxxx" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="bank_image" class="block mb-2 text-sm font-medium text-gray-900">Logo Bank</label>
                        <input type="file" name="bank_image" id="bank_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" accept=".png," required>
                        <small class="text-xs text-red-500">*Upload hanya gambar (*.png), maksimum 200Kb</small>
                    </div>
                    <button type="submit" name="addbank" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambahkan Bank</button>
                </form>
            </div>
        </div>
    </div>
</div> 
