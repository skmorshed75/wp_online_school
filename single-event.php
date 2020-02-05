<?php
get_header();
echo 'SINGLE-EVENT.PHP';
while(have_posts()){
	the_post();
	pageBanner();
	?>


	<div class="container container--narrow page-section">		
		<div class="generic-content">
			<div class="metabox metabox--position-up metabox--with-home-link">
		      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i><?php echo esc_html('&nbsp;Events Home','fictional'); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
			</div>
			<div class="generic-content"><?php the_content(); ?></div>
			<!-- Class 33 -->
			<?php
			$relatedProgram = get_field('related_programs');
			//print_r($relatedProgram);
			if($relatedProgram){
				echo '<hr class="section-break">';
				echo '<h4 Class = "headline headline--medium">All Program(s)</h4>';
				echo '<ul class = "link-list min-list">';
				foreach($relatedProgram as $program){ ?>
					<li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
				<?php }
				echo '</ul>';
			}

			?>
		</div>
	</div>
<?php	
wp_reset_postdata();
} ?>


<?php
get_footer();
?> 