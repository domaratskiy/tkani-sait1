<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}

// Подключение стилей
add_action( 'wp_enqueue_scripts', 'tkani_scripts' );	
function tkani_scripts() {

	wp_enqueue_style( 'tkani-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/style.css',array(), null, 'all');
	wp_enqueue_style( 'demo-style', get_template_directory_uri() . '/assets/css/demo.css',array(), null, 'all');
	wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/assets/css/modal-style.css',array(), null, 'all');


}

// подключения js скриптов
add_action( 'wp_enqueue_scripts', 'tkani_styles' );	
function tkani_styles() {


	wp_enqueue_script( 'tkani-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'tkani-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );


	wp_enqueue_script( 'query-3.3.1', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'supmenu_script', get_template_directory_uri() . '/assets/js/supmenu_script.js',array('jquery'),  null, true );
	wp_enqueue_script( 'flexmenu', get_template_directory_uri() . '/assets/js/flexmenu.js',array('jquery'),  null, true );
	wp_enqueue_script( 'catalog_drop', get_template_directory_uri() . '/assets/js/catalog_drop.js', array('jquery'), null, true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js',array('jquery'),  null, true );
	
	wp_enqueue_script( 'ajax-search', get_template_directory_uri() . '/assets/js/ajax-search.js',array('jquery'),  null, true );	
	wp_localize_script('ajax-search', 'search_form' , array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('search-nonce')
	));

	
	wp_enqueue_script( 'tab_js', get_template_directory_uri() . '/assets/js/tab_js.js',array('jquery'),  null, true );
	wp_enqueue_script( 'modal-box', get_template_directory_uri() . '/assets/js/modal-box.js',array('jquery'),  null, true );
	
	wp_enqueue_script( 'catalog_drop', get_template_directory_uri() . '/assets/js/catalog_drop.js',array('jquery'),  null, true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js',array('jquery'),  null, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_dequeue_style( 'wcqi-css' );
}