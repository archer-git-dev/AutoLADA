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
                
                <form class="login_form" method="POST" action="../app/actions/new_password.php">
                    <label for="password" class="login_label">Введите новый пароль</label><br>
                    <input required id="password" name="password" type="text" class="login_input"><br>
                    <label for="re_password" class="login_label">Повторите пароль</label><br>
                    <input required id="re_password" name="re_password" type="text" class="login_input"><br>
                    <button type="submit" class="login_btn submit">Отправить</button>
                </form>

                <a href="authorization.php" class="reg_link">Вернуться к авторизации</a>
            </div>
        </div>
    </section>
    <? include('../snippets/footer.php') ?>
</body>
</html>