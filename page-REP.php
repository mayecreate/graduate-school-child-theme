<?php
/*
* Template Name: REP
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>

	</div><!-- page -->
<div class="pagebreak1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Meet our REP Faculty Scholars!</h2>
            </div>
        </div>
                    <div class="row justify-content-center staff_row">
                        <?php // args
                        $args = array(
                        'posts_per_page'	=> -1,
                        'post_type' => 'rep-faculty',
                        'paged' => $paged,
						'orderby' => 'menu_order', 
						//'orderby'		=> 'meta_value',
						'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST ,
						//'meta_key' => 'last_name',
						'tax_query' => array(
						'relation' => 'OR',
							array (
								'taxonomy'  => 'rep_cat',
								'field'     => 'slug',
								'terms'     => 'scholars'
							)
							)
                        ); ?>

                        <?php // query
                        $wp_query = new WP_Query( $args );

                        // loop
                        while( $wp_query->have_posts() )
                        {
                        $wp_query->the_post();

                        ?>
                            <div class="col-md-6 col-lg-4" style="position: static;">
                                <?php $title = esc_html(get_field("title")); ?>
                                <?php $placement = esc_html(get_field("placement")); ?>
                                <?php $education = esc_html(get_field("education")); ?>
                                <?php $mentored_by = esc_html(get_field("mentored_by")); ?>
                                <?php $cohort_year = esc_html(get_field("cohort_year")); ?>
                                <div class="staff_wrapper_2020" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>" rel="pff-highlander" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>">
                                    <div class="staff_img_info_wrapper">
                                        <div class="staff_image_wrapper_2020">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                                <?php $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id,'square', true); ?>
                                                <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/faculty_default.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            <?php } ?>
											<div class="hover_text">
												<div class="hover_button">VIEW BIO</div>
											</div>
                                        </div>
                                        <div class="staff_info_wrapper_2020">
                                            <h2 class="staff_name h5"><?php the_title(); ?></h2>
                                            <?php if ($title) { ?><p class="staff_title h6"><?php echo $title; ?></p><?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>" class="collapse pff_staff_content_inner">
                                    <div class="pff_staff_inner_inner">
                                        <h3><?php the_title(); ?></h3>
                                        <?php if ($title) { ?><h4 class="pff_sub_title"><?php echo $title; ?></h4><?php } ?>
                                        <?php if ($cohort_year) { ?><h4 class="pff_sub_title yellow"><?php echo $cohort_year; ?></h4><?php } ?>
                                        <div class="short_divider"></div>
                                        <?php if ($education) { ?><h4 class="pff_sub_title"><?php echo $education; ?></h4><?php } ?>
                                        <?php if ($placement) { ?><h5 class="pff_sub_sub_title h6"><?php echo $placement; ?></h5><?php } ?>
                                        <?php if ($mentored_by) { ?><h5 class="pff_sub_sub_title h6">Mentored By: <?php echo $mentored_by; ?></h5><?php } ?>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } // end the loop ?>
                        <!--Reset Query-->
                        <?php wp_reset_query();?>
                    </div>
                <?php /*</div>
        </div>*/ ?>
        <div id="move_the_staff_here"></div>
		<!-- END CURRENT STAFF -->
		
	<?php // args
	$args = array(
	'posts_per_page'	=> -1,
	'post_type' => 'rep-faculty',
	'paged' => $paged,
	'orderby' => 'menu_order', 
	'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST
	'tax_query' => array(
	'relation' => 'OR',
		array (
			'taxonomy'  => 'rep_cat',
			'field'     => 'slug',
			'terms'     => 'postdocs'
		)
		)
	); ?>

	<?php // query
	$wp_query = new WP_Query( $args );
	// loop
	if( $wp_query->have_posts() )
	{ ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Meet our REP Postdocs!</h2>
            </div>
        </div>
		<div class="row justify-content-center staff_row">		
			<?php // loop
			while( $wp_query->have_posts() )
			{
			$wp_query->the_post();

			?>
				<div class="col-md-6 col-lg-4" style="position: static;">
					<?php $title = esc_html(get_field("title")); ?>
					<?php $placement = esc_html(get_field("placement")); ?>
					<?php $education = esc_html(get_field("education")); ?>
					<?php $mentored_by = esc_html(get_field("mentored_by")); ?>
					<?php $cohort_year = esc_html(get_field("cohort_year")); ?>
					<div class="staff_wrapper_2020" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>" rel="pff-highlander" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>">
						<div class="staff_img_info_wrapper">
							<div class="staff_image_wrapper_2020">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php $image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'square', true); ?>
									<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								<?php } else { ?>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/faculty_default.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
								<?php } ?>
								<div class="hover_text">
									<div class="hover_button">VIEW BIO</div>
								</div>
							</div>
							<div class="staff_info_wrapper_2020">
								<h2 class="staff_name h5"><?php the_title(); ?></h2>
								<?php if ($title) { ?><p class="staff_title h6"><?php echo $title; ?></p><?php } ?>
							</div>
						</div>
					</div>
					<div id="collapse<?php the_ID(); ?>-<?php echo $term->term_id; ?>" class="collapse pff_staff_content_inner">
						<div class="pff_staff_inner_inner">
							<h3><?php the_title(); ?></h3>
							<?php if ($title) { ?><h4 class="pff_sub_title"><?php echo $title; ?></h4><?php } ?>
							<?php if ($cohort_year) { ?><h4 class="pff_sub_title yellow"><?php echo $cohort_year; ?></h4><?php } ?>
							<div class="short_divider"></div>
							<?php if ($education) { ?><h4 class="pff_sub_title"><?php echo $education; ?></h4><?php } ?>
							<?php if ($placement) { ?><h5 class="pff_sub_sub_title h6"><?php echo $placement; ?></h5><?php } ?>
							<?php if ($mentored_by) { ?><h5 class="pff_sub_sub_title h6">Mentored By: <?php echo $mentored_by; ?></h5><?php } ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php } // end the loop ?>
			<!--Reset Query-->
			<?php wp_reset_query();?>
		</div>
		
		<?php } // end the loop ?>
    </div>
</div>
<?php //} ?>
	</div><!-- page -->


<?php get_footer(); ?>