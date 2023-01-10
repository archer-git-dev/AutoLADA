<?php

    session_start();

    require '../database/Database.php';
    require '../database/models/User.php';
    

    global $database;

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];
    $_SESSION['data'] = [];

    if (isset($_POST)) {
        $model = $_POST['model'];
        $year_production = $_POST['year_production'];
        $body_type = $_POST['body_type'];
        $fuel = $_POST['fuel'];
        $transmission = $_POST['transmission'];
        $color = $_POST['color'];
        $engine = $_POST['engine'];
        $mileage = (int)str_replace(' ', '', $_POST['mileage']);
        $price = (int)str_replace(' ', '', $_POST['price']);
        $connection_phone = $_POST['connection_phone'];
        $connection_email= $_POST['connection_email'];

        foreach($_POST as $key => $value) {
            $_SESSION['data'][$key] = $value;
        }

        if (count($_POST) < 11) $_SESSION['errors'][] = "Не выбраны или не заполнены все поля!";
        if ($price < 30000  || $price > 5000000) $_SESSION['errors'][] = "Неприемлемая цена для автомобиля. Интервал цены 30 000 - 5 000 000 ₽.";
        if ($mileage  < 0  || $mileage  > 1000000) $_SESSION['errors'][] = "Неприемлемый пробег для автомобиля. Пробег до 1 млн тыс. км.";
        if (count($_FILES['photos']['name']) !== 6) $_SESSION['errors'][] = "Необходимо загрузить 6 изображений автомобиля.";

        if (count($_SESSION['errors']) === 0) {

            unset($_SESSION['data']);

            $user_id = $_SESSION['AUTH_USER_ID'];

            $car = [
                'status' => 1,
                'model' => $model,
                'year_production' => $year_production,
                'transmission' => $transmission,
                'mileage' => $mileage,
                'body_type' => $body_type,
                'color' => $color,
                'fuel' => $fuel,
                'engine' => $engine,
                'price' => $price,
                'connection_phone' => $connection_phone,
                'connection_email' => $connection_email,
                'view' => 0,
                'user_id' => $user_id,
            ];

            $insert_car = $database->prepare("INSERT INTO `cars`(`status`, `model`, `year_production`, `transmission`, `mileage`, `body_type`, `color`, `fuel`, `engine`, `price`, `connection_phone`, `connection_email`, `view`, `user_id`)
            VALUES (:status, :model, :year_production, :transmission, :mileage, :body_type, :color, :fuel, :engine, :price, :connection_phone, :connection_email, :view, :user_id)");

            $insert_car->execute($car);

            $car_id = $database->lastInsertId();

            // normalize multiple $FILES
            function reArrayFiles(&$file_post) {

                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);
            
                for ($i=0; $i<$file_count; $i++) {
                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }
            
                return $file_ary;
            }

            if ($_FILES['photos']) {
                $file_ary = reArrayFiles($_FILES['photos']);
            
                foreach ($file_ary as $file) {

                    $uploadfile = '../../cars_images/'.time().$file['name'];

                    if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                        $uploadfile = implode('', array_slice(str_split($uploadfile), 3));
                        $database->query("INSERT INTO `cars_images`(`path`, `user_id`, `car_id`) VALUES('$uploadfile', '$user_id', '$car_id')");
                    }
                }
            }

            header('Location: ../../pages/my_added_products.php');
            die();
        }

        
            
    }

    header('Location: ../../pages/add_product.php');

?>