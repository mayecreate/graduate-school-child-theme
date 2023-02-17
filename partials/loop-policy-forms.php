<div class="post_wrapper col-md-12">
	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-md-4 col-lg-3">
			<?php the_post_thumbnail('medium'); ?>
		</div>
		<div class="col-md-8 col-lg-9">
		<?php } else { ?>
		<div class="col-md-12">
		<?php } ?> 
			<?php $thecontent = get_the_content(); ?>
			<?php $button_one_link = esc_html(get_field("resource_external_link")); ?>
			<?php $button_two_link = esc_html(get_field("resource_pdf")); ?>
			<?php if(!empty($thecontent)) { ?>
				<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h5>
			<?php } elseif($button_one_link) { ?>
				<h5><a href="<?php echo $button_one_link; ?>" target="_blank"><?php the_title(); ?> <i class="fa fa-external-link"></i></a></h5>
			<?php } elseif($button_two_link) { ?>
				<h5><a href="<?php echo $button_two_link; ?>" target="_blank"><?php the_title(); ?> <i class="fa fa-download"></i></a></h5>
			<?php } else { ?>
				<h5><?php the_title(); ?></h5>
			<?php } ?>
			<?php echo '<p>'. excerpt(70) . '</p>'; ?>
			<div class="clear"></div>
			<?php if(!empty($thecontent)) { ?>
				<a href="<?php the_permalink(); ?>" class="btn-mayecreate tabled pullleft">Read More</a>
			<?php } else {} ?>
		</div>
	</div>
	<div class="short_divider form-policy-divider"></div>
</div>