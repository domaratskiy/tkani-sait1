<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}
	
add_action( 'widgets_init', 'tkani_widgets_init' );

function tkani_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tkani' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tkani' ),
		'before_widget' => '<section id="%1$s" class="widget tkani_widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="tkani-widget-title">',
		'after_title'   => '</h2>',
	) );
}
