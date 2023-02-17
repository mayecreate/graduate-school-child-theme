<?php $description = term_description(); ?>
<?php if ($description) { ?>
	<div class="row">
		<div class="col-md-12">			
			<center><?php echo term_description(); ?></center>
		</div>
		<div class="divider"></div>
	</div>
<?php } ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('partials/loop','pd_2019'); ?>
	<?php endwhile; ?>
<?php else : ?>
                 
	<h2>Not Found</h2>
    <p>Sorry, nothing to show yet.</p>
                                            
<?php endif; ?>