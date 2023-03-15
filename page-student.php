<?php
/*
* Template Name: MUIDSI - Student
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
       
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
        <div class="row">
            <div class="col-md-12">
                  
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Student', $number = -1);
                            $ids = muii_getPeopleID($category = 'Student', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <?php 
                                $numid = count($ids); 
                                for ($i=0; $i<$numid; $i++) {
                                    $person = muii_getPersonInfo($ids[$i]);
                                    if ($i%2 == 0) {    // first of the row, panel on left ?>
                                        <div class="people-container-row">
                                            <div class="people-panel-left">
                                                <div class="people-panel-pic">
                                                    <a href="<?php echo esc_url(get_permalink($ids[$i]));?>">
                                                        <?php
                                                        if (has_post_thumbnail($ids[$i])){
                                                            echo get_the_post_thumbnail($ids[$i], 'thumbnail');
                                                        } else {
                                                            echo wp_get_attachment_image(257);
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="people-panel-info">
                                                    <h3><a href="<?php echo esc_url(get_permalink($ids[$i]));?>"><?php echo $person['name'];?></a></h3>
                                                    <i>MUIDSI PhD Student</i>
                                                    <h5><strong>Emphasis Area: </strong><?php echo "<br>".$person['concentration'];?></h5>
                                                    <h5><strong>Advisor: </strong><?php echo "<br>" . $person['advisor'];?></h5>
                                                </div>
                                            </div>
                                    <?php } else { ?>
                                            <div class="people-panel-right">
                                                <div class="people-panel-pic">
                                                    <a href="<?php echo esc_url(get_permalink($ids[$i]));?>">
                                                        <?php
                                                        if (has_post_thumbnail($ids[$i])){
                                                            echo get_the_post_thumbnail($ids[$i], 'thumbnail');
                                                        } else {
                                                            echo wp_get_attachment_image(257);
                                                        }
                                                        ?> 
                                                    </a>
                                                </div>
                                                <div class="people-panel-info">
                                                    <h3><a href="<?php echo esc_url(get_permalink($ids[$i]));?>"><?php echo $person['name'];?></a></h3>
                                                    <i>MUIDSI PhD Student</i>
                                                    <h5><strong>Emphasis Area: </strong><?php echo "<br>".$person['concentration'];?></h5>
                                                    <h5><strong>Advisor: </strong><?php echo "<br>" . $person['advisor'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
            </div>
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>