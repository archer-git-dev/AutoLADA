<?php
    session_start();

    require_once('../database/Database.php');
    require('../database/models/User.php');

    global $database;

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];

    if (isset($_POST)) {
        $email = $_POST['email'];
        $_SESSION['data']['email'] = $email;

        if (empty($email)) $_SESSION['errors'][] = 'Введите E-mail';

        $user = getUserByEmail($email);

        if (empty($user)) {

            $_SESSION['errors'][] = 'Веденный E-mail отсутствует в нашей системе';
            header('Location: ../../pages/forget_password.php');
            die();

        }else {

            header('Location: ../../pages/new_password.php');
            die();

        } 

    }

?>
