<?php while($Work = mysqli_fetch_assoc($Data)): ?>
<div class="w-full rounded-lg pb-2 border shadow-md bg-gradient-to-tr from-primary to-slate-300">
    <img src="<?php echo BASE_ROOT . $Work["work_image"] ?>"  alt="Latar Belakang Pekerjaan" class="rounded-t-lg !w-full !h-[100px] md:!h-[75px] lg:!h-[250px] hover:grayscale-[50%]">
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
            <?php $Workers = 0;
                if(!empty($Work["work_partner1"])){
                    ++$Workers;
                }if(!empty($Work["work_partner2"])){
                    ++$Workers;
                }if(!empty($Work["work_partner3"])){
                    ++$Workers;
                }
            ?>
            <span class="w-1/2 text-sm md:text-base text-right"><?php echo $Workers . " / " . $Work["work_maxuser"] ?></span>
        </div>
        <div class="border my-1 md:my-2 py-1 flex px-2 w-full rounded-lg">
            <span class="text-sm md:text-base w-full text-center"><?php if($Work["work_status"] == 0){ echo "Berjalan"; } else { echo "Selesai"; } ?></span>
        </div>
        
        <form action="" method="post">
            <input type="hidden" name="work-id" value="<?php echo $Work["id"] ?>">
            <button name="work-detail" type="submit" class="w-full text-right text-sm inline-flex items-center px-3 py-2 font-medium text-primary bg-secondary rounded-lg hover:bg-forth focus:ring-4 focus:outline-none focus:ring-secondary">
                Lihat
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </button>
        </form>
    </div>
</div>
<?php endwhile ?>