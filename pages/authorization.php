<?php
	require_once('../snippets/base.php');
	$PAGE_TITLE = "Authorization";

     // auth for diler phone
     if (isset($_GET['show_phone'])) {
        $car_id = $_GET['show_phone'];
        $_SESSION['errors']['show_phone'] = "Для получение контактов дилера необходимо авторизироваться.<br/><a class='back_car' href='./product.php?car_id=$car_id'>Вернуться на страницу автомобиля.</a>";
        
        unset($_SESSION['back_to_car']);
        $_SESSION['back_to_car'] = [];
        $_SESSION['back_to_car']['car_id'] = $car_id; 
     }
	
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

    <? include('../snippets/header.php') ?>
    <section class="login">
        <div class="content">
            <h1 class="login_title"><strong>Авторизация</strong></h1>

            <?php include("../snippets/form_errors.php") ?>

            <div class="login_content">
                <form class="login_form" method="POST" action="../app/actions/login.php">
                    <label for="email" class="login_label">Введите свой E-mail</label><br>
                    <input required id="email" value="<?=$_SESSION['data']['email'];?>" name="email" type="email" class="login_input"><br>
                    <label for="password" class="login_label">Введите свой пароль</label><br>
                    <input required id="password" name="password" type="password" class="login_input"><br>
                    <button type="submit" class="login_btn">Войти</button>
                </form>
                <?php unset($_SESSION['data']); ?>
                <a href="forget_password.php" class="reg_link forget_password">Забыли пароль?</a>
                <a href="./registration.php" class="reg_link">Вы еще не зарегистрированы?</a>
            </div>
        </div>
    </section>
    <? include('../snippets/footer.php') ?>
</body>
</html>