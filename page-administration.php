<?php
/*
* Template Name: MUIDSI - Administration
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
                  
                            
                        <!-- Staff --> 
            
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Staff', $number = -1);
                            $ids = muii_getPeopleID($category = 'Administration', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <?php 
                                $numid = count($ids); 
                                for ($i=0; $i<$numid; $i++) {
                                    $person = muii_getPersonInfo($ids[$i]);
                                    if ($i%2 == 0) {    // first of the row, panel on left ?>
                                        <div class="people-container-long-row">
                                            <div class="people-panel-long-pic">
                                                    <?php
                                                        if (has_post_thumbnail($ids[$i])){
                                                            echo get_the_post_thumbnail($ids[$i], 'thumbnail');
                                                        } else {
                                                            echo wp_get_attachment_image(257);
                                                        }
                                                        ?>
                                            </div>
                                            <div class="people-panel-long-info">
                                                <h2 class="no_border"><?php echo $person['name'];?></h2>
                                                <h3><?php echo $person['title'];?></h3>
                                                <p>
                                                    <strong>Email: </strong><a href="mailto:<?php echo $person['email'];?>"><?php echo $person['email'];?></a>&nbsp
                                                    <strong>Phone: </strong><a href="tel:<?php echo $person['phone'];?>"><?php echo $person['phone'];?></a>
                                                </p>
                                            </div>
                                            <div class="divider"></div>
                                    <?php } else { ?>
                                            <div class="people-panel-long-pic">
                                                    <?php
                                                        if (has_post_thumbnail($ids[$i])){
                                                            echo get_the_post_thumbnail($ids[$i], 'thumbnail');
                                                        } else {
                                                            echo wp_get_attachment_image(257);
                                                        }
                                                        ?>
                                            </div>
                                            <div class="people-panel-long-info">
                                                <h2 class="no_border"><?php echo $person['name'];?></h2>
                                                <h3><?php echo $person['title'];?></h3>
                                                <p>
                                                    <strong>Email: </strong><a href="mailto:<?php echo $person['email'];?>"><?php echo $person['email'];?></a>&nbsp
                                                    <strong>Phone: </strong><a href="tel:<?php echo $person['phone'];?>"><?php echo $person['phone'];?></a>
                                                </p>
                                            </div>
                                            <div class="divider"></div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
            </div>
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>