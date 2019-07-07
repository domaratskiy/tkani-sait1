<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;
Container::make( 'theme_options', 'Настройки темы' )
	->set_icon( 'dashicons-carrot' )
	->add_tab( 'Шапка', array(
		Field::make( 'select', 'tes_header_logic', 'Будет использоваться логотип?' )
			->add_options(array(
				'yes' => 'Да, буду использовать логотип',
				'no' => 'Нет, буду использовать текст',
			)),
		Field::make( 'image', 'tes_header_logo', 'Логотип' )
			->set_conditional_logic(array(
				'relation' => 'AND',
				array(
					'field' => 'tes_header_logic',
					'value' => 'yes',
					'compare' => '=',
				)
			)),
		Field::make( 'text', 'tes_header_site_name', 'Название сайта' )
			
			->set_default_value('Сайт')
				->set_conditional_logic(array(
					'relation' => 'AND',
					array(
						'field' => 'tes_header_logic',
						'value' => 'no',
						'compare' => '=',
					)
				)),
		Field::make( 'text', 'tes_header_site_desc', 'Описание сайта' )
			->set_conditional_logic(array(
				'relation' => 'AND',
				array(
					'field' => 'tes_header_logic',
					'value' => 'no',
					'compare' => '=',
				)
			))
			->set_default_value(get_bloginfo('description')),
	) )
	->add_tab( 'Подвал', array(
		Field::make( 'text', 'crb_email', 'Notification Email' ),
		Field::make( 'text', 'crb_phone', 'Phone Number' )->set_default_value('Сайт'),
	) );