<?php $PartnerData = $Data5->FindUserAPI($Data4->data_apikey, $Data1->partner_username) ?>

<div class="w-full flex flex-warp">
    <div class="w-1/3 self-center text-center"><p class="text-sm font-semibold"><?php echo $PartnerData->data->identity->first_name ?></p></div>
    <div class="w-1/3 flex"><button data-modal-target="data-<?php echo $Data1->id ?>" data-modal-toggle="data-<?php echo $Data1->id ?>" class="py-1 px-2 text-primary bg-secondary rounded-lg ease-in-out duration-300 transition hover:bg-opacity-80">Detail</button></div>
    <div class="w-1/3 flex"><form action="" method="post"><input type="hidden" name="id" value="<?php echo $Data1->id ?>"><input type="hidden" name="name" value="<?php echo $PartnerData->data->identity->first_name ?>"><button name="reject-partner" type="submit" class="py-1 px-2 text-primary bg-red-500 rounded-lg ease-in-out duration-300 transition hover:bg-opacity-80">Tolak</button></form></div>
</div>
<!-- Modal Partner Request -->
<div id="data-<?php echo $Data1->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal Partner Request content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Partner Request header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold text-gray-900 hover:underline"><?php echo $PartnerData->data->identity->first_name ?></h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="data-<?php echo $Data1->id ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Partner Request body -->
            <div class="p-4 md:p-5">
                <p class="w-full">Data Diri Pelamar</p>
                <div class="w-full flex flex-warp">
                    <div class="w-1/2 border rounded-lg mr-1">
                        <table class="table table-auto w-full text-sm">
                            <tr>
                                <td><strong>Nama</strong></td><td>:</td><td><?php echo $PartnerData->data->identity->first_name . ' ' . $PartnerData->data->identity->last_name ?></td>
                            </tr>
                            <tr>
                                <td><strong>Lokasi</strong></td><td>:</td><td><?php echo $PartnerData->data->address->city .", " . $PartnerData->data->address->province . ", " . $PartnerData->data->address->country ?></td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi</strong></td><td>:</td><td><?php echo $PartnerData->data->identity->description ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-1/2">
                        <div class="w-full border rounded-lg"><?php echo $Data1->partner_date ?></div>
                        <div class="w-full border rounded-lg mt-1 max-h-full">
                            <p>Pesan:<br><?php echo $Data1->partner_message ?></p>
                        </div>
                    </div>
                </div>
                <p class="w-full">Portofolio Pelamar</p>
                <div class="w-full mb-1 p-2 border rounded-lg relative flex flex-warp overflow-x-auto">
                <?php 
                    $Data2 = $Data2->FetchPortoUserDB($Data1->partner_email);
                    if(mysqli_num_rows($Data2) == 0): 
                ?>
                    <div class="w-full">
                        <p class="w-full py-2 text-center font-semibold">Terlihat Tidak ada Portofolio Pelamar Disini 👀</p>
                    </div>

                    <?php else: ?>
                    <?php while($Porto = mysqli_fetch_assoc($Data2)): ?>
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
                <div class="w-full flex flex-warp mt-1">
                    <a href="https://wa.me/<?php echo $PartnerData->data->identity->phone ?>" target="_blank" rel="noopener noreferrer" class="w-1/2 mr-1">
                        <button class="w-full flex flex-warp py-2 rounded-lg border self-center text-center ease-in-out duration-300 transition hover:bg-black hover:text-primary">
                            <div class="w-1/2 mx-auto flex">
                                <svg role="img" class="fill-current text-[#25D366] !w-[25px] !h-[25px] mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                <span>Whatsapp</span>
                            </div>
                        </button>
                    </a>
                    <a href="mailto:<?php echo $Data1->partner_email ?>" class="w-1/2">
                        <button class="w-full flex flex-warp py-2 rounded-lg border self-center text-center ease-in-out duration-300 transition hover:bg-black hover:text-primary">
                            <div class="w-1/2 mx-auto flex">
                                <svg role="img" class="fill-current text-[#ff6153] !w-[25px] !h-[25px] mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Gmail</title><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
                                <span>Email</span>
                            </div>
                        </button>
                    </a>
                </div>
                <form action="" method="post" class="w-full mt-1">
                    <?php 
                    $Partner = 0;
                    if(empty($Data3->work_partner1)){
                        ++$Partner;
                    }else{
                        if(empty($Data3->work_partner2)){
                            ++$Partner;
                        }else{
                            if(empty($Data3->work_partner3)){
                                ++$Partner;
                            }else{
                                ++$Partner;
                            }
                        }
                    }
                    ?>
                    <input type="hidden" name="maxuser" value="<?php echo $Data3->work_maxuser ?>">
                    <input type="hidden" name="partner" value="<?php echo $Partner ?>">
                    <input type="hidden" name="email" value="<?php echo $Data1->partner_email ?>">
                    <input type="hidden" name="id" value="<?php echo $Data1->id ?>">
                    <button name="accept-partner" type="submit" class="w-full py-2 rounded-lg bg-secondary text-primary ease-in-out transition duration-300 hover:bg-opacity-80">Terima Pelamar</button>
                </form>
            </div>
        </div>
    </div>
</div>