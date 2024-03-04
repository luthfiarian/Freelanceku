<!-- Message modal -->
<div id="message-<?php echo $Data->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Message content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Message header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Pesan</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="message-<?php echo $Data->id ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Message body -->
            <div class="p-4 md:p-5">
                <form action="" method="post" class="w-full">
                    <div>
                        <label for="hire">Pesan Pemilik Proyek</label>
                        <textarea id="hire" rows="2" class="w-full rounded-lg" disabled><?php echo !empty($Data->partner_revmessage) ? $Data->partner_revmessage : "Tidak ada pesan untuk anda 👀" ?></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $Data->id ?>">
                        <label for="message">Pesan Anda</label>
                        <textarea id="message" name="message" rows="2" class="w-full rounded-lg" placeholder="Isi pesan anda"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="send-message" class="w-full rounded-lg text-primary text-center py-2 bg-secondary ease-in-out duration-300 hover:bg-third">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Upload File modal -->
<div id="upload-<?php echo $Data->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Upload File content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Upload File header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Unggah Berkas Pekerjaan</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="upload-<?php echo $Data->id ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Upload File body -->
            <div class="p-4 md:p-5">
                <!-- Previous File -->
                <?php if(!empty($Data->partner_file)): ?>
                <div class="w-full mb-1">
                    <a href="<?php echo BASE_ROOT . $Data->partner_file ?>"><button type="button" class="w-full py-2 rounded-lg text-primary bg-green-500 ease-in-out duration-300 hover:bg-green-600">Unduh Berkas Sebelumnya</button></a>
                </div>
                <?php endif ?>
                <form action="" method="post" class="w-full" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="id" value="<?php echo $Data->id ?>">
                        <label for="file" class="block mb-2 text-sm font-medium text-gray-900">Unggah Berkas Pekerjaan</label>
                        <input type="file" name="file" id="file" placeholder="Front-end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" accept=".zip" required>
                        <small class="text-red-500">*Hanya mendukung file (zip) dan maksimal 20Mb</small>
                    </div>
                    <div>
                        <button type="submit" name="upload-file" class="w-full rounded-lg text-primary text-center py-2 bg-secondary ease-in-out duration-300 hover:bg-third">Kirim Berkas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>