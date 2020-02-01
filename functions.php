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
	//Class 16
	register_nav_menu('headerMenuLocation', 'Header Menu Location');
	register_nav_menu('footerLocationOne', 'Footer Location One');
	register_nav_menu('footerLocationTwo', 'Footer Location Two');

}
add_action('after_setup_theme','fictional_after_setup_theme');

//Class 30
function university_adjust_queries($query) {
	//Class 32
	if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
		$query->set('posts_per_page', 2);
		$query->set('orderby','title');
		$query->set('order','ASC');
	}
	//Class 32 ends
	if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
		$today = date('Ymd');
		$query->set('posts_per_page', 2);		
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
			array(
				'key' => 'event_date',
				'compare' => '>=',
				'value' => $today,
				'type' => 'numeric'
			)
		));
	}
}
add_action('pre_get_posts','university_adjust_queries');





?>