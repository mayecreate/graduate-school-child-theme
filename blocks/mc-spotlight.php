<?php global $post; ?>
<?php $optional_title = esc_html(get_field("optional_title")); ?>
<?php $post_category = esc_html(get_field("post_category")); ?>
<?php // args
$args = array(
'posts_per_page'	=> 4,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'cat' => $post_category,
'paged' => $paged,
); ?>

<?php // query
$wp_query = new WP_Query( $args );
// loop
if( $wp_query->have_posts() )
{ ?>
<?php if ($optional_title) { ?>
<div class="row">
    <div class="col-md-12">
        <h3><?php echo $optional_title; ?></h3>
    </div>
</div>
<?php } ?>
<div class="row">
			
				<?php // loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
				
				<?php $display_title = esc_html(get_field("display_title", $post->ID)); ?>
				<?php $degree = esc_html(get_field("degree", $post->ID)); ?>
				<?php $sub_title = esc_html(get_field("sub_title", $post->ID)); ?>
				<div class="col-xl-3 col-md-6">
					<a class="home_student_wrapper" href="<?php the_permalink(); ?>">
					<p class="student_top_title"><?php if ($display_title) { echo $display_title; } else { the_title(); } ?></p>
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
<?php } // end the loop ?>