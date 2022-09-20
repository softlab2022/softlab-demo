<?php

function softlab_demo_enqueue_scripts() {
	wp_enqueue_style( 'softlab-demo-style', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'));

	wp_enqueue_style( 'softlab-demo', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );


	wp_enqueue_script( 'softlab-demo', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'softlab_demo_enqueue_scripts' );