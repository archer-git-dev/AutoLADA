<?php

function public_path($file_path)
{
    if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
        echo $file_path;
    }
    else {
        echo '..' . DIRECTORY_SEPARATOR . $file_path;
    }
    
}

?>

<link rel="stylesheet" type="text/css" href="<?php public_path('css/style.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style980.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style800.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style700.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style600.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style500.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/style400.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php public_path('css/jquery.fancybox'); ?>-1.3.4.css" media="screen" />
<link rel="stylesheet" href=<?php public_path("css/font-awesome/css/font-awesome.min.css")?>>
<!--[if IE]>
    <link href="css/style_ie.css" rel="stylesheet" type="text/css">
    <![endif]-->
<script type="text/javascript" src="<?php public_path('js/my_script.js') ?>" defer></script>
<script type="text/javascript" src="<?php public_path('js/jquery-1.8.3.min.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.easing.1.3.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.bxslider.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.mousewheel.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.selectik.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.fancybox-1.3.4.pack.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.countdown.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/jquery.checkbox.js') ?>"></script>
<script type="text/javascript" src="<?php public_path('js/js.js') ?>"></script>
