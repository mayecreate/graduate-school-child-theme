<?php global $post; ?>
<?php $optional_title = esc_html(get_field("optional_title")); ?>
<?php $post_category = esc_html(get_field("dgs_category")); ?>
<?php if ($post_category) { 
	$post_category = $post_category;
	$taxonomy = 'taxonomy';
	$projectcategory = 'dgscategory';
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
<?php $post_category_2 = esc_html(get_field("contactdgs_category")); ?>
<?php if ($post_category_2) { 
	$post_category_2 = $post_category_2;
	$taxonomy_2 = 'taxonomy';
	$projectcategory_2 = 'dgscategory_sep';
	$field_2 = 'field';
	$ID_2 = 'ID';
	$terms_2 = 'terms';
} else {
	$post_category_2 = "";
	$taxonomy_2 = '';
	$projectcategory_2 = '';
	$field_2 = '';
	$ID_2 = '';
	$terms_2 = '';
} ?>
<?php // args UPDATE
$args = array(
    'posts_per_page'	=> -1,
    'post_type' => 'dgs',
    'paged' => $paged,	
    'orderby' => 'menu_order',	
    'order' => 'ASC',
    'tax_query' => array(
        'relation' => 'AND',
            array (
                $taxonomy  => $projectcategory,
                $field     => $ID,
                $terms     => $post_category
            ),            
            array (
                $taxonomy_2  => $projectcategory_2,
                $field_2     => $ID_2,
                $terms_2     => $post_category_2
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
				
        <div class="col-md-4 staff_column">
            <?php $address = esc_html(get_field("address", $post->ID)); ?>
            <?php $email = esc_html(get_field("email", $post->ID)); ?>
            <?php $contact_number = esc_html(get_field("contact_number", $post->ID)); ?>
            <?php $related_degree_program = get_field("related_degree_program", $post->ID); ?>

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
</div>
<?php } // end the loop ?>