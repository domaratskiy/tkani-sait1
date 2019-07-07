<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tkani
 */

?>			
	</div><!-- wrapper-->
	</div><!-- tkani-content-box -->
	<!-- Модальные окна входа в личный кабинет и регистрации пользователя начало -->
		<div class="overlay js-overlay-login">
		<div class="popup js-popup-login">
				<h2 class="popup_title">Вход для покупателей</h2>
				<?php get_template_part('woocommerce/includes/parts/wc-form', 'login');?>
				<div class="close-popup js-close-login"></div>
			</div>
		</div>
		<div class="overlay js-overlay-registration">
			<div class="popup js-popup-registration">
				<h2 class="popup_title">Регистрация!</h2>
					<?php get_template_part('woocommerce/includes/parts/wc-form', 'register');?>
				<div class="close-popup js-close-registration"></div>
			</div>
		</div>
	<!-- Модальные окна входа в личный кабинет и регистрации пользователя конец -->
<footer id="colophon" class="footer site-footer">			
			<div class="header_center">
				<div class="logo">logo</div>
				<div class="contakt_box">
					<div class="contakt_box__left">
						<a href="#" class="link_fb"></a>
						<a href="#" class="link_inst"></a>
						<a href="#" class="link_you"></a>
					</div>
					<div class="contakt_box__center">
						<div class="yandex">tkanivspb@yandex.ru</div>
						<div class="mail">tkani_optspb@mail.ru</div>
						<a href="#" class="contakt_box__link">Обратная связь</a>
					</div>
					<div class="contakt_box__right">
						<div class="namber1">+7 (952) 369-64-27</div>
						<div class="namber2">+7 (911) 932-99-49</div>
						<a href="#" class="contakt_box__link">Перезвонить мне</a>
					</div>
				</div>
			</div>
</footer>

<?php wp_footer(); ?>

		

		<script>
			$('ul.menu.flex').flexMenu();
			$('ul.menu.flex-multi').flexMenu({
				showOnHover: false
			})
		</script>
</body>
</html>
