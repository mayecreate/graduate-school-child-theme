<?php
/*
* Template Name: VPhd Only
*
* you will se some inline style on the columns
* This is there so that the content is in the correct 
* order in the markup (main content then sidebar content)
*/
get_header(); ?>
		
<?php if(current_user_can('vphd') || current_user_can('administrator')) { ?> 
		<div class="row">
		    <?php get_template_part('partials/loop','standard'); ?>
		</div>
	</div><!-- / hfeed site container -->
</div><!-- / page -->
<?php } else { ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="center">Sorry, you must be a logged in VPhd member to view this page.</h2>	
                <h3 class="center">Already a VPhd member?</h3>	 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="<?php bloginfo('url'); ?>/wp/wp-gold/" class="btn-mayecreate center large">Login Here</a>
            </div>
        </div>
	</div><!-- / hfeed site container --> 
</div><!-- / page -->
<?php } ?>

<?php get_footer(); ?>