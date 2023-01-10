
<?php
        $in_page = false;
        if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
            $in_page = true;
        }
?>

<header id="header">
	<div class="top_info">
		<div class="logo">
			<a href="#">Rus<span>LADA</span></a>
		</div>
		<div class="header_contacts">
			<div class="phone">+7 (495) 126-85-61</div>
			<div>Адрес: г. Москва, г. Зеленоград, 37 км Ленинградского шоссе, (17 км от МКАД)</div>
		</div>
		<div class="socials">
			<a href="#">
				<div class="media-icon"><img src='<?php echo $in_page ? '' :  '../'?>images/my-icon/facebook.svg' alt="media_icon" class="media_icon"></div>
			</a>
			<a href="#">
				<div class="media-icon"><img src='<?php echo $in_page ? '' : '../'?>images/my-icon/twitter.svg' alt="media_icon" class="media_icon"></div>
			</a>
			<a href="#">
				<div class="media-icon"><img src='<?php echo $in_page ? '' : '../'?>images/my-icon/instagram.svg' alt="media_icon" class="media_icon"></div>
			</a>
		</div>
	</div>
	<div class="bg_navigation">
		<div class="navigation_wrapper">
			<div id="navigation">

				<span><?=navigationMobile($_SERVER['REQUEST_URI']);?></span>

				<ul class="ul-nav">
					<li><a class="header_link" href="../index.php">Главная</a></li>
					<li><a class="header_link" href="../pages/about_us.php">О нас</a></li>
					<li><a class="header_link" href="../pages/blogs.php">Наш блог</a></li>
					<li><a class="header_link" href="../pages/add_product.php">Для дилеров</a></li>
					<li><a class="header_link" href="../pages/contacts.php">Контакты</a></li>
					<li><a class="header_link" href="../pages/catalog.php?page=1">Каталог</a></li>
					<?php if ($AUTH_USER === NULL) : ?>
						<li>
							<a class="header_link" href="../pages/authorization.php">Войти</a>
						</li>
					<?php else : ?>
						<li>
							<?php if ($AUTH_USER['role'] === 'admin') : ?>
								<a class="header_link" href="../pages/admin_page.php">Профиль</a>
							<?php else : ?>
								<a class="header_link" href="../pages/profile.php">Профиль</a>
							<?endif;?>
						</li>
						<!-- <li>
							<a href="/pages/exit.php">Выход</a>
						</li> -->
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</header>

<script>
	let header_links = document.querySelectorAll('.header_link');


		header_links.forEach( link => {
			if ( (link.href).includes('?') ) {
				let get_index = (link.href).indexOf('?');
				let link_href =  (link.href).slice(0, get_index);
				let loc_href =  (window.location.href).slice(0, get_index);

				if (link_href == loc_href ) link.classList.add('active');
			}else {
				if (link.href == window.location.href) link.classList.add('active');
			}
			
		} )
	
</script>								

</body>