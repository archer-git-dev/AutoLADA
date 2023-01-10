<?php

    function getUserById($id) {
        global $database;

        $data = $database->query("SELECT * FROM `users` WHERE `id` = '{$id}' ")->fetch(PDO::FETCH_ASSOC);

        if ($data == '') {
            $data = [];
        }

        return $data;
    }


    
    function getUserByEmail($email) {
        global $database;

        $data = $database->query("SELECT * FROM `users` WHERE `email` = '{$email}' ")->fetch(PDO::FETCH_ASSOC);

        if ($data == '') {
            $data = [];
        }

        return $data;
    }


?>