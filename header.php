<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

	<?php // to be removed
		get_template_part( 'merchant/header', 'banner' );
	// to be removed ?>
