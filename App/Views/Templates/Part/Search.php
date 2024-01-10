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
                <div class="flex py-2 md:py-4 justify-center">
                    <div class="pb-2 rounded-2xl border-2 border-forth bg-white bg-opacity-80 shadow-2xl">
                        <img src="<?= CallAny::File('Public/dist/image/search.jpeg') ?>" alt="Search" class="!w-[150px] !h-[100px] md:!w-[200px] md:!h-[150px] rounded-t-xl">
                        <p class="text-center text-sm md:text-base my-1 md:my-2 font-medium md:font-semibold">Pembuat</p>
                        <p class="text-center my-2"><span class="p-0.5 md:p-1 rounded-sm md:rounded-lg border md:border-2 text-sm md:text-base border-forth font-medium mx-0.5">UI/UX</span><span class="p-0.5 md:p-1 rounded-sm md:rounded-lg border md:border-2 text-sm md:text-base border-forth font-medium mx-0.5">Design</span></p>
                        <div class="w-full flex">
                            <a href="http://" target="_blank" rel="noopener noreferrer" class="text-center text-sm md:text-base font-medium text-white mx-auto py-1 px-4 rounded-sm md:rounded-xl bg-forth hover:shadow-lg">Ambil</a>
                        </div>
                    </div>
                </div>
                <div class="flex py-2 md:py-4 justify-center">
                    <div class="pb-2 rounded-2xl border-2 border-forth bg-white bg-opacity-80 shadow-2xl">
                        <img src="<?= CallAny::File('Public/dist/image/search.jpeg') ?>" alt="Search" class="!w-[150px] !h-[100px] md:!w-[200px] md:!h-[150px] rounded-t-xl">
                        <p class="text-center text-sm md:text-base my-1 md:my-2 font-medium md:font-semibold">Pembuat</p>
                        <p class="text-center my-2"><span class="p-0.5 md:p-1 rounded-sm md:rounded-lg border md:border-2 text-sm md:text-base border-forth font-medium mx-0.5">UI/UX</span><span class="p-0.5 md:p-1 rounded-sm md:rounded-lg border md:border-2 text-sm md:text-base border-forth font-medium mx-0.5">Design</span></p>
                        <div class="w-full flex">
                            <a href="http://" target="_blank" rel="noopener noreferrer" class="text-center text-sm md:text-base font-medium text-white mx-auto py-1 px-4 rounded-sm md:rounded-xl bg-forth hover:shadow-lg">Ambil</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-full flex mt-2">
                <table class="table mx-auto">
                    <tr>
                        <td><a href="" class="rounded-xl bg-secondary py-2 px-4 fill-current text-white">&#11207;</a></td>
                        <td><a href="" class="rounded-xl bg-secondary py-2 px-4 fill-current text-white">1</a></td>
                        <td><a href="" class="rounded-xl text-secondary font-semibold py-[6.5px] px-4 fill-current border-2 border-secondary">2</a></td>
                        <td><a href="" class="rounded-xl bg-secondary py-2 px-4 fill-current text-white">&#11208;</a></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</section>