<?php
/*
* Template Name: Professional Development
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>	
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post();?>
	<div class="row">
		<?php $content_above_categories = get_field("content_above_categories"); ?>
		<?php if($content_above_categories) { ?>
		<div class="col-md-12">
			<?php echo $content_above_categories; ?>
		</div>
		<?php } ?>
	</div>
</div><!-- END MAIN CONTAINER -->
       <div class="wide_container container">
		<div class="subject_row">
			<div class="subject_outer row justify-content-center">
				<?php
					$style_classes = array('<div class="col-xl-1 d-none d-xl-flex"></div>','','','','');
					$style_index = 0;
					$style_classes2 = array('','','','','<div class="col-xl-1 d-none d-xl-flex"></div>');
					$style_index2 = 0;
				?>
				<?php 
				$args_topic = array(
					'orderby'	=> 'ID',
					'order'	=> 'ASC',
					'hide_empty'	=> 0,
					'taxonomy'	=> 'pdsubject',
					'parent' => 0,
					'exclude' => array(661,662,663,664,665,666),
				);
				$categories = get_categories($args_topic);
				foreach ($categories as $cat) { ?>
					<?php $k = $style_index%5; echo "$style_classes[$k]"; $style_index++; ?>
					<div class="subject_wrapper col-md-6 col-lg-3 col-xl-2">
						<a href="<?php bloginfo('url'); ?>/pdsubject/<?php echo $cat->slug; ?>" title="<?php echo $cat->name; ?>" class="pb_subject">
							<?php $term_id = $cat->term_id;
							$image   = category_image_src( array('term_id'=>$term_id, 'size' => 'full') , false ); ?>
							<?php if ($image) { ?>
							<span class="pb_image"><img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>" title="<?php echo $cat->name; ?>" /></span>
							<?php } ?>
							<?php $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image); ?>
							<span class="pb_hover_image"><img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>" title="<?php echo $cat->name; ?>" /></span>
							<?php $description = term_description($term_id); ?>
							<?php if ($description) { ?>
								<div class="hover_text">
									<?php $term_description = term_description($term_id); ?>
									<small><?php echo wp_trim_words( $term_description, 10 ); ?></small>
									<div class="hover_button">READ MORE</div>
								</div>
							<?php } ?>
						</a>
					</div>
					<?php $k2 = $style_index2%5; echo "$style_classes2[$k2]"; $style_index2++; ?>
				<?php } ?>
				<div class="col-xl-1 d-none d-xl-flex"></div>
			</div>
		</div>
	</div>
	<div class="container quick">
		<div class="row">
			<div class="col-md-12">
                <?php the_content(); ?>
			</div>
		</div>
	</div>
	
	<?php endwhile; // end of the loop. ?>
					
	<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
	<?php endif; ?>
</div><!-- page -->

<?php get_footer(); ?>