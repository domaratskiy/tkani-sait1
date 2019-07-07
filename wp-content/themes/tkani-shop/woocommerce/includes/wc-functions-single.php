<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}


	
// обёртка для изображения товара, страница карточки товара начало
add_action('woocommerce_before_single_product_summary', 'tkani_wrapper_product_image_start', 5);
function tkani_wrapper_product_image_start() {
   ?>
	<div class="cart_product">
  <?php	
}

add_action('woocommerce_before_single_product_summary', 'tkani_wrapper_product_image_end', 25);
function tkani_wrapper_product_image_end(){
 ?>
	</div>
 <?php	
}
// обёртка для изображения товара, страница карточки товара конец



// обёртка для информации товара, страница карточки товара начало
add_action('woocommerce_before_single_product_summary', 'tkani_wrapper_product_card__info_start', 5);
function tkani_wrapper_product_card__info_start() {
   ?>
	<div class="card__img">
  <?php	
}

add_action('woocommerce_after_single_product_summary', 'tkani_wrapper_product_card__info_end', 25);
function tkani_wrapper_product_card__info_end(){
 ?>
	</div>
 <?php	
}
// обёртка для информации товара, страница карточки товара конец