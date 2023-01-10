<?php

    session_start();

    require '../database/Database.php';
    require '../database/models/User.php';
    

    global $database;

    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];


    if (isset($_POST)) {

        $car_id = $_SESSION['edit_data']['id'];

        foreach($_POST as $key => $value) {

            if ( $_SESSION['edit_data'][$key] != $value ) {

                
                if ($key == 'mileage' || $key == 'price') {

                    if ( $_SESSION['edit_data'][$key] != (int)str_replace(' ', '', $value) ) {


                        if ( $key == 'price' ) {

                            $price = (int)str_replace(' ', '', $value);

                            if ($price < 30000  || $price > 5000000) {
                                $_SESSION['errors'][] = "Неприемлемая цена для автомобиля. Интервал цены 30 000 - 5 000 000 ₽.";
                            }else {
                                 // update db
                                 $database
                                    ->query("UPDATE `cars` SET `price`='$price'  WHERE `id`=$car_id");
                            } 
                        }
    
                        if ( $key == 'mileage' ) {

                            $mileage = (int)str_replace(' ', '', $value);

                            if ($mileage  > 1000000) {
                                $_SESSION['errors'][] = "Неприемлемый пробег для автомобиля. Пробег должен быть до 1 млн тыс. км.";
                            }else {
                                // update db
                                $database
                                ->query("UPDATE `cars` SET `mileage`='$mileage'  WHERE `id`=$car_id");
                            }

                        }
                    }

                }else {
                    // update db
                    $database
                    ->query("UPDATE `cars` SET ${key}='${value}' WHERE `id`=$car_id");
                }

            }



        }

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

            if ($_FILES['update']) {

                $file_ary = reArrayFiles($_FILES['update']);

                for ($i = 0; $i < 6; $i++) {

                    if ( !empty($file_ary[$i]['name']) ) {
                        // new name for img
                        $file_name = str_replace(' ', '', $file_ary[$i]['name']);
                        $uploadfile = '../../cars_images/'.time().$file_name;

                        // id img that need update
                        $update_img_id = $_SESSION['edit_data']['car_paths'][$i]['car_path_id'];


                        if (move_uploaded_file($file_ary[$i]['tmp_name'], $uploadfile)) {
                            $uploadfile = implode('', array_slice(str_split($uploadfile), 3));
                            $database->query("UPDATE `cars_images` SET `path` = '$uploadfile' WHERE `id` = $update_img_id");
                        }
                    }


                }

            }
           
            $database->query("UPDATE `cars` SET `status` = 1 WHERE `id`=$car_id");
            
    }

    if (!empty($_SESSION['errors'])) {
        header('Location: ../../pages/edit_product.php?edit_car='.$car_id);
    }else {
        header('Location: ../../pages/my_added_products.php');
    }
    

?>