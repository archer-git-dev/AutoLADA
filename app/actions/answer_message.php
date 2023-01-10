<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    unset($_SESSION['data']);

    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {

        $message_answer = $_POST['message_answer'];

        $_SESSION['data']['message_answer'] = $message_answer;

        if ( strlen($message_answer) <= 1 ) $_SESSION['errors'][] = "Ответ слишком короткий";

        if ( count($_SESSION['errors']) === 0 ) {
            
            $message_id = $_SESSION['message_id'];

            $database->query("UPDATE `messages` SET `answer` = '$message_answer' WHERE `id` = '{$message_id}'");
            
            unset($_SESSION['data']);
            unset($_SESSION['message_id']);
        }

    }

    header('Location: ../../pages/admin_messages.php');
    die();
?>
