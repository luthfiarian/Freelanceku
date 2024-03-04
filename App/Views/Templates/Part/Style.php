    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo BASE_ROOT . 'Public/dist/image/favicon.png' ?>" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_ROOT . 'Public/dist/css/style.css' ?>"> 

    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&display=swap" rel="stylesheet">

    <?php if(STATUS_APP == 0){CallFileApp::RequireOnce("Views/Debug.php");} ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>