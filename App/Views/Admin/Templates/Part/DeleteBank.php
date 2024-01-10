<!-- Add bank modal -->
<div id="deletebank-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Hapus Bank
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="" enctype="multipart/form-data" >
                    <?php if(is_array($Data)): ?>
                    <div>
                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Bank</label>
                        <select name="id" id="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <?php $i = 0; while($Data): ?>
                            <option value="<?php echo $Data['id'] ?>"><?php echo $Data['bank_name'] ?></option>
                            <?php $i++; if($i < count($Data)){ break; } endwhile ?>
                        </select>
                    </div>
                    <button type="submit" name="deletebank" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus Bank</button>
                    <?php else: echo "Tidak ada data bank"; endif; ?>
                </form>
            </div>
        </div>
    </div>
</div> 
