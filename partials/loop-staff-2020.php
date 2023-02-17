<?php $title = esc_html(get_field("title", $post->ID)); ?>
<?php $email = esc_html(get_field("email", $post->ID)); ?>
<?php $phone_number = esc_html(get_field("phone_number", $post->ID)); ?>
<?php $staffcategory = wp_get_post_terms($post->ID, 'staffarea'); ?>
<?php $staffdepartment = wp_get_post_terms($post->ID, 'staffcategory'); ?>
<a class="staff_wrapper_2020" href="<?php the_permalink(); ?>">
    <div class="staff_img_info_wrapper">
        <div class="staff_image_wrapper_2020">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id,'square', true); ?>
                <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/faculty_default.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php } ?>
            <div class="hover_text">
                <div class="hover_button">VIEW MORE</div>
            </div>
        </div>
        <div class="staff_info_wrapper_2020">
            <h2 class="staff_name h5"><?php the_title(); ?></h2>
            <?php if ($title) { ?><p class="staff_title h6"><?php echo $title ; ?></p><?php } ?>
            
		    <?php if ($staffdepartment) { ?><p class="staff_department"><?php } ?><?php foreach( $staffdepartment as $department ) { ?><span><?php echo $department->name; ?><span>,</span></span><?php } ?><?php if ($staffdepartment) { ?></p><?php } ?>
        </div>
    </div>
    <div class="staff_cat_wrapper">
        <div class="row">
        <?php foreach ($staffcategory as $cat) { ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <span class="staff_indiv_cat_wrapper">
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
                    <span class="staff_indiv_cat_wrapper_name"><?php echo $cat->name; ?></span>
                </span>
            </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
        </div>
    </div>
</a>