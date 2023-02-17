<?php
/**
 * The single file.
 *
 * This page template is setup so that you can modify the number of columns and there widths.  There are 12 available columns.
 * For example if you want to have them setup 2/3 you will set it up with two divs one
 * with the class of span8 and one with a class of span4
*/
get_header(); ?>
        
        <div class="row">
            <div class="col-md-12">
    
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

						<div class="clear"></div>
							<?php $title = esc_html(get_field("title")); ?>
							<?php $email = esc_html(get_field("email")); ?>
							<?php $phone_number = esc_html(get_field("phone_number")); ?>
							<?php $staffcategory = wp_get_post_terms($post->ID, 'staffcategory'); ?>
							<div class="row">
								<div class="col-md-4"> 
									<div class="staff_img_wrapper_2020">
										<?php if ( has_post_thumbnail() ) { ?>
											<?php $image_id = get_post_thumbnail_id();
											$image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
											<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
										<?php } else { ?>
											<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/11/student_default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
										<?php } ?>
									</div>  
								</div>
								<div class="col-md-8 single_staff_outer_2020">
									<h1 class="single_staff_title_2020"><?php the_title(); ?></h1>
									<?php if ($title) { ?><h3 class="staff_sub_title_2020"><?php echo $title ; ?></h3><?php } ?>
									<?php if ($staffcategory) { ?><h4 class="staff_department staff_department_2020"><?php } ?><?php foreach( $staffcategory as $department ) { ?><span><?php echo $department->name; ?><span>,</span></span><?php } ?><?php if ($staffcategory) { ?></h4><?php } ?>
									<?php if ($email) { ?><h4 class="staff_email_2020"><a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope-o"></i> <?php echo $email; ?></a></h4><?php } ?>
									<?php if ($phone_number) { ?><h4 class="staff_phone_2020"><a href="tel:<?php echo $phone_number; ?>"><i class="fa fa-phone"></i> <?php echo $phone_number; ?></a></h4><?php } ?>
                                    <div class="divider"></div>
						            <?php the_content(); ?>
                                    
								</div>
							</div>
                <?php endwhile; ?>
                
               
                <?php else : ?>
                    
                    <h2>Not Found</h2>
                    <p>Sorry, nothing to show yet.</p>
                                            
                <?php endif; ?>
            
            </div><!-- 12 -->

        </div>
        </div>
    </div>
<?php get_footer(); ?>