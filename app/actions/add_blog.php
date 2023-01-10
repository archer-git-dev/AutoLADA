<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    unset($_SESSION['data']);
    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {
        $blog_title = $_POST['blog_title'];
        $blog_discription = $_POST['blog_discription'];

        $_SESSION['data']['blog_title'] = $blog_title;
        $_SESSION['data']['blog_discription'] = $blog_discription;


        if ( strlen($blog_title) <= 10 ) $_SESSION['errors'][] = "Название блога слишком короткое. Минимум 10 символов";
        if ( strlen($blog_discription) <= 255 ) $_SESSION['errors'][] = "Описание блога слишком короткое. Минимум 255 символов";

        if ( count($_SESSION['errors']) === 0 ) {

            if ($_FILES['blog_photo']) {
                $uploadfile = '../../blogs_images/'.time().$_FILES['blog_photo']['name'];
    
                if (move_uploaded_file($_FILES['blog_photo']['tmp_name'], $uploadfile)) {
                    
                    
                    $blog = [
                        'title' => $blog_title,
                        'text' => $blog_discription,
                        'blog_path' => $uploadfile,
                    ];

                    $insert_blog = $database->prepare("INSERT INTO `blogs`(`title`, `text`, `blog_path`)
                    VALUES (:title, :text, :blog_path)");

                    $insert_blog->execute($blog);

                }
            }


            header('Location: /pages/blog.php');
            die();
        }

    }

    header('Location: pages/add_blog.php');
?>
