<?php $optional_title = esc_html(get_field("optional_title")); ?>
<?php $post_category = esc_html(get_field("staff_category")); ?>
<?php if ($post_category) { 
	$post_category = $post_category;
	$taxonomy = 'taxonomy';
	$projectcategory = 'staffcategory';
	$field = 'field';
	$ID = 'ID';
	$terms = 'terms';
} else {
	$post_category = "";
	$taxonomy = '';
	$projectcategory = '';
	$field = '';
	$ID = '';
	$terms = '';
} ?>
<?php // args UPDATE
$args = array(
    'posts_per_page'	=> -1,
    'post_type' => 'staff',
    'paged' => $paged,	
    'orderby' => 'menu_order',	
    'order' => 'ASC',
    'tax_query' => array(
        'relation' => 'OR',
            array (
                $taxonomy  => $projectcategory,
                $field     => $ID,
                $terms     => $post_category
            )
        )
    ); ?>

<?php // query
$wp_query = new WP_Query( $args );
// loop
if( $wp_query->have_posts() )
{ ?>
<?php if ($optional_title) { ?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $optional_title; ?></h2>
    </div>
</div>
<?php } ?>
<div class="row justify-content-center">
    
        <?php // loop
        while( $wp_query->have_posts() )
        {
        $wp_query->the_post();

        ?>

            <div class="col-sm-6 col-md-3">
                <?php get_template_part('partials/loop','staff-2020'); ?>
            </div>

        <?php } // end the loop ?>
    <!--Reset Query-->
    <?php wp_reset_query();?> 
</div>
<?php } // end the loop ?>