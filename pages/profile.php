<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	$PAGE_TITLE = "Profile";
	global $database;

	require('../app/database/models/Message.php');

	if ( $AUTH_USER['role'] == 'admin' ) {
		$messages = getAllAnswerIsNull();
	}else {
		$messages = getAllMesagesById($AUTH_USER['id']);
	}
    

	require '../app/database/models/Car.php';

	$my_cars = getUserCars($AUTH_USER['id']);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

	<? include('../snippets/header.php') ?>
    <!--BEGIN CONTENT-->

    <div id="content">
		<div class="content">
            <h1>Ваш профиль</h1>
            <h2><?=$AUTH_USER['last_name']?> <?=$AUTH_USER['first_name']?></h2>
			<?php if ( $AUTH_USER['role'] == 'admin' ) : ?>
				<a href="./admin_messages.php" class="admin-a">Мои сообщения (<?=count($messages)?>)</a>
			<?else:?>
				<a href="./my_messages.php" class="admin-a">Мои сообщения (<?=count($messages)?>)</a>
			<?endif;?>	
			<a href="./my_added_products.php" class="admin-a">Мои объявления (<?=count($my_cars)?>)</a>
			<a href="./exit.php" class="admin-a">Выйти из аккаунта</a>
        </div>
    </div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>
