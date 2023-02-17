<?php
/**
 * The archive template file.
 *
 * This page template is setup so that you can modify the number of columns and there widths.  There are 12 available columns.
 * For example if you want to have them setup 2/3 you will set it up with two divs one
 * with the class of span8 and one with a class of span4
*/
get_header(); ?>

<?php if ((get_post_type() == 'professional_dev') && ((is_tax('pdtype')) || (is_tax('pdsubject')))) { ?>
        <?php get_template_part('partials/loop','pd_2019-cat'); ?>
<?php } elseif ((get_post_type() == 'degree_programs') && (is_tax('degreecategory'))) { ?>
        <?php get_template_part('partials/loop','degree-archive'); ?>
<?php } elseif ((get_post_type() == 'policy') && (is_tax('policycategory'))) { ?>
        <?php get_template_part('partials/loop','policy-archive'); ?>
<?php } elseif ((get_post_type() == 'form') && (is_tax('formcategory'))) { ?>
        <?php get_template_part('partials/loop','form-archive'); ?>
<?php } else { ?>

        <div class="row">
        <div class="col-md-12">
        <div class="row">
                
				<?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
            	
                <?php get_template_part('partials/loop','blog'); ?>
                
				<?php endwhile; ?>
                
                <?php
                    $prev_link = get_previous_posts_link(__('Go Back', 'kubrick'));
                    $next_link = get_next_posts_link(__('See More', 'kubrick'));
                ?>
                                                
                <?php if ($prev_link || $next_link): ?>
                                                
                    <nav>
                        <ul class="pager">
                            <li><?php echo $next_link; ?></li>
                            <li><?php echo $prev_link; ?></li>
                        </ul>
                    </nav>                    

                <?php endif; ?>
                <?php else : ?>
                    
                    <h2>Not Found</h2>
                    <p>Sorry, nothing to show yet.</p>
                                            
                <?php endif; ?>
            
            </div><!-- row -->
            </div><!-- 12 -->

        </div>
<?php } ?>
        	</div>
            

<?php get_footer(); ?>