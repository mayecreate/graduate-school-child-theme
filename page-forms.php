<?php
/*
* Template Name: Forms - STAFF
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		 
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
		<div class="clear"></div>
		<div class="row">
			<form method="get" id="searchform_alt" action="<?php bloginfo('url'); ?>">
				<span class="search_icon"></span>
				<input class="text" type="text" value="" name="s" id="s" placeholder="Search Forms" />
				<input type="submit" class="submit" name="submit" value="<?php _e('Search');?>" />
            </form>
		</div>
		<div class="clear"></div>
		<div id="quick_search_sidebar">
			<h2 class="quicksort_title">Sort Forms</h2>
			<div class="divider"></div>
			
			<ul class="square_list">
				<?php 
					$args_topic = array(
						'orderby'	=> 'ID',
						'order'	=> 'ASC',
						'hide_empty'	=> 1,
						'taxonomy'	=> 'formcategory',
						'parent' => 255,
					);
					$categories = get_categories($args_topic);
					foreach ($categories as $cat) { ?>
						<li><a href="<?php bloginfo('url'); ?>/formcategory/<?php echo $cat->slug; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div class="col-md-12">
				<?php // args
				$args = array(
				'posts_per_page'	=> -1,
                'orderby'   => 'title',  
				'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'post_type' => 'form',
				'paged' => $paged,
				'tax_query' => array(
				'relation' => 'OR',
					array (
						'taxonomy'  => 'formcategory',
						'field'     => 'ID',
						'terms'     => '255'
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
				
				<?php get_template_part('partials/loop','policy-forms'); ?>

				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?>
			</div>
		</div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>