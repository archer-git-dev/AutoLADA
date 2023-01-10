<?php
    session_start();

    require_once('../database/Database.php');

    global $database;

    unset($_SESSION['errors']);
    unset($_SESSION['data']);

    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {

        $reject_reason = $_POST['reject_reason'];

        $_SESSION['data']['reject_reason'] = $reject_reason;

        if ( strlen($reject_reason) <= 10 ) $_SESSION['errors'][] = "Ответ слишком короткий";

        if ( count($_SESSION['errors']) === 0 ) {
            
            $car_id = $_SESSION['car_id'];

            $database
                ->query("UPDATE `cars` SET `status` = 0, `reject_reason` = '$reject_reason'  WHERE `id` = $car_id");
            
            unset($_SESSION['data']);
            unset($_SESSION['car_id']);
        }else {
            $car_id = $_SESSION['car_id'];

            header('Location: ../../pages/reject_car.php?reject_car='.$car_id);
            die();
        }

    }

    header('Location: ../../pages/admin_check.php');
    die();
?>
