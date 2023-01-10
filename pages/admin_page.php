<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	require('../app/database/models/Message.php');
	require('../app/database/models/Car.php');

	// get all users messages where answer is null
	$messages = getAllAnswerIsNull();

	$cars_oncheck = getOnCheckCars();

	$PAGE_TITLE = "Admin";
	global $database;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

	<? include('../snippets/header.php') ?>
    <!--BEGIN CONTENT-->

    <div id="content">
		<div class="content">
            <h1>Администратор - <?=$AUTH_USER['last_name']?> <?=$AUTH_USER['first_name']?></h1>
			<a href="./add_blog.php" class="admin-a">Добавить новый блог</a>
			<a href="./admin_check.php" class="admin-a">Объявления на проверку (<?=count($cars_oncheck)?>)</a>
			<a href="./admin_messages.php" class="admin-a">Сообщения от пользователей (<?=count($messages)?>)</a>
			<a href="./exit.php" class="admin-a">Выйти из аккаунта</a>
        </div>
    </div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>