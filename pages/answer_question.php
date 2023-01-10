<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

    require('../app/database/models/Message.php');

    require('../app/database/models/User.php');

    if (isset($_GET['answer_question'])) {
        $message = getMesageById($_GET['answer_question']);
        $user = getUserById($message['user_id']);

        unset($_SESSION['message_id']);
        $_SESSION['message_id'] = $message['id'];

    }

	$PAGE_TITLE = "Answer";
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
				<h1><strong>Ответ</strong> на сообщение</h1>

				<?php include("../snippets/form_errors.php") ?>

				<div class="contact_form">

					<p class="user_question"><?=$message['text']?> (<?=$user['last_name']?> <?=$user['first_name']?>)</p>

					<form action="../app/actions/answer_message.php" method="POST">
						<label>Сообщение: </label>
						<textarea cols="20" rows="20" name="message_answer"><?= $_SESSION['data']['message_answer']; ?></textarea>
						<button type="submit" class="submit_contacts">Отправить</button>
					</form>

					<?php  unset($_SESSION['errors']); unset($_SESSION['data']); ?>

				</div>

                <a href="./admin_messages.php" class="back-a">Назад</a>
			</div>
		</div>
	</div>
	<!--EOF CONTENT-->
	<?php include('../snippets/footer.php'); ?>
</body>
</html>
