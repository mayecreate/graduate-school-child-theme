<?php
/*
* Template Name: Announcements - MUIDSI
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
        <div class="row">
            <div class="col-md-12">
                <h2>Latest News</h2>
                <div class="row">
                 <?php   // get post contents
                            $args = array(
                                'posts_per_page'    => 3,
                                'category_name'     => 'News',
                                'orderby'           => 'date',
                                'order'             => 'DESC',
                                'post_type'         => 'post',
                                'post_status'       => 'publish'
                            );
                            $post_query = new wp_query($args);
                            ?>
                            <?php if ($post_query->have_posts()){
                                while ($post_query->have_posts()) {?>
                                <?php $post_query->the_post(); ?>
                                    <div class="col-12">
                                        <?php get_template_part('partials/loop','blog-muidsi'); ?>
                                    </div>
                                <?php } 
                                wp_reset_postdata();
                            } else {?>
                            <?php }?>
                </div>
                <div class="clear"></div>

                            <h2>Events</h2>
                <div class="row">

                            <?php   // get post contents
                            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                            $args = array(
                                'posts_per_page'    => 3,
                                'category_name'     => 'Event',
                                'orderby'           => 'date',
                                'order'             => 'DESC',
                                'post_type'         => 'post',
                                'post_status'       => 'publish',
                                'paged'             => $paged
                            );
                            $post_query = new wp_query($args);
                            ?>
                            <div class="news-items">
                            <?php if ($post_query->have_posts()){
                                while ($post_query->have_posts()) {?>
                                        <?php $post_query->the_post(); ?>
                                    
                                        <div class="col-12">
                                        <?php get_template_part('partials/loop','events'); ?>
                                    </div>
                                <?php } 


                                //wp_reset_postdata();
                            } else {?>
                                <h3 class="headline">The end.</h3>
                            <?php }?>
                            </div>
                            </div>
    </div>
</div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>