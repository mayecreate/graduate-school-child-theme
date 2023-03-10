<?php
/*
* Template Name: Degree Program - RESULTS
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
        <?php $search_and_filter_form_id = esc_html(get_field("search_and_filter_form_id", $post->ID)); ?>
		<div class="row">
		    <?php //get_template_part('partials/loop','standard'); ?>
            <div class="col-md-12">
            <h2 class="degree_search_title">Filter Programs</h2>
            <?php echo do_shortcode( '[searchandfilter id="'.$search_and_filter_form_id.'"]' ); ?>
            </div>
		</div>
        <div class="clear"></div>
        <div class="row" id="main">
        
            <?php // args
				$args = array(
				'post_type' => 'degree_programs',
				);
                $args['search_filter_id'] = $search_and_filter_form_id;?>

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
				
				<div class="col-md-12">
                    <?php $degree_cat = wp_get_post_terms( $post->ID, 'degreecategory' ); ?>
                    <h4>
                        <?php the_title(); ?> - <span class="degree_cat_outer_wrapper"><?php foreach( $degree_cat as $term ) { ?><span class="degree_cat_wrapper wrapper_<?php echo $term->slug; ?>"><a href="<?php bloginfo('url'); ?>/degreecategory/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a><span>,</span></span> <?php } ?></span>
                    </h4>
                    <div class="divider"></div>

                </div>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?>
                <?php } else { ?>
                <div class="col-md-12">
                    <h2>No Results Found</h2>
                </div>
                <?php } // end the loop ?>
            
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>