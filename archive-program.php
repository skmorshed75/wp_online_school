<?php
//Class 32
get_header();

echo 'ARCHIVE-PROGRAM.PHP';

pageBanner(array(
	'title' => __("All Programs arc-prog.php","fictional"),
	'subtitle' => __('There is something for everyone. Have a look around.', 'fictional')
));
?>

<div class="container container--narrow page-section">
	<ul class="link-list min-list">
	<?php
	while(have_posts()) {
		the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php 
	}
	echo paginate_links();
	wp_reset_postdata();
	?>
	</ul>
</div>

<?php get_footer(); ?>