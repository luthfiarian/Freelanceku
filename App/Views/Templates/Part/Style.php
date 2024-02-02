    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo CallAny::File('Public/dist/image/favicon.png'); ?>" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo CallAny::File('Public/dist/css/style.css'); ?>"> 

    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&display=swap" rel="stylesheet">

    <?php if(STATUS_APP == 1){CallFileApp::RequireOnce("Views/Debug.php");} ?>