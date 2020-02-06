<?php
//Class 41
get_header();

echo 'ARCHIVE-CAMPUS.PHP';

pageBanner(array(
	'title' => __("All Campuses","fictional"),
	'subtitle' => __('We have several conveniently located campuses.', 'fictional')
));
?>

<div class="container container--narrow page-section">
	<div class="acf-map">
		<?php	
		while(have_posts()) {
			the_post(); 
			$mapLocation = get_field('map_location');
			?>
				<div class="marker" data-lat = "<?php echo $mapLocation['lat']; ?>" data-lng = "<?php echo $mapLocation['lng']; ?>"></div>		
			<?php 
		}
		echo paginate_links();
		wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>