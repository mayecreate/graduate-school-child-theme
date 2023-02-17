</div>
</div>
</div>
<div class="container wide_container">
<div class="row">
			<?php // args
				$args = array(
				'posts_per_page'	=> 4,
				'orderby'			=> 'rand',
				'cat' => '228',
				'paged' => $paged,
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );

				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?> 
				
				<?php $display_title = esc_html(get_field("display_title")); ?>
				<?php $degree = esc_html(get_field("degree")); ?>
				<?php $sub_title = esc_html(get_field("sub_title")); ?>
				<div class="col-md-3 col-sm-6">
				<p class="student_top_title"><?php if ($display_title) { echo $display_title; } else { the_title(); } ?></p>
					<a class="home_student_wrapper" href="<?php the_permalink(); ?>">
						<div class="student_image_wrapper">
                            <div class="student_image_wrapper_inner">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php $image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'student-feature', true); ?>
									<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								<?php } else { ?>
									<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/11/student_default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								<?php } ?>
								<div class="hover_text">Read My Story</div>
							</div>
							<?php if ($degree) { ?><p class="student_degree"><?php echo $degree; ?></p><?php } ?>
						</div>
						<div class="student_info_wrapper">
							<?php if ($sub_title) { ?><p class="student_title"><?php echo $sub_title; ?></p><?php } ?>
						</div>
					</a>
				</div>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?> 
		</div>
<div class="clear"></div>
<a href="<?php bloginfo('url'); ?>/category/ambassadors" class="btn-mayecreate alignleft">View All Ambassadors</a>