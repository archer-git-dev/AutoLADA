<?php

    session_start();

    require '../database/Database.php';

    global $database;

    unset($_SESSION['search_parametrs']);

    $_SESSION['search_parametrs'] = [];

    if (isset($_POST)) {

        foreach( $_POST as $key => $value ) {
            if ($key == 'model') {
                $_SESSION['search_parametrs'][$key] = $value;
            }
            else {
                $_SESSION['search_parametrs'][$key] = (int)str_replace(' ', '', $value);
            }
        }

        header('Location: ../../pages/catalog.php?page=1');
        die();
    }

?>
