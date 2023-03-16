<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<?php 

/**
 * ==========================================================
 * MayeCreate Title
 * ==========================================================
 */

	echo '<title>';
	
	/* Print the <title> tag based on what is being viewed. */
	global $page, $paged;
	
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'skematik' ), max( $paged, $page ) );
	
	echo '</title>';
?>

<?php mayecreate_facebook_opengraph(); ?>	


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Fonts -->
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/539078998e.js" crossorigin="anonymous"></script>

<?php $google_font_embed_links = (get_field('google_font_embed_links', 'option')); ?>
<?php if ($google_font_embed_links) {
	echo $google_font_embed_links;
} else {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">';
} ?>

<?php wp_head(); ?>
    
<?php $ga_tag = (get_field('ga_tag', 'option')); ?>
<?php if ($ga_tag) {
echo $ga_tag;
} ?>  
    

<div id="skip"><a href="#content">Skip to Main Content</a></div>

</head>



<?php global $containerWidth; ?> 

<body <?php body_class(); ?>>
<div id="back_top_the_top"><a href="#top">To The Top</a></div>
<div class="collapse" id="search_bar">
	<div class="search_container">
		<div class="container">
			<?php $search_text = "Search ". get_bloginfo('name') ." Website"; ?> 
			<form method="get" id="searchform_header" action="<?php bloginfo('home'); ?>/"> 
			<input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" /> 
			<input type="hidden" value="post" name="post_type" />
			<input type="hidden" id="searchsubmit" /> 
			</form>
		</div>
	</div>
</div>

<div id="pagewrapper">
<a id="top"></a>
<?php $navbar_style_fixed = ('fixed' == get_field('navbar_style', 'option')); ?>
<?php if ($navbar_style_fixed) {
	$navbar_style = "fixed";
} else {
	$navbar_style = "static";
} ?>
<div id="navigation" class="<?php echo $navbar_style; ?>">
	<?php get_template_part('partials/nav'); ?>	
</div>	

<?php if (is_front_page()) { ?>
		<div id="homeContentWrap">
<?php } else { ?>
		<div id="contentwrap">
<?php } ?>	


<div class="clear"></div>
<?php $default_header_image = get_field('default_header_image', 'option'); ?>
<?php if ($default_header_image) {
	$default_header_image = $default_header_image;
} else {
	$default_header_image = get_bloginfo('url') .'/wp-content/themes/mayecreate-theme-22/img/default_header.jpg';
} ?>
<?php  if (is_front_page()){ ?>

	<div id="homefeatured">
		<?php $homepage_header_type = get_field('homepage_header_type', 'option'); ?>
		<?php $video_embed_link = get_field('video_embed_link', 'option'); ?>
		<?php $video_height = get_field('video_height', 'option'); ?>
		<?php if ($homepage_header_type == "Video") { ?>
			<div class="video_outer_outer" style="position:relative; overflow:hidden;height:<?php echo $video_height; ?>vh;width:100%;z-index:1;">
				<div style="position:absolute; overflow:hidden;height: 100%;width:100%;z-index:1;" class="video_outer_wrapper">
					<div id="video_outer" style="position:absolute;width:100%;height:100%;">
						<div id="video_wrapper">
							<div class='embed-container'><iframe id="slider_video" src='<?php echo $video_embed_link; ?>' allow="autoplay; fullscreen" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
						</div>
					</div>
				</div>
			</div>
		<?php } else {
			get_template_part('partials/content','carouselPosts');
		} ?>
		<div id="home_buttons">
			<div id="home_buttons_inner">
				<?php  // Visit http://codex.wordpress.org/Function_Reference/wp_nav_menu for explanation of how this works.

                    $slidermenu = array(
                        'theme_location'  => 'slider-menu',
                        'container'       => 'nav',
                        'container_class' => '',
                        'container_id'    => 'slider_menu',
                        'menu_class'      => 'menu pull-right',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '<span>',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 2,
                        'walker'          => ''
                        ); ?>

                    <?php wp_nav_menu($slidermenu); ?>
			</div>
		</div>
    </div><!-- homefeatured -->
	<div class="blackbox">
		<div class="container">
			<div class="row justify-content-center">

						<?php $home_one = get_field("home_one"); ?>
						<?php if ($home_one) { ?>
					<div class="home_content col-md-3">
							<?php echo $home_one; ?>
					</div>

						<?php } ?>
						<?php $home_two = get_field("home_two"); ?>
						<?php if ($home_two) { ?>
					<div class="home_content col-md-3">
							<?php echo $home_two; ?>
					</div>
						<?php } ?>

						<?php $home_three = get_field("home_three"); ?>
						<?php if ($home_three) { ?>
					<div class="home_content col-md-3">
							<?php echo $home_three; ?>
					</div>
						<?php } ?>

						<?php $home_four = get_field("home_four"); ?>
						<?php if ($home_four) { ?>
					<div class="home_content col-md-3">
							<?php echo $home_four; ?>
					</div>
						<?php } ?>
			</div>
		</div>
	</div>
<?php } elseif (is_search() || is_archive() || is_404() || is_home()) { ?>
		<div class="pagehead" id="internalfeatured" style=" max-height: 600px; background-image: url('<?php echo $default_header_image; ?>')">
			<h2 class="sr-only sr-only-focusable">The header image is the default header image for the site.</h2>
		</div>	
<?php } elseif(is_singular('staff')) { ?>	
		<div class="pagehead" id="internalfeatured" style=" max-height: 600px; background-image: url('<?php echo $default_header_image; ?>')">
			<h2 class="sr-only sr-only-focusable">The header image is the default header image for the site.</h2>
        </div>
<?php } else { ?>
	
	<?php if (has_post_thumbnail() ) { ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'head' ); ?>
	<?php $image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
	<?php if ($image_alt) { $image_alt = $image_alt; } else { $image_alt = "No alt tag provided"; } ?>
		<div class="pagehead" id="internalfeatured" style=" max-height: 600px; background-image: url('<?php echo $image[0]; ?>')">
			<h2 class="sr-only sr-only-focusable">The header image is the default header image for the site.</h2>
        </div>
	<?php } else { ?>
		<div class="pagehead" id="internalfeatured" style=" max-height: 600px; background-image: url('<?php echo $default_header_image; ?>')">
			<h2 class="sr-only sr-only-focusable">The header image is the default header image for the site.</h2>
        </div>
    <?php } ?>
           
<?php } ?>

<?php if (is_front_page()) {} else { ?>
<?php $sub_menu = esc_html(get_field("sub-menu")); ?>
<div class="sub_searchbar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ($sub_menu) {
				$sub_menu_title = $sub_menu;
				} ?>
				<?php if (is_page(6878)) { ?>
                    <?php $args = array(
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 1,
						'include'            => '602,17,18,19',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __('No categories'),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'category',
						'walker'             => null
					); ?>

					<nav id="sub_nav" class="menu-blog-sub-menu-container">
						<ul id="menu-blog-sub-menu" class="menu">
							<?php wp_list_categories( $args ); ?>
                            <li><a href="<?php bloginfo('url'); ?>/news/newsletter-archive/">Newsletter Archive</a></li>
						</ul>
					</nav>
				<?php } elseif ((is_archive()&& (get_post_type() == 'professional_dev')) || (is_archive()&& (get_post_type() == 'degree_programs')) || (is_archive()&& (get_post_type() == 'policy')) || (is_archive()&& (get_post_type() == 'form')) || (is_archive()&& (get_post_type() == 'tribe_events')) || (is_category(228)) || (in_category(228)) || (is_category(18)) || (in_category(639)) || (in_category(641))) {} elseif ($sub_menu) { ?>
					<?php  // Visit http://codex.wordpress.org/Function_Reference/wp_nav_menu for explanation of how this works.

                    $subMenu = array(
                        'menu'  => $sub_menu_title,
                        'container'       => 'nav',
                        'container_class' => '',
                        'container_id'    => 'sub_nav',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '<span>',
                        'link_after'      => '</span>',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 1,
                        'walker'          => ''
                        ); ?>

                    <?php wp_nav_menu($subMenu); ?>
				<?php } elseif (is_home() || is_archive() || ((is_single()) && (get_post_type() == 'post'))) { ?>
                    <?php $args = array(
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 1,
						'include'            => '602,17,19,18',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __('No categories'),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'category',
						'walker'             => null
					); ?>

					<nav id="sub_nav" class="menu-blog-sub-menu-container">
						<ul id="menu-blog-sub-menu" class="menu">
							<?php wp_list_categories( $args ); ?>
                            <li><a href="<?php bloginfo('url'); ?>/news/newsletter-archive/">Newsletter Archive</a></li>
						</ul>
					</nav>
                <?php } else {} ?>

			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php $yellow_bar_content = get_field("yellow_bar_content"); ?>
<?php if ($yellow_bar_content) { ?>
	<div class="yellow-bar">
		<div class="yellow-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span class="h5"><?php echo $yellow_bar_content; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if (is_front_page()){ ?>
<?php } elseif (is_home()) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 page-header">
						<h1 class="entry-title">News</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } elseif (is_404()) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 page-header">
						<h1 class="entry-title">ERROR 404</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } elseif (is_search()) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-header">
				<h1 class="entry-title">Search Results for: <span><?php  echo get_search_query(); ?></span></h1>
			</div>
		</div>
	</div>
<?php } elseif (is_archive()) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-header">
				<h1 class="entry-title">
					<?php if (get_post_type() == 'professional_dev') { ?>
						<?php printf( __( '%s', 'skematik' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
					<?php } elseif (get_post_type() == 'degree_programs') { ?>
						<?php printf( __( '%s', 'skematik' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
					<?php } elseif (get_post_type() == 'policy') { ?>
						Policies
					<?php } elseif (get_post_type() == 'form') { ?>
						Forms
					<?php } elseif (get_post_type() == 'tribe_events') { ?>
						Events
					<?php } elseif (is_category(228)) { ?>
						Ambassadors
					<?php } elseif (is_category(18)) { ?>
						Faculty Features
					<?php } elseif (is_category(639)) { ?>
						Postdoctoral News
					<?php } elseif (is_category(641)) { ?>
						Featured News
					<?php } else { ?>
						News
					<?php } ?>
				</h1>
			</div>
		</div>
	</div>
<?php } elseif(is_singular('staff')) { ?>	
<?php } else { ?>
	<div class="container">
		<?php mayecreate_page_title();?>
	</div>	   
<?php } ?>

<main id="content">
<div id="page"> <!--Begin Page -->
<div class="pagebreak_fix">
<div class="hfeed site <?php echo $containerWidth; ?>">

<?php $show_breadcrumb_nav = ('yes' == get_field('show_breadcrumb_nav', 'option')); ?>
<?php if ($show_breadcrumb_nav) {
	mayecreate_breadcrumbs();
} ?>