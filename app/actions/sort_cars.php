<?php

session_start();

require '../database/Database.php';

global $database;

unset($_SESSION['data']);
unset($_SESSION['sql_parametrs']);
$_SESSION['data'] = [];
$_SESSION['sql_parametrs'] = [];

if (isset($_POST)) {

    $sort = $_POST['sort_cars'];
    $view_cars = $_POST['view_cars'];

    $_SESSION['data']['sort_cars'] = $sort;
    $_SESSION['data']['view_cars'] = $view_cars;

    $_SESSION['sql_parametrs']['view_cars'] = "LIMIT $view_cars";

    switch ($_SESSION['data']['sort_cars']) {
        case 'По дате размещения':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY created_at";
            break;
        case 'По убыванию цены':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY price DESC";
            break;
        case 'По возрастанию цены':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY price ASC";
            break;
        case 'По году: новое':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY price DESC";
            break;
        case 'По году: старше':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY price ASC";
            break;
        case 'По модели':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY model";
            break;
        case 'По пробегу':
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY mileage";
            break;
        default:
            $_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY created_at";
            break;
    }

    header('Location: ../../pages/catalog.php?page=1');
    die();
}
