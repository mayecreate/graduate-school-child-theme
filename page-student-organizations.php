<?php
/*
* Template Name: Student Organizations
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
            
            <div class="clear"></div>
            
            <?php // args
				$args = array(
				'posts_per_page'	=> -1,
                    'orderby' => 'name',
				'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'post_type' => 'student_org',
				'paged' => $paged,
				); ?>

				<?php // query 
				$wp_query = new WP_Query( $args );

				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
            	
                <?php get_template_part('partials/loop','blog'); ?>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?>
            
		</div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>