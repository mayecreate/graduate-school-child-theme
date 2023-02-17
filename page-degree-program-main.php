<?php
/*
* Template Name: Degree Program Main
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
			
		    <?php get_template_part('partials/loop','standard'); ?>
			<div class="clear"></div>
			<ul class="square_list grey_bar horizontal_list">
                
                
                <?php $degreecategorysort = get_terms( array(
                    'taxonomy' => 'degreecategory',
                    'orderby' => 'name',
                    'order'	 => 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
                    'parent' => 0,
				    'hide_empty'  => 1,
                ) ); ?>
                <?php foreach( $degreecategorysort as $departmentsort ) { ?>
                <li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sft_degreecategory=<?php echo $departmentsort->slug; ?>"><?php echo $departmentsort->name; ?></a></li>
                <?php } //END SORT FOREACH ?>
			</ul>
			<ul class="square_list horizontal_list">
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Doctoral">Doctoral</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Specialist">Educational Specialist</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Master%27s">Master's</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Graduate%20Certificate">Graduate Certificate</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Minor">Minor</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sfm_program_type=Interdisciplinary%20Degree">Interdisciplinary Degree</a></li>
			</ul>
			<ul class="square_list grey_bar horizontal_list last_bar">
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sft_degreelocation=100-online">100% Online</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sft_degreelocation=on-campus">On Campus</a></li>
				<li><a href="<?php bloginfo('url'); ?>/degree-programs/degree-programs-search/?_sft_degreelocation=requires-campus-visits">Requires Campus Visits</a></li>
			</ul>
			<div class="clear"></div>
			<?php $args = array(
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => '',
				'show_count'         => 0,
				'hide_empty'         => 0,
				'use_desc_for_title' => 1,
				'hierarchical'       => 0,
				'exclude'       => "607,608,609,610,611,612,613,614,615,616,617,618,619,620,621,622,623,624,625,626,627,628,629,630,631,632",
				'title_li'           => __( '' ),
				'show_option_none'   => __('No categories'),
				'number'             => null,
				'echo'               => 1,
				'depth'              => 0,
				'taxonomy'           => 'degreecategory'
			); ?>
            <h4 class="degree_cat_list"><?php wp_list_categories( $args ); ?></h4>
			
		</div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>