<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<?php the_title( '<h1 class="page-title h2 m-0">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content mt-4">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post -->
