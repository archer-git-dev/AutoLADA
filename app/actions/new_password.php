<?php
    session_start();

    require_once('../database/Database.php');
    require('../database/models/User.php');

    global $database;

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];

    if (isset($_POST)) {
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];


        if (empty($password) || empty($re_password)) $_SESSION['errors'][] = 'Введите пароль';
        if (strlen($password) < 8) $_SESSION['errors'][] = 'Пароль должен содержать минимум 8 символов';
        if ($password !== $re_password) $_SESSION['errors'][] = 'Пароли должны совпадать';

        if ( count($_SESSION['errors']) === 0 ) {
            $password = md5($password);

            $user_email = $_SESSION['data']['email'];

            $database
                ->query("UPDATE `users` SET `password` = '$password' WHERE `email` = '$user_email'");

            unset($_SESSION['data']);    

            header('Location: ../../pages/authorization.php');
            die();    

        }

    }

    header('Location: ../../pages/new_password.php');
    die();   

?>
