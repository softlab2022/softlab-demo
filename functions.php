<?php

function softlab_demo_enqueue_scripts() {
	wp_enqueue_style( 'softlab-demo-style', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'));

	wp_enqueue_style( 'softlab-demo', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );


	wp_enqueue_script( 'softlab-demo', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'softlab_demo_enqueue_scripts' );

//WooCommerce auto complete order

/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) {
	if ( ! $order_id ) {
		return;
	}

	$order = wc_get_order( $order_id );
	$order->update_status( 'completed' );
}