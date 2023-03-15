<div class="col-md-12 post_wrapper">
	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-md-4">
            <?php if (is_category(228)) { ?>
            <?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'student-feature', true); ?>
			<a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="aligncenter" />
            </a>
            <?php } else { ?>
            <?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'medium', true); ?>
			<a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="aligncenter" />
            </a>
            <?php } ?>
		</div>
		<div class="col-md-8">
		<?php } else { ?>
		<div class="col-md-12">
		<?php } ?> 
			<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h5>
            
            <?php $presenter = get_field("event_presenter"); ?>
            <?php $date = get_field("event_date"); ?>
            <?php $stime = get_field("event_stime"); ?>
            <?php $ftime = get_field("event_ftime"); ?>
            <?php $location = get_field("event_location"); ?>
            <strong>Presenter: </strong><p><?php echo $presenter;?></p>
            <strong>Date: </strong><p><?php echo substr($date, 4, 2) . "-" . substr($date, 6, 2) . "-" . substr($date, 0, 4);?></p>
            <strong>Time: </strong><p><?php echo $stime . "-" . $ftime;?></p>
            <strong>Location: </strong><p><?php echo $location;?></p>
            <div class="clear"></div>
            
			<?php echo '<p>'. excerpt(70) . '</p>'; ?>
			<a class="btn-mayecreate alignleft" href="<?php the_permalink(); ?>" title="Read More about <?php the_title(); ?>">Read More</a>
		</div>
	</div>
	<div class="short_divider"></div>
</div>