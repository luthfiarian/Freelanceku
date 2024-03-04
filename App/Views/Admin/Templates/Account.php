<section id="account" class="mt-5">
    <div class="container">
        <div class="w-full flex">
            <div class="w-full flex bg-gradient-to-r from-third to-secondary backdrop-blur-lg rounded-lg py-2 px-4 shadow-xl">
                <img src="<?php echo BASE_ROOT . $Data1->data_photo ?>" alt="Avatar Admin" class="rounded-full !w-[75px] !h-[75px]">
                <div class="font-medium ml-5 text-white self-center">
                    <p>Hai! <?php echo $Data2->data->identity->first_name . " " . $Data2->data->identity->last_name ?> <br><?php echo $Data1->data_email ?></p>
                </div>
            </div>
            <!-- <div class="w-1/3 bg-gradient-to-r from-secondary to-third backdrop-blur-lg rounded-lg py-2 px-4 shadow-xl">
                <a href=""><button class="bg-forth text-primary w-full font-medium rounded-full py-1 duration-300 ease-in-out transition hover:shadow-xl hover:bg-amber-600 hover:text-white">Keluar</button></a><span class="mb-1"></span>
            </div> -->
        </div>
    </div>
</section>