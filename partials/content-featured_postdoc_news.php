<div class="row">
    <div class="col-md-12">
			<?php // args
				$args = array(
				'posts_per_page'	=> 1,
				'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'cat' => '641',
				'paged' => $paged,
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );
				if( $wp_query->have_posts() )
				{
                echo '<h2>Featued Postdoc News</h2>';
				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?> 
				
            	<div class="col-md-12 post_wrapper">
                    <div class="row">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <div class="col-md-4">
                            <?php if (is_category(228)) { ?>
                            <?php $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id,'student-feature', true); ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="aligncenter" />
                            </a>
                            <?php } else { ?>
                            <?php $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id,'medium', true); ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="aligncenter" />
                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                        <?php } else { ?>
                        <div class="col-md-12">
                        <?php } ?> 
                            <h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h5>
                            <?php echo '<p>'. excerpt(70) . '</p>'; ?>
                            <a class="btn-mayecreate alignleft" href="<?php the_permalink(); ?>" title="Read More about <?php the_title(); ?>">Read More</a>
                        </div>
                    </div>
                </div>
	
				<?php } // end the loop ?>
				<!--Reset Query--> 
				<?php wp_reset_query();?> 
				<?php } else { ?>	
					<h4>Nothing to show right now.</h4>
				<?php } // end if ?>
		</div>
</div>
