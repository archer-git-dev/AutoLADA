<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	require('../app/database/models/Blog.php');

	$blogs = getAllBlogs($_SESSION['search_parametrs']['search_text']);

	$PAGE_TITLE = "Blog";
	global $database;
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
					<h1><strong>Добро пожаловать</strong>  на наш блог</h1>
					<div class="blog">

						<?php if ( !empty($blogs) ) : ?>

							<?php foreach($blogs as $blog) : ?>
								<div class="blog_post">
									<a href="blog_single.php?blog=<?=$blog['id']?>" class="thumb">
										<img src="<?=$blog['blog_path']?>" alt="car" class="car180x180"/>
									</a>
									<div class="blog_desc">
										<h4><a href="blog_single.php?blog=<?=$blog['id']?>"><?=$blog['title']?></a></h4>
										<div class="grey_area">
											<a href="blog_single.php?blog=<?=$blog['id']?>" class="blog_date"><?=explode(' ', $blog['created_at'])[0]?></a>
											<a href="blog_single.php?blog=<?=$blog['id']?>" class="blog_author">Admin</a>
											<a href="blog_single.php?blog=<?=$blog['id']?>" class="blog_comments">0 Comments</a>
										</div>
										<div class="post">
											<p><?=explode('.', $blog['text'])[0]?>.</p>
										</div>
										<a href="blog_single.php?blog=<?=$blog['id']?>" class="more markered">Читать далее</a>
									</div>
								</div>
							<?endforeach;?>
						
						<?else:?>

							<h2>Нет результатов</h2>
							
						<?endif;?>

						<div class="clear"></div>
					</div>
					<div class="sidebar">
					<h3 class="search_blog_h3">Поиск блога</h3>
					<form action="../app/actions/search_blogs.php" method="GET">
						<input value="<?=$_SESSION['data']['search_text'] ?>" type="search" name="search_blogs" class="search_blog">
						<button class="search_blog_btn">Найти блог</button>
					</form>
					<?php unset($_SESSION['data']); unset($_SESSION['search_parametrs']) ?>
				</div>
					<div class="clear mb1"></div>
				</div>
			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>