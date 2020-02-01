<?php
//Class 26
get_header();
?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>)"></div>
	<div class="page-banner__content container container--narrow">
	  <h1 class="page-banner__title">
	  	Past Events
	  </h1>
	  <div class="page-banner__intro">
	    <p>
	    A recap of our past Events....
	    </p>
	  </div>
	</div>  
</div>

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
		$pastEvents->the_post(); ?>
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
	echo paginate_links(array(
		'total' => $pastEvents->max_num_pages
	));
	?>
	<hr class = 'section-break'>
	<p>Looking for a recap of Past Events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a>.</p>
</div>

<?php get_footer(); ?>