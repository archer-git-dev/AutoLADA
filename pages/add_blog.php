<?php
	require_once('../snippets/base.php');
	$PAGE_TITLE = "Add post";
	
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

    <? include('../snippets/header.php') ?>
    <section class="login">
        <div class="content">
            <h1 class="login_title"><strong>Добавить блог</strong></h1>

            <?php include("../snippets/form_errors.php") ?>

            <div class="login_content">
                <form enctype='multipart/form-data' class="login_form add_blog" method="POST" action="../app/actions/add_blog.php">
                    <label for="blog_title" class="login_label">Название блога</label><br>
                    <input required name="blog_title" value="<?$_SESSION['data']['blog_title']?>" type="text" class="login_input" placeholder="Новая модель Lada"><br>
                    <label for="blog_discription" class="login_label">Описание блога</label><br>
                    <textarea class="blog_discription" name="blog_discription" cols="30" rows="10"><?$_SESSION['data']['blog_title']?></textarea>
                    <label for="blog_title" class="login_label">Изображение блога</label><br>
                    <label class="file_label">
						<div class="add_image">Добавить изображение блога</div>
						<input required type="file" class="blog_photo" id="inp_file" name="blog_photo">
					</label>
                    <div class="blog_image_wrapper"></div>
                    <button type="submit" class="login_btn">Добавить</button>
                </form>
                <?php unset($_SESSION['data']); ?>
                <a href="./admin_page.php" class="reg_link">Назад</a>
            </div>
        </div>
    </section>
    <? include('../snippets/footer.php') ?>
</body>
</html>