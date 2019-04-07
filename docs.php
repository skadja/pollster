<?php
/**
 * Template Name: Docs
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content content-wrap" role="main">

		<div class="row">
			<div class="col-12 col-md-3 col-lg-2 pt-2">
				<?php $defaults = array(
						'container' => false,
						'menu_class' => 'pageNav m-0 p-0'
					);
					wp_nav_menu( $defaults );
				?>
			</div>
			<div class="col-12 col-md-9 col-lg-10 py-5 border-left">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/page/content', 'page' );
				endwhile; ?>
			</div>
		</div>

	</div>
</div>

<?php get_footer();
