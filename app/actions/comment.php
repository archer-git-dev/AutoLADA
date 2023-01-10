<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    unset($_SESSION['data']);

    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {

        $comment_text = $_POST['comment_text'];

        $_SESSION['data']['comment_text'] = $comment_text;

        if ( strlen($comment_text) <= 5 ) $_SESSION['errors'][] = "Комментарий слишком коротокий";
        if ( strlen($comment_text) >= 1000 ) $_SESSION['errors'][] = "Комментарий слишком длинный";

        if ( count($_SESSION['errors']) === 0 ) {
            
            $blog_id = $_SESSION['blog_id'];
            $user_id = $_SESSION['AUTH_USER_ID'];

            $database->query("INSERT INTO `comments`(`text`, `user_id`, `blog_id`) VALUES('$comment_text', '$user_id', '$blog_id')");
            
            unset($_SESSION['data']);
        }

    }

    header("Location: ../../pages/blog_single.php?blog=$blog_id");
    die();
?>
