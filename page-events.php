<?php
/*
* Template Name: MUIDSI - Events
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
			<?php //get_calendar(); ?>
		</div>
        <div class="row">
            <div class="col-md-12">
                <?php   // get post contents
                    
                    /*
                    if (!empty($_GET['year'])) {
                        $a = $_GET['year'];
                        $a = basename($a);
                    } else {
                        $a = "nothing";
                    }
                    echo $a;
                    */
                    
                    
                    
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page'    => 5,
                        'category_name'     => 'Event',
                        'orderby'           => 'date',
                        //'year'              => date('Y'),
                        'order'             => 'DESC',
                        'post_type'         => 'post',
                        'post_status'       => 'publish',
                        'paged'             =>  $paged,
                    );
                    $post_query = new wp_query($args);
                    ?>
                    <div class="news-items">
                    <?php if ($post_query->have_posts()){
                        while ($post_query->have_posts()) {?>
                                <?php $post_query->the_post(); ?>
                            
                                   <?php get_template_part('partials/loop','events'); ?>
                        <?php } ?>
                        <p><?php
                        //next_posts_link( 'Older Entries', $post_query->max_num_pages );
                        //previous_posts_link( 'Newer Entries' );?>
                        </p>
                        <?php
                        $args = array(
                            'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'format'             => '?paged=%#%',
                            'total'              => $post_query->max_num_pages,
                            'current'            => max( 1, get_query_var('paged') ),
                            'show_all'           => false,
                            'prev_next'          => true
                        );
                        echo paginate_links($args);
                        wp_reset_postdata();
                        //echo "<a href=\"". get_site_url() . "/news/events/?year=2016" . "\">testing</a>";
                    } else {?>
                        <h3 class="headline">The end.</h3>
                    <?php }?>
                    </div>
            </div>
        </div>
	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>