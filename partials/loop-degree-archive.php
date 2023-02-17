<h4><?php echo category_description(); ?></h4>
</div><div class="fancy_divider"></div><div class="container after_break_container">

<h2>Degrees Offered</h2>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php $term = get_queried_object(); ?>
	<?php endwhile; ?>                           
<?php endif; ?>
<?php $count = 0; ?>
<?php $count2 = 0; ?>
<?php // Doctoral
$args_one = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => 'Doctoral',
		'compare' => 'LIKE'
	)
),
); ?>

<?php // query
$wp_query_one = new WP_Query( $args_one );
// loop
if( $wp_query_one->have_posts() )
{ ?>
<h3>Doctoral</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_one->have_posts() )
	{
	$wp_query_one->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>
							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>
	
<?php // Educational Specialist
$args_two = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => "Specialist",
		'compare' => 'LIKE'
	)
)
); ?>

<?php // query
$wp_query_two = new WP_Query( $args_two );
// loop
if( $wp_query_two->have_posts() )
{ ?>
<h3>Educational Specialist</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_two->have_posts() )
	{
	$wp_query_two->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>
							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>
	
<?php // Master's
$args_three = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => "Master's",
		'compare' => 'LIKE'
	)
)
); ?>

<?php // query
$wp_query_three = new WP_Query( $args_three );
// loop
if( $wp_query_three->have_posts() )
{ ?>
<h3>Master's</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_three->have_posts() )
	{
	$wp_query_three->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>

							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>
	
<?php // Graduate Certificate
$args_four = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => "Graduate Certificate",
		'compare' => 'LIKE'
	)
)
); ?>

<?php // query
$wp_query_four = new WP_Query( $args_four );
// loop
if( $wp_query_four->have_posts() )
{ ?>
<h3>Graduate Certificate</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_four->have_posts() )
	{
	$wp_query_four->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>

							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>
	
<?php // Minor
$args_five = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => "Minor",
		'compare' => 'LIKE'
	)
)
); ?>

<?php // query
$wp_query_five = new WP_Query( $args_five );
// loop
if( $wp_query_five->have_posts() )
{ ?>
<h3>Minor</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_five->have_posts() )
	{
	$wp_query_five->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>

							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>
	
<?php // Interdisciplinary Degree
$args_six = array(
'posts_per_page'	=> -1,
'order'			=> 'DESC', // ASC = OLDEST EVENT FIRST, DESC= NEWEST EVENT FIRST 
'post_type' => 'degree_programs',
'paged' => $paged,
'tax_query' => array(
'relation' => 'OR',
	array (
		'taxonomy'  => 'degreecategory',
		'field'     => 'ID',
		'terms'     => $term->term_id
	)
),
'meta_query' => array(
	array(
		'key' => 'program_type',
		'value' => "Interdisciplinary Degree",
		'compare' => 'LIKE'
	)
)
); ?>

<?php // query
$wp_query_six = new WP_Query( $args_six );
// loop
if( $wp_query_six->have_posts() )
{ ?>
<h3>Interdisciplinary Degree</h3>
<div class="degree_wrapper_outer">
	<?php // loop
	while( $wp_query_six->have_posts() )
	{
	$wp_query_six->the_post();

	?>
	
		<?php $the_id = get_the_ID(); ?>
		<?php $term_list = wp_get_object_terms( $post->ID, 'degreelocation', array('fields' => 'all') ); ?>
		<?php $is_this_an_alternate_listing = ('Yes' == get_field('is_this_an_alternate_listing')); ?>
		<?php if ($is_this_an_alternate_listing) {} else { ?>
			<?php $related_dgs_staff = get_field("related_dgs_staff"); ?>
			<?php $federal_gainful_employment_disclosure_link = get_field("federal_gainful_employment_disclosure_link"); ?>
			<div class="degree_wrapper">            
				<a class="h3" title="<?php the_title(); ?>" data-bs-toggle="collapse" href="#collapse<?php echo $the_id; ?>_<?php echo $count++; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></a>
				<p class="degree_location">
					<?php foreach( $term_list as $post ): ?>
						<?php setup_postdata($post); ?>
						<?php echo '<span>'. $post->name .'</span> '; ?>
					<?php endforeach; ?>
					<?php wp_reset_query();?>
				</p>
				<div class="divider"></div>
				<div class="collapse" id="collapse<?php echo $the_id; ?>_<?php echo $count2++; ?>">
					<div class="related_dgs_wrapper">
						<a href="https://applygrad.missouri.edu/apply/" target="_blank" class="btn-mayecreate center block">Apply Now</a>
						<?php if ($related_dgs_staff || $federal_gainful_employment_disclosure_link) { ?>
							<?php foreach( $related_dgs_staff as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<div class="related_dgs_inner">
								<?php $address = esc_html(get_field("address")); ?>
								<?php $contact_number = esc_html(get_field("contact_number")); ?>
								<?php $email = esc_html(get_field("email")); ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<h6 class="center">
								<?php } ?>
								<?php if (has_term('departmental-contact','dgscategory_sep')) { ?>
									Departmental Contact
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) && (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									<br />
								<?php } ?>
								<?php if (has_term('director-of-graduate-study','dgscategory_sep')) { ?>
									Director of Graduate Study
								<?php } ?>
								<?php if ((has_term('departmental-contact','dgscategory_sep')) || (has_term('director-of-graduate-study','dgscategory_sep'))) { ?>
									</h6>
								<?php } ?>
								<h3 class="bar_title"><?php the_title(); ?></h3>
								<?php if ($address || $contact_number || $email || $departmental_website) { ?>
									<p>
										<?php if($email) { echo '<span><a href="mailto:'. $email .'" class="contact_email">'. $email .'</a></span>'; } ?>
										<?php if($contact_number) { echo '<span>'. $contact_number .'</span>'; } ?>
										<?php if($address) { echo '<span>'. $address .'</span>'; } ?>
										<?php if($departmental_website) { echo '<span><a href="'. $departmental_website .'" class="contact_email">'. $departmental_website .'</a></span>'; } ?>
									</p>
								<?php } ?>
							</div>
							<div class="divider"></div>
							<?php endforeach; ?>
							<?php wp_reset_query();?>
							<?php if ($federal_gainful_employment_disclosure_link) { ?>
							<a href="<?php echo $federal_gainful_employment_disclosure_link; ?>" class="btn-mayecreate center" target="_blank">View Federal Gainful Employment Disclosure</a>

							<?php } ?> 
						<?php } ?>
					</div>
					<?php $post_content = get_post_field('post_content', $the_id); ?>
					<?php $p_post_content = apply_filters('the_content', $post_content); ?>
					<?php echo $p_post_content; ?>
					<div class="clear"></div>
				</div>
			</div>
		<?php } ?>

	<?php } // end the loop ?>
	<!--Reset Query-->
	<?php wp_reset_query();?>
</div>
<?php } // end the loop ?>