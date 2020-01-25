<?php
//Class 10
function fictional_assets(){
	wp_enqueue_style( "fictional-font-roboto", "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
	wp_enqueue_style("fictional-font-awesome", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
	wp_enqueue_style("fictional-style", get_stylesheet_uri(),'null',time());

	wp_enqueue_script( 'fictional-scripts', get_theme_file_uri('/assets/js/scripts-bundled.js'), array('jquery'), 1.0, true);
}
add_action('wp_enqueue_scripts','fictional_assets');

//Class 11
function fictional_after_setup_theme() {
	add_theme_support('title-tag');

}
add_action('after_setup_theme','fictional_after_setup_theme');







?>