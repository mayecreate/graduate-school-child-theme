<?php
/*
* Template Name: MUIDSI - People
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
                <?php   // get faculty ids
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Core Faculty', $number = -1);
                            $ids = muii_getPeopleID($category = 'Core Faculty', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <h3><a name="core-faculty"></a>Core Faculty</h3>
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
                                                    <i><?php echo $person['rank'];?></i>
                                                    <h5><strong>Department</strong><?php echo "<br>".$person['department'];?></h5>
                                                    <h5><strong>Concentration</strong><?php echo "<br>".$person['concentration'];?></h5>
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
                                                    <i><?php echo $person['rank'];?></i>
                                                    <h5><strong>Department</strong><?php echo "<br>".$person['department'];?></h5>
                                                    <h5><strong>Concentration</strong><?php echo "<br>".$person['concentration'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
                            
                            
                            
                        <!-- Affiliate --> 
            
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Staff', $number = -1);
                            $ids = muii_getPeopleID($category = 'Affiliate Faculty', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <h3><a name="affiliate-faculty"></a>Affiliate Faculty</h3>
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
                                                    <i><?php echo $person['rank'];?></i>
                                                    <h5><strong>Department</strong><?php echo "<br>".$person['department'];?></h5>
                                                    <h5><strong>Concentration</strong><?php echo "<br>".$person['concentration'];?></h5>
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
                                                    <i><?php echo $person['rank'];?></i>
                                                    <h5><strong>Department</strong><?php echo "<br>".$person['department'];?></h5>
                                                    <h5><strong>Concentration</strong><?php echo "<br>".$person['concentration'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
                            
                            
                            
                        <!-- Staff --> 
            
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Staff', $number = -1);
                            $ids = muii_getPeopleID($category = 'Administration', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <h2><a name="administration"></a>Administration</h2>
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
                                                    <i><?php echo $person['title'];?></i>
                                                    <h5><strong>Email</strong><?php echo "<br>".$person['email'];?></h5>
                                                    <h5><strong>Phone</strong><?php echo "<br>".$person['phone'];?></h5>
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
                                                    <i><?php echo $person['title'];?></i>
                                                    <h5><strong>Email</strong><?php echo "<br>".$person['email'];?></h5>
                                                    <h5><strong>Phone</strong><?php echo "<br>".$person['phone'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
                            
                            
                        <!-- Staff --> 
                        <h2><a name="committee"></a>Standing Committee</h2>
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Staff', $number = -1);
                            $ids = muii_getPeopleID($category = 'Education Committee', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <h3><a name="education-committee"></a>Education Committee</h3>
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
                                                    <h5><strong>Email</strong><?php echo "<br>".$person['email'];?></h5>
                                                    <h5><strong>Phone</strong><?php echo "<br>".$person['phone'];?></h5>
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
                                                    <h5><strong>Email</strong><?php echo "<br>".$person['email'];?></h5>
                                                    <h5><strong>Phone</strong><?php echo "<br>".$person['phone'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>
                            </div>
                            
                            
                        
                            
                            
                        
                        <!-- Student --> 
            
                        <?php
                            //$ids = muii_getPeopleID($criteria = 'type', $value = 'Student', $number = -1);
                            $ids = muii_getPeopleID($category = 'Student', $number = -1);
                        ?>
                        
                        <div class="people-container">
                            <h2><a name="student"></a>Students</h2>
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
                                                    <i>MUII PhD Student</i>
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
                                                    <i>MUII PhD Student</i>
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
        </div>

	</div><!-- page -->
	</div><!-- page -->


<?php get_footer(); ?>