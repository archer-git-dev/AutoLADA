<?php

    require './app/database/models/Car.php';
    $cars = getAllCars();

	require('./app/database/models/Blog.php');
	$blogs = getAllBlogs();

?>
<body>
    <!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
				<div class="wrapper_1">
					<div class="slider_wrapper">
						<div class="home_slider">
							<div class="slider slider_1">
								<?php for($i = 0; $i < 4; $i++) : $car = $cars[$i]; ?>
									<div class="slide">
										<a href="pages/product.php?car_id=<?=$car['id']?>"><img src="<?=substr($car['car_paths'][0]['path'], 3)?>" class="car620x425" alt="car"/></a>
										<div class="description">
											<h2 class="title">Lada <?=$car['model']?></h2>
											<p class="desc"><span><strong>Пробег: </strong><?=number_format($car['mileage'], 0, '', ' ')?></span></p>
											<div class="price"><?=number_format($car['price'], 0, '', ' ')?> ₽</div>
										</div>
									</div>
								<?endfor;?>
							</div>
						</div>
					</div>
					<div class="search_auto_wrapper">
						<div class="search_auto">
							<h3><strong>Поиск</strong> авто</h3>
							<div class="clear"></div>
							<form action="../app/actions/search_cars.php" method="POST">
								<label><strong>Модель:</strong></label>
								<div class="select_box_1">
									<select class="select_1 my_style" name="model">
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
									<select class="select_2 my_style" name="from_year_production">
										<option selected>От</option>

										<?php
										for ($i = 2022; $i >= 2001; $i--) :
										?>
											<option value=<?= $i; ?> <?php if ($i == $_SESSION['search_parametrs']['from_year_production']) : ?> selected <? endif; ?>><?= $i; ?></option>
										<?php endfor; ?>

									</select>
									<select class="select_2 my_style" name="to_year_production">
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
									<input id="price" <?php if ($_SESSION['search_parametrs']['from_price'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['from_price'], 0, '', ' ') ?>" <?endif;?> name="from_price" type="text" class="input-search" placeholder="От" />
									<input id="price" <?php if ($_SESSION['search_parametrs']['to_price'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['to_price'], 0, '', ' ') ?>" <?endif;?> name="to_price" type="text" class="input-search" placeholder="До" />
									<div class="clear"></div>
								</div>
								<label><strong>Пробег в тыс. км от и до:</strong></label>
								<div class="select_box_2">
									<input id="mileage" <?php if ($_SESSION['search_parametrs']['from_mileage'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['from_mileage'], 0, '', ' ') ?>" <?endif;?> name="from_mileage" type="text" class="input-search" placeholder="От" />
									<input id="mileage" <?php if ($_SESSION['search_parametrs']['to_mileage'] !== 0) : ?> value="<?= number_format($_SESSION['search_parametrs']['to_mileage'], 0, '', ' ') ?>" <?endif;?> name="to_mileage" type="text" class="input-search" placeholder="До" />
									<div class="clear"></div>
								</div>
								<button type="submit" class="search-button">Поиск</button>
							</form>

							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="recent">
					<h2><strong>Последние</strong> объявления</h2>
					<div class="recent_carousel">
						<?php for($i = 0; $i < 8; $i++) : $car = $cars[$i]; ?>

							<div class="slide">
								<a href="pages/product.php?car_id=<?=$car['id']?>">
									<img src="<?=substr($car['car_paths'][0]['path'], 3)?>" class="car220x164" alt="car"/>
									<div class="description">Регистрация <?=$car['year_production']?><br/><?=$car['engine']?> <?=$car['fuel']?><br/>Кузов <?=$car['body_type']?><br/><?=number_format($car['mileage'], 0, '', ' ')?> тыс. км</div>
									<div class="title">Lada Priora <span class="price"><?=number_format($car['price'], 0, '', ' ')?> ₽</span></div>
								</a>
							</div>
						
						<?endfor;?>
					</div>
				</div>
				<div class="banners">
					<div class="banner_1 main_banner">
						<div class="text_wrapper">
							<p class="title"><strong>Ищете</strong> машину?</p>
							<p class="desc">1.000 новых предложений каждый день. 35.000 предложений на сайте</p>
						</div>
						<a href="pages/catalog.php">Поиск</a>
					</div>
					<div class="banner_2 main_banner">
						<div class="text_wrapper">
							<p class="title"><strong>Хотите</strong> продать машину?</p>
							<p class="desc">200 000 посетителей каждый день. Добавьте свое предложение прямо сейчас!</p>
						</div>
						<a href="pages/add_product.php">Продать</a>
					</div>
				</div>
				<div class="wrapper_2">
					<div class="left">
						<div class="recent_blog">
							<h2><strong>Недавно</strong> из блога</h2>
							<?php for($i = 0; $i < 3; $i++) : ?>
								<div class="post_block">
									<a href="pages/blog_single.php?blog=<?=$blogs[$i]['id']?>" class="thumb"><img src="<?=substr($blogs[$i]['blog_path'], 3)?>" class="car180x135" alt="car"/></a>
									<h5><a href="pages/blog_single.php?blog=<?=$blogs[$i]['id']?>"><?=$blogs[$i]['title']?></a></h5>
									<div class="date"><?=explode(' ', $blogs[$i]['created_at'])[0]?> </div>
									<div class="post"><p><?=explode('.', $blogs[$i]['text'])[0]?>.</p></div>
								</div>
							<?endfor;?>
							<div class="clear"></div>
						</div>

						<div class="video_box">
							<h2><strong>Видеообзоры</strong> авто</h2>
							<div class="post_block">
								<div class="preview">
									<a href="videos/lada_granta.mp4">
										<img src="images/my_cars/granta.jpg" alt="car" class="car180x115"/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="play" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">Новая LADA Granta</a></h5>
								<div class="post"><p>1 мин 8 мб</p></div>
							</div>
							<div class="post_block">
								<div class="preview">
									<a href="videos/lada_vesta.mp4">
										<img src="images/my_cars/vesta.jpg" alt="car" class="car180x115"/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="play" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">Новая LADA Vesta</a></h5>
								<div class="post"><p>1 мин 8 мб</p></div>
							</div>
							<div class="post_block">
								<div class="preview">
									<a href="videos/lada_xray.mp4">
										<img src="images/my_cars/xray.jpg" alt="car" class="car180x115"/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="play" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">Новая LADA XRAY</a></h5>
								<div class="post"><p>1 мин 8 мб</p></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="right">
						<div class="news_wrapper">
							<div class="news">
								<h2><strong>Автомобильный</strong> блог</h2>
								<?php for($i = 0; $i < 2; $i++) : ?>
									<div class="news_box">
										<a href="pages/blog_single.php?blog=<?=$blogs[$i]['id']?>" class="thumb">
											<img src="<?=substr($blogs[$i]['blog_path'], 3)?>" alt="car" class="car180x135"/>
										</a>
										<h5><a href="pages/blog_single.php?blog=<?=$blogs[$i]['id']?>">Какой уровень локализации у семейства Lada Vesta</a></h5>
										<div class="date"><?=explode(' ', $blogs[$i]['created_at'])[0]?></div>
										<div class="post">
											<p><?=explode('.', $blogs[$i]['text'])[0]?>.</p>
										</div>
									</div>
								<?endfor;?>
								<div class="all_wrapper"><a href="pages/blogs.php" class="search-news">ПОДРОБНЕЕ</a></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
</body>
