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
				<h2 class="no_bar"><?php printf( __( '%s', 'skematik' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
			</div>
		</div>
		<div id="quick_search_sidebar">
			<h2 class="quicksort_title">Sort Policies</h2>
			<div class="divider"></div>
			<?php 
            
            $category = get_queried_object();
            $cat_id = $category->term_id;
				$parents = get_ancestors( $cat_id, 'policycategory' );
				foreach ($parents as $parent) {
					$key = get_term($parent, 'policycategory');
					$parent = $key->term_id;
				}
			?>
			<ul class="square_list">
				<?php 
					$args_topic = array(
						'orderby'	=> 'ID',
						'order'	=> 'ASC',
						'hide_empty'	=> 1,
						'taxonomy'	=> 'policycategory',
						'parent' => $parent,
					);
					$categories = get_categories($args_topic);
					foreach ($categories as $cat) { ?>
						<li <?php if ($cat->term_id == $cat_id) { ?> class="active"<?php } ?>><a href="<?php bloginfo('url'); ?>/policycategory/<?php echo $cat->slug; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="clear"></div>
<div class="row">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('partials/loop','policy-forms'); ?>
	<?php endwhile; ?>
</div>               

<?php else : ?>
                 
	<h2>Not Found</h2>
    <p>Sorry, nothing to show yet.</p>
                                            
<?php endif; ?>