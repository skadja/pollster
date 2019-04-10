<?php
/**
 * The template for displaying the footer
 */

?>

	<footer id="footer" class="site-footer font-montserrat" role="contentinfo">
		<div class="py-3 border-top bg-light">
			<div class="content-wrap">
				<div class="row text-muted text-shadow align-items-center">
					<div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0 text-center text-md-left">
						<div class="social font-size-larger">
							<a rel="nofollow" data-rel="external" href="//www.facebook.com/sharer/sharer.php?u=<?php bloginfo('url'); ?>&t=<?php bloginfo('name'); ?>&caption=<?php bloginfo('name') ?>&description=<?php bloginfo('description'); ?>" class="d-inline-block text-center text-facebook">
								<span class="sr-only">facebook</span>
								<span class="fa-2x">
									<i class="fab fa-facebook-f" data-fa-transform="shrink-8" data-fa-mask="fas fa-circle"></i>
								</span>
							</a>
							<a rel="nofollow" data-rel="external" href="//twitter.com/share?url=<?php bloginfo('url');?>&text=<?php bloginfo('name');?> - <?php bloginfo('description');?>" class="d-inline-block text-center text-twitter mx-1">
								<span class="sr-only">twitter</span>
								<span class="fa-2x">
									<i class="fab fa-twitter" data-fa-transform="shrink-8" data-fa-mask="fas fa-circle"></i>
								</span>
							</a>
						</div>
					</div>
					<?php if ( '' != get_theme_mod( 'footer_disclaimer' ) ) { ?>
						<div class="col-12 col-md-4 col-lg-6 mb-2 mb-md-0">
								<div class="text-center font-size-sm">
									<?php echo get_theme_mod('footer_disclaimer'); ?>
							</div>
						</div>
					<?php } ?>
					<div class="col-12 col-md-4 col-lg-3">
						<div class="text-center text-md-right font-size-sm">
							&copy;<?php echo date('Y'); ?> <?php bloginfo('name');?>. All rights reserved.
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<div class="mobileNavOverlay d-none"></div>
	<?php wp_footer(); ?>

</body>
</html>
