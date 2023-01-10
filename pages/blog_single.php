<?php

	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	$PAGE_TITLE = "Single blog";
	global $database;

	require('../app/database/models/Blog.php');

	if (isset($_GET['blog'])) {
		$blog = getSingleBlog($_GET['blog']);

		unset($_SESSION['blog_id']);
		$_SESSION['blog_id'] = $blog['id'];
	}

	$text = str_replace("\n", '', $blog['text']);
    $text = preg_split('/(?<=[.?!])\s+(?=[a-zа-яё])/i', $text);

	require('../app/database/models/Comment.php');
	require('../app/database/models/User.php');

	$comments = getAllCommentsById($blog['id']);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php require('../snippets/page_head.php'); ?>

<body class="page">

	<? include('../snippets/header.php') ?>
    	<!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
				<div class="main_wrapper">
					<h1 class="blog_h1">Добро пожаловть на наш блог <a href="./blogs.php" class="a_blog">Назад к блогам</a></h1>
					<div class="blog">
						<div class="blog_single_post">
							<h4><?=$blog['title']?></h4>
							<div class="grey_area">
								<a href="#" class="blog_date"><?=explode(' ', $blog['created_at'])[0]?></a>
								<a href="#" class="blog_author">Admin</a>
								<div class="blog_category">
									<a href="#" >Cars</a>, 
									<a href="#" >vehicle</a>
								</div>
								<a href="#" class="blog_comments">0 Comments</a>
							</div>
							<div class="post">
								<img src="<?=$blog['blog_path']?>" alt="" class="alignleft"/>
								<p><?=$text[0]?></p>
								<p><?=$text[1]?></p>
								<!-- <div class="clear"></div> -->
								<p><?=implode(' ', array_slice($text, 2))?></p>
							</div>
						</div>
						<div class="comments">
							<h4>Комментарии</h4>
							<ul>

								<?php if (!empty($comments)) : ?>

									<?php foreach( $comments as $comment ) : ?>

										<?php $user = getUserById($comment['user_id']) ?>

										<li>
											<div class="wrapper">
												<div class="comment_author">
													<div class="comment_author"><?=$user['last_name']?> <?=$user['first_name']?> <span class="comment_data"><?=explode(' ', $comment['created_at'])[0]?></span></div>
												</div>
												<div class="comment_text"><?=$comment['text']?></div>
											</div>
											<?php if ($AUTH_USER['role'] == 'admin') : ?>
												<a class="delete_comment" href="?delete_comment=<?=$comment['id']?>">Удалить комментарий</a>
											<?else:?>
												<?php if ($AUTH_USER['id'] == $comment['user_id']) : ?>
													<a class="delete_comment" href="?delete_comment=<?=$comment['id']?>">Удалить комментарий</a>
												<?endif;?>	
											<?endif;?>	
											<div class="clear"></div>
										</li>
									<?endforeach;?>

								<?else:?>
									<h2>Коменнтарии к блогу отсутствуют</h2>
								<?endif;?>
							</ul>
						</div>
						<div class="comment_form">
							<h2><strong>Оставьте</strong> комментарий</h2>

							<? include('../snippets/form_errors.php') ?>


							<form action="../app/actions/comment.php" method="POST" >
								<label>Комментарий: </label>
								<textarea cols="20" rows="20" name="comment_text"><?=$_SESSION['data']['comment_text']?></textarea>
                                <?php if ($AUTH_USER !== null) : ?>
								    <button type="submit" class="submit_contacts">Отправить</button>
                                <?else:?>
                                    <button disabled type="submit" class="submit_contacts disabled">Отправить</button>
                                    <a href="./authorization.php" class="auth_need_a">Для комментарий необходимо авторизоваться</a>
                                <?endif;?>
							</form>
							<?php unset($_SESSION['data']); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>

				<a href="blogs.php" class="back-a">Назад к блогам</a>

			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>

<?php 
    // delete comment
    if (isset($_GET['delete_comment'])) {
        deleteMessageById($_GET['delete_comment']);
    }

?>