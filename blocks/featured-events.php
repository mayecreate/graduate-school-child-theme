<?php $optional_title = esc_html(get_field("optional_title")); ?>
<?php $post_category = esc_html(get_field("post_category")); ?>
<?php if ($post_category) { 
	$post_category = $post_category;
	$taxonomy = 'taxonomy';
	$projectcategory = 'tribe_events_cat';
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
$today = date('Y-m-d');
$args = array(
    'posts_per_page'	=> 4,
    'post_type' => 'tribe_events',
    'paged' => $paged,	
    'meta_key'	=> '_EventStartDate',
    'orderby' => 'meta_value',	
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => '_EventStartDate',
            'value' => $today,
            'compare' => '>='
        )
    ),
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
<div class="row event_row justify-content-center">
    
        <?php // loop
        while( $wp_query->have_posts() )
        {
        $wp_query->the_post();

        ?>

            
            <?php get_template_part('partials/loop','eventfeature'); ?>

        <?php } // end the loop ?>
    <!--Reset Query-->
    <?php wp_reset_query();?> 
</div>
<div class="row">
    <a href="<?php bloginfo('url'); ?>/events/" class="btn-mayecreate large center">View All</a>
</div>
<?php } // end the loop ?>