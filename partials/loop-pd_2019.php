<div class="row result_wrapper">	
			<div class="col-md-3">
				<a href="<?php the_permalink(); ?>">
					<?php $term_list = wp_get_object_terms( $post->ID, 'pdsubject', array('fields' => 'ids') );
					$term_list_title = wp_get_post_terms( $query->post->ID, 'pdsubject' );
					$image = category_image_src( array('term_id'=>$term_list[0], 'size' => 'full') , false ); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php $image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id,'square', true); ?>
                       	<img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } elseif($image) { ?>
						<?php $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image); ?>
						<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } else { ?>
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2018/01/subject_ethics_grey.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } ?>
                </a>
			</div>
			<div class="col-md-9">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="list-cat-title"><?php foreach( $term_list_title as $term ) { echo '<span class="list-tax-'. $term->slug .'">'. $term->name .',</span> '; } ?></p>
				<?php echo '<p>'. excerpt(40) . '</p>'; ?>
				<div class="clear"></div>
				<?php $button_one_link = esc_html(get_field("button_one_link")); ?>
				<?php $button_two_link = esc_html(get_field("button_two_link")); ?>
				<?php $thecontent = get_the_content(); if(!empty($thecontent)) { ?>
					<a href="<?php the_permalink(); ?>" class="btn-mayecreate tabled pullleft">Read More</a>
				<?php } else {} ?>
				<?php if($button_one_link) { ?>
					<a href="<?php echo $button_one_link; ?>" class="btn-mayecreate tabled pullleft" target="_blank">Visit Site <i class="fa fa-external-link"></i></a>
				<?php } ?>
				<?php if($button_two_link) { ?>
					<a href="<?php echo $button_two_link; ?>" class="btn-mayecreate tabled pullleft" target="_blank">Download <i class="fa fa-download"></i></a>
				<?php } ?>
				
			</div>
		</div>
			<div class="divider"></div>