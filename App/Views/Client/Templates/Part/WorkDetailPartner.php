<?php 
    $PartnerData = $Data5->FindUserAPI($Data4->data_apikey, $Data2->partner_username);
    if(isset($_SESSION["TRX_DATA"])){ if($_SESSION["TRX_DATA"]["snap_appears"] == true){ echo "<script>window.snap.pay('{$_SESSION["TRX_DATA"]["token"]}')</script>"; $_SESSION["TRX_DATA"]["snap_appears"] = false; } }
?>

<div class="container mt-2">
    <div class="w-full flex flex-warp">
        <!-- Image Profile Partner-->
        <div class="w-2/6 mr-1">
            <center><img src="<?php echo BASE_ROOT . $Data1->data_photo ?>" alt="Foto Profil <?php echo $PartnerData->data->identity->first_name ?>" class="w-full mx-0 md:w-1/2 lg:w-1/3 md:mx-auto"></center>
        </div>
        <!-- Data Partner -->
        <div class="w-4/6 mx-auto">
            <!-- Name Partner -->
            <p class="w-full border rounded-lg bg-gray-300 px-2 py-1 md:px-4 text-sm md:text-base font-semibold"><?php echo $PartnerData->data->identity->first_name . ' ' . $PartnerData->data->identity->last_name ?></p>
            
            <div class="w-full flex flex-warp mt-1">
                <a href="<?php echo !empty($Data2->partner_file) ?  BASE_ROOT . $Data2->partner_file : '#' ?>" class="w-1/3 mr-1"><button type="button" class="w-full text-xs md:text-sm lg:text-base p-1 border rounded-lg ease-in-out duration-300 transition hover:bg-black hover:text-primary h-auto"><span class="mr-0 md:mr-1">⏬</span><span class="hidden md:!contents">File</span></button></a>  
                <button data-modal-target="modal-<?php echo $PartnerData->data->identity->first_name ?>" data-modal-toggle="modal-<?php echo $PartnerData->data->identity->first_name ?>" type="button" class="w-1/3 mx-auto text-xs md:text-sm lg:text-base mr-1 p-1 border rounded-lg ease-in-out duration-300 transition hover:bg-black hover:text-primary h-auto"><span class="mr-0 md:mr-1">📝</span><span class="hidden md:!contents">Pesan</span></button>
                <button data-modal-target="call-<?php echo $PartnerData->data->identity->first_name ?>" data-modal-toggle="call-<?php echo $PartnerData->data->identity->first_name ?>" type="button" class="w-1/3 mx-auto text-xs md:text-sm lg:text-base p-1 border rounded-lg ease-in-out duration-300 transition hover:bg-black hover:text-primary h-auto"><span class="mr-0 md:mr-0.5">📲</span><span class="hidden md:!contents">Hubungi</span></button>
            </div>
            <?php if($Data3->work_status == 1 && !empty($Data2->partner_file) && !isset($_SESSION["TRX_DATA"])): ?>
                <form action="" method="post" class="w-full mt-1">
                    <input type="hidden" name="username-partner" value="<?php echo $PartnerData->data->identity->username ?>">
                    <input type="hidden" name="email-partner" value="<?php echo $Data2->partner_email ?>">
                    <button type="submit" name="transaction" class="w-full text-sm lg:text-base py-1 px-4 border rounded-lg ease-in-out duration-300 transition hover:bg-black hover:text-primary">Transfer</button>
                </form>
            <?php elseif(isset($_SESSION["TRX_DATA"]) && ($_SESSION["WORK_DETAIL"])): $Token = $_SESSION["TRX_DATA"]["token"] ?>
            <div class="w-full mt-1">
                <button type="button" onclick="window.snap.pay('<?php echo $Token ?>')" class="w-full flex text-sm lg:text-base py-1 px-4 border rounded-lg ease-in-out duration-300 transition hover:bg-black hover:text-primary">
                    <span class="w-2/3 text-right">Bayar sekarang</span>
                    <span class="w-1/3 self-center flex">
                        <svg class="animate-spin fill-current ml-2" width="20px" height="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 399.387 399.387" xml:space="preserve" stroke="#ff9999"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M340.896,58.488C303.18,20.771,253.033,0,199.694,0C146.353,0,96.207,20.771,58.491,58.488 C20.772,96.206,0,146.354,0,199.693c0,53.342,20.772,103.489,58.491,141.206c37.716,37.717,87.863,58.488,141.203,58.488 c53.337,0,103.486-20.771,141.203-58.488c37.719-37.718,58.49-87.865,58.49-141.206C399.387,146.355,378.615,96.207,340.896,58.488 z M199.694,77.457c67.402,0,122.236,54.835,122.236,122.236s-54.834,122.236-122.236,122.236S77.457,267.094,77.457,199.693 S132.292,77.457,199.694,77.457z M328.061,328.062c-34.289,34.287-79.877,53.17-128.367,53.17 c-48.491,0-94.079-18.883-128.367-53.17c-34.289-34.287-53.173-79.877-53.173-128.37h41.148 c0,77.411,62.979,140.391,140.392,140.391c77.412,0,140.39-62.979,140.39-140.391c0-77.412-62.979-140.391-140.39-140.391 c-4.594,0-9.134,0.229-13.615,0.662v-41.31c4.508-0.332,9.049-0.5,13.615-0.5c48.49,0,94.078,18.883,128.367,53.171 c34.289,34.289,53.172,79.878,53.172,128.368C381.232,248.186,362.35,293.775,328.061,328.062z"></path> </g> </g></svg>
                    </span>
                </button>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>

<!-- Message Partner modal -->
<div id="modal-<?php echo $PartnerData->data->identity->first_name ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Message Partner content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Message Partner header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Beri Pesan</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-<?php echo $PartnerData->data->identity->first_name ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Message Partner body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="post" action="">
                    <input type="hidden" name="name" value="<?php echo $PartnerData->data->identity->first_name ?>">
                    <input type="hidden" name="id" value="<?php echo $Data2->id ?>">
                    <div>
                        <label for="message-<?php echo $PartnerData->data->identity->first_name ?>" class="block mb-2 text-sm font-medium text-gray-900">Pesan <?php echo $PartnerData->data->identity->first_name ?></label>
                        <textarea id="message-<?php echo $PartnerData->data->identity->first_name ?>" cols="30" rows="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5 cursor-not-allowed" disabled><?php echo !empty($Data2->partner_message) ? $Data2->partner_message : 'Tidak ada Pesan 🖊' ?></textarea>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Pesan Anda</label>
                        <textarea name="message" id="message" cols="30" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-third focus:border-third block w-full p-2.5"></textarea>
                    </div>
                    <button name="add-message" type="submit" class="w-full text-primary bg-secondary hover:bg-third focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Call Partner modal -->
<div id="call-<?php echo $PartnerData->data->identity->first_name ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal Call Partner content -->
        <div class="relative bg-primary rounded-lg shadow">
            <!-- Modal Call Partner header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Hubungi</h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="call-<?php echo $PartnerData->data->identity->first_name ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Call Partner body -->
            <div class="p-4 md:p-5">
                <div class="w-full flex flex-warp mt-1">
                    <a href="https://wa.me/<?php echo $PartnerData->data->identity->phone ?>" target="_blank" rel="noopener noreferrer" class="w-1/2 mr-1">
                        <button class="w-full flex flex-warp py-2 rounded-lg border self-center text-center ease-in-out duration-300 transition hover:bg-black hover:text-primary">
                            <div class="w-1/2 mx-auto flex">
                                <div class="w-1/3">
                                    <svg role="img" class="fill-current text-[#25D366] !w-[25px] !h-[25px] mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                </div>
                                <div class="w-2/3">
                                    <p>WhatsApp</p>
                                </div>
                            </div>
                        </button>
                    </a>
                    <a href="mailto:<?php echo $Data2->partner_email ?>" class="w-1/2">
                        <button class="w-full flex flex-warp py-2 rounded-lg border self-center text-center ease-in-out duration-300 transition hover:bg-black hover:text-primary">
                            <div class="w-1/2 mx-auto flex">
                                <div class="w-1/3">
                                    <svg role="img" class="fill-current text-[#ff6153] !w-[25px] !h-[25px] mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Gmail</title><path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/></svg>
                                </div>
                                <div class="w-2/3">
                                    <p>Email</p>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>