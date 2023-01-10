<?php
	require_once('../snippets/base.php');
	require_once('../app/database/Database.php');

	$PAGE_TITLE = "My products";

	global $database;

	require '../app/database/models/Car.php';

	$my_cars = getUserCars($_SESSION['AUTH_USER_ID']);

	$my_published_cars = array_filter($my_cars, function($car) {return $car['status'] == 2;});
	$my_oncheck_cars = array_filter($my_cars, function($car) {return $car['status'] == 1;});
	$my_rejected_cars = array_filter($my_cars, function($car) {return $car['status'] == 0;});
	// echo '<pre>';
	// print_r($my_cars);
	// echo '</pre>';


	
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
				<div class="steps">
					<a href="add_product.php"><span>Новое объявление</span></a>
					<a href="my_added_products.php"><span>Мои объявления</span></a>
				</div>
				<h1><strong>Мои</strong> объявления</h1>
				
				<?php if ( !empty($my_published_cars) ) : ?>
					
					<h2>Ваши опубликованные автомобили</h2>
					<ul class="catalog_table">
						<?php foreach($my_published_cars as $my_car) : ?>
							<li>
								<a href="product.php?car_id=<?=$my_car['id']?>" class="thumb"><img src=<?=$my_car['car_paths'][0]['path']?> alt="car" class="car165x119" /></a>
								<div class="catalog_desc">
									<div class="location">Местоположение: Казань, Россия</div>
									<div class="title_box">
										<h4><a href="product.php?car_id=<?=$my_car['id']?>">Lada <?=$my_car['model']?></a></h4>
										<div class="price"><?=number_format($my_car['price'], 0, '', ' ')?> ₽</div>
									</div>
									<div class="clear"></div>
									<div class="grey_area">
										<span><?=$my_car['year_production']?></span>
										<span><?=$my_car['engine']?> л</span>
										<span><?=$my_car['fuel']?></span>
										<span><?=$my_car['body_type']?></span>
										<span><?=number_format($my_car['mileage'], 0, '', ' ')?> тыс. км</span>
									</div>
									<a href="product.php?car_id=<?=$my_car['id']?>" class="more markered">Подробнее</a>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>

				<?else:?>
					<h2>У вас нет опубликованных автомобилей</h2>
				<?endif;?>



				<?php if ( !empty($my_oncheck_cars) ) : ?>
					
					<h2>Ваши автомобили на рассмотрении</h2>
					<ul class="catalog_table">
						<?php foreach($my_oncheck_cars as $my_car) : ?>
							<li>
								<a href="product.php?car_id=<?=$my_car['id']?>" class="thumb"><img src=<?=$my_car['car_paths'][0]['path']?> alt="car" class="car165x119" /></a>
								<div class="catalog_desc">
									<div class="location">Местоположение: Казань, Россия</div>
									<div class="title_box">
										<h4><a href="product.php?car_id=<?=$my_car['id']?>">Lada <?=$my_car['model']?></a></h4>
										<div class="price"><?=number_format($my_car['price'], 0, '', ' ')?> ₽</div>
									</div>
									<div class="clear"></div>
									<div class="grey_area">
										<span><?=$my_car['year_production']?></span>
										<span><?=$my_car['engine']?> л</span>
										<span><?=$my_car['fuel']?></span>
										<span><?=$my_car['body_type']?></span>
										<span><?=number_format($my_car['mileage'], 0, '', ' ')?> тыс. км</span>
									</div>
									<a href="product.php?car_id=<?=$my_car['id']?>" class="more markered">Подробнее</a>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?endif;?>

				<?php if ( !empty($my_rejected_cars) ) : ?>
					
					<h2>Ваши автомобили не прошедшие проверку</h2>
					<ul class="catalog_table">
						<?php foreach($my_rejected_cars as $my_car) : ?>
							<li>
								<a href="product.php?car_id=<?=$my_car['id']?>" class="thumb"><img src=<?=$my_car['car_paths'][0]['path']?> alt="car" class="car165x119" /></a>
								<div class="catalog_desc">
									<div class="location">Местоположение: Казань, Россия</div>
									<div class="title_box">
										<h4><a href="product.php?car_id=<?=$my_car['id']?>">Lada <?=$my_car['model']?></a></h4>
										<div class="price"><?=number_format($my_car['price'], 0, '', ' ')?> ₽</div>
									</div>
									<div class="clear"></div>
									<div class="grey_area">
										<span><?=$my_car['year_production']?></span>
										<span><?=$my_car['engine']?> л</span>
										<span><?=$my_car['fuel']?></span>
										<span><?=$my_car['body_type']?></span>
										<span><?=number_format($my_car['mileage'], 0, '', ' ')?> тыс. км</span>
									</div>
									<a href="product.php?car_id=<?=$my_car['id']?>" class="more markered">Подробнее</a>
									<a href="show_reject_reason.php?car_id=<?=$my_car['id']?>" class="more markered reason">Причина отказа</a>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?endif;?>

				

			</div>
		</div>
		<!--EOF CONTENT-->
		<? include('../snippets/footer.php') ?>
</body>

</html>