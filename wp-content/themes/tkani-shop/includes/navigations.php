<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

register_nav_menus( array(
	'primary' => 'Основное',
	'secodary' => 'Вторичное'

));

function tkani_primary_menu(){
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_id'        => 'primary-menu',
		'menu_class'     => 'menu flex',
	) );
}

register_nav_menus( array(
	'catalog-menu' => 'Каталог',
	'sab-catalog' => 'Подкаталог'

));

function tkani_catalog_menu(){
	wp_nav_menu( array(
		'theme_location' => 'catalog-menu',

		'menu_class'     => 'aside_ul  js-ui-accordion',

		
	) );
}