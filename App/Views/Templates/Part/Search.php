<section id="search" class="w-full text-forth">
    <div class="container">
        <div class="w-full px-4 py-10">
            <div class="w-full flex">
                <hr class="w-5 border-2 border-third rounded-l-full">
                <hr class="w-16 border-2 border-secondary rounded-r-full">
            </div>
            <p class="text-sm font-semibold mt-1">Cari Afiliasi Berdasarkan Kategori</p>
            <h1 class="text-xl font-bold mt-1"><?php echo $_GET['category'] ?></h1>
            <div class="w-full lg:w-4/6 grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 mx-auto">
            <?php 
            $Search = 1 ;
            while($Work = mysqli_fetch_assoc($Data)): 
                if($Search == 5){ break; }
                $Workers = 0;
                if(!empty($Work["work_partner1"])){ ++$Workers; }if(!empty($Work["work_partner2"])){ ++$Workers; }if(!empty($Work["work_partner3"])){ ++$Workers; }
                if(($Work["work_maxuser"] == $Workers) || ($Work["work_status"] == 1)){ continue; }
            ?>
                <div class="flex py-2 md:py-4 justify-center">
                    <div class="pb-2 rounded-2xl border-2 border-forth bg-white bg-opacity-80 shadow-2xl">
                        <img src="<?php echo BASE_URI . $Work["work_image"] ?>" alt="Search" class="!w-[150px] !h-[100px] md:!w-[200px] md:!h-[150px] rounded-t-xl">
                        <p class="text-center text-sm md:text-base my-1 md:my-2 font-medium md:font-semibold"><?php echo $Work["work_name"] ?></p>
                        <p class="text-center my-2"><span class="p-0.5 md:p-1 rounded-sm md:rounded-lg border md:border-2 text-sm md:text-base border-forth font-medium mx-0.5"><?php echo $Work["work_field"] ?></span></p>
                        <div class="w-full flex">
                            <button data-modal-target="login-modal" data-modal-toggle="login-modal" type="button" class="text-center text-sm md:text-base font-medium text-white mx-auto py-1 px-4 rounded-sm md:rounded-xl bg-forth hover:shadow-lg">Lihat</button>
                        </div>
                    </div>
                </div>
            <?php $Search++; endwhile;  ?>
            </div>

        </div>
    </div>
</section>