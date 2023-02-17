<div class="row">
	<?php //Adding different styling every 3rd post http://wordpress.org/support/topic/adding-different-styling-every-3rd-post
		$style_classes = array('col-md-12','col-md-6','col-md-6');
		$style_index = 0;
		$style_classes2 = array('<div class="divider"></div>','','');
		$style_index2 = 0;
	?>
			<?php // args
				$args = array(
				'posts_per_page'	=> 3,
				'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'cat' => '229',
				'paged' => $paged,
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );
				if( $wp_query->have_posts() )
				{
				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?> 
				
				<div class="<?php $k = $style_index%3; echo "$style_classes[$k]"; $style_index++; ?> announcement_wrapper">
					<div class="row">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="col-md-4">
							<?php the_post_thumbnail('medium'); ?>
						</div>
						<div class="col-md-8">
						<?php } else { ?>
						<div class="col-md-12">
						<?php } ?> 
							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
							<?php echo '<p>'. excerpt(30) . '</p>'; ?>
							<a class="btn-mayecreate alignleft" href="<?php the_permalink(); ?>" title="Read More about <?php the_title(); ?>">Read More</a>
						</div>
					</div>
				</div>
				<?php $k2 = $style_index2%3; echo "$style_classes2[$k2]"; $style_index2++; ?>
	
				<?php } // end the loop ?>
				<!--Reset Query--> 
				<?php wp_reset_query();?> 
				<?php } else { ?>	
					<h4>Nothing to show right now.</h4>
				<?php } // end if ?>
		</div>

