<?php
//Class 26
get_header();

pageBanner(array(
	'title' => __("All Events","fictional"),
	'subtitle' => __('See what is going in our world.','fictional')
));
?>

<div class="container container--narrow page-section">
	<?php
	while(have_posts()) {
		the_post(); ?>
 		<div class="event-summary">
          <a class="event-summary__date t-center" href="#">
            <span class="event-summary__month"><?php 
              $eventDate = new DateTime(get_field('event_date'));
              echo $eventDate->format('M');
             ?></span>
            <span class="event-summary__day">
              <?php echo $eventDate->format('d'); ?>              
            </span>  
          </a>
            
        	<div class="event-summary__content">
            	<h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            	<p><?php echo wp_trim_words(get_the_content(), 18) ?><a href="<?php the_permalink(); ?>" class="nu gray"><?php echo esc_html("Read more", "test") ?></a></p>
        	</div>
        </div>
	<?php }
	echo paginate_links();
	?>

	<hr class='section-break'>
	<p>Looking for a Recap of Past Events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a></p>
</div>

<?php get_footer(); ?>