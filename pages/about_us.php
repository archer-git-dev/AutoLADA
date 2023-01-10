<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	
	require('../app/database/models/Blog.php');

	$blogs = getAllBlogs();

	$PAGE_TITLE = "About us";
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
				<div class="wrapper_3">
					<div class="left">
						<h1><strong>О нас</strong></h1>
						<div class="blog">
							<div class="blog_single_post">
								<h4>АВТОВАЗ - История компании</h4>
								<div class="post">
									<p>
										20 июля 1966 года вышло Постановление правительства СССР о строительстве в городе Тольятти завода по выпуску 600 тысяч легковых автомобилей в год. Эта дата считается днем рождения Волжского автомобильного завода.
									</p>
									<p>Создание предприятия-флагмана отечественного автомобилестроения тесно связано с итальянским концерном FIAT, с которым министерство автомобильной промышленности СССР подписало протокол о научно-техническом сотрудничестве.</p>
									<div class="clear"></div>
									<p>Появление Волжского автозавода было обусловлено тем, что в то время в СССР производилось менее 150 тысяч легковых машин в год. В связи с этим ощущалась острая необходимость в комфортабельных и доступных автомобилях. Волжский автозавод был построен в рекордно короткие сроки: в 1967 году началось строительство, а в 1970 году появилась первая продукция - автомобили ВАЗ-2101, которые положили начало широко известной и популярной сегодня марке LADA.</p>
									<cite class="alignleft">Символика «Лады» отправляет нас в старину, к древним русским легендам о витязях, победных завоеваниях новых земель на ладьях (парусно-весельных лодках).</cite>
									<p>Значок «Лада» разработал один из руководителей завода А. Декаленков. Первоначально в эскизе явно просматривалась буква «В» – первая в названии завода. Позднее эмблема так же, как и значок «ВАЗ», была доработана до современного вида Ю. Давыдовым и группой заводских дизайнеров.</p>
									<div class="clear"></div>
									<p>«Лада» – действительно народный автомобиль. А народ любит давать клички, да и в шоферской среде существует особый сленг. По аналогии с расшифровками «УАЗ», «ГАЗ», «ВАЗ с легкой руки юмориста М. Задорнова распространился мем «ТАЗ» – Тольяттинский автомобильный завод. В дальнейшем «ТАЗ» трансформировался в ироничное «тазик».</p>
								</div>
							</div>
						</div>
					</div>
					<div class="right about_us">
					<div class="news_wrapper">
							<div class="news">
								<h2><strong>Автомобильный</strong> блог</h2>
								<?php for($i = 0; $i < 2; $i++) : ?>
									<div class="news_box">
										<a href="blog_single.php?blog=<?=$blogs[$i]['id']?>" class="thumb">
											<img src="<?=$blogs[$i]['blog_path']?>" alt="car" class="car180x135"/>
										</a>
										<h5><a href="pages/blog_single.php?blog=<?=$blogs[$i]['id']?>">Какой уровень локализации у семейства Lada Vesta</a></h5>
										<div class="date"><?=explode(' ', $blogs[$i]['created_at'])[0]?></div>
										<div class="post">
											<p><?=explode('.', $blogs[$i]['text'])[0]?>.</p>
										</div>
									</div>
								<?endfor;?>
								<div class="all_wrapper"><a href="blogs.php" class="search-news">ПОДРОБНЕЕ</a></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>