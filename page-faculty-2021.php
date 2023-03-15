<?php
/*
* Template Name: MUIDSI - Faculty - 2021
*
* you will se some inline style on the columns
* This is there so that the content is in the correct
* order in the markup (main content then sidebar content)
*/
get_header(); ?>

<?php $search_and_filter_form_id = esc_html(get_field("search_and_filter_form_id", $post->ID)); ?>
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
        <div class="row">
			
            <div class="col-md-12">
                <h2 class="news_sort_title">Sort Faculty by:</h2>
                <?php echo do_shortcode( '[searchandfilter id="'.$search_and_filter_form_id.'"]' ); ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="row" id="main">
            <?php // args
            $args = array(
            'post_type' => 'person',
            );
            $args['search_filter_id'] = $search_and_filter_form_id; ?>

            <?php // query
            $wp_query = new WP_Query( $args );
            // loop
            if( $wp_query->have_posts() )
            {
            // loop
            while( $wp_query->have_posts() )
            {
            $wp_query->the_post();

            ?>
			<?php $ids = get_the_ID(); $person = muii_getPersonInfo($ids); ?>
				<div class="col-lg-6">
					<div class="people-panel-left">
						<div class="people-panel-pic">
							<a href="<?php echo esc_url(get_permalink($ids));?>">
								<?php
								if (has_post_thumbnail($ids)){
									echo get_the_post_thumbnail($ids, 'thumbnail');
								} else {
									echo wp_get_attachment_image(257);
								}
								?>
							</a>
						</div>
						<div class="people-panel-info">

							<h4 style="margin-bottom:0px;"><a href="<?php echo esc_url(get_permalink($ids));?>"><?php echo $person['name'];?></a></h4>
							<i><?php echo $person['rank'];?></i>
								<br />
								<h5 style="font-weight:400;margin-top:12px;color:#666;"><i style="margin-left:6px;margin-right:6px;" class="fa fa-envelope"></i> <a href="mailto:<?php echo $person['email'];?>"><?php echo $person['email'];?></a> | <i class="fa fa-phone" style="margin-left:6px;margin-right:6px;"></i> <a href="tel:<?php echo $person['phone'];?>"><?php echo $person['phone'];?></a>


								</h5>
							<hr>


							<h5 style="font-weight:400;"><strong>Department</strong><?php echo " : ".$person['department'];?></h5>
							<h5 style="font-weight:400;"><strong>Concentration</strong><?php echo " : ".$person['concentration'];?>
								<?php if (!isset($person['concentration'])){
									echo "N/A";
								}
						?></h5><br /><hr>
						<!--		<a class="btn-mayecreate alignleft" href="#" title="<?php // echo $person['name']." 's Bio";?>">Faculty Bio</a> -->
						<?php if (isset($person['lab_url'])){
							?>
								<a class="btn-mayecreate alignleft" href="<?php echo $person['lab_url'];?>" title="<?php echo $person['name']." 's Lab";?>">Lab URL</a>
								<?php
						}
							?>

						</div>
					</div>
				</div>
            <?php } // end the loop ?>
            <!--Reset Query-->
            <?php wp_reset_query();?>
            <?php } // end if ?>
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>
