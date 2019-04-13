<?php
/**
 * Pollster: Customizer
 */

// pollster customizer
if( class_exists( 'WP_Customize_Control' ) ):

	// remove pre-existing customizer functions
	add_action( "customize_register", "pollster_theme_customizer_deregister" );
	function pollster_theme_customizer_deregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' ); // colors
		$wp_customize->remove_section( 'static_front_page' ); // static front page
		$wp_customize->remove_section( 'custom_css' ); // additional css
		$wp_customize->remove_section( 'header_image' ); // header media
		$wp_customize->remove_section( 'background_image' ); // background image
		$wp_customize->remove_panel("widgets"); // widgets
	}

	// add customizer stylesheet
	function pollster_customizer_stylesheet() {
	wp_register_style( 'pollster_customizer_stylesheet', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
		wp_enqueue_style( 'pollster_customizer_stylesheet' );
	}
	add_action( 'customize_controls_print_styles', 'pollster_customizer_stylesheet' );

	// add customizer scripts
	function pollster_customize_enqueue() {
		wp_enqueue_script( 'custom-customize', get_template_directory_uri() . '/assets/js/pollster-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
		wp_localize_script('custom-customize', 'js_vars', array(
			'tplDir' => get_theme_file_uri()
		));
	}
	add_action( 'customize_controls_enqueue_scripts', 'pollster_customize_enqueue' );

	// get custom controls
	require_once 'custom-controls.php';

	// contestants
	require get_template_directory() . '/inc/customizer/contestants.php';

	// settings
	require get_template_directory() . '/inc/customizer/settings.php';

endif;

// *** NO NEED TO EDIT BELOW THIS LINE



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twentyseventeen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'twentyseventeen_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'twentyseventeen_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'twentyseventeen_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Twenty Seventeen 1.0
 * @see twentyseventeen_customize_register()
 *
 * @return void
 */
function twentyseventeen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Seventeen 1.0
 * @see twentyseventeen_customize_register()
 *
 * @return void
 */
function twentyseventeen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function twentyseventeen_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function twentyseventeen_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function twentyseventeen_customize_preview_js() {
	wp_enqueue_script( 'twentyseventeen-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'twentyseventeen_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function twentyseventeen_panels_js() {
	wp_enqueue_script( 'twentyseventeen-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'twentyseventeen_panels_js' );
