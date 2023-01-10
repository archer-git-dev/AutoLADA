<?php

    session_start();

    require '../database/Database.php';
    require '../database/models/User.php';

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];
    

    if (isset($_POST)) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        
        foreach($_POST as $key => $value) {
            if ($key == 'password' || $key == 'repeat_password') continue;
            $_SESSION['data'][$key] = $value;
        }
    
        $user = getUserByEmail($email);

        if ( strlen($first_name) < 2 ) $_SESSION['errors'][] = "Имя слишком короткое!";
    
        if (!empty($user)) $_SESSION['errors'][] = "Пользователь с электронной почтой: {$user['email']} уже существует!";
    
        if ($password !== $repeat_password) $_SESSION['errors'][] = "Пароли не совпадают!";
    
        if (strlen($password) < 8) $_SESSION['errors'][] = "Минимальная длина пароля 8 символов!";
    
        if (count($_SESSION['errors']) === 0) {

            unset($_SESSION['data']);

            $user = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => md5($password)
            ];
    
            $state = $database->prepare("INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`)
            VALUES (:first_name, :last_name, :email, :password)");
            $state->execute($user);

            $user_id = $database->lastInsertId();
            // $user_auth = getUserByEmail($email);

            $_SESSION['AUTH_USER_ID'] = $user_id;
            
            header('Location: ../../index.php');
            die();
        }
    }

    header('Location: ../../pages/registration.php');
?>