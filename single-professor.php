<?php
get_header();

while(have_posts()){
	the_post();?>
	<div class="page-banner">
	    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>)"></div>
	    <div class="page-banner__content container container--narrow">
	      <h1 class="page-banner__title"><?php the_title(); ?></h1>
	      <div class="page-banner__intro">
	        <p>Learn how the school of your dreams got started.</p>
	      </div>
	    </div>  
	</div>

	<div class="container container--narrow page-section">
		<div class="generic-content">
			<div class="generic-content">
				<div class="row group">
					<div class="one-third">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="two-thirds">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<!-- Class 34 -->
			<?php
			$relatedProgram = get_field('related_programs');
			//print_r($relatedProgram);
			if($relatedProgram){
				echo '<hr class="section-break">';
				echo '<h4 Class = "headline headline--medium">Subject(s) Taught</h4>';
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