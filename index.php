<?php

    require_once('snippets/base.php');

    $PAGE_TITLE = "Home";

    function dd($item) {
        echo '<pre>';
        print_r($item);
        echo '</pre>';
    }

    //dd($AUTH_USER);
 

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('snippets/page_head.php');?>
<body class="page">
    <?php
        include('snippets/header.php');
        include('pages/home.php');
        include('snippets/footer.php');
    ?>
</body>
</html>