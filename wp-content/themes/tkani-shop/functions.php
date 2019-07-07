<?php
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    load_template( get_template_directory() . '/includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'tkani_register_custom_fields' );
function tkani_register_custom_fields() {
	require get_template_directory() . '/includes/custom-fields-options/metabox.php';
	require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
}


/* 
 *Подключения настроек темы
 */
require get_template_directory() . '/includes/theme-settings.php';

/* 
 *Подключения области виджетов
 */
require get_template_directory() . '/includes/widget-areas.php';

/* 
 *Подключения скриптов js
 */
require get_template_directory() . '/includes/enqueue-script-style.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Подключения вспоморательных функций
 */
require get_template_directory() . '/includes/helpers.php';

/**
 * Подключения меню
 */
require get_template_directory() . '/includes/navigations.php';

/**
 * Подключения ajax
 */
require get_template_directory() . '/includes/ajax.php';

/**
 * Load Jetpack compatibility file.
 */





if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Проверка на наличие плагина woocommers. Если плагин подключен, то подключаются файлы.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';

	require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';

	require get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-archive.php';
	require get_template_directory() . '/woocommerce/includes/wc-function-search.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-checkout.php';
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 15;' ), 20 );


