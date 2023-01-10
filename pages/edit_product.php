<?php

	require_once('../snippets/base.php');
	require_once('../app/database/Database.php');

    require('../app/database/models/Car.php');

	$PAGE_TITLE = "Edit product";
	global $database;

    if ( isset($_GET['edit_car']) ) {
        editCar($_GET['edit_car']);
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
					<div class="steps">
						<a href="add_product.php"><span>Новое объявление</span></a>
						<a href="my_added_products.php"><span>Мои объявления</span></a>
					</div>
					<h1><strong>Редактирование</strong> объявления</h1>

					<? include('../snippets/form_errors.php') ?>

					<h2><strong>Данные</strong> о транспортном средстве</h2>
					<form enctype='multipart/form-data' name="edit_car" method="POST" action="../app/actions/edit_car.php">
						<div class="sell_content sell_box_1">
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Модель: </strong></label>
								<select class="select_5" name="model">

								<option disabled selected>Выбрать</option>

									<?php
										$models = ['Kalina', 'Vesta', 'Largus',
										'Priora', 'Granta', 'XRAY', 'ВАЗ-2115', 'ВАЗ-2114'];

										foreach($models as $model) :
									?>

									<option value=<?= $model; ?> <?php if ($model === $_SESSION['edit_data']['model']) :?> selected <?endif;?> ><?= $model; ?></option>

									<?php endforeach; ?>
									
								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Год производства:</strong></label>
								<select class="select_5" name="year_production">
									
								<option disabled selected>Выбрать</option>
									
									<?php
										 for($i = 2022; $i >= 2001; $i--):
									?>
										<option value=<?= $i; ?> <?php if ($i == $_SESSION['edit_data']['year_production']) :?> selected <?endif;?> ><?= $i; ?></option>
									<?php endfor; ?>

								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Тип кузова: </strong></label>
								<select class="select_5" name="body_type">

								<option disabled selected>Выбрать</option>
									
									<?php
										$body_types = ['Седан', 'Универсал', 'Хэтчбек', 'Купе'];

										foreach($body_types as $body_type) :
									?>
										<option value=<?= $body_type; ?> <?php if ($body_type === $_SESSION['edit_data']['body_type']) :?> selected <?endif;?> ><?= $body_type; ?></option>
									<?php endforeach; ?>
			
								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Топливо:</strong></label>
								<select class="select_5" name="fuel">

								<option disabled selected>Выбрать</option>

									<?php
										$fuels = ['Бензин', 'Дизель'];

										foreach($fuels as $fuel) :
									?>
										<option value=<?= $fuel; ?> <?php if ($fuel === $_SESSION['edit_data']['fuel']) :?> selected <?endif;?> ><?= $fuel; ?></option>
									<?php endforeach; ?>
				
								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Трансмиссия</strong></label>
								<select class="select_5" name="transmission">
									<option disabled selected>Выбрать</option>

									<?php
										$transmissions = ['Автомат', 'Механика'];

										foreach($transmissions as $transmission) :
									?>
	
									<option value=<?= $transmission; ?> <?php if ($transmission === $_SESSION['edit_data']['transmission']) :?> selected <?endif;?> ><?= $transmission; ?></option>

									<?php endforeach; ?>

								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Цвет:</strong></label>
								<select class="select_5" name="color">
									<option disabled selected>Выбрать</option>

											
									<?php
										$colors = ['Красный', 'Баклажановый', 'Коричневый', 'Золотистый', 'Оражевый', 'Серый', 'Зеленый', 'Желтый', 'Синий', 'Серебристый', 'Белый', 'Черный'];

										foreach($colors as $color) :
									?>
										<option value=<?= $color; ?> <?php if ($color === $_SESSION['edit_data']['color']) :?> selected <?endif;?> ><?= $color; ?></option>
									<?php endforeach; ?>

								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Объем двигателя (л):</strong></label>
								<select class="select_5" name="engine">
									<option disabled selected>Выбрать</option>

									<?php
										 for($i = 0.2; $i <= 2.5; $i += 0.1):
									?>
										<option value=<?= $i; ?> <?php if ((string)$i == $_SESSION['edit_data']['engine']) :?> selected <?endif;?> ><?= $i; ?></option>
									<?php endfor; ?>

								</select>
							</div>
							<div class="select_params">
								<label class="add_product_label"><span>* </span><strong>Пробег (тыс. км):</strong></label>
								<input id="mileage" required value="<?=number_format($_SESSION['edit_data']['mileage'], 0, '', ' ')?>" name="mileage" type="text" class="input_add_product mileage"/>
							</div>
							<div class="clear"></div>
						</div>

						<h2><strong>Цена</strong> транспортного средства</h2>
						<div class="sell_price">
							<div class="select_wrapper">
								<label class="add_product_label"><span>* </span><strong>Цена в ₽:</strong></label>
								<input id="price" required value="<?=number_format($_SESSION['edit_data']['price'], 0, '', ' ')?>" name="price" type="text" class="input_add_product price"/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="select_info">
							<h2><strong>Контактная</strong> информация дилера</h2>
							<div class="contact_wrapper">
								<div class="select_wrapper">
									<label class="add_product_label"><span>* </span><strong>Телефон для связи:</strong></label>
									<input required value="<?=$_SESSION['edit_data']['connection_phone'];?>" name="connection_phone" type="tel" class="input_add_product"/>
								</div>
								<div class="select_wrapper">
									<label class="add_product_label"><span>* </span><strong>Email для связи:</strong></label>
									<input required value="<?=$_SESSION['edit_data']['connection_email'];?>" name="connection_email" type="email" class="input_add_product"/>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="sell_box sell_box_4">
							<h2><strong>Фотографии</strong> транспортного средсва (загрузить ровно 6 изображений)</h2>
							<div class="foto_wrapper">
								<div class="photos_wrapper edit">

									<?php foreach( $_SESSION['edit_data']['car_paths'] as $car_photo ) : ?>

										<div class="wrap_photo">
                                            <img src="<?=$car_photo['path']?>" alt="car_photo" class="car_photo">
											<label class="file_label edit">
												<p сlass="change_photo">Заменить изображение</p>
												<input type="file" class="inp_file_edit" id="inp_file" name="update[]">
											</label>
                                        </div>
										
									<?endforeach;?>
                                    
                                </div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="sell_submit_wrapper">
							<input type="submit" value="Отправить" class="sell_btn"/>
							<div class="clear"></div>
						</div>
					</form>

				</div>
				
			</div>
		</div>
	<!--EOF CONTENT-->
	<? include('../snippets/footer.php') ?>
</body>
</html>
