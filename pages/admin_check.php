<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	require('../app/database/models/Car.php');

    // cars with status == 1
    $cars = getOnCheckCars();

	$PAGE_TITLE = "Check auto";
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
            <h1>Объявления ожидающие проверку</h1>
            <?php if ( !empty($cars) ) : ?>
					<ul class="catalog_table">
						<?php foreach($cars as $my_car) : ?>
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
					<h2>Нет объявлений на проверку</h2>
				<?endif;?>
        </div>
    </div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>

</body>
</html>