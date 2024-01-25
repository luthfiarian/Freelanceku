<header class="bg-transparent absolute transition ease-in-out text-forth top-0 left-0 w-full flex items-center z-10 py-8 md:py-5 lg:py-3">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <!-- Logo -->
                <div class="px-4">
                    <a href=""><h1 class="text-xl font-bold "><span class="!text-secondary">{{</span> <span class="text-forth brand">Freelanceku</span> <span class="!text-secondary">}}</span></h1></a>
                </div>
                <!-- Button Navbar -->
                <div class="flex items-center px-4">
                    <!-- Humberger navigasi -->
                    <button class="block absolute right-4 lg:hidden" type="button" name="hamburger" id="hamburger">
                        <span class="garis-navbar transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="garis-navbar transition duration-300 ease-in-out"></span>
                        <span class="garis-navbar transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group"><a href="" class="text-base font-semibold py-2 mx-8 flex text-forth group-hover:!text-secondary transition duration-300 ease-in-out">Beranda</a></li>
                            <li class="group"><a href="#about" class="text-base font-semibold py-2 mx-8 flex text-forth group-hover:!text-secondary transition duration-300 ease-in-out">Tentang</a></li>
                            <li class="group"><a href="#rating" class="text-base font-semibold py-2 mx-8 flex text-forth group-hover:!text-secondary transition duration-300 ease-in-out">Testimoni</a></li>
                            <?php if(isset($_SESSION["fk-session"])): ?>
                            <li class="group"><a href="<?php if($_SESSION["fk-session"] === "fk-808080"){echo PROTOCOL_URL . "://" . BASE_URL . "admin/dashboard";} else {echo PROTOCOL_URL . "://" . BASE_URL . "dashboard";} ?>"><button class="text-base text-forth font-semibold py-2 mx-8 flex group-hover:!text-green-400 transition duration-300 ease-in-out">Dashboard</button></a></li>
                            <li class="group"><a href="<?php echo BASE_URI . "signout" ?>"><button class="text-base text-forth font-semibold py-2 mx-8 flex group-hover:!text-red-400 transition duration-300 ease-in-out">Keluar</button></a></li>
                            <?php else : ?>
                            <li class="group"><button data-modal-target="signup-modal" data-modal-toggle="signup-modal" class="text-base text-forth font-semibold py-2 mx-8 flex group-hover:!text-green-400 transition duration-300 ease-in-out">Daftar</button></li>
                            <li class="group"><button data-modal-target="login-modal" data-modal-toggle="login-modal" class="text-base text-forth font-semibold py-2 mx-8 flex group-hover:!text-red-400 transition duration-300 ease-in-out">Masuk</button></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>