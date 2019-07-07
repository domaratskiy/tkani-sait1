<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}




add_filter('woocommerce_show_page_title','tkani_hide_title_shop');
function tkani_hide_title_shop( $hide){
	if(is_shop) {
		 $hide = false;
	}

	return $hide;
}



add_filter( 'post_class', 'tkani_add_class_loop_item' );
function tkani_add_class_loop_item($clasess){
	if(is_shop() || is_product_taxonomy()){
		$clasess[] = 'i_cart';
	}
	//get_pr($clasess, false);
	return $clasess;
}

// remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);




add_action( 'woocommerce_before_shop_loop_item_title', 'tkani_loop_product_div_image_open', 5 );
function tkani_loop_product_div_image_open(){
	?>
		<div class="img__wrapper ">
	<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'tkani_loop_product_div_image_close', 30);
function tkani_loop_product_div_image_close(){
	?>
		</div>
	<?php
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10 );
add_action( 'woocommerce_shop_loop_item_title', 'tkani_template_loop_product_title' , 10);
function tkani_template_loop_product_title(){
	echo '<h2 class="i_cart__name"><a href="'. get_permalink() .'">' . get_the_title() . '</a></h2>';
}

add_filter( 'woocommerce_loop_add_to_cart_args', 'tkani_add_class_add__to_cart' );
function tkani_add_class_add__to_cart($args){
	
	$args['class'] =  $args['class'] . ' i_cart__add';
	return $args;
}