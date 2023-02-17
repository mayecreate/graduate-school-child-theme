<?php
/*
* Template Name: Policies - POSTDOCTORAL POLICIES
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		 
		<div class="row">
			<form method="get" id="searchform_alt" action="<?php bloginfo('url'); ?>">
				<span class="search_icon"></span>
				<input class="text" type="text" value="" name="s" id="s" placeholder="Search Policies" />
				<input type="submit" class="submit" name="submit" value="<?php _e('Search');?>" />
            </form>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div class="col-md-12">
		    	<?php get_template_part('partials/loop','standard'); ?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div class="col-md-12">
				<?php // args
				$args = array(
				'posts_per_page'	=> -1,
                'orderby'   => 'title',  
				'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'post_type' => 'policy',
				'paged' => $paged,
				'tax_query' => array(
				'relation' => 'OR',
					array (
						'taxonomy'  => 'policycategory',
						'field'     => 'ID',
						'terms'     => '634'
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