<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}

//хлебные крошки начало
remove_action(  'woocommerce_before_main_content' , 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'tkani_add_breadcrumbs', 20 );
function tkani_add_breadcrumbs(){
 ?>	
	<div class="tkani_breadcrumbs">
		
		<?php woocommerce_breadcrumb(); ?>

	</div>
<?php	
}
// хлебные крошки конец

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
// Изменяем разделитель хлебных крошек с '/' на '>'
$defaults['delimiter'] = '&#8195;';
return $defaults;
}


// подключение сайдбара только на главной страице
add_action( 'woocommerce_sidebar', 'tkani_add_sidebar_only_archive', 50 );
function tkani_add_sidebar_only_archive() {
	if ( ! is_product() ) {
		woocommerce_get_sidebar();
	}
}


remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action( 'woocommerce_before_single_product_summary', 'tkani_show_product_images', 20 );
function tkani_show_product_images(){
	?>	
		<div class="tkani_card_img">		
			<?php woocommerce_show_product_images(); ?>
		</div>
<?php
}



