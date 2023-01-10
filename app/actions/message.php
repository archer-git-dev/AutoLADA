<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    unset($_SESSION['data']);
    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {

        $message_text = $_POST['message_text'];
        $user_id = $_SESSION['AUTH_USER_ID'];

        $_SESSION['data']['message_text'] = $message_text;

        if ( strlen($message_text) <= 10 ) $_SESSION['errors'][] = "Текст сообщения слишком короткий";

        if ( count($_SESSION['errors']) === 0 ) {
            
            $database->query("INSERT INTO `messages`(`text`, `answer`, `user_id`) VALUES('$message_text', NULL, '$user_id')");
            
            unset($_SESSION['data']);
        }

    }

    header('Location: ../../pages/contacts.php');
    die();
?>
