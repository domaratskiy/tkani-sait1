<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tkani
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">	
<div id="page" class="site">
		
	
		<header id="masthead" class="site-header">
				<div class="header_top">
					<p class="start_bay">В корзине нет товара. Начните покупки в <a href="#" class="start_bay_link">нашем каталоге</a></p>
					<div class="enter_box">
						<a  href="#" class="login js-button-login">Вход <span class="display_none">для покупателей</span></a>
						<div class="v_line"></div>
						<a  href="#" class="registration js-button-registration">Регистрация</a>	
					</div>

					<div class="basket"><?php tkani_woocommerce_cart_link(); ?></div>
				</div>
				<div class="header_center">
					<div class="logo">
						<?php $logo_id = carbon_get_theme_option('tes_header_logo');
						$logo = $logo_id ? wp_get_attachment_image_src($logo_id , 'full') : '';
						$site_name = carbon_get_theme_option('tes_header_site_name') ? carbon_get_theme_option('tes_header_site_name') : get_bloginfo('name');
						$site_decs = carbon_get_theme_option('tes_header_site_desc') ? carbon_get_theme_option('tes_header_site_desc') : get_bloginfo('description');
						?>
						
						
						<?php if (is_front_page() && is_home()) :
							if ($logo_id) :	?>
							
								<a href="<?php echo home_url('/');?>"> <img src="<?php echo $logo[0];?>" width="<?php echo $logo[1];?>" height="<?php echo $logo[2];?>" alt="">
								</a>
							
								<?php else: ?>
								
									<a href="<?php echo home_url('/');?>" class="title_logo">
										<?php echo $site_name; ?>
									</a>
								
							<?php endif;?>
						<?php else:
							if ($logo_id) :	?>
							<h1>
								<img src="<?php echo $logo[0];?>" width="<?php echo $logo[1];?>" height="<?php echo $logo[2];?>" alt="">
								
							</h1>
						<?php else: ?>
									<a href="<?php echo home_url('/');?>" class="title_logo">
										<?php echo $site_name; ?>
									</a>
						<?php endif;?>
						<?php endif;?>
					</div>
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

		</header>
		<nav class="nav">
				<?php tkani_primary_menu(); ?>
				<section class="content_box">
						<div class="content">
							<div class="catalog_wrapper">
								<div class="catalog_box">
									<div  class="aside_title">
										<form method="POST" class="search_form" action="<?php esc_url( home_url( '/' ) );?>">
											<input type="text"  value="<?php get_search_query(); ?>" name="s" class="search_text" placeholder="Введите названия" autocomplete="off">
											<input type="submit" class="search_submit" value="">
										<div class="search-result-close">Очистить</div>
										<div class="search-result"></div>									
										</form>
			
									</div>
								</div>
							</div>				
						</div>
				</section>				
		</nav>

	</div>
		<div id="content" class="site-content">
			
			
