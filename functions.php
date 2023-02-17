<?php

// NOTE: To overwrite the script file in the parent theme uncomment this section and copy the mayecreate_sripts.js file into a folder called js in your child theme. Then edit that file.
add_action('wp_enqueue_scripts', 'mayecreate_script_fix', 100);
function mayecreate_script_fix()
{
    wp_dequeue_script('mayecreatejs');
    wp_dequeue_script('mc-block-editor-script');
    wp_enqueue_script('child_theme_mayecreatejs', get_stylesheet_directory_uri().'/js/mayecreate_scripts.js', array('jquery'));
}
function jsforwpblocks_editor_scripts_child() {
	
  // Make paths variables so we don't write em twice
	
  $blockPath = '/js/mayecreate_scripts.js';
  //$editorStylePath = '/style.css'; 
	
  // Enqueue the bundled block JS file
  wp_enqueue_script( 'mc-block-editor-script_child', get_stylesheet_directory_uri() . '/js/mayecreate_scripts.js', false, '1.0', 'all' );

}
// Hook scripts function into block editor hook
add_action( 'enqueue_block_editor_assets', 'jsforwpblocks_editor_scripts_child' );


add_action( 'wp_enqueue_scripts', 'mc_enqueue_child_theme_styles', PHP_INT_MAX);
function mc_enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/css/main.min.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/css/main.min.css', array('parent-style')  );
}

function parent_editor_style_setup() {
	// Add support for editor styles.
	add_editor_style(  get_template_directory_uri().'/css/main.min.css' );
}
add_action( 'after_setup_theme', 'parent_editor_style_setup' );

include get_theme_file_path('includes/mayecreate_shortcodes.php');

function mayecreate_child_menues() {
  // Adds the main menu
  register_nav_menus( array(
      'footer-top-menu' 	=> __( 'Footer Top Menu', 'mayecreate_wp_bootstrapwp' )
  ));
}
add_action( 'after_setup_theme', 'mayecreate_child_menues' );

function mc_optional_nav_overlap_child() {
  $navigation_overlapping_the_content = get_field('navigation_overlapping_the_content','option');
  
  if ($navigation_overlapping_the_content == 'no') { ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) { 
      //initial page load
      $("#contentwrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')});
      $("#homeContentWrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')}); 
      //recalculate on scroll
      $(window).scroll(function() {
        setTimeout(function() {
          if($(this).scrollTop() >= 175){} else {
            $("#contentwrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')});
            $("#homeContentWrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')});
          }     
        }, 50); 
      });
      //recalculate on screen re-size
      $(window).resize(function() {
        $("#contentwrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')});	
        $("#homeContentWrap").css({'padding-top':($("#navbarTop").outerHeight()+'px')});
      }).resize();
    });
    </script>
  <?php }
  }

  add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as $item ) {
		
		// vars
		$icon = get_field('menu_icon', $item);
		
		// append icon
		if( $icon ) {
			$item->title .='</span><img class="sub_menu_image" src="'.$icon['url'].'" /><span class="keep_title">'. $item->title .'</span>';
		}
	}
	
	// return
	return $items;
	
}