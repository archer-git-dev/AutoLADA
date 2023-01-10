<?php
        session_start();

        if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
            require_once('app/database/Database.php');
            require_once('app/useful/Useful.php');
        } else {
            require_once('../app/database/Database.php');
            require_once('../app/useful/Useful.php');
        }

         
        global $database;

        $AUTH_USER = NULL;
    
        if (isset($_SESSION['AUTH_USER_ID'])) {
            $AUTH_USER = $database
            ->query("SELECT * FROM `users` WHERE `id` = " . $_SESSION['AUTH_USER_ID'])
            ->fetch(PDO::FETCH_ASSOC);
        }
    
        // echo "<pre>";
        // print_r($AUTH_USER);
        // echo "</pre>";
