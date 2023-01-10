<?php
	require_once('../snippets/base.php');
	$PAGE_TITLE = "Authorization";

	
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

    <? include('../snippets/header.php') ?>
    <section class="login">
        <div class="content">
            <h1 class="login_title"><strong>Восстановление пароля</strong></h1>

            <?php include("../snippets/form_errors.php") ?>

            <div class="login_content">
                <form class="login_form" method="POST" action="../app/actions/forget_password.php">
                    <label for="email" class="login_label">Введите свой E-mail для восстановления пароля</label><br>
                    <input required id="email" value="<?=$_SESSION['data']['email'];?>" name="email" type="email" class="login_input"><br>
                    <button type="submit" class="login_btn submit">Отправить</button>
                </form>
                <a href="authorization.php" class="reg_link">Вернуться к авторизации</a>
            </div>
        </div>
    </section>
    <? include('../snippets/footer.php') ?>
</body>
</html>