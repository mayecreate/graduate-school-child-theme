<?php


// display the post id to the administration screens for posts.  This will make it easier to get the post id for use in shortcodes.

add_filter( 'manage_posts_columns', 'mayecreate_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'mayecreate_id_column_content', 5, 2 );

function mayecreate_add_id_column( $columns ) {
   $columns['mayecreate_id'] = 'ID';
   return $columns;
}
function mayecreate_id_column_content( $column, $id ) {
  if( 'mayecreate_id' == $column ) {
    echo $id;
  }
}

/* NOTE: These functions are functions that don't need to be in the parent theme because not every site will have them. */

function build_taxonomies() {
	register_taxonomy( 'projectcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Project Categories', 'query_var' => true, 'rewrite' => true, 'show_in_rest' => true ) ); 
	register_taxonomy( 'resourcecategory', 'menu', array( 'hierarchical' => true, 'label' => 'Resource Categories', 'query_var' => true, 'rewrite' => true, 'show_in_rest' => true ) ); 
    //register_taxonomy( 'pdcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'eventcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'staffcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'dgscategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'dgscategory_sep', 'menu', array( 'hierarchical' => true, 'label' => 'Contact/DGS Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'pdsubject', 'menu', array( 'hierarchical' => true, 'label' => 'Development Subject', 'query_var' => true, 'rewrite' => true ) );
    //register_taxonomy( 'pdtype', 'menu', array( 'hierarchical' => true, 'label' => 'Development Type', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'degreecategory', 'menu', array( 'hierarchical' => true, 'label' => 'Degree Category', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'degreelocation', 'menu', array( 'hierarchical' => true, 'label' => 'Degree Location', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'policycategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'formcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'studentorgcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'pff_year', 'menu', array( 'hierarchical' => true, 'label' => 'PFF Years', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'pff_cat', 'menu', array( 'hierarchical' => true, 'label' => 'PFF Category', 'query_var' => true, 'rewrite' => true ) );
    register_taxonomy( 'rep_cat', 'menu', array( 'hierarchical' => true, 'label' => 'REP Category', 'query_var' => true, 'rewrite' => true ) );
}
add_action( 'init', 'build_taxonomies', 0 );  

function mayecreate_create_post_type() {
		// Register the "Carousel Slides" custom post type if the custom post type slider is used.
		register_post_type( 'carousel_slides',
			array(
				'labels' => array(
					'name'              => __( 'Carousel Slides'),
					'singular_name'     => __( 'Carousel Slides' ),
					'add_new'           => __( 'Add Slide' ),
					'add_new_item'      => __( 'Add New Slide' ),
					'edit_item'         => __( 'Edit Slide' ),  
					
				),
			'public' => true,
			'menu_position' => 10,
			'rewrite' => array('slug' => 'carousel_slides', 'with_front' => false),
			'supports' => array('title','thumbnail','revisions'),
			'menu_icon'         => 'dashicons-images-alt',
			)
		);	
	if (in_array('projects', get_field('post_type_selector', 'option'))) {
		$alt_project_name = get_field('alternate_name_for_projects', 'option');
		if ($alt_project_name) { $alt_project_name = $alt_project_name; } else { $alt_project_name = "Projects"; }		
		$alt_project_slug = str_replace(' ', '-', strtolower($alt_project_name));
		// Register the "Project" custom post type if this is not needed, DELETE ME.
		register_post_type( 'mc-projects',
			array(
				'labels' => array(
					'name'              => __( $alt_project_name ),
					'singular_name'     => __( $alt_project_name ),
					'add_new'           => __( 'Add '.$alt_project_name.'' ),
					'add_new_item'      => __( 'Add New '.$alt_project_name.'' ),
					'edit_item'         => __( 'Edit '.$alt_project_name.'' ),  
					
				),
			'public' => true,
			'menu_position' => 10,
			'rewrite' => array('slug' => ''.$alt_project_slug.'', 'with_front' => false),
			'supports' => array('title','thumbnail','revisions','editor'),
			'menu_icon'         => 'dashicons-art',
			'taxonomies' => array('projectcategory'),
			'show_in_rest' => true,
			'has_archive' => true 
			)
		);
	}
	if (in_array('resources', get_field('post_type_selector', 'option'))) {
		$alt_resources_name = get_field('alternate_name_for_resources', 'option');
		if ($alt_resources_name) { $alt_resources_name = $alt_resources_name; } else { $alt_resources_name = "Resources"; }
		$alt_resource_slug = str_replace(' ', '-', strtolower($alt_resources_name));
		// Register the "Resources" custom post type if this is not needed, DELETE ME.
		register_post_type( 'mc-resources',
			array(
				'labels' => array(
					'name'              => __( $alt_resources_name ),
					'singular_name'     => __( $alt_resources_name ),
					'add_new'           => __( 'Add '.$alt_resources_name.'' ),
					'add_new_item'      => __( 'Add New '.$alt_resources_name.'' ),
					'edit_item'         => __( 'Edit '.$alt_resources_name.'' ),  
					
				),
			'public' => true,
			'menu_position' => 10,
			'rewrite' => array('slug' => ''.$alt_resource_slug .'', 'with_front' => false),
			'supports' => array('title','thumbnail','revisions','editor'),
			'menu_icon'         => 'dashicons-format-aside',
			'taxonomies' => array('resourcecategory'),
			'show_in_rest' => true,
			'has_archive' => true 
			)
		);
	}
	if (in_array('degree_programs', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Degree Programs" custom post type if the custom post type slider is used.
		register_post_type( 'degree_programs',
			array(
				'labels' => array(
					'name'              => __( 'Degree Programs'),
					'singular_name'     => __( 'Degree Program' ),
					'add_new'           => __( 'Add Degree Program' ),
					'add_new_item'      => __( 'Add New Degree Program' ),
					'edit_item'         => __( 'Edit Degree Program' ),

				),
			'public' => true,
			'menu_position' => 10,
			'rewrite' => array('slug' => 'degree-program'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'taxonomies' => array('degreecategory', 'degreelocation'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-exerpt-view',
			)
		);
	}
	if (in_array('professional_dev', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Professional Development" custom post type if the custom post type slider is used.
		register_post_type( 'professional_dev',
			array(
				'labels' => array(
					'name'              => __( 'Professional Development'),
					'singular_name'     => __( 'Professional Development' ),
					'add_new'           => __( 'Add Professional Development' ),
					'add_new_item'      => __( 'Add New Professional Development' ),
					'edit_item'         => __( 'Edit Professional Development' ),

				),
			'public' => true,
			'taxonomies' => array('pdsubject', 'pdtype'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'professional_development'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
			)
		);
	}
	if (in_array('student_org', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Student Organizations" custom post type if the custom post type slider is used.
		register_post_type( 'student_org',
			array(
				'labels' => array(
					'name'              => __( 'Student Organizations'),
					'singular_name'     => __( 'Student Organization' ),
					'add_new'           => __( 'Add Organization' ),
					'add_new_item'      => __( 'Add New Organization' ),
					'edit_item'         => __( 'Edit Organization' ),

				),
			'public' => true,
			'taxonomies' => array('studentorgcategory'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'student_org'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
			)
		);
	}
	if (in_array('staff', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Staff" custom post type if the custom post type slider is used.
		register_post_type( 'staff',
			array(
				'labels' => array(
					'name'              => __( 'Staff'),
					'singular_name'     => __( 'Staff' ),
					'add_new'           => __( 'Add Staff' ),
					'add_new_item'      => __( 'Add New Staff' ),
					'edit_item'         => __( 'Edit Staff' ),

				),
			'public' => true,
			'taxonomies' => array('staffcategory'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'staff'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-businessman',
			)
		);
	}
	if (in_array('pff-faculty', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "PFF Faculty" custom post type if the custom post type slider is used.
		register_post_type( 'pff-faculty',
			array(
				'labels' => array(
					'name'              => __( 'PFF Faculty'),
					'singular_name'     => __( 'PFF Faculty' ),
					'add_new'           => __( 'Add PFF Faculty' ),
					'add_new_item'      => __( 'Add New PFF Faculty' ),
					'edit_item'         => __( 'Edit PFF Faculty' ),

				),
			'public' => true,
			'taxonomies' => array('pff_cat'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'pff-faculty'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-businessman',
			)
		);
	}
	if (in_array('rep-faculty', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "REP Faculty" custom post type if the custom post type slider is used.
		register_post_type( 'rep-faculty',
			array(
				'labels' => array(
					'name'              => __( 'REP Faculty'),
					'singular_name'     => __( 'REP Faculty' ),
					'add_new'           => __( 'Add REP Faculty' ),
					'add_new_item'      => __( 'Add New REP Faculty' ),
					'edit_item'         => __( 'Edit REP Faculty' ),

				),
			'public' => true,
			'taxonomies' => array('rep_cat'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'rep-faculty'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-businessman',
			)
		);
	}
	if (in_array('dgs', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "DGS Roster" custom post type if the custom post type slider is used.
		register_post_type( 'dgs',
			array(
				'labels' => array(
					'name'              => __( 'DGS Roster'),
					'singular_name'     => __( 'DGS Staff' ),
					'add_new'           => __( 'Add DGS Staff' ),
					'add_new_item'      => __( 'Add New DGS Staff' ),
					'edit_item'         => __( 'Edit DGS Staff' ),

				),
			'public' => true,
			'taxonomies' => array('dgscategory','dgscategory_sep'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'dgs'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-businessman',
			)
		);
	}
	if (in_array('policy', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Policies" custom post type if the custom post type slider is used.
		register_post_type( 'policy',
			array(
				'labels' => array(
					'name'              => __( 'Policies'),
					'singular_name'     => __( 'Policy' ),
					'add_new'           => __( 'Add Policy' ),
					'add_new_item'      => __( 'Add New Policy' ),
					'edit_item'         => __( 'Edit Policy' ),

				),
			'public' => true,
			'taxonomies' => array('policycategory'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'policy'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			)
		);
	}
	if (in_array('form', get_field('gradschool_specific_post_types', 'option'))) {
		// Register the "Forms" custom post type if the custom post type slider is used.
		register_post_type( 'form',
			array(
				'labels' => array(
					'name'              => __( 'Forms'),
					'singular_name'     => __( 'Form' ),
					'add_new'           => __( 'Add Form' ),
					'add_new_item'      => __( 'Add New Form' ),
					'edit_item'         => __( 'Edit Form' ),

				),
			'public' => true,
			'taxonomies' => array('formcategory'),
			'menu_position' => 10,
			'rewrite' => array('slug' => 'form'),
			'supports' => array('title','thumbnail','revisions','editor'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			)
		);
	}
}
add_action( 'init', 'mayecreate_create_post_type' );



// Replace Featured Image Metabox with custom version for Carousel Slides Custom Post Type Edit Screens
add_action('do_meta_boxes', 'remove_thumbnail_box');
function remove_thumbnail_box() {
    
    remove_meta_box( 'postimagediv','carousel_slides','side' );
	add_meta_box('postimagediv', 'Carousel Slide Image', 'post_thumbnail_meta_box', 'carousel_slides', 'normal', 'high');

} 


add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
	if (!in_array('news', get_field('post_type_selector', 'option'))) {
		remove_menu_page( 'edit.php' );
	}
}

add_action( 'init', 'mc_change_post_object' );
// Change dashboard Posts to News
function mc_change_post_object() {
	if (in_array('news', get_field('post_type_selector', 'option'))) {
		$alt_post_name = get_field('alternate_name_for_posts', 'option');
		if ($alt_post_name) { $alt_post_name = $alt_post_name; } else { $alt_post_name = "Post"; }
		$get_post_type = get_post_type_object('post');
		$labels = $get_post_type->labels;
		$labels->name = ''. $alt_post_name .'';
		$labels->singular_name = ''. $alt_post_name .'';
		$labels->add_new = 'Add '. $alt_post_name .'';
		$labels->add_new_item = 'Add '. $alt_post_name .'';
		$labels->edit_item = 'Edit '. $alt_post_name .''; 
		$labels->new_item = ''. $alt_post_name .'';
		$labels->view_item = 'View '. $alt_post_name .'';
		$labels->search_items = 'Search '. $alt_post_name .'';
		$labels->not_found = 'No '. $alt_post_name .' found';
		$labels->not_found_in_trash = 'No '. $alt_post_name .' found in Trash';
		$labels->all_items = 'All '. $alt_post_name .'';
		$labels->menu_name = ''. $alt_post_name .'';
		$labels->name_admin_bar = ''. $alt_post_name .'';
	}
}
