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
						'terms'     => '605'
					)
					)
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );

				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
				
				<?php get_template_part('partials/loop','eventfeature'); ?>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?> 
		</div>
<div class="clear"></div>
<a href="<?php bloginfo('url'); ?>/events/" class="btn-mayecreate alignleft">View All Events</a>