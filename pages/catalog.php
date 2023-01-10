<?php
	require_once('../app/database/Database.php');

	require('../snippets/base.php');

	require('../app/database/models/Car.php');

	$PAGE_TITLE = "Catalog";
	global $database;


	$_SESSION['page'] = $_GET['page'];

	if (empty($_SESSION['sql_parametrs']['sort_cars'])) {
		$_SESSION['sql_parametrs']['sort_cars'] = "ORDER BY created_at";
		$_SESSION['sql_parametrs']['view_cars'] = "LIMIT 10";
	}

	
	$page = isset($_GET['page']) && $_GET['page'] > 0  ? $_GET['page'] : 1;
	$limit = explode(" ", $_SESSION['sql_parametrs']['view_cars'])[1];
	$offset = $limit * ($page - 1);
	$sql_offset = "OFFSET $offset";

	$total_pages = ceil( countRow('cars', $_SESSION['search_parametrs']) / $limit );


	$limit_params = [$_SESSION['sql_parametrs']['sort_cars'], $_SESSION['sql_parametrs']['view_cars'], $sql_offset];
	$cars = getAllCars($limit_params, $_SESSION['search_parametrs']);

	

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
				<h1><strong>Каталог</strong> автомобилей</h1>
				<div class="catalog_sidebar">
					<div class="search_auto">
						<h3><strong>Поиск</strong> авто</h3>
						<div class="clear"></div>
						<form action="../app/actions/search_cars.php" method="POST">
							<label><strong>Модель:</strong></label>
							<div class="select_box_1">
								<select class="select_1 my_style catalog" name="model">
									<option selected>Любая</option>

									<?php
									$models = [
										'Kalina', 'Vesta', 'Largus',
										'Priora', 'Granta', 'XRAY', 'ВАЗ-2115', 'ВАЗ-2114'
									];

									foreach ($models as $model) :
									?>

										<option value=<?= $model; ?> <?php if ($model === $_SESSION['search_parametrs']['model']) : ?> selected <? endif; ?>><?= $model; ?></option>

									<?php endforeach; ?>

								</select>
							</div>
							<label><strong>Год от и до:</strong></label>
							<div class="select_box_2">
								<select class="select_2 my_style catalog" name="from_year_production">
									<option selected>От</option>

									<?php
									for ($i = 2022; $i >= 2001; $i--) :
									?>
										<option value=<?= $i; ?> <?php if ($i == $_SESSION['search_parametrs']['from_year_production']) : ?> selected <? endif; ?>><?= $i; ?></option>
									<?php endfor; ?>

								</select>
								<select class="select_2 my_style catalog" name="to_year_production">
									<option selected>До</option>

									<?php
									for ($i = 2022; $i >= 2001; $i--) :
									?>
										<option value=<?= $i; ?> <?php if ($i == $_SESSION['search_parametrs']['to_year_production']) : ?> selected <? endif; ?>><?= $i; ?></option>
									<?php endfor; ?>

								</select>
								<div class="clear"></div>
							</div>
							<label><strong>Цена в ₽ от и до:</strong></label>
							<div class="select_box_2">
								<input id="price" <?php if ($_SESSION['search_parametrs']['from_price'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['from_price'], 0, '', ' ') ?>" <?endif;?> name="from_price" type="text" class="input-search catalog" placeholder="От" />
								<input id="price" <?php if ($_SESSION['search_parametrs']['to_price'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['to_price'], 0, '', ' ') ?>" <?endif;?> name="to_price" type="text" class="input-search catalog" placeholder="До" />
								<div class="clear"></div>
							</div>
							<label><strong>Пробег в тыс. км от и до:</strong></label>
							<div class="select_box_2">
								<input id="mileage" <?php if ($_SESSION['search_parametrs']['from_mileage'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['from_mileage'], 0, '', ' ') ?>" <?endif;?> name="from_mileage" type="text" class="input-search catalog" placeholder="От" />
								<input id="mileage" <?php if ($_SESSION['search_parametrs']['to_mileage'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['to_mileage'], 0, '', ' ') ?>" <?endif;?> name="to_mileage" type="text" class="input-search catalog" placeholder="До" />
								<div class="clear"></div>
							</div>
							<button type="submit" class="search-button">Поиск</button>
						</form>

						<div class="clear"></div>
					</div>
				</div>
				<div class="main_catalog">

					<form action="../app/actions/sort_cars.php" method="POST" name="sort_cars">
						<div class="top_catalog_box">
							<div class="select_box_1 my_select">
								<strong class="my_select strong">Сортировать:</strong>
								<select class="select_sort" name="sort_cars">

									<?php
									$parametrs = ['По дате размещения', 'По убыванию цены', 'По возрастанию цены', 'По году: новее', 'По году: старше', 'По модели', 'По пробегу'];

									foreach ($parametrs as $parametr) :
									?>
										<option value="<?= $parametr; ?>" <?php if ($parametr === $_SESSION['data']['sort_cars']) : ?> selected <? endif; ?>><?= $parametr; ?></option>
									<? endforeach; ?>

								</select>
								<div class="clear"></div>
							</div>
							<div class="select_box_1 my_select">
								<strong class="my_select strong">Показать на странице:</strong>
								<select class="select_sort" name="view_cars">

									<?php
									$parametrs = ['10', '20', '35', '50', '75', '100'];

									foreach ($parametrs as $parametr) :
									?>
										<option value="<?= $parametr; ?>" <?php if ($parametr === $_SESSION['data']['view_cars']) : ?> selected <? endif; ?>><?= $parametr; ?></option>
									<? endforeach; ?>

								</select>
							</div>
							<button class="sort_button">Применить параметры</button>
							<div class="clear"></div>
						</div>
						
					</form>
		

					<div class="pagination_block pagination_top"><? include('../snippets/pagination.php') ?></div>

					<ul class="catalog_table">
						
						<?php if (count($cars) != 0) : ?>
							<?php foreach ($cars as $car) : ?>
								<li>
									<a href="product.php?car_id=<?= $car['id'] ?>" class="thumb"><img src="<?= $car['car_paths'][0]['path'] ?>" alt="car" class="car165x119" /></a>
									<div class="catalog_desc">
										<div class="location">Местоположение: Казань, Россия</div>
										<div class="title_box">
											<h4><a href="product.php?car_id=<?= $car['id'] ?>">Lada <?= $car['model'] ?></a></h4>
											<div class="price"><?= number_format($car['price'], 0, '', ' ') ?> ₽</div>
										</div>
										<div class="clear"></div>
										<div class="grey_area">
											<span>Регистрация <?= $car['year_production'] ?></span>
											<span><?= $car['engine'] ?> <?= $car['fuel'] ?></span>
											<span><?= $car['body_type'] ?></span>
											<span><?= number_format($car['mileage'], 0, '', ' ') ?> тыс. км</span>
										</div>
										<a href="product.php?car_id=<?= $car['id'] ?>" class="more markered">Подробнее</a>
									</div>
								</li>
							<? endforeach; ?>
						<?else:?>
							<h2>Нет результатов</h2>
						<?endif;?>

					</ul>

					<div class="pagination_block pagination_bottom"><? include('../snippets/pagination.php') ?></div>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>

	<script>
		let pagination_links = Array.from(document.querySelectorAll('.pagination-a'));
		let pagination_group_one = pagination_links.slice(0, pagination_links.length / 2);
		let pagination_group_two = pagination_links.slice(pagination_links.length / 2);

		let page = +'<?php echo $_GET['page'];?>';
		
		pagination_group_one[page-1].classList.add('active');
		pagination_group_two[page-1].classList.add('active');

	</script>
	
</body>

</html>