<?php $event_date = esc_html(get_field("event_date", $post->ID)); ?>
<?php $event_location = esc_html(get_field("event_location", $post->ID)); ?>
<?php $event_time = esc_html(get_field("event_time", $post->ID)); ?>
<div class="col-lg-3 col-md-6 col-sm-6 event_over_wrapper">
	<a class="home_event_wrapper" href="<?php the_permalink(); ?>">
		<div class="home_event_date"><?php echo $event_date; ?></div>
		<div class="home_event_inner">
			<p><?php the_title(); ?></p>
			<?php if ($event_location) { ?><p class="event_location"><?php echo $event_location; ?></p><?php } ?>
			<?php if ($event_time) { ?><p class="event_time"><?php echo $event_time; ?></p><?php } ?>
		</div>
	</a>
</div>