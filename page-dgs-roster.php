<?php
/*
* Template Name: DGS Roster
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
			<h3>Navigate to a section:</h3>
			<div class="clear"></div>
			<div class="letter_nav_wrapper">
			<?php $dgscategorysort = get_terms( array(
				'taxonomy' => 'dgscategory',
				'orderby' => 'name',
				'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'parent' => 0,
			) ); ?>
			<?php foreach( $dgscategorysort as $departmentsort ) { ?>
				<a class="btn-mayecreate pullleft" href="#<?php echo $departmentsort->slug; ?>"><?php echo $departmentsort->name; ?></a>
			<?php } //END SORT FOREACH ?>
			</div>
			<div class="divider"></div>


		<div class="clear"></div>
		<?php $dgscategory = get_terms( array(
			'taxonomy' => 'dgscategory',
			'orderby' => 'name',
			'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
		) ); ?>
		<?php foreach( $dgscategory as $department ) { ?>
		<a class="department_title_wrapper_<?php echo $department->parent; ?> dgs_collapse" data-bs-toggle="collapse" href="#collapse<?php echo $department->term_id; ?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $department->term_id; ?>"><h3 class="gold" id="<?php echo $department->slug; ?>"><?php echo $department->name; ?></h3></a>
		<div class="divider"></div>
		<?php $department_slug = $department->slug; ?>
		<div class="collapse row department_post_wrapper_<?php echo $department->parent; ?> dgs_collapse_content justify-content-center" id="collapse<?php echo $department->term_id; ?>">
			<?php // args
				$args = array(
				'posts_per_page'	=> -1,
				'orderby' => 'name',
				'order'			=> 'ASC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
				'post_type' => 'dgs',
				'paged' => $paged,
				'tax_query' => array(
					'relation' => 'AND',
					array (
						'taxonomy'  => 'dgscategory',
						'field'     => 'slug',
						'terms'     => $department_slug
					),
					array(
                       	'relation' => 'OR',
						array(
							'relation' => 'AND',
							array(
								'taxonomy'  => 'dgscategory_sep',
								'field'     => 'slug',
								'terms'     => 'departmental-contact',
								'operator'	=> 'NOT IN'
							),
							array(
								'taxonomy'  => 'dgscategory_sep',
								'field'     => 'slug',
								'terms'     => 'director-of-graduate-study',
								'operator'	=> 'IN'
							)
						),
						array(
							'relation' => 'AND',
							array(
								'taxonomy'  => 'dgscategory_sep',
								'field'     => 'slug',
								'terms'     => 'departmental-contact',
								'operator'	=> 'IN'
							),
							array(
								'taxonomy'  => 'dgscategory_sep',
								'field'     => 'slug',
								'terms'     => 'director-of-graduate-study',
								'operator'	=> 'IN'
							)
						)
					)
					)
				); ?>

				<?php // query
				$wp_query = new WP_Query( $args );
				if( $wp_query->have_posts() )
				{
				// loop
				while( $wp_query->have_posts() )
				{
				$wp_query->the_post();

				?>
				
				<div class="col-md-4 staff_column">
					<?php $address = esc_html(get_field("address")); ?>
					<?php $email = esc_html(get_field("email")); ?>
					<?php $contact_number = esc_html(get_field("contact_number")); ?>
					<?php $related_degree_program = get_field("related_degree_program"); ?>

					<div class="staff_wrapper">
						<p class="student_top_title"><?php the_title(); ?></p>
						<?php if ($related_degree_program) { ?>
							<?php foreach( $related_degree_program as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<?php $degree_cat = wp_get_post_terms( $post->ID, 'degreecategory' ); ?>
							<p class="dgs_degree"><?php foreach( $degree_cat as $term ) { ?><a href="<?php bloginfo('url'); ?>/degreecategory/<?php echo $term->slug; ?>"><?php } ?><?php echo get_the_title( $post->ID ); ?></a></p>
							<?php endforeach; ?>
						<?php } ?>
						<?php if ($address || $contact_number || $email) { ?>
							<p class="dgs_info">
								<?php if($email) { echo '<a href="mailto:'. $email .'"><span>'. $email .'</span></a>'; } ?>
								<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
								<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
							</p>
						<?php } ?>
					</div>			
				</div>


				<?php } // end the loop ?>
				<!--Reset Query-->
				<?php wp_reset_query();?>
				<?php } else { ?>
					<div class="col-md-12"><h3 class="center">Sorry, no one to show here.</h3></div>
				<?php } // end if ?>	
		</div>
		<div class="clear"></div>
		<?php } //END CATEGORY ?>
	</div><!-- page -->
	</div><!-- page -->



<?php get_footer(); ?>