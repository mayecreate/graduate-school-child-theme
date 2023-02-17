<?php $title = esc_html(get_field("title")); ?>
<?php $email = esc_html(get_field("email")); ?>
<?php $phone_number = esc_html(get_field("phone_number")); ?>
<?php $staffcategory = wp_get_post_terms($post->ID, 'staffcategory'); ?>
<a class="staff_wrapper" href="<?php the_permalink(); ?>">
	<p class="student_top_title"><?php the_title(); ?></p>
	<div class="staff_image_wrapper">
		<?php if ( has_post_thumbnail() ) { ?>
			<?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'student-feature', true); ?>
			<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		<?php } else { ?>
			<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2017/11/student_default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		<?php } ?>
		<div class="hover_text">
			<?php if ($email) { ?><p class="staff_email"><?php echo $email; ?></p><?php } ?>
			<?php if ($phone_number) { ?><p class="staff_phone"><?php echo $phone_number; ?></p><?php } ?>
			<div class="hover_button">Contact Me</div>
		</div>
	</div>
	<div class="staff_info_wrapper">
		<?php if ($title) { ?><p class="staff_title"><?php echo $title ; ?></p><?php } ?>
		<?php if ($staffcategory) { ?><p class="staff_department"><?php } ?><?php foreach( $staffcategory as $department ) { ?><span><?php echo $department->name; ?><span>,</span></span><?php } ?><?php if ($staffcategory) { ?></p><?php } ?>
	</div>
</a>