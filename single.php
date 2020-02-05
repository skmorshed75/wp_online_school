<?php
get_header();

echo 'SINGLE.PHP';
while(have_posts()){
	the_post();
	pageBanner();
	?>
	<div class="container container--narrow page-section">
		<div class="generic-content">
			<div class="metabox metabox--position-up metabox--with-home-link">
		      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Blog Home</a> <span class="metabox__main">Posted By <b><?php the_author_posts_link(); ?></b> on <?php the_time('j.n.y'); ?> in <?php echo get_the_category_list(', ');?></span></p>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php	
} ?>

<?php
get_footer();
?>