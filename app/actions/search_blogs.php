<?php
    session_start();

    require '../database/Database.php';

    global $database;

    unset($_SESSION['search_parametrs']);
    unset($_SESSION['data']);

    $_SESSION['search_parametrs'] = [];

    if (isset($_GET['search_blogs'])) {
        $search_text = $_GET['search_blogs'];
        $_SESSION['data']['search_text'] = $search_text;
        

        $sql = "WHERE title LIKE '%$search_text%'";
        $_SESSION['search_parametrs']['search_text'] = $sql;

        header('Location: ../../pages/blogs.php');
        die();
    }
?>





















