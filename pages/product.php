<?php
    require_once('../app/database/Database.php');
	require_once('../snippets/base.php');
    $PAGE_TITLE = "Product";
    global $database;

	// require '../app/useful/Useful.php';
	require '../app/database/models/Car.php';
	
	if (isset($_GET['car_id'])) {
		$car_id = $_GET['car_id'];

		$car = getSingleCar($car_id);

		views_update($car_id);
	}

	$same_cars = sameCars($car['model'], $car['id']);


	if (isset($_GET['update_status'])) {
		upCarStatus($_GET['update_status']);
	}

	
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
					<div class="cars_id">
						<div class="views">Предложние имеет <?=$car['view']?> просмотров</div>
					</div>
					<h1><strong>Lada</strong> <?=$car['model']?></h1>
					<div class="car_image_wrapper car_group">
						<div class="big_image">
							<a href="<?=$car['car_paths'][0]['path']?>" class="car_group">
								<img src="../images/zoom.png" alt="car" class="zoom"/>
								<img src="<?=$car['car_paths'][0]['path']?>" alt="car" class="car480x292"/>
							</a>
						</div>
						<div class="small_img">
							<?php
								for ($i=1; $i < count($car['car_paths']); $i++ ) :
							?>
								<a href="<?=$car['car_paths'][$i]['path']?>" class="car_group car480x292">
									<img src="<?=$car['car_paths'][$i]['path']?>" alt="car" class="car81x62"/>
								</a>
							<?endfor;?>
						</div>
					</div>
					<div class="car_characteristics">
						<div class="price"><?=number_format($car['price'], 0, '', ' ')?> ₽ <span>* Цена договорная</span></div>
						<div class="clear"></div>
						<div class="features_table">
							<div class="line grey_area">
								<div class="left">Модель, Тип кузова:</div>
								<div class="right">Lada <?=$car['model']?>, <?=$car['body_type']?></div>
							</div>
							<div class="line">
								<div class="left">Регистрация:</div>
								<div class="right"><?=$car['year_production']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Топливо:</div>
								<div class="right"><?=$car['fuel']?></div>
							</div>
							<div class="line">
								<div class="left">Двигатель:</div>
								<div class="right"><?=$car['engine']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Трансмиссия:</div>
								<div class="right"><?=$car['transmission']?></div>
							</div>
							<div class="line">
								<div class="left">Цвет:</div>
								<div class="right"><?=$car['color']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Пробег:</div>
								<div class="right"><?=number_format($car['mileage'], 0, '', ' ')?> тыс. км</div>
							</div>
						</div>
						<div class="wanted_line">
							<div class="left">Вы хотите продать похожий автомобиль?</div>
							<div class="right">
								<a href="add_product.php">добавить предложение</a>
							</div>
						</div>
					</div>
					<?php if (isset($_SESSION['AUTH_USER_ID'])): $diler_phone = $car['connection_phone']?>
						<button class="diler_phone">
							<?php if ($AUTH_USER['id'] == $car['user_id']) : ?>
								<a href="edit_product.php?edit_car=<?=$car['id']?>" class="diler_phone_a">Редактировать<br/>объявление</a>
							<?else:?>
								<a href="tel:<?=$diler_phone?>" class="diler_phone_a">Связаться с дилером<br/><?=phone_format($car['connection_phone'])?></a>
							<?endif;?>
						</button>
					<?else:?>
						<button class="diler_phone"><a href="./authorization.php?show_phone=<?=$car['id']?>" class="diler_phone_a">Показать телефон дилера<br/>+7(xxx)-xxx-xx-xx</a></button>
					<?endif;?>
					<div class="clear"></div>
					<div class="info_box">
						<div class="car_info">
							<div class="info_left">
								<h2><strong>Информация</strong> о автомобиле</h2>
								<p><strong>Особенности:</strong><br/>легкосплавные диски, ксеноновые фары, противотуманные фары, тонированные стекла</p>
								<p><strong>Другие параметры:</strong><br/>сервисная книжка</p>
								<p><strong>Безопасность</strong><br/>ABS, контроль тяги, сигнализация, подушки безопасности, иммобилайзер, анти-th, ESP, EDS, система защиты</p>
								<p><strong>Комфорт:</strong><br/>электрические стеклоподъемники, электрические зеркала, кондиционер, кожаная обивка, навигационная система, центральный замок, радио / CD, усилитель рулевого управления, бортовой компьютер, круиз-контроль, подогрев сидений.</p>
							</div>
							<div class="info_right">
								<h2><strong>Подробнее</strong></h2>
								<p class="first"><strong>Расчет указанного ежемесячного платежа является предварительным и подлежит уточнению перед или непосредственно при заключении договоров кредитования/страхования.</strong></p>
								<p>Всё носит исключительно информационный характер и ни при каких условиях не является публичной офертой.</p>
								<p>Определяется положениями Статьи 437 ч.2 Гражданского кодекса Российской Федерации.</p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="car_contacts">
							<h2><strong>Контакты</strong> дилера</h2>
							<div class="left">
								<div class="phones detail single_line spaced">
									<?php if (isset($_SESSION['AUTH_USER_ID'])):?>
										<?=phone_format($car['connection_phone'])?>
									<?else:?>
										+7(xxx)-xxx-xx-xx
									<?endif;?>
								</div>
								<div class="email detail single_line"><a href="mailto:#" class="markered">autoladal@gmail.com</a></div>
							</div>
							<div class="right">
								<div class="addr detail single_line">Местоположение: Казань, Россия</div>
								<div class="web detail single_line"><a href="#">http://www.autodealeк.com</a></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="recent_cars">
						<h2><strong>Похожие</strong> прделожения</h2>
						<ul>

							<?php if (!empty($same_cars)) : ?>

								<?php foreach($same_cars as $same_car) : ?>

									<li>
										<a href="product.php?car_id=<?=$same_car['id']?>">
											<img src="<?=$same_car['car_paths'][0]['path']?>" alt="car" class="car220x164px"/>
											<div class="description">Регистрация <?= $same_car['year_production'] ?><br/><?= $same_car['engine'] ?> <?= $same_car['fuel'] ?><br/><?= $same_car['body_type'] ?><br/><?= number_format($same_car['mileage'], 0, '', ' ') ?></div>
											<div class="title">Lada <?= $same_car['model'] ?> <span class="price"><?= number_format($same_car['price'], 0, '', ' ') ?> ₽</span></div>
										</a>
									</li>

								<?endforeach;?>	
							<?else:?>

								<h2>Машин модели Lada <?= $car['model'] ?> больше нет</h2>

							<?endif;?>

						</ul>

						<?php if ($AUTH_USER['role'] == 'admin' && $car['status'] == 1) : ?>

							<div class="admin_resolve_wrap">
								<a href="?update_status=<?=$car['id']?>" class="admin_resolve">Опубликовать объявление</a>
								<a href="reject_car.php?reject_car=<?=$car['id']?>" class="admin_resolve">Отклонить объявление</a>
							</div>


						<?endif?>

					</div>
				</div>

				<a href="catalog.php?page=<?=$_SESSION['page']?>" class="back-a">Вернуться к каталогу</a>

			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>