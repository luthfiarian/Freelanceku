<!-- Payment modal -->
<div id="add-payment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Payment content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Payment header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Daftar Gerbang Pembayaran</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-payment">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Payment body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="">
                    <div>
                        <label for="bank" class="block mb-2 text-sm font-medium text-gray-900">Bank</label>
                        <select name="bank" id="bank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                            <?php while($Bank = mysqli_fetch_assoc($Data)): ?>
                            <option value="<?php echo $Bank["bank_code"] ?>"><?php echo $Bank["bank_name"] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div>
                        <label for="data_paymentid" class="block mb-2 text-sm font-medium text-gray-900">Nomor Rekening</label>
                        <input type="tel" inputmode="numeric" placeholder="12345xxxx" minlength="5" maxlength="19" name="data_paymentid" id="data_paymentid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5" required>
                    </div>
                    <div class="flex items-center">
                        <input id="link-checkbox" name="data_paymentstatus" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 " required>
                        <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dengan ini saya memahami <a href="#" class="text-blue-600 hover:underline">syarat dan ketentuan</a>.</label>
                    </div>
                    <button name="addpayment" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div> 