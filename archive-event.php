<?php
//Class 26
get_header();
echo 'ARCHIVE-EVENT.PHP';

pageBanner(array(
	'title' => __("All Events","fictional"),
	'subtitle' => __('See what is going in our world.','fictional')
));
?>

<div class="container container--narrow page-section">
	<?php
	while(have_posts()) {
		the_post(); 
    get_template_part('/template-parts/content','event');
  }
	echo paginate_links();
	?>

	<hr class='section-break'>
	<p>Looking for a Recap of Past Events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a></p>
</div>

<?php get_footer(); ?>