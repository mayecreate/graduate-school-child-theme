
<div class="row">
        <?php //Adding different styling every 3rd post http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
            $style_classes = array('','','<div class="clear col-md-12"></div>');
            $style_index = 0;
        ?>
        <?php $this_page_id=$post->ID; ?>
        <?php // args
        $args = array(
        'posts_per_page'	=> -1,
        'orderby' => 'menu_order', 
        'order' => 'ASC',
        'showposts' => $showposts, 
        'post_parent' => $this_page_id, 
        'post_type' => 'page'
        ); ?>

        <?php // query
        $wp_query = new WP_Query( $args );

        // loop
        while( $wp_query->have_posts() )
        {
        $wp_query->the_post();

        ?>
            <div class="col-md-6 col-lg-4">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn-mayecreate block"><?php the_title(); ?></a>
            </div>
            <?php $k = $style_index%3; echo "$style_classes[$k]"; $style_index++; ?>
        <?php } // end the loop ?>
        <!--Reset Query-->
        <?php wp_reset_query();?>
</div>