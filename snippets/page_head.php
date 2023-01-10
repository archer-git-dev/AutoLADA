<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Facebook APP ID -->
    <meta property="fb:app_id" content="12345" />

    <meta name="keywords" content="Car-Dealer, auto-salon, automobile, business, car, car-gallery, car-selling-template, cars, dealer, marketplace, mobile, real estate, responsive, sell, vehicle" />
    <meta name="description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />

    <!-- Open Graph -->
    <meta property="og:site_name" content="Auto Dealer HTML" />
    <meta property="og:title" content="Home" />
    <meta property="og:url" content="http://localhost/01_index.html" />
    <meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
    <meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />

    <!-- Page Title -->
    <title><?= isset($PAGE_TITLE) ? $PAGE_TITLE : "Page" ?> || AutoLada</title>

    <?php

    if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
        require('snippets/resources.php');
    } else {
        require('../snippets/resources.php');
    }

    ?>
</head>