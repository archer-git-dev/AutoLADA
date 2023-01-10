<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	$PAGE_TITLE = "Messages";
	global $database;

    require('../app/database/models/Message.php');

    // get all user messages
    $messages = getAllMesagesById($AUTH_USER['id']);

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

                        <li>
                            <div class="question_wrap">
                                <span><?= $message['text'] ?></span>
                                <div>
                                    <span class="show_answer" href="?show_answer">Показать ответ</span>
                                    <a class="delete_message" href="?delete_message=<?=$message['id']?>">Удалить сообщение</a>
                                </div>
                            </div>
                            <span class="message_answer"><?php if ( !empty($message['answer']) ) : ?><?=$message['answer']?><?else:?>Нет ответа на данное сообщение<?endif;?></span>
                        </li>

                    <?endforeach;?>

                </ul>
            <?else:?>
                <h2>У вас нет отправленных сообщений</h2>
            <?endif;?>

            <a href="./profile.php" class="back-a">Назад</a>
        </div>
    </div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
    <script>
        const show_answer_btns = document.querySelectorAll('.show_answer'); 
        const message_answers = document.querySelectorAll('.message_answer');
        
        show_answer_btns.forEach( (show_btn, show_ind) => {
            show_btn.addEventListener('click', () => {
                if ( message_answers[show_ind].classList.contains('active') ) {
                    show_btn.textContent = 'Показать ответ'
                    message_answers[show_ind].classList.remove('active')
                }else {
                    show_btn.textContent = 'Скрыть ответ'
                    message_answers[show_ind].classList.add('active')
                }
            })
        } )

    </script>
</body>
</html>

<?php 
    // delete message
    if (isset($_GET['delete_message'])) {
        deleteMessageById($_GET['delete_message']);
    }

?>













