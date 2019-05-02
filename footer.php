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
						<?php get_template_part( 'template-parts/footer/footer', 'social' ); ?>
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
							<span class="copyleft">&copy;</span>
							<?php echo date('Y'); ?> <?php bloginfo('name');?>.
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
