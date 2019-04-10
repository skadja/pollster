<?php
/**
 * Displays header site branding
 */

?>
<div class="site-branding border-bottom bg-white">
	<div class="py-2">
		<div class="content-wrap">

			<div class="row align-items-center">
				<div class="col-8 col-md-5">
					<?php if (get_custom_logo()) {
						the_custom_logo();
					}  else { ?>
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title h1 text-uppercase m-0">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-inherit"><?php bloginfo( 'name' ); ?></a>
							</h1>
						<?php else : ?>
							<div class="site-title h1 text-uppercase m-0">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-inherit"><?php bloginfo( 'name' ); ?></a>
							</div>
						<?php endif; ?>
					<?php } ?>
					<?php /*
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<div class="d-none d-md-block">
								<div class="site-description text-muted font-size-sm font-montserrat"><?php echo $description; ?></div>
							</div>
						<?php endif;
					*/?>
				</div>
				<div class="col-4 col-md-7">
					<div class="text-right">
						<div class="d-block d-md-none">
							<button class="hamburger hamburger--boring py-2 pl-2 pr-0" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
						<div class="d-none d-md-block">
							<?php
					            $defaults = array(
					                'container' => false,
					                'menu_class' => 'mainNav m-0 p-0'
					            );
					            wp_nav_menu( $defaults );
					        ?>
						</div>
					</div>
				</div>
			</div>


		</div><!-- .content-wrap -->
	</div>
	<?php $defaults = array(
			'container' => false,
			'menu_class' => 'mobileNav m-0 p-0 bg-light d-none'
		);
		wp_nav_menu( $defaults );
	?>
</div><!-- .site-branding -->
