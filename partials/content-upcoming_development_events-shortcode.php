<h2 class="center">Upcoming Events</h2>
<div class="row event_row">
			<?php // args
		$today = date('Y-m-d');
				$args = array(
				'posts_per_page'	=> 4,
				'post_type' => 'tribe_events',
				'paged' => $paged,
				'meta_key'	=> '_EventStartDate',
				'orderby' => 'meta_value',	
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => '_EventStartDate',
						'value' => $today,
						'compare' => '>='
					)
				),
				'tax_query' => array(
				'relation' => 'OR',
					array (
						'taxonomy'  => 'tribe_events_cat',
						'field'     => 'ID',
						'terms'     => '667'
					)
					)
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );
                // loop
				if( $wp_query->have_posts() )
				{
				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
				
				<?php get_template_part('partials/loop','eventfeature'); ?>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?>
            <?php } else { ?>
                <h3 class="center">Sorry, nothing to show yet.</h3>
            <?php } // end the loop ?> 
		</div>
<div class="clear"></div>
<a href="<?php bloginfo('url'); ?>/events/" class="btn-mayecreate alignleft">View All Events</a>