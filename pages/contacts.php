<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	$PAGE_TITLE = "Contacts";
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
				<h1><strong>Свяжитесь</strong> с нами</h1>

				<?php include("../snippets/form_errors.php") ?>

				<div class="contacts_box">
					<div class="left">
						<h3><strong>Контактные</strong> данные</h3>
						<div class="addr detail">г. Москва, 37 км Ленинградского шоссе</div>
						<div class="phones detail">+7 (495) 126-85-61<br />+7 (495) 156-87-43</div>
						<div class="email detail single_line"><a href="mailto:#" class="markered">autoladal@gmail.com</a></div>
						<div class="web detail single_line"><a href="#">http://www.autolada.com</a></div>
					</div>
					<div class="map">
						<img src="../images/contact_map.jpg" alt="map" class="map_contacts" />
					</div>
				</div>
				<div class="contact_form">
					<h2><strong>Напишите</strong> нам сообщение</h2>
					<form action="../app/actions/message.php" method="POST">
						<label>Сообщение: </label>
						<textarea cols="20" rows="20" name="message_text"><?= $_SESSION['data']['message_text']; ?></textarea>
						<?php if ($AUTH_USER === null) : ?>
							<button type="submit" disabled class="submit_contacts disabled">Отправить</button><br>
							<a href="./authorization.php" class="auth_need_a">Для отправки сообщения необходимо авторизоваться</a>
						<?else:?>
							<button type="submit" class="submit_contacts">Отправить</button>
						<?endif;?>
					</form>
					<?php  unset($_SESSION['errors']); unset($_SESSION['data']); ?>
				</div>
			</div>
		</div>
	</div>
	<!--EOF CONTENT-->
	<?php include('../snippets/footer.php'); ?>
</body>
</html>
