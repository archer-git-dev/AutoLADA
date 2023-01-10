<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	$PAGE_TITLE = "Messages";
	global $database;

    require('../app/database/models/Message.php');

    require('../app/database/models/User.php');

    // get all users messages where answer is null
    $messages = getAllAnswerIsNull();

    
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

	<? include('../snippets/header.php') ?>
    <!--BEGIN CONTENT-->

    <div id="content">
		<div class="content">
            <h1>Мои сообщения</h1>
            <?php if (!empty($messages)) : ?>
                <ul>
                    <?php foreach( $messages as $message ) : ?>

                        <?php $user = getUserById($message['user_id']); ?>

                        <li>
                            <div class="question_wrap">
                                <span><?= $message['text'] ?> (<?=$user['last_name']?> <?=$user['first_name']?>)</span>
                                <div>
                                    <a class="answer_question" href="./answer_question.php?answer_question=<?=$message['id']?>">Ответить на сообщение</a>
                                </div>
                            </div>
                        </li>

                    <?endforeach;?>

                </ul>
            <?else:?>
                <h2>Не отправленных сообщений</h2>
            <?endif;?>

            <a href="./profile.php" class="back-a">Назад</a>
        </div>
    </div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>

</body>
</html>















