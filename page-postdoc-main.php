<?php
/*
Template Name: Postdoc Main
*/
?>
<?php get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>

	</div><!-- page -->
<div class="pagebreak1" id="home_feauted_students">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>PostDoc Spotlight</h3>
			</div>
			<?php // args
				$args = array(
				'posts_per_page'	=> 4,
				'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'cat' => '644',
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
	</div>
</div>
<?php // args
$args = array(
'posts_per_page'	=> 1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'cat' => '641',
'paged' => $paged,
); ?>

<?php // query
$wp_query = new WP_Query( $args );
// loop
if( $wp_query->have_posts() )
{ ?>
<div class="footer_featured">
    <?php // loop
    while( $wp_query->have_posts() )
    {
    $wp_query->the_post();

    ?>
<div class="row no-gutters align-items-center" style="margin:0;">
    <?php $display_title = esc_html(get_field("display_title")); ?>
    <?php $degree = esc_html(get_field("degree")); ?>
    <?php $sub_title = esc_html(get_field("sub_title")); ?>
    <div class="footer_featured_image col-md-6" style="margin:0;padding:0;">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id,'footer-feature', true); ?>
                <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php } else { ?>
                <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/11/featured_default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php } ?>
        </a>
    </div>
    <div class="footer_featured_content col-md-6" style="margin:0;padding:20px;">
        <h4><?php the_title(); ?></h4> 
        <?php echo '<p>'. excerpt(70) . '</p>'; ?>
        <a class="btn-mayecreate large" href="<?php the_permalink(); ?>">Learn More</a>
    </div>
    <div class="clear"></div>

    <?php } // end the loop ?>
    <!--Reset Query-->
    <?php wp_reset_query();?> 
</div>

<?php } // end the loop ?>
	</div><!-- page -->


<?php get_footer(); ?>