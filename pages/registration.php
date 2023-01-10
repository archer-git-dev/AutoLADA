<?php

    require_once('../snippets/base.php');
    $PAGE_TITLE = "Registration";
    
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

<? include('../snippets/header.php') ?>
    <section class="registration">
        <div class="content">
            
            <h1><strong>Регистрация</strong></h1>

            <?php include("../snippets/form_errors.php") ?>

            <div class="login_content">
                <form class="login_form" method="POST" action="../app/actions/registr.php">
                    <label for="first_name" class="login_label">Введите свое Имя</label><br>
                    <input required id="first_name" value="<?=$_SESSION['data']['first_name'];?>" type="text" class="login_input" name="first_name"><br>
                    <label for="last_name" class="login_label">Введите свою Фамилию</label><br>
                    <input required id="last_name" value="<?=$_SESSION['data']['last_name'];?>" type="text" class="login_input" name="last_name"><br>
                    <label for="email" class="login_label">Введите свой E-mail</label><br>
                    <input required id="email" value="<?=$_SESSION['data']['email'];?>" type="email" class="login_input" name="email"><br>
                    <label for="password" class="login_label">Введите пароль</label><br>
                    <input required id="password" type="password" class="login_input" name="password"><br>
                    <label for="r_password" class="login_label">Повторите пароль</label><br>
                    <input required id="r_password" type="password" class="login_input" name="repeat_password"><br>
                    <button type="submit" class="login_btn reg">Зарегистрироваться</button>
                </form>
                <?php unset($_SESSION['data']) ?>
                <a href="./authorization.php" class="reg_link">Вы уже зарегистрированы?</a>
            </div>
        </div>
    </section>
    <? include('../snippets/footer.php') ?>
</body>
</html>
