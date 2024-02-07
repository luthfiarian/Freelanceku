<?php while($Work = mysqli_fetch_assoc($Data4)): ?>

<?php 
    $Self = false;
    if($Work["work_host"] == $Data1->data_email){ $Self = true; }
    $Workers = 0;
    if(!empty($Work["work_partner1"])){ ++$Workers; }if(!empty($Work["work_partner2"])){ ++$Workers; }if(!empty($Work["work_partner3"])){ ++$Workers; }
    if(($Work["work_maxuser"] == $Workers) || ($Work["work_status"] == 1)){ continue; }
?>
<div class="w-full rounded-lg pb-2 border shadow-md bg-gradient-to-tr from-primary to-slate-300">
    <img src="<?php echo BASE_URI . $Work["work_image"] ?>"  alt="Latar Belakang Pekerjaan" class="rounded-t-lg !w-full !h-[100px] md:!h-[75px] lg:!h-[250px] hover:grayscale-[50%]">
    <div class="w-full p-1">
        <p class="text-sm md:text-base font-semibold"><?php echo $Work["work_name"] ?></p>
        <p class="text-[10px] md:text-xs lg:text-sm">
            <!-- Limit Description -->
            <?php 
                $length = strlen($Work["work_des"]);
                $part = substr($Work["work_des"], 0, 50);
                echo $part; if ($length > 50) { echo "..."; }
            ?>
            <!-- End of Limit Description -->
        </p>
        <div class="border my-1 md:my-2 py-1 flex px-2 w-full rounded-lg">
            <span class="w-1/6 md:w-1/3 lg:w-1/2 self-center">
                <svg width="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                    <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                    <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                    <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000" />
                </svg>
            </span>
            <span class="w-5/6 md:w-2/3 lg:w-1/2 text-right text-xs md:text-sm lg:text-base"><?php echo $Work["work_startdate"] ?></span>
        </div>
        <div class="border my-1 md:my-2 py-1 flex px-2 w-full rounded-lg">
            <span class="w-1/3 self-center">
                <svg fill="#000000" width="15px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g><path d="M2,9H9V2H2Zm9-7V9h7V2ZM2,18H9V11H2Zm9,0h7V11H11Z"/></g>
                </svg>
            </span>
            <span class="w-2/3 text-right text-[10px] md:text-xs lg:text-sm"><?php echo $Work["work_field"] ?></span>
        </div>
        <div class="border my-1 md:my-2 py-1 flex px-2 w-full rounded-lg">
            <span class="w-1/2 self-center">
                <svg fill="#000000" width="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" class="">
                    <path d="M23.313 26.102l-6.296-3.488c2.34-1.841 2.976-5.459 2.976-7.488v-4.223c0-2.796-3.715-5.91-7.447-5.91-3.73 0-7.544 3.114-7.544 5.91v4.223c0 1.845 0.78 5.576 3.144 7.472l-6.458 3.503s-1.688 0.752-1.688 1.689v2.534c0 0.933 0.757 1.689 1.688 1.689h21.625c0.931 0 1.688-0.757 1.688-1.689v-2.534c0-0.994-1.689-1.689-1.689-1.689zM23.001 30.015h-21.001v-1.788c0.143-0.105 0.344-0.226 0.502-0.298 0.047-0.021 0.094-0.044 0.139-0.070l6.459-3.503c0.589-0.32 0.979-0.912 1.039-1.579s-0.219-1.32-0.741-1.739c-1.677-1.345-2.396-4.322-2.396-5.911v-4.223c0-1.437 2.708-3.91 5.544-3.91 2.889 0 5.447 2.44 5.447 3.91v4.223c0 1.566-0.486 4.557-2.212 5.915-0.528 0.416-0.813 1.070-0.757 1.739s0.446 1.267 1.035 1.589l6.296 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.809zM30.312 21.123l-6.39-3.488c2.34-1.841 3.070-5.459 3.070-7.488v-4.223c0-2.796-3.808-5.941-7.54-5.941-2.425 0-4.904 1.319-6.347 3.007 0.823 0.051 1.73 0.052 2.514 0.302 1.054-0.821 2.386-1.308 3.833-1.308 2.889 0 5.54 2.47 5.54 3.941v4.223c0 1.566-0.58 4.557-2.305 5.915-0.529 0.416-0.813 1.070-0.757 1.739 0.056 0.67 0.445 1.267 1.035 1.589l6.39 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.779h-4.037c0.61 0.46 0.794 1.118 1.031 2h3.319c0.931 0 1.688-0.757 1.688-1.689v-2.503c-0.001-0.995-1.689-1.691-1.689-1.691z"></path>
                </svg>
            </span>
            <span class="w-1/2 text-sm md:text-base text-right"><?php echo $Workers . " / " . $Work["work_maxuser"] ?></span>
        </div>
        <?php if(!$Self): ?>
        <button data-modal-target="data-<?php echo $Work["id"] ?>" data-modal-toggle="data-<?php echo $Work["id"] ?>" class="w-full text-right text-sm inline-flex items-center px-3 py-2 font-medium text-primary bg-secondary rounded-lg hover:bg-forth focus:ring-4 focus:outline-none focus:ring-secondary">
            Selengkapnya
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </button>
        <?php else: ?>
        <a href="<?php echo PROTOCOL_URL . "://". BASE_URI."work" ?>">
            <button class="w-full text-right text-sm inline-flex items-center px-3 py-2 font-medium text-primary bg-secondary rounded-lg hover:bg-forth focus:ring-4 focus:outline-none focus:ring-secondary">
                <span class="text-xs lg:text-sm">Lihat Milik Anda</span>
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </button>
        </a>
        <?php endif ?>
    </div>
</div>

<?php if(!$Self): ?>
<!-- Modal Search Result work-<?php echo $Work["id"] ?> -->
<div id="data-<?php echo $Work["id"] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal Search Result work-<?php echo $Work["id"] ?> content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Search Result work-<?php echo $Work["id"] ?> header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold text-gray-900 hover:underline">#WORK-<?php echo $Work["id"] ?></h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="data-<?php echo $Work["id"] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Search Result work-<?php echo $Work["id"] ?> body -->
            <div class="p-4 md:p-5">
                <div class="w-full flex flex-warp border rounded-lg p-2 mb-1">
                    <div class="w-1/4 border rounded-lg mr-1">
                        <?php ?>
                    </div>
                    <div class="w-3/4">
                        <p class="w-full text-sm text-justify">
                            <span class="font-semibold">Nama Proyek : </span>
                            <?php echo $Work["work_name"] ?><br>
                            <span class="font-semibold">Bidang Proyek : </span>
                            <?php echo $Work["work_field"] ?><br>
                            <span class="font-semibold">Proyek Dimulai : </span>
                            <?php echo date('d-m-Y', strtotime($Work["work_startdate"])) ?><br>
                            <span class="font-semibold">Proyek Selesai : </span>
                            <?php echo date('d-m-Y', strtotime($Work["work_finishdate"])) ?><br>
                            <span class="font-semibold">Deskripsi :</span><br>
                            <?php echo $Work["work_des"] ?><br>
                        </p>
                    </div>
                </div>
                <p class="w-full block my-2 text-sm font-medium text-gray-900">Daftar Portofolio</p>
                <div class="w-full mb-1 p-2 border rounded-lg relative flex flex-warp overflow-x-auto">
                    <?php if(mysqli_num_rows($Data3) == 0): ?>
                    <div class="w-full">
                        <p class="w-full py-2 text-center font-semibold">Terlihat Tidak ada Portofolio Anda Disini 👀</p>
                        <div class="w-full flex">
                            <a href="<?php echo PROTOCOL_URL . "://" . BASE_URI . "account" ?>" class="mx-auto"><button class="mx-auto text-center py-2 px-4 border rounded-lg transition duration-300 ease-in-out hover:bg-secondary">Tambahkan Portofolio Anda</button></a>
                        </div>
                    </div>

                    <?php else: ?>
                    <?php while($Porto = mysqli_fetch_assoc($Data3)): ?>
                    <!-- Data Portofolio -->
                    <div class="py-1 px-2 mr-1 border rounded-lg w-auto h-auto mb-1 ease-in-out transition duration-150 hover:shadow-md">
                        <p class="w-full font-semibold text-sm text-center"><?php echo $Porto["porto_name"] ?></p>
                        <p class="w-full text-center text-sm"><?php echo $Porto["porto_field"] ?></p>
                        <p class="w-full text-center mb-2"><?php echo date("Y", strtotime($Porto["porto_date"])) ?></p>
                        <a href="<?php echo BASE_URI . $Porto["porto_file"] ?>">
                            <button class="w-full rounded-lg bg-red-500 flex p-1 text-primary">
                                <svg width="25px" height="25px" class="fill-current" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pdf-document</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="add" fill="#000000" transform="translate(85.333333, 42.666667)"> <path d="M75.9466667,285.653333 C63.8764997,278.292415 49.6246897,275.351565 35.6266667,277.333333 L1.42108547e-14,277.333333 L1.42108547e-14,405.333333 L28.3733333,405.333333 L28.3733333,356.48 L40.5333333,356.48 C53.1304778,357.774244 65.7885986,354.68506 76.3733333,347.733333 C85.3576891,340.027178 90.3112817,328.626053 89.8133333,316.8 C90.4784904,304.790173 85.3164923,293.195531 75.9466667,285.653333 L75.9466667,285.653333 Z M53.12,332.373333 C47.7608867,334.732281 41.8687051,335.616108 36.0533333,334.933333 L27.7333333,334.933333 L27.7333333,298.666667 L36.0533333,298.666667 C42.094796,298.02451 48.1897668,299.213772 53.5466667,302.08 C58.5355805,305.554646 61.3626692,311.370371 61.0133333,317.44 C61.6596233,323.558965 58.5400493,329.460862 53.12,332.373333 L53.12,332.373333 Z M150.826667,277.333333 L115.413333,277.333333 L115.413333,405.333333 L149.333333,405.333333 C166.620091,407.02483 184.027709,403.691457 199.466667,395.733333 C216.454713,383.072462 225.530463,362.408923 223.36,341.333333 C224.631644,323.277677 218.198313,305.527884 205.653333,292.48 C190.157107,280.265923 170.395302,274.806436 150.826667,277.333333 L150.826667,277.333333 Z M178.986667,376.32 C170.098963,381.315719 159.922142,383.54422 149.76,382.72 L144.213333,382.72 L144.213333,299.946667 L149.333333,299.946667 C167.253333,299.946667 174.293333,301.653333 181.333333,308.053333 C189.877212,316.948755 194.28973,329.025119 193.493333,341.333333 C194.590843,354.653818 189.18793,367.684372 178.986667,376.32 L178.986667,376.32 Z M254.506667,405.333333 L283.306667,405.333333 L283.306667,351.786667 L341.333333,351.786667 L341.333333,329.173333 L283.306667,329.173333 L283.306667,299.946667 L341.333333,299.946667 L341.333333,277.333333 L254.506667,277.333333 L254.506667,405.333333 L254.506667,405.333333 Z M234.666667,7.10542736e-15 L9.52127266e-13,7.10542736e-15 L9.52127266e-13,234.666667 L42.6666667,234.666667 L42.6666667,192 L42.6666667,169.6 L42.6666667,42.6666667 L216.96,42.6666667 L298.666667,124.373333 L298.666667,169.6 L298.666667,192 L298.666667,234.666667 L341.333333,234.666667 L341.333333,106.666667 L234.666667,7.10542736e-15 L234.666667,7.10542736e-15 Z" id="document-pdf"> </path> </g> </g> </g></svg>
                                <span class="text-xs self-center">Unduh Portofolio</span>
                            </button>
                        </a>
                    </div>
                    <!-- Data Portofolio -->
                    <?php endwhile ?>
                    <?php endif ?>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" value="work-<?php echo $Work["id"] ?>">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Berikan Pesan</label>
                    <textarea name="message" id="message" rows="1" class="w-full resize-y py-2 px-4 rounded-lg" placeholder="Apakah saya dapat bergabung dalam proyek anda ? 😄"></textarea>
                    <button name="request-partner" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Permohonan Bergabung</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php endwhile ?>