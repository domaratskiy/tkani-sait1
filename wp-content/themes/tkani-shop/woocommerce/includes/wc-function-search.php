<?php
	if( ! defined('ABSPATH')){
		exit; // Exit if accessed directly
	}

add_filter( 'post_class', 'tkani_add_class_search_item' );
function tkani_add_class_search_item($clasess){
	if(is_search() || is_product_taxonomy()){
		$clasess[] = 'search_cont';
	}
	//get_pr($clasess, false);
	return $clasess;
}