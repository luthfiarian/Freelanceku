<!DOCTYPE html>
<html lang="<?php echo $Data1->seo_lang ?>">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?php echo $Data1->seo_author ?>">
    <meta name="keywords" content="<?php echo $Data1->seo_keyword ?>">
    <meta name="description" content="<?php echo $Data1->seo_des ?>">
    <!-- Title -->
    <title>Freelanceku </title>

    <!-- Open Graph -->
    <meta property="og:site_name" content="<?php echo CURRENT_URL ?>" />
    <meta property="og:title" content="<?php echo $Data1->seo_name ?>" />
    <meta property="og:type" content="<?php echo $Data1->seo_type ?>" />
    <meta property="og:locale" content="<?php echo $Data1->seo_locale ?>"  />
    <meta property="og:url" content="<?php echo CURRENT_URL ?>" />
    <meta property="og:image" content="<?php echo BASE_ROOT . 'Public/dist/image/favicon.png' ?>" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:description" content="<?php echo $Data1->seo_des ?>" />
    
    <?php CallFileApp::RequireOnce("Views/Templates/Part/PWA.php");?>
    
    <!-- Canonical -->
    <link rel="canonical" href="<?php echo CURRENT_URL ?>">
    
    <?php CallFileApp::RequireOnce("Views/Templates/Part/Style.php");?>
</head>

<body>
    <!-- Header -->
    <?php CallFileApp::RequireOnce('Views/Templates/Header.php') ?>
    <!-- End of Header -->
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Alert.php') ?>

    <!-- Main -->
    <main class="py-5">

        <!-- Hero Section -->
        <section id="hero" class="w-full text-forth">
            <div class="w-full px-4 pt-20 pb-32 md:pt-16 lg:pt-32 md:pb-20 flex container">
                <div class="!w-full md:!w-3/4 self-center flex">
                    <div class="!w-full lg:!w-3/4 mx-auto">
                        <div class="w-full">
                            <p class="text-xs md:text-sm font-semibold">Selamat Datang! 🖐</p>
                            <h1 class="text-lg md:text-2xl lg:text-3xl font-semibold">Temukan Rekan Kerja Anda, dan<br>Mulailah Bisnis Anda Disini</h1>
                        </div>
                        <form action="" method="get" class="md:w-3/4 lg:w-1/2 flex mt-5">
                            <input type="search" name="category" class="w-full px-4 py-2 rounded-l-full shadow-lg" autocomplete="off" autofocus placeholder="Cari Kategori Pekerjaan Anda">
                            <input type="submit" value="Cari" class="px-4 py-2 text-white text-base md:text-lg font-medium md:font-semibold bg-secondary ease-in-out duration-300 transition rounded-r-full hover:bg-forth shadow-lg">
                        </form>
                        <div class="w-full flex mt-4">
                            <p class="text-[12px] md:text-sm md:font-semibold self-center">Kategori : </p><span class="px-1"></span>
                            <a href="?category=Website" class="text-[12px] md:text-sm md:font-semibold py-0.5 px-1 md:py-1 md:px-2 border-2 border-forth rounded-lg transition duration-150 ease-in-out hover:bg-white hover:shadow-lg">Website</a><span class="px-1"></span>
                            <a href="?category=UI/UX" class="text-[12px] md:text-sm md:font-semibold py-0.5 px-1 md:py-1 md:px-2 border-2 border-forth rounded-lg transition duration-150 ease-in-out hover:bg-white hover:shadow-lg">UI/UX</a><span class="px-1"></span>
                            <a href="?category=Design" class="text-[12px] md:text-sm md:font-semibold py-0.5 px-1 md:py-1 md:px-2 border-2 border-forth rounded-lg transition duration-150 ease-in-out hover:bg-white hover:shadow-lg">Design</a>
                        </div>
                    </div>
                </div>
                <div class="!hidden md:!contents md:!w-1/4 self-center">
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/bag.png' ?>" class="md:!w-[250px] mx-auto drop-shadow-2xl smooth-bounce-hero" alt="Hero Image" srcset="">
                </div>
            </div>
        </section>
        <!-- End of Hero Section -->

        <!-- Present Section -->
        <section id="present" class="w-full text-forth">
            <div class="container p-4">
                <div class="w-full">
                    <h1 class="text-center font-semibold uppercase tracking-[10px]">Persembahan</h1>
                </div>
                <div class="w-full lg:w-1/2 mx-auto flex mt-2">
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/umsida.png' ?>" title="Universitas Muhammadiyah Sidoarjo" alt="Umsida Logo" class="grayscale !w-[100px] md:!w-[150px] mx-auto self-center hover:grayscale-0">
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/km.png' ?>" title="Kampus Merdeka" alt="Kampus Merdeka Logo" class="grayscale !w-[100px] md:!w-[150px] mx-auto self-center hover:grayscale-0">
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/sinta.png' ?>" title="Sinta" alt="Sinta Logo" class="grayscale !w-[100px] md:!w-[150px] mx-auto self-center hover:grayscale-0">
                </div>
            </div>
        </section>
        <!-- End of Present Section -->

        <!-- Search Section -->
        <?php  if(isset($_GET['category'])){ CallFileApp::RequireOnceData('Views/Templates/Part/Search.php', $Data4); } ?>
        <!-- End of Search Section -->

        <!-- About Section -->
        <section id="about" class="bg-forth text-primary w-full shadow-lg">
            <div class="container">
                <div class="w-full lg:w-5/6 mx-auto px-4 py-10 flex">
                    <div class="w-full md:w-4/6 lg:w-5/6 self-start">
                        <div class="w-full flex">
                            <hr class="w-5 border-2 border-third rounded-l-full">
                            <hr class="w-16 border-2 border-secondary rounded-r-full">
                        </div>
                        <p class="text-sm font-semibold mt-1">Tentang Kami</p>
                        <h1 class="text-xl font-bold mt-1">Mengapa Harus Bergabung dengan Kami ?</h1>
                        <p class="mt-5">Siap memulai perjalanan freelance Anda? Bergabunglah dengan 'Freelanceku' sekarang dan temukan peluang tak terbatas!</p>
                    </div>
                    <div class="!hidden md:!contents md:w-2/6 lg:w-1/6">
                        <div class="w-full flow-root self-center">
                            <img src="<?php echo BASE_ROOT . 'Public/dist/image/cs.png'; ?>" alt="About Image" class="float-right self-center rounded-xl shadow-lg !w-[200px]">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of About Section -->

        <!-- Rating Section -->
        <section id="rating" class="w-full text-forth">
            <div class="container">
                <div class="w-full lg:w-5/6 mx-auto px-4 py-10 !h-80">
                    <div class="w-full flex">
                        <hr class="w-5 border-2 border-third rounded-l-full">
                        <hr class="w-16 border-2 border-secondary rounded-r-full">
                    </div>
                    <p class="text-sm font-semibold mt-1">Rating Pelanggan</p>
                    <h1 class="text-xl font-bold mt-1">Apa Kata Mereka ?</h1>
                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <!-- Rating 1 -->
                            <div class="swiper-slide">  
                                <figure class="max-w-screen-md mx-auto text-center">
                                    <svg class="w-10 h-10 smooth-bounce-hero mx-auto mb-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                        <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                                    </svg>
                                    <blockquote>
                                        <p class="text-base md:text-xl lg:text-2xl italic font-medium text-gray-900">"Freelanceku telah memberi saya akses ke berbagai proyek yang sesuai dengan keahlian saya. Sangat memuaskan!"</p>
                                    </blockquote>
                                    <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                                        <img class="w-6 h-6 rounded-full" src="<?php echo BASE_ROOT . 'Public/dist/image/akmad.jpg' ?>" alt="Akmad Pebrian picture">
                                        <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500-700">
                                            <cite class="pe-3 font-medium text-gray-900">Akmad Pebrian</cite>
                                            <cite class="ps-3 text-sm text-gray-500">CEO at Pesenkopiku</cite>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <!-- Rating 2 -->
                            <div class="swiper-slide">  
                                <figure class="max-w-screen-md mx-auto text-center">
                                    <svg class="w-10 h-10 smooth-bounce-hero mx-auto mb-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                        <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                                    </svg>
                                    <blockquote>
                                        <p class="text-base md:text-xl lg:text-2xl italic font-medium text-gray-900">"Saya sangat bersyukur menemukan 'Freelanceku'. Tempat yang sempurna untuk mengekspresikan kreativitas dan mendapatkan penghasilan."</p>
                                    </blockquote>
                                    <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                                        <img class="w-6 h-6 rounded-full" src="<?php echo BASE_ROOT . 'Public/dist/image/rappi.jpg' ?>" alt="Rappi Puttera picture">
                                        <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500-700">
                                            <cite class="pe-3 font-medium text-gray-900">Rappi Puttera</cite>
                                            <cite class="ps-3 text-sm text-gray-500">CEO at Tukangparkirku</cite>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-button-next fill-current text-third"></div>
                        <div class="swiper-button-prev fill-current text-third"></div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Rating Section -->

    </main>
    <!-- End of Main -->

    <?php
    if(isset($_SESSION["fk-session"])){ 
        if(str_contains($_SESSION["fk-session"], "fk-808080-")){ CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); } 
        else if(str_contains($_SESSION["fk-session"], "fk-FFFFFF-")){ CallFileApp::RequireOnce("Views/Client/Templates/NavbarBottom.php"); }
    }
    ?>

    <!-- Modal -->
    <?php 
    CallFileApp::RequireOnce('Views/Templates/Part/Signin.php');
    CallFileApp::RequireOnceData('Views/Templates/Part/Signup.php', $Data2)
    ?>

    <!-- Footer -->
    <?php $Footer = (object) array(
        "host"        => PROTOCOL_URL . "://" . BASE_URL,
        "description" => $Data1->seo_des,
        "phone"       => $Data3->identity_phone,
        "address"     => $Data3->identity_address,
        "maps_embed"  => $Data3->identity_maps_embed,
        "maps_link"   => $Data3->identity_maps_link,
        "medsos"      => (object) array(
            "ig"      => $Data3->identity_ig,
            "linkedin"=> $Data3->identity_linkedin,
            "x"       => $Data3->identity_x,
            "fb"      => $Data3->identity_fb
        )
    ); CallFileApp::RequireOnceData('views/templates/Footer.php', $Footer) ?>
    <!-- End of Footer -->
    
    <!-- Javascript -->
    <?php CallFileApp::RequireOnce("Views/Templates/Part/Javascript.php") ?>
    <!-- Navbar -->
    <script src="<?php echo BASE_ROOT .'Public/dist/js/navbar.js' ?>"></script>
    <!-- Swipper's JS -->
    <script src="<?php echo BASE_ROOT . 'node_modules/swiper/swiper-bundle.min.js' ?>"></script>
    <!-- Initialize Swiper -->
    <script>var swiper=new Swiper(".mySwiper",{cssMode:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".swiper-pagination"},mousewheel:!0,keyboard:!0});</script>
    <!-- End of Javascript -->

    <!-- PWA Register Service Worker Javascript -->
    <?php CallFileApp::RequireOnce("Views/Templates/Part/RegisSWPWA.php");?>
    <!-- End of PWA Register Service Worker Javascript -->

    <?php
        // Generator start_url & id in manifest.json
        // Location manifest.json
        $manifestPath = "Public/dist/pwa/manifest.json";
        // Read file manifest.json
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (($manifest['start_url'] != CURRENT_URL) || empty($manifest['start_url'])) {
            // Change value start_url
            $manifest['start_url'] = CURRENT_URL;

            if(($manifest['id'] != BASE_URI) || empty($manifest['id'])){
                $manifest['id'] = BASE_URI;
                // Replace new file manifest.json
                file_put_contents($manifestPath, json_encode($manifest, JSON_UNESCAPED_SLASHES));
            }else{
                // Replace new file manifest.json
                file_put_contents($manifestPath, json_encode($manifest, JSON_UNESCAPED_SLASHES));
            }
        }
        //  End of Generator start_url & id in manifest.json 
    ?>
</body>

</html>