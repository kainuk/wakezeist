<?php
/*
Plugin Name: WakeZeist
Version: 0.9.1
Plugin URI: https://github.com/kainuk/wakezeist
Author: Klaas Eikelboom (klaas@eikelboom.com}
Author URI: https://eikelboom.com
Description: Handig voor WakeZeist (o.a custom fields voor een wake).
Text Domain: wakezeist
Domain Path: /languages
*/
add_filter( 'rwmb_meta_boxes', 'wakezeist_register_meta_boxes' );

function wakezeist_register_meta_boxes( $meta_boxes ) {
	$prefix = 'wakezeist_';
	$meta_boxes[] = [
		'title'      => esc_html__( 'Wake ', 'wake' ),
		'id'         => 'wake',
		'post_types' => ['post'],
		'context'    => 'side',
		'priority'   => 'high',
		'fields'     => [
			[
				'type'   => 'date',
				'name'   => esc_html__( 'Datum', 'wake' ),
				'id'     => $prefix . 'date',
				'desc'   => esc_html__( 'Wanneer is de wake (is er niets ingevuld, dan gaat het bericht over iets anders)?', 'wake' ),
				'js_options' => [
					'dateFormat' => 'dd-mm-yy',
				],
				'save_format' => 'Y-m-d',
			],
			[
				'type' => 'checkbox',
				'id'   => $prefix . 'extra_vigil',
				'name' => esc_html__( 'Extra?', 'wake' ),
				'desc' => esc_html__( 'Is het een extra wake (anders is het een reguliere wake).', 'wake' ),
			],
		],
	];
	return $meta_boxes;
}
