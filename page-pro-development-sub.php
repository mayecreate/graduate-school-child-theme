<?php
/*
* Template Name: Professional Development - SUB PAGE
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post();?>
                    <img class="aligncenter size-large wp-image-10399" src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/08/Logo_horizontal-1-2-1024x200.png" alt="" width="1024" height="200" />
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="col-md-3">
                        <?php $image_id = get_post_thumbnail_id();
                        $image_url = wp_get_attachment_image_src($image_id,'full', true); ?>
                        <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    </div>
                    <div class="col-md-9"> 
                    <?php } else { ?>
                    <div class="col-md-12">
                    <?php } ?>
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; // end of the loop. ?>

            <?php else : ?>
                <?php get_template_part( 'no-results', 'content' ); ?>
            <?php endif; ?>
		</div>

	</div><!-- page -->
    <?php $page_slug = $post->post_name; //echo $page_slug; ?>
    <?php // args
    $args = array(
    'posts_per_page'	=> 4,
    'meta_key'		=> '_EventStartDate',
    'orderby'		=> 'meta_value',
    'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
    'post_type' => 'tribe_events',
    'paged' => $paged,
    'tax_query' => array(
    'relation' => 'OR',
        array (
            'taxonomy'  => 'tribe_events_cat',
            'field'     => 'slug',
            'terms'     => $page_slug
        )
        )
    ); ?>

    <?php // query
    $wp_query = new WP_Query( $args );
    // loop
    if( $wp_query->have_posts() )
    { ?>
    <div class="pagebreak1">
        <div class="container">
            <h2 class="center">Events</h2>
            <div class="row event_row"> 
				<?php // loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
				
					<?php get_template_part('partials/loop','eventfeature'); ?>

				<?php } // end the loop ?>
			<!--Reset Query-->
			<?php wp_reset_query();?> 
            <div class="clear"></div>
            <div class="col-md-12">
                <a href="<?php bloginfo('url'); ?>/events/" class="btn-mayecreate alignleft">View All Events</a>
            </div>
		</div>
        </div>
    </div>
    <?php } else { ?>
    <?php } // end the loop ?>
    <?php // args
    $args = array(
    'posts_per_page'	=> -1,
    'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
    'post_type' => 'professional_dev',
    'paged' => $paged,
    'tax_query' => array(
    'relation' => 'OR',
        array (
            'taxonomy'  => 'pdsubject',
            'field'     => 'slug',
            'terms'     => $page_slug
        )
        )
    ); ?>

    <?php // query
    $wp_query = new WP_Query( $args );
    // loop
    if( $wp_query->have_posts() )
    { ?>
    <div class="container">
        
            <h2 class="center">Resources</h2> 
        
            
            <?php // loop
            while( $wp_query->have_posts() )
            {
            $wp_query->the_post();

            ?>

                <?php get_template_part('partials/loop','pd_2019'); ?>

            <?php } // end the loop ?>
            <!--Reset Query-->
            <?php wp_reset_query();?>
    </div>
<?php } else { ?>
<?php } // end the loop ?>
	</div><!-- page -->


<?php get_footer(); ?>