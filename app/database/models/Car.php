<?php
    function getUserCars($user_id) {
        global $database;

        $arr_cars = $database
            ->query("SELECT * FROM `cars` WHERE `user_id`='$user_id'")
            ->fetchAll(PDO::FETCH_ASSOC);

        $full_cars = [];
        
        foreach($arr_cars as $car) {
            $car_id = $car['id'];
            $arr_images = $database
                ->query("SELECT * FROM `cars_images` WHERE `car_id`='$car_id'")
                ->fetchAll(PDO::FETCH_ASSOC);

            $car['car_paths'] = [];
            foreach($arr_images as $image) {

                $car['car_paths'][] = [
                    'car_path_id' => $image['id'],
                    'path' => $image['path']
                ]; 

            }

            array_push($full_cars, $car);

        }

        return $full_cars;
    }

    function getSingleCar($car_id) {
        global $database;

        $user_id = $database
            ->query("SELECT `user_id` FROM `cars` WHERE `id`='$car_id'")
            ->fetch(PDO::FETCH_ASSOC); 

        
        $cars = getUserCars($user_id['user_id']);

        $single_car = [];
        foreach($cars as $car) {
            if ($car['id'] == $car_id) {
                $single_car = $car;
                return $single_car;
            }
        }

        return $single_car;
    }

    function views_update($id) {
        global $database;

        $database->query("UPDATE `cars` SET view = view + 1 WHERE `id` = '$id'");
    }

    function getAllCars($limit_params = [], $search_params = []) {
        global $database;

        if ( !empty($limit_params) && !empty($search_params) ) {

            $sql_search = searchParams($search_params);

            $order = $limit_params[0];
            $limit = $limit_params[1];
            $offset = $limit_params[2];

            $arr_cars = $database
            ->query("SELECT * FROM `cars`" . " $sql_search" . " $order" . " $limit" . " $offset")
            ->fetchAll(PDO::FETCH_ASSOC);

        }
        else if ( !empty($limit_params) && empty($search_params) ) {
            
            $order = $limit_params[0];
            $limit = $limit_params[1];
            $offset = $limit_params[2];

            $arr_cars = $database
            ->query("SELECT * FROM `cars` WHERE status = 2" . " $order" . " $limit" . " $offset")
            ->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $arr_cars = $database
            ->query("SELECT * FROM `cars` WHERE status = 2 ORDER BY `view`")
            ->fetchAll(PDO::FETCH_ASSOC);
        }

        $full_cars = [];
        
        foreach($arr_cars as $car) {
            $car_id = $car['id'];
            $arr_images = $database
                ->query("SELECT * FROM `cars_images` WHERE `car_id`='$car_id'")
                ->fetchAll(PDO::FETCH_ASSOC);


            $car['car_paths'] = [];
            foreach($arr_images as $image) {

                $car['car_paths'][] = [
                    'car_path_id' => $image['id'],
                    'path' => $image['path']
                ]; 
                
            }

            array_push($full_cars, $car);

        }

        return $full_cars;

    }


    function countRow($table, $search_params = []) {
        global $database;

        if (!empty($search_params)) {

            $sql_search = searchParams($search_params);

            $sql = "SELECT COUNT(*) FROM $table" . " $sql_search";

        }else {
            $sql = "SELECT COUNT(*) FROM $table";
        }


        
        $query = $database->prepare($sql);
        $query->execute();
        
        return $query->fetchColumn();

    }


    function searchParams($search_params = []) {
        $sql_search = "WHERE id != 0 AND status = 2";

        if (!empty($search_params['model']) && $search_params['model'] !== 'Любая'){
            $model = $search_params['model'];
            $sql_search .= " AND `model`='$model'";
        }
        
        if (!empty($search_params['from_year_production'])){
            $from_year_production = $search_params['from_year_production'];
            $sql_search .= " AND `year_production` >= '$from_year_production'";
        }

        if (!empty($search_params['to_year_production'])){
            $to_year_production = $search_params['to_year_production'];
            $sql_search .= " AND `year_production` <= '$to_year_production'";
        }

        
        if (!empty($search_params['from_price'])){
            $from_price = $search_params['from_price'];
            $sql_search .= " AND `price` >= '$from_price'";
        }
        
        if (!empty($search_params['to_price'])){
            $to_price = $search_params['to_price'];
            $sql_search .= " AND `price` <= '$to_price'";
        }
        
        if (!empty($search_params['from_mileage'])){
            $from_mileage= $search_params['from_mileage'];
            $sql_search .= " AND `mileage` >= '$from_mileage'";
        }
        
        if (!empty($search_params['to_mileage'])){
            $to_mileage = $search_params['to_mileage'];
            $sql_search .= " AND `mileage` <= '$to_mileage'";
        }

        return $sql_search;
    }

    function sameCars($car_model, $car_id) {
        global $database;

        $all_cars = getAllCars();

        $same_cars = [];
        foreach($all_cars as $car) {
            if ( $car['model'] == $car_model && $car['id'] != $car_id ) {
                $same_cars[] = $car;
            }
        }

       return $same_cars;

    }

    function editCar($car_id) {
        $car = getSingleCar($car_id);
        
        unset($_SESSION['edit_data']);
        $_SESSION['edit_data'] = [];

        foreach($car as $key => $value) {
            $_SESSION['edit_data'][$key] = $value;
        }

    }

    function deleteCarImgById($img_id) {
        global $database;

        $database->query("DELETE FROM `cars_images` WHERE `id`=$img_id");

        echo '<script language="JavaScript"> window.location.href = "/pages/edit_product.php"</script>';   
    }

    function getOnCheckCars() {
        global $database;

        $arr_cars = $database
        ->query("SELECT * FROM `cars` WHERE status = 1")
        ->fetchAll(PDO::FETCH_ASSOC);

        $full_cars = [];
        
        foreach($arr_cars as $car) {
            $car_id = $car['id'];
            $arr_images = $database
                ->query("SELECT * FROM `cars_images` WHERE `car_id`='$car_id'")
                ->fetchAll(PDO::FETCH_ASSOC);

            $car['car_paths'] = [];
            foreach($arr_images as $image) {

                $car['car_paths'][] = [
                    'car_path_id' => $image['id'],
                    'path' => $image['path']
                ]; 

            }

            array_push($full_cars, $car);

        }

        return $full_cars;

    }

    function upCarStatus($car_id) {
        global $database;

        $database
            ->query("UPDATE `cars` SET `status` = 2 WHERE `id` = $car_id");

        echo '<script language="JavaScript"> window.location.href = "/pages/admin_check.php"</script>'; 
    }



?>