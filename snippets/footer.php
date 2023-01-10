
    <!--BEGIN FOOTER-->
		<div id="footer">
			<div class="bg_top_footer">
				<div class="top_footer">
					<div class="f_widget first">
						<h3><strong>О нас</strong></h3>
						<a href="#" class="footer_logo">AutoLada</a>
						<p>Пусть путешествия с родными будут максимально комфортными с LADA. Программа для семей с одним ребенком.</p>
					</div>
					<div class="f_widget divide second">
						<h3><strong>Часы</strong> работы</h3>
						<ul class="schedule">
							<li>
								<strong>Понедельник</strong>
								<span>9:30 - 18:00</span>
							</li>
							<li>
								<strong>Вторник</strong>
								<span>9:30 - 18:00</span>
							</li>
							<li>
								<strong>Среда</strong>
								<span>9:30 - 18:00</span>
							</li>
							<li>
								<strong>Четверг</strong>
								<span>9:30 - 18:00</span>
							</li>
							<li>
								<strong>Пятница</strong>
								<span>9:30 - 18:00</span>
							</li>
							<li>
								<strong>Суббота</strong>
								<span>9:30 - 16:00</span>
							</li>
							<li>
								<strong>Воскресенье</strong>
								<span>выходной</span>
							</li>
						</ul>
					</div>
					<div class="fwidget_separator"></div>
					<div class="f_widget third">
						<h3><strong>Наши</strong> контакты</h3>
						<div class="f_contact f_contact_1"><strong>Адрес:<br/></strong>г. Москва, г. Зеленоград, 37 км Ленинградского шоссе, (17 км от МКАД)</div>
						<div class="f_contact f_contact_2"><strong>Телефон:</strong> +7 (495) 126-85-61<br/><strong>FAX:</strong> +7 (495) 126-85-61</div>
						<div class="f_contact f_contact_3"><strong>Email:</strong> <a href="mailto:#">autoladal@gmail.com</a></div>
					</div>
					<div class="f_widget divide last frame_wrapper">
						<div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a href="https://yandex.ru/maps/1/moscow-and-moscow-oblast/geo/leningradskoye_shosse_37_y_kilometr/1706007318/?ll=37.241434%2C56.001044&mode=search&sctx=ZAAAAAgAEAAaKAoSCbTLtz6sl0hAEQpNEkvK30tAEhIJu0ihLHx9sT8R91eP%2B1brlD8iBgABAgMEBSgKOABAi50GSAFqAnJ1nQHNzEw9oAEAqAEAvQHJeY9pwgEZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOoBAPIBAPgBAIICdNCzLiDQnNC%2B0YHQutCy0LAsINCzLiDQl9C10LvQtdC90L7Qs9GA0LDQtCwgMzcg0LrQvCDQm9C10L3QuNC90LPRgNCw0LTRgdC60L7Qs9C%2BINGI0L7RgdGB0LUsICgxNyDQutC8INC%2B0YIg0JzQmtCQ0JQpigIAkgIGMTE5NzQymgIMZGVza3RvcC1tYXBz&sll=37.199932%2C55.984677&sspn=0.246298%2C0.073200&text=%D0%B3.%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%20%D0%B3.%20%D0%97%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D1%80%D0%B0%D0%B4%2C%2037%20%D0%BA%D0%BC%20%D0%9B%D0%B5%D0%BD%D0%B8%D0%BD%D0%B3%D1%80%D0%B0%D0%B4%D1%81%D0%BA%D0%BE%D0%B3%D0%BE%20%D1%88%D0%BE%D1%81%D1%81%D0%B5%2C%20%2817%20%D0%BA%D0%BC%20%D0%BE%D1%82%20%D0%9C%D0%9A%D0%90%D0%94%29&utm_medium=mapframe&utm_source=maps&z=18.15" style="color:#eee;font-size:12px;position:absolute;top:14px;">Ленинградское шоссе, 37-й километр — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUVnTWylC" width="220" height="235" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
					</div>
				</div>
			</div>
			<div class="bottom_footer">
				<div class="f_widget ">
					<h3 class="h3-footer"><strong>О нас</strong></h3>
					<ul>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">Наши партнеры</a></li>
						<li><a href="#">Реклама в Интернете</a></li>
						<li><a href="#">Карта сайта</a></li>
					</ul>
				</div>
				<div class="f_widget divide">
					<h3><strong>Помощь</strong></h3>
					<ul>
						<li><a href="#">Как мне добавить предложение?</a></li>
						<li><a href="#">Как мне найти машину?</a></li>
						<li><a href="#">Прайс-лист</a></li>
						<li><a href="#">Офис для автодилеров</a></li>
					</ul>
				</div>
				<div class="fwidget_separator"></div>
				<div class="f_widget">
					<h3><strong>Пользователю</strong></h3>
					<ul>
						<li><a href="../pages/registration.php">Зарегистрироваться</a></li>
						<li><a href="../pages/authorization.php">Войти</a></li>
						<li><a href="../pages/add_product.php">Для дилеров</a></li>
						<?php if ($AUTH_USER['role'] == 'admin') : ?>
							<li><a href="../pages/admin_page.php">Личный кабинет</a></li>
						<?endif;?>
					</ul>
				</div>
				<div class="f_widget divide last">
					<h3><strong>Медиа</strong></h3>
					<ul class="horizontal">
						<li><a href="#"><div class="media-icon"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
						<li><a href="#"><div class="media-icon"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
						<li><a href="#"><div class="media-icon"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
					</ul>
				</div>
			</div>
			<div class="copyright_wrapper">
				<div class="copyright">&copy; 2013 Auto Sale. Все права защищены.</div>
			</div>
		</div>
<!--EOF FOOTER-->
