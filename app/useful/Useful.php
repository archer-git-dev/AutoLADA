<?php
    function phone_format($phone) 
    {
        $phone = trim($phone);
     
        $res = preg_replace(
            array(
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',	
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',					
            ), 
            array(
                '+7 ($2) $3-$4-$5', 
                '+7 ($2) $3-$4-$5', 
                '+7 ($2) $3-$4-$5', 
                '+7 ($2) $3-$4-$5', 	
                '+7 ($2) $3-$4', 
                '+7 ($2) $3-$4', 
            ), 
            $phone
        );
     
        return $res;
    }

    function navigationMobile($url) {
        if (strpos($url, 'index.php')) return 'Главная';
        if (strpos($url, 'about_us.php')) return 'О нас';
        if (strpos($url, 'blogs.php')) return 'Наш блог';
        if (strpos($url, 'add_product.php')) return 'Для дилеров';
        if (strpos($url, 'contacts.php')) return 'Контакты';
        if (strpos($url, 'catalog.php')) return 'Каталог';
        if (strpos($url, 'authorization.php')) return 'Войти';
        return 'Навигация';
    }
?>