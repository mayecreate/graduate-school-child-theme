<?php
/*
* Template Name: Staff Categories
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
        <?php $results_page_url = esc_html(get_field("results_page_url", $post->ID)); ?>

		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
        <div class="row">
            <?php $terms = get_terms( array(
                'taxonomy' => 'staffarea',
                'hide_empty' => false,
            ) ); ?>
        <?php foreach ($terms as $cat) { ?>
            <div class="col-md-3 col-sm-6">
                <a href="<?php echo $results_page_url; ?>/?_sft_staffarea=<?php echo $cat->slug; ?>" class="staff_cat_wrapper">
                    <?php $category_icon = get_field('category_icon', 'staffarea_'.$cat->term_id); ?>
                    <?php
                    // Image variables.
                    $url = $category_icon['url'];
                    $title = $category_icon['title'];
                    $alt = $category_icon['alt'];
                    $caption = $category_icon['caption'];

                    // Thumbnail size attributes. 
                    $size = 'medium';
                    $thumb = $category_icon['sizes'][ $size ];
                    $width = $category_icon['sizes'][ $size . '-width' ];
                    $height = $category_icon['sizes'][ $size . '-height' ];

                    ?>
                    <?php if ($category_icon) { ?>
                        <span class="cat_img_icon" style="background-image:url(<?php echo esc_url($thumb); ?>);"></span>
                    <?php } else { ?>
                        <span class="cat_img_icon"></span>
                    <?php } ?>
                    <h2 class="h6"><?php echo $cat->name; ?></h2>
                </a>
            </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>