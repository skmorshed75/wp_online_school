<?php
//Class 26
get_header();

echo 'PAGE-PAST-EVENTS.PHP';
pageBanner(array(
	'title' => 'Past Events',
	'subtitle' => 'A recap of our past Events....'
));
?>


<div class="container container--narrow page-section">
	<?php
	//Class 31
	$today = date('Ymd');
	$pastEvents = new WP_Query(array(
		'paged' =>get_query_var('paged',1),
		'posts_per_page' => 10,
		'post_type' => 'event',
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'compare' => '<',
				'value' => $today,
				'type' => 'numeric'
			)
		)
	));

	while($pastEvents->have_posts()) {
		$pastEvents->the_post();
		get_template_part('/template-parts/content','event');
	}
	echo paginate_links(array(
		'total' => $pastEvents->max_num_pages
	));
	?>
	<hr class = 'section-break'>
	<p>Looking for a recap of Past Events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a>.</p>
</div>

<?php get_footer(); ?>