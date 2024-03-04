    <!-- Modal -->
    <button id="userDetail" data-modal-target="static-modal" data-modal-toggle="static-modal" class="hidden" type="button"></button>
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="text-sm md:text-base hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative backdrop-blur-md bg-white/70 rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between py-2 px-4">
                    <h3 class="text-xl font-semibold text-gray-900">
                        <?php echo $Data->userapi->data->identity->first_name ?>
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="w-full flex">
                        <div class="w-1/3 mr-2 flex self-center">
                            <img src="<?php echo BASE_ROOT . $Data->userdb->data_photo ?>" class="mx-auto" alt="Foto <?php echo $Data->userapi->data->identity->first_name ?>" width="50%">
                        </div>
                        <div class="w-2/3">
                            <table class="table table-auto w-full">
                                <tr><td>Nama</td><td>:</td><td><?php echo $Data->userapi->data->identity->first_name. " " .  $Data->userapi->data->identity->last_name ?></td></tr>
                                <tr><td>Nama Pengguna</td><td>:</td><td><?php echo $Data->userapi->data->identity->username ?></td></tr>
                                <tr><td>Nomor Ponsel</td><td>:</td><td><a href="https://wa.me/<?php echo $Data->userapi->data->identity->phone ?>" target="_blank" rel="noopener noreferrer">+<?php echo $Data->userapi->data->identity->phone ?></a></td></tr>
                                <tr><td>Email</td><td>:</td><td><a href="mailto:<?php echo $Data->userapi->data->identity->email ?>"><?php echo $Data->userapi->data->identity->email ?></a></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><?php echo !empty($Data->userapi->data->address->street) ? $Data->userapi->data->address->street . ", " . $Data->userapi->data->address->city .", ". $Data->userapi->data->address->province . ", " . $Data->userapi->data->address->country : "Belum mengisi" ?></td></tr>
                                <tr><td>Deskripsi</td><td>:</td><td><?php echo !empty($Data->userapi->data->address->description) ? $Data->userapi->data->address->description : "Belum mengisi" ?></td></tr>
                                <tr><td>Dibuat</td><td>:</td><td><?php echo date('d M Y', strtotime($Data->userapi->data->createdAt)) ?></td></tr>
                                <tr><td>Diubah (API)</td><td>:</td><td><?php echo date('d M Y', strtotime($Data->userapi->data->updatedAt)) ?></td></tr>
                            </table>
                        </div>
                    </div>
                    <!-- Portofolio -->
                    <div class="w-full">
                        <h4 class="text-lg font-semibold">Portofolio (<?php $QueryPorto = mysqli_num_rows($Data->portofolio); echo $QueryPorto ?>)</h4>
                        <div class="w-full mb-1 p-2 border rounded-lg relative flex flex-warp overflow-x-auto">
                            <?php if($QueryPorto == 0): ?>
                            <div class="w-full">
                                <p class="w-full py-2 text-center font-semibold">Terlihat Tidak ada Portofolio <?php echo $Data->userapi->data->identity->first_name. " " .  $Data->userapi->data->identity->last_name ?> 👀</p>
                            </div>
                            <?php else: ?>
                            <?php while($Porto = mysqli_fetch_assoc($Data->portofolio)): ?>
                            <!-- Data Portofolio -->
                            <div class="py-1 px-2 mr-1 border rounded-lg w-auto h-auto mb-1 ease-in-out transition duration-150 hover:shadow-md">
                                <p class="w-full font-semibold text-sm text-center"><?php echo $Porto["porto_name"] ?></p>
                                <p class="w-full text-center text-sm"><?php echo $Porto["porto_field"] ?></p>
                                <p class="w-full text-center mb-2"><?php echo date("Y", strtotime($Porto["porto_date"])) ?></p>
                                <a href="<?php echo BASE_ROOT . $Porto["porto_file"] ?>">
                                    <button class="w-full rounded-lg bg-red-500 flex p-1 text-primary">
                                        <svg width="25px" height="25px" class="fill-current" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pdf-document</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="add" fill="#000000" transform="translate(85.333333, 42.666667)"> <path d="M75.9466667,285.653333 C63.8764997,278.292415 49.6246897,275.351565 35.6266667,277.333333 L1.42108547e-14,277.333333 L1.42108547e-14,405.333333 L28.3733333,405.333333 L28.3733333,356.48 L40.5333333,356.48 C53.1304778,357.774244 65.7885986,354.68506 76.3733333,347.733333 C85.3576891,340.027178 90.3112817,328.626053 89.8133333,316.8 C90.4784904,304.790173 85.3164923,293.195531 75.9466667,285.653333 L75.9466667,285.653333 Z M53.12,332.373333 C47.7608867,334.732281 41.8687051,335.616108 36.0533333,334.933333 L27.7333333,334.933333 L27.7333333,298.666667 L36.0533333,298.666667 C42.094796,298.02451 48.1897668,299.213772 53.5466667,302.08 C58.5355805,305.554646 61.3626692,311.370371 61.0133333,317.44 C61.6596233,323.558965 58.5400493,329.460862 53.12,332.373333 L53.12,332.373333 Z M150.826667,277.333333 L115.413333,277.333333 L115.413333,405.333333 L149.333333,405.333333 C166.620091,407.02483 184.027709,403.691457 199.466667,395.733333 C216.454713,383.072462 225.530463,362.408923 223.36,341.333333 C224.631644,323.277677 218.198313,305.527884 205.653333,292.48 C190.157107,280.265923 170.395302,274.806436 150.826667,277.333333 L150.826667,277.333333 Z M178.986667,376.32 C170.098963,381.315719 159.922142,383.54422 149.76,382.72 L144.213333,382.72 L144.213333,299.946667 L149.333333,299.946667 C167.253333,299.946667 174.293333,301.653333 181.333333,308.053333 C189.877212,316.948755 194.28973,329.025119 193.493333,341.333333 C194.590843,354.653818 189.18793,367.684372 178.986667,376.32 L178.986667,376.32 Z M254.506667,405.333333 L283.306667,405.333333 L283.306667,351.786667 L341.333333,351.786667 L341.333333,329.173333 L283.306667,329.173333 L283.306667,299.946667 L341.333333,299.946667 L341.333333,277.333333 L254.506667,277.333333 L254.506667,405.333333 L254.506667,405.333333 Z M234.666667,7.10542736e-15 L9.52127266e-13,7.10542736e-15 L9.52127266e-13,234.666667 L42.6666667,234.666667 L42.6666667,192 L42.6666667,169.6 L42.6666667,42.6666667 L216.96,42.6666667 L298.666667,124.373333 L298.666667,169.6 L298.666667,192 L298.666667,234.666667 L341.333333,234.666667 L341.333333,106.666667 L234.666667,7.10542736e-15 L234.666667,7.10542736e-15 Z" id="document-pdf"> </path> </g> </g> </g></svg>
                                        <span class="text-xs self-center">Unduh Portofolio</span>
                                    </button>
                                </a>
                            </div>
                            <!-- End of Data Portofolio -->
                            <?php endwhile ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Work -->
                    <div class="w-full">
                        <h4 class="text-lg font-semibold">Pekerjaan (<?php $QueryWork = mysqli_num_rows($Data->work); echo $QueryWork; ?>)</h4>
                        <div class="w-full mb-1 p-2 border rounded-lg flex flex-warp" style="<?php if(3 <= $QueryWork){ echo "height: 13rem; overflow-y: auto;"; } ?>">
                            <?php if($QueryWork == 0): ?>
                            <div class="w-full">
                                <p class="w-full py-2 text-center font-semibold">Terlihat Tidak ada pekerjaan <?php echo $Data->userapi->data->identity->first_name. " " . $Data->userapi->data->identity->last_name  ?> 👀</p>
                            </div>
                            <?php else: ?>
                                <!-- Work Data -->
                            <table class="table table-auto w-full text-center">
                                <thead class="font-semibold">
                                    <tr class="sticky top-0">
                                        <td class="bg-white/65 backdrop-blur-md rounded-l-full">ID</td><td class="bg-white/65 backdrop-blur-md">Nama</td><td class="bg-white/65 backdrop-blur-md">Status</td><td class="bg-white/65 backdrop-blur-md">Maks Mitra</td><td class="bg-white/65 backdrop-blur-md">Tawaran</td><td class="bg-white/65 backdrop-blur-md">Bidang</td><td class="bg-white/65 backdrop-blur-md">Mitra 1</td><td class="bg-white/65 backdrop-blur-md">Mitra 2</td><td class="bg-white/65 backdrop-blur-md">Mitra 3</td><td class="bg-white/65 backdrop-blur-md">Dimulai</td><td class="bg-white/65 backdrop-blur-md rounded-r-full">Selesai</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($Work = mysqli_fetch_assoc($Data->work)): ?>
                                    <tr class="group">
                                        <td class="p-1 ease-in-out duration-150 group-hover:bg-secondary group-hover:rounded-lg">work-<?php echo $Work["id"] ?></td>
                                        <td><?php echo $Work["work_name"] ?></td>
                                        <td><?php echo $Work["work_status"] == 0 ? "Berjalan" : "Selesai" ?></td>
                                        <td><?php echo $Work["work_maxuser"] ?></td>
                                        <td><?php echo $Work["work_salary"] ?></td>
                                        <td><?php echo $Work["work_field"] ?></td>
                                        <td><?php echo !empty($Work["work_partner1"]) ? "<form method='post'><input type='hidden' name='email' value='{$Work["work_partner1"]}'><input type='submit' name='client-detail' value='{$Work["work_partner1"]}' class='rounded-lg px-2 bg-secondary cursor-help'></form>" : " - " ?></td>
                                        <td><?php echo !empty($Work["work_partner2"]) ? "<form method='post'><input type='hidden' name='email' value='{$Work["work_partner2"]}'><input type='submit' name='client-detail' value='{$Work["work_partner1"]}' class='rounded-lg px-2 bg-secondary cursor-help'></form>" : " - " ?></td>
                                        <td><?php echo !empty($Work["work_partner3"]) ? "<form method='post'><input type='hidden' name='email' value='{$Work["work_partner3"]}'><input type='submit' name='client-detail' value='{$Work["work_partner1"]}' class='rounded-lg px-2 bg-secondary cursor-help'></form>" : " - " ?></td>
                                        <td><?php echo date('d M Y', strtotime($Work["work_startdate"])) ?></td>
                                        <td><?php echo date('d M Y', strtotime($Work["work_finishdate"])) ?></td>
                                    </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                            <!-- End of Work Data -->
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Partner -->
                    <div class="w-full">
                        <h4 class="text-lg font-semibold">Mitra (<?php $QueryPartner = mysqli_num_rows($Data->partner); echo $QueryPartner; ?>)</h4>
                        <div class="w-full mb-1 p-2 border rounded-lg flex flex-warp" style="<?php if(3 <= $QueryPartner){ echo "height: 13rem; overflow-y: auto;"; } ?>">
                            <?php if($QueryPartner == 0): ?>
                            <div class="w-full">
                                <p class="w-full py-2 text-center font-semibold">Terlihat Tidak ada pekerjaan <?php echo $Data->userapi->data->identity->first_name. " " . $Data->userapi->data->identity->last_name  ?> 👀</p>
                            </div>
                            <?php else: ?>
                                <!-- Partner Data -->
                            <table class="table table-auto w-full text-center">
                                <thead class="font-semibold">
                                    <tr class="sticky top-0">
                                        <td class="bg-white/65 backdrop-blur-md rounded-l-full">ID</td><td class="bg-white/65 backdrop-blur-md">Tanggal</td><td class="bg-white/65 backdrop-blur-md">Status</td><td class="bg-white/65 backdrop-blur-md rounded-r-full">Berkas</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($Partner = mysqli_fetch_assoc($Data->partner)): ?>
                                    <tr class="group">
                                        <td class="p-1 ease-in-out duration-150 group-hover:bg-secondary group-hover:rounded-lg">work-<?php echo $Partner["partner_workid"] ?></td>
                                        <td><?php echo $Partner["partner_date"] ?></td>
                                        <td><?php echo ($Partner["partner_reqstatus"] == 0 ? "Proses" : $Partner["partner_reqstatus"] == 1) ? "Diterima" : "Ditolak" ?></td>
                                        <td><a href="<?php echo !empty($Partner["partner_file"]) ? BASE_ROOT . $Partner["partner_file"] : "#" ?>" class="bg-secondary rounded-lg text-primary py-1 px-4">Unduh Berkas</a></td>
                                    </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                            <!-- End of Partner Data -->
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Transaction -->
                    <div class="w-full flex">
                        <!-- Income -->
                        <div class="w-1/2 mr-2">
                            <h4 class="text-lg font-semibold">Riwayat Pendapatan (<?php $QueryIncome = mysqli_num_rows($Data->income); echo $QueryIncome; ?>)</h4>
                            <div class="w-full mb-1 p-2 border rounded-lg flex flex-warp" style="<?php if(3 <= $QueryIncome){ echo "height: 13rem; overflow-y: auto;"; } ?>">
                                <?php if($QueryIncome == 0): ?>
                                <div class="w-full">
                                    <p class="w-full py-2 text-center font-semibold">Terlihat belum ada pendapatan <?php echo $Data->userapi->data->identity->first_name. " " . $Data->userapi->data->identity->last_name  ?> 👀</p>
                                </div>
                                <?php else: ?>
                                    <!-- Income Data -->
                                <table class="table table-auto w-full text-center">
                                    <thead class="font-semibold">
                                        <tr class="sticky top-0">
                                            <td class="bg-white/65 backdrop-blur-md rounded-l-full">ID</td><td class="bg-white/65 backdrop-blur-md">Tanggal</td><td class="bg-white/65 backdrop-blur-md">Jumlah Uang</td><td class="bg-white/65 backdrop-blur-md rounded-r-full">Pengirim</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($Income = mysqli_fetch_assoc($Data->income)): ?>
                                        <tr class="group">
                                            <td class="p-1 ease-in-out duration-150 group-hover:bg-secondary group-hover:rounded-lg">work-<?php echo $Income["trx_id"] ?></td>
                                            <td><?php echo date('d M Y', strtotime($Income["trx_date"])) ?></td>
                                            <td>Rp. <?php echo $Income["trx_amount"] ?></td>
                                            <td><?php echo "<form method='post'><input type='hidden' name='email' value='{$Income["trx_fromemail"]}'><input type='submit' name='client-detail' value='{$Income["trx_fromemail"]}' class='rounded-lg px-2 bg-secondary cursor-help'></form>" ?></td>
                                        </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                                <!-- End of Income Data -->
                                <?php endif ?>
                            </div>
                        </div>
                        <!-- Transfer -->
                        <div class="w-1/2">
                            <h4 class="text-lg font-semibold">Riwayat Transfer (<?php $QueryTransfer = mysqli_num_rows($Data->transfer); echo $QueryTransfer; ?>)</h4>
                            <div class="w-full mb-1 p-2 border rounded-lg flex flex-warp" style="<?php if(3 <= $QueryTransfer){ echo "height: 13rem; overflow-y: auto;"; } ?>">
                                <?php if($QueryTransfer == 0): ?>   
                                <div class="w-full">
                                    <p class="w-full py-2 text-center font-semibold">Terlihat belum ada pendapatan <?php echo $Data->userapi->data->identity->first_name. " " . $Data->userapi->data->identity->last_name  ?> 👀</p>
                                </div>
                                <?php else: ?>
                                    <!-- Income Data -->
                                <table class="table table-auto w-full text-center">
                                    <thead class="font-semibold">
                                        <tr class="sticky top-0">
                                            <td class="bg-white/65 backdrop-blur-md rounded-l-full">ID</td><td class="bg-white/65 backdrop-blur-md">Waktu</td><td class="bg-white/65 backdrop-blur-md">Jumlah Uang</td><td class="bg-white/65 backdrop-blur-md">Status</td><td class="bg-white/65 backdrop-blur-md">Penerima</td><td class="bg-white/65 backdrop-blur-md rounded-r-full">Metode</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($Transfer = mysqli_fetch_assoc($Data->transfer)): ?>
                                        <tr class="group">
                                            <td class="p-1 ease-in-out duration-150 group-hover:bg-secondary group-hover:rounded-lg"><?php echo $Transfer["trf_id"] ?></td>
                                            <td><?php echo date('d M Y H:I', strtotime($Transfer["trf_date"])) ?></td>
                                            <td>Rp. <?php echo $Transfer["trf_amount"] ?></td>
                                            <td><?php echo $Transfer["trf_status"] ?></td>
                                            <td><?php echo "<form method='post'><input type='hidden' name='email' value='{$Transfer["trf_toemail"]}'><input type='submit' name='client-detail' value='{$Transfer["trf_toemail"]}' class='rounded-lg px-2 bg-secondary cursor-help'></form>" ?></td>
                                            <td><?php echo !empty($Transfer["trf_type"]) ? $Transfer["trf_type"] : "-" ?></td>
                                        </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                                <!-- End of Income Data -->
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="w-full flex items-center p-2 rounded-b">
                    <button data-modal-hide="static-modal" type="button" class="mx-auto text-white bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>window.onload = function () {document.getElementById("userDetail").click(); }; $(document).ready(function() {$("#userDetail").click(); });</script>
    <!-- End of Modal -->