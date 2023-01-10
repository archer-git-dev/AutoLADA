<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];

    if (isset($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['data']['email'] = $_POST['email'];

        $user = $database
            ->query("SELECT * FROM `users` WHERE `email` = '$email'")
            ->fetch(PDO::FETCH_ASSOC);

        if ($user == '') {
            $user = [];
        }

        if (empty($user)) $_SESSION['errors'][] = 'Адрес электронной почты не существует!';

        if (!empty($user)) {
            $hash_password = md5($password);

            if ($hash_password !== $user['password']) {
                $_SESSION['errors'][] = 'Пароль введен неверно';
            }

            if (count($_SESSION['errors']) === 0 ) {

                unset($_SESSION['data']);
                
                $_SESSION['AUTH_USER_ID'] = $user['id'];

                // auth for diler phone
                if (!empty($_SESSION['back_to_car']['car_id'])) {
                    $car_id = $_SESSION['back_to_car']['car_id'];
                    header("Location: ../../pages/product.php?car_id=$car_id");
                }else {
                    header('Location: ../../index.php');
                }

                die();
            }
        }
    }

    header('Location: ../../pages/authorization.php');
?>
