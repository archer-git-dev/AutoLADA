<?php
    require_once('../app/database/Database.php');
	require_once('../snippets/base.php');
    $PAGE_TITLE = "Product";
    global $database;

	require '../app/useful/Useful.php';
	require '../app/database/models/Car.php';
	require '../app/database/models/User.php';
	
	if (isset($_GET['car_id'])) {
		$car_id = $_GET['car_id'];

		$car = getSingleCar($car_id);

        $user = getUserById($car['user_id']);

	}

	
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">
	<? include('../snippets/header.php') ?>
    	<!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
                <h1>Уважаемый, <?=$user['last_name']?> <?=$user['first_name']?>!</h1>
                <p>Ваше объявление было отклонено по следующим причинам:</p>
                <p class="reject_p"><?=$car['reject_reason']?></p>
                <a href="my_added_products.php" class="back-a">Вернуться к объявлениям</a>
			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>