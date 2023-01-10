<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

    require('../app/database/models/User.php');
    require('../app/database/models/Car.php');

    if ( isset($_GET['reject_car']) ) {
        $car = getSingleCar($_GET['reject_car']);
        $_SESSION['car_id'] = $car['id'];
    }

	$PAGE_TITLE = "Reject car";
	global $database;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">
	<?php include('../snippets/header.php'); ?>
	<!--BEGIN CONTENT-->
	<div id="content">
		<div class="content">
			<div class="main_wrapper">
				<h1><strong>Причина</strong> отказа</h1>

				<?php include("../snippets/form_errors.php") ?>

				<div class="contact_form">

					<p class="user_question">Опишите по какой причине объявление о продаже Lada <?=$car['model']?> не проходит проверку.</p>

					<form action="../app/actions/reject_car.php" method="POST">
						<label>Описание: </label>
						<textarea cols="20" rows="20" name="reject_reason"><?= $_SESSION['data']['reject_reason']; ?></textarea>
						<button type="submit" class="submit_contacts">Отправить</button>
					</form>

					<?php  unset($_SESSION['errors']); unset($_SESSION['data']); ?>

				</div>

                <a href="./product.php?car_id=<?=$car['id']?>" class="back-a">Назад к объявлению</a>
			</div>
		</div>
	</div>
	<!--EOF CONTENT-->
	<?php include('../snippets/footer.php'); ?>
</body>
</html>
