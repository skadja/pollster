<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content content-wrap" role="main">
		<div class="my-4">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'page' );
			endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer();
