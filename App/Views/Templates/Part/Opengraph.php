    <!-- Open Graph -->
    <meta property="og:site_name" content="<?= CURRENT_URL ?>" />
    <meta property="og:title" content="<?= $Data['seo_name'] ?>" />
    <meta property="og:type" content="<?= $Data['seo_type'] ?>" />
    <meta property="og:locale" content="<?= $Data['seo_locale'] ?>"  />
    <meta property="og:url" content="<?= CURRENT_URL ?>" />
    <meta property="og:image" content="<?= CallAny::File('Public/dist/image/favicon.png'); ?>" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:description" content="<?= $Data['seo_des'] ?>" />