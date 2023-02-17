<?php 

/**
 * Creates the functionality for [button] shortcode 
 * Shortcode has three arguments 'class', 'url', 'text', 'ltext', and 'target'.
 * 
 *	The 'class' argument gives you a modifyer for the button.  This is useful for button size like small and large.  The default is the word "deafult" 
 *	The 'url' argument controls the link the button is linked too. If nothing is provided the button will not link. 
 * 	The 'text' argument controls the text that appears on the button. 
 *  The 'ltext' argument controls the large text that appears on the button. It is not styled on all sites.
 *	The 'target' argument controls the linking behavior of button.  It defaults to same window add '_blnak in argument for new window'
 *	
 *	Syntax of button shortcode
 *	
 *	[button 'class'='X' 'url'='X', 'ltext'='X', 'text'='X', 'target'='X']
 *
 *  @since MayeCreate Mini Site 2.0 
 *  @return void
 *
 */  
function button_function( $atts ){
	
	$a = shortcode_atts( array(
		'url' 		=> 'button_link', 
		'ltext' 	=> '', //the default for this one is blank. 
		'text' 		=> 'button_text', //default word "button_text" will be dsiplayed on the button until this is replaced
		'class' 	=> 'default', //defaults to the word default appended to class
		'target'	=> '_self', // defaults to same window
    ), $atts );
	
	return '<a class="btn-mayecreate '. $a['class'] .'" href="' . $a['url'] . '" target="' . $a['target'] . '"><span class="ltext">' . $a['ltext'] . '</span>' . $a['text'] . '</a>';
}
add_shortcode( 'button', 'button_function' );

function divider_function( $atts ){
	
	return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'divider_function' );

function divider2_function( $atts ){
	
	return '<div class="divider"></div>';
}
add_shortcode( 'divider2', 'divider2_function' );

function divider3_function( $atts ){
	
	return '<div class="divider"></div>';
}
add_shortcode( 'divider3', 'divider3_function' );

function clear_function( $atts ){
	
	return '<div class="clear"></div>';
}
add_shortcode( 'clear', 'clear_function' );

function print_button_function( $atts ){
	
	return '<a class="btn-mayecreate" href="javascript:window.print()">Print Form</a>';
}
add_shortcode( 'print_button', 'print_button_function' );

function pagebreak_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak1 shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak', 'pagebreak_function' );

function pagebreak2_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak2 shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak2', 'pagebreak2_function' );

function pagebreak3_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak3 shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak3', 'pagebreak3_function' );

function pagebreak4_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak4 shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak4', 'pagebreak4_function' );

function pagebreak_wide_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak1 shortcode_pb"><div class="wide_container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_wide', 'pagebreak_wide_function' );

function pagebreak_wide_white_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak_wide_white shortcode_pb"><div class="wide_container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_wide_white', 'pagebreak_wide_white_function' );

function pagebreak_end_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak_fix"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_end', 'pagebreak_end_function' );

function pagebreak_wide_end_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak_fix"><div class="wide_container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_wide_end', 'pagebreak_wide_end_function' );

function pagebreak_grey_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak_grey shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_grey', 'pagebreak_grey_function' );

function pagebreak_yellow_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak pagebreak_yellow shortcode_pb"><div class="container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'pagebreak_yellow', 'pagebreak_yellow_function' );

function pagebreak_left_function( $atts ){
	
	$break = shortcode_atts( array(
		'background' => '/wp-content/uploads/2018/01/default_header.jpg', 
		'class' => '',
    ), $atts );
	
	return '</div></div></div></div><div class="pagebreak pagebreak_left ' . $break['class'] . ' shortcode_pb"><div class="pagebreak_left_img" style="background:url(' . $break['background'] . ');">&nbsp;</div><div class="pagebreak_left_content"><div class="container"><div class="pagebreak_container_inner">';
}
add_shortcode( 'pagebreak_left', 'pagebreak_left_function' );

function pagebreak_left_after_function( $atts ){
	
	$break = shortcode_atts( array(
		'background' => '/wp-content/uploads/2018/01/default_header.jpg', 
    ), $atts );
	
	return '</div></div></div></div><div class="pagebreak pagebreak_left shortcode_pb"><div class="pagebreak_left_img" style="background:url(' . $break['background'] . ');">&nbsp;</div><div class="pagebreak_left_content"><div class="container"><div class="pagebreak_container_inner">';
}
add_shortcode( 'pagebreak_left_after', 'pagebreak_left_after_function' );

function endbreak_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak_fix"><div class="container after_break_container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'endbreak', 'endbreak_function' );

function endbreak2_function( $atts ){
	
	return '</div></div></div></div><div class="pagebreak_fix"><div class="container after_break_container"><div class="row"><div class="col-md-12">';
}
add_shortcode( 'endbreak2', 'endbreak2_function' );

function events_function( $atts ){
	ob_start();
	get_template_part('partials/content','events-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'events', 'events_function' );

function ie_events_function( $atts ){
	ob_start();
	get_template_part('partials/content','ie_events-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'ie_events', 'ie_events_function' );

function pd_events_function( $atts ){
	ob_start();
	get_template_part('partials/content','pd_events-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'pd_events', 'pd_events_function' );

function ambassadors_function( $atts ){
	ob_start();
	get_template_part('partials/content','ambassadors-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'ambassadors', 'ambassadors_function' );

function faculty_announcements_function( $atts ){
	ob_start();
	get_template_part('partials/content','faculty_announcements'); 
	return ob_get_clean(); 
}
add_shortcode( 'faculty_announcements', 'faculty_announcements_function' );

function featured_postdoc_news_function( $atts ){
	ob_start();
	get_template_part('partials/content','featured_postdoc_news'); 
	return ob_get_clean(); 
}
add_shortcode( 'featured_postdoc_news', 'featured_postdoc_news_function' );

function mupa_board_function( $atts ){
	ob_start();
	get_template_part('partials/content','mupa_board-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'mupa_board', 'mupa_board_function' );

function upcoming_development_events_function( $atts ){
	ob_start();
	get_template_part('partials/content','upcoming_development_events-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'upcoming_development_events', 'upcoming_development_events_function' );

function sub_pages_function( $atts ){
	ob_start();
	get_template_part('partials/content','sub_pages-shortcode'); 
	return ob_get_clean();
}
add_shortcode( 'sub_pages', 'sub_pages_function' );



