
<div class="row">
			<?php $args = array(
					'posts_per_page'	=> -1,
					'orderby' => 'menu_order',
					'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
					'post_type' => 'staff',
					'paged' => $paged,
					'tax_query' => array(
					'relation' => 'OR',
						array (
							'taxonomy'  => 'staffcategory',
							'field'     => 'ID',
							'terms'     => 649
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
				<div class="col-sm-6 col-md-3">
				<?php //get_template_part('partials/loop','staff-mupa'); ?>
				<?php get_template_part('partials/loop','staff-2020'); ?>
                </div>
				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?> 
		</div>
<div class="clear"></div>