<?php global $containerWidth; ?> 
        <div id="navbarTop" class="navbar navbar-default">
            <div class="<?php echo $containerWidth; ?>" > 
				<div class="row w-100 align-items-center">
					<div class="col-12 col-md-4">
						<div class="navbar-header">
							<?php mayecreate_custom_logo(); ?>
							<div id="mobile_menu">
								<a href="#drawer-menu" class="nav-button nav-button-x">
									<span>toggle menu</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-8">
					<?php  // Visit http://codex.wordpress.org/Function_Reference/wp_nav_menu for explanation of how this works.
						
						$topMenu = array(
							'theme_location'  => 'top-menu',
							'container'       => 'nav',
							'container_class' => '',
							'container_id'    => 'top_nav',
							'menu_class'      => 'menu pull-right',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => '',
							'before'          => '',
							'after'           => '',
							'link_before'     => '<span>',
							'link_after'      => '</span>',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li><i class="fa fa-search" type="button" data-bs-toggle="collapse" data-bs-target="#search_bar" aria-controls="search_bar" aria-expanded="false"></i></li></ul>',
							'depth'           => 3,
							'walker'          => ''
							); ?>
		
						<?php wp_nav_menu($topMenu); ?>
					</div>
				</div>
            </div>
        </div>
   

<div id="navbarBottom" class="navbar navbar-default ">
	<div class="<?php echo $containerWidth; ?>" > 
		<div class="row w-100">
			<div class="col-12">
				<?php

				$mainMenu = array(
					'theme_location'  => 'main-menu',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => 'main_nav',
					'menu_class'      => 'menu pull-right',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => '',
					'before'          => '',
					'after'           => '',
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 3,
					'walker'          => ''
					); ?>

				<?php wp_nav_menu($mainMenu); ?>
			</div>
		</div>
	</div>
</div>
	