<?php
    function getAllMesagesById($user_id) {
        global $database;
        
        $data = $database->query("SELECT * FROM `messages` WHERE `user_id` = '{$user_id}' ")->fetchAll(PDO::FETCH_ASSOC);
        

        if ($data == '') {
            $data = [];
        }

        return $data;
    }

    function getMesageById($message_id) {
        global $database;

        $data = $database->query("SELECT * FROM `messages` WHERE `id` = '{$message_id}' ")->fetch(PDO::FETCH_ASSOC);

        if ($data == '') {
            $data = [];
        }

        return $data;
    }

    function getAllAnswerIsNull() {
        global $database;
        
        $data = $database->query("SELECT * FROM `messages` WHERE `answer` IS NULL ")->fetchAll(PDO::FETCH_ASSOC);
        

        if ($data == '') {
            $data = [];
        }

        return $data;
    }


    function deleteMessageById($message_id) {
        global $database;

        $database->query("DELETE FROM `messages` WHERE `id`=$message_id");

        echo '<script language="JavaScript"> window.location.href = "/pages/my_messages.php"</script>';
        die();     
    }
?>




















