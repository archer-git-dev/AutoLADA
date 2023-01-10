<?php
    function getAllCommentsById($blog_id) {
        global $database;
        
        $data = $database->query("SELECT * FROM `comments` WHERE `blog_id` = '{$blog_id}' ")->fetchAll(PDO::FETCH_ASSOC);
        

        if ($data == '') {
            $data = [];
        }

        return $data;
    }

    function deleteMessageById($comment_id) {
        global $database;

        $database->query("DELETE FROM `comments` WHERE `id`=$comment_id");

        $blog_id = $_SESSION['blog_id'];

        echo "<script language='JavaScript'> window.location.href = '/pages/blog_single.php?blog=$blog_id'</script>";
        die();     
    }
?>