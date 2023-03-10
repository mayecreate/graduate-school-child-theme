<?php
/*
* Template Name: Staff Directory
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
		<?php $search_and_filter_form_id = esc_html(get_field("search_and_filter_form_id", $post->ID)); ?>
        <div class="row">
            <div class="col-md-12 staff_2020_search_wrapper">
                <?php echo do_shortcode( '[searchandfilter id="'.$search_and_filter_form_id.'"]' ); //Faculty Search ?>
            </div>
        </div>
		<div class="row staff_row" id="main">
            <?php // args
                $args = array(
					'post_type' => 'staff', 
				);
                $args['search_filter_id'] = $search_and_filter_form_id;
            ?>

					<?php // query 
					$wp_query = new WP_Query( $args ); 

					// loop
					while( $wp_query->have_posts() )
					{
					$wp_query->the_post();

					?>
					<div class="col-sm-6 col-md-3">
						<?php get_template_part('partials/loop','staff-2020'); ?>
					</div>
					<?php } // end the loop ?>
					<!--Reset Query-->
					<?php wp_reset_query();?>
		</div>
		<div class="row">
			<div class="col-md-12"><div class="divider"></div></div>
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
		<div class="clear"></div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>