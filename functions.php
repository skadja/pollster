<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	add_image_size( 'sq', 200, 200, true); // square
	add_image_size( 'sm', 400, 225, true); // small
	add_image_size( 'md', 800, 450, true); // medium
	add_image_size( 'lg', 1200, 675, true); // large

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'First Contestant', 'twentythirteen' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Bio for first contestant: 1- Add a text widget. 2- Insert some text.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s bio margin-centered">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title hide">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Second Contestant', 'twentythirteen' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'Bio for second contestant: 1- Add a text widget. 2- Insert some text.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s bio margin-centered">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title hide">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {

	// get google fonts
	wp_enqueue_style( 'gfonts', '//fonts.googleapis.com/css?family=Open+Sans:600|Montserrat:400,500,600' );

	// get twitter bootstrap
	wp_enqueue_style( 'bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
	wp_enqueue_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery-lib'));
	wp_enqueue_script( 'bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery-lib'));

	/* get font awesome */
	wp_enqueue_script( 'fontawesome', '//use.fontawesome.com/releases/v5.0.13/js/all.js');

	// get humburger menu
	wp_enqueue_style( 'hamburger-menu', '//cdnjs.cloudflare.com/ajax/libs/hamburgers/0.9.3/hamburgers.min.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// get jQuery lib
	wp_deregister_script('jquery'); // remove wordpress version
	wp_enqueue_script('jquery-lib','//code.jquery.com/jquery-3.3.1.min.js');

	// get storage functions
	wp_enqueue_script('storage-functions', get_theme_file_uri().'/assets/js/storage.js' , array('jquery-lib'));

	// get chartjs library
	wp_enqueue_script('chartJs','//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js');

	// get poll and charts functions
	wp_enqueue_script('poll-functions', get_theme_file_uri().'/assets/js/poll.js' , array('chartJs'));
	wp_localize_script('poll-functions', 'my_js_vars', array(
		'templateDir' => get_theme_file_uri()
		)
	);

	// wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	/*
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}
	*/

	//wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	//wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


/*
------------------------------------------------------------------------
COSTUM FUNCTIONS
------------------------------------------------------------------------
*/

// make text widget php ready
add_filter('widget_text','execute_php',100);
function execute_php($html) {
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

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

// pollster customizer
if( class_exists( 'WP_Customize_Control' ) ):

	// set up contestants section
	$wp_customize->add_section('content' , array(
		'title' => __('Contestants','pollster'),
	));

	//set up settings section
	$wp_customize->add_section('settings' , array(
		'title' => __('Settings','pollster'),
	));

	// FIELDS

	// image for contestant #1
	$wp_customize->add_setting('c1_img_settings');
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'c1_img_settings_control', array(
		'label' => 'Contestant #1 - Image',
		'mime_type' => 'image',
		'section' => 'content',
		'settings' => 'c1_img_settings',
	)));

	// name for contestant #1
	$wp_customize->add_setting('c1_name_settings');
	$wp_customize->add_control('c1_name_settings_control', array(
		'type' => 'text',
		'label' => 'Contestant #1 - Name',
		'section' => 'content',
		'settings' => 'c1_name_settings',
	));

	// details for contestant #1
	$wp_customize->add_setting('c1_details_settings');
	$wp_customize->add_control('c1_details_settings_control', array(
		'type' => 'textarea',
		'label' => 'Contestant #1 - Details',
		'section' => 'content',
		'settings' => 'c1_details_settings',
		'input_attrs' => array(
			'placeholder' => __( 'Optional' ),
		)
	));

	// image for contestant #2
	$wp_customize->add_setting('c2_img_settings');
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'c2_img_settings_control', array(
		'label' => 'Contestant #2 - Image',
		'mime_type' => 'image',
		'section' => 'content',
		'settings' => 'c2_img_settings',
	)));

	// name for contestant #2
	$wp_customize->add_setting('c2_name_settings');
	$wp_customize->add_control('c2_name_settings_control', array(
		'type' => 'text',
		'label' => 'Contestant #2 - Name',
		'section' => 'content',
		'settings' => 'c2_name_settings',
	));

	// details for contestant #2
	$wp_customize->add_setting('c2_details_settings');
	$wp_customize->add_control('c2_details_settings_control', array(
		'type' => 'textarea',
		'label' => 'Contestant #2 - Details',
		'section' => 'content',
		'settings' => 'c2_details_settings',
		'input_attrs' => array(
			'placeholder' => __( 'Optional' ),
		)
	));


	//** SETTINGS SECTION

	// poll end date-time
	$wp_customize->add_setting('poll_end_date_time_settings');
	$wp_customize->add_control(new WP_Customize_Date_Time_Control($wp_customize, 'poll_end_date_time_settings_control', array(
		'label' => 'Poll exiry date',
		'section' => 'settings',
		'settings' => 'poll_end_date_time_settings',
	)));

	// vote button text
	$wp_customize->add_setting('vote_button_text');
	$wp_customize->add_control('vote_button_text_control', array(
		'type' => 'text',
		'label' => 'Vote button text',
		'section' => 'settings',
		'settings' => 'vote_button_text',
		'input_attrs' => array(
			'placeholder' => __( 'Enter message' ),
		)
	));

	// graph type
	$wp_customize->add_setting('graph_type', array(
		'default' => 'bar'
	));
	$wp_customize->add_control('graph_type_control', array(
		'type' => 'select',
		'choices'  => array(
			'bar'  => 'Bar',
			'pie' => 'Pie',
			'doughnut' => 'Doughnut',
		),
		'label' => 'Graph type',
		'section' => 'settings',
		'settings' => 'graph_type',
	));

	// graph color - contestant #1
	$wp_customize->add_setting('graphColor_1', array(
		'default' => '#0066b2'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'graphColor_1_control', array(
		'label' => 'Graph color for Contestant #1',
		'section' => 'settings',
		'settings' => 'graphColor_1',
	)));

	// graph color - contestant #2
	$wp_customize->add_setting('graphColor_2', array(
		'default' => '#ffc600'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'graphColor_2_control', array(
		'label' => 'Graph color for Contestant #2',
		'section' => 'settings',
		'settings' => 'graphColor_2',
	)));

	// has voted message
	$wp_customize->add_setting('poll_has_voted', array(
		'default' => 'You already cast your vote'
	));
	$wp_customize->add_control('poll_has_voted_control', array(
		'type' => 'textarea',
		'label' => 'Has voted message',
		'description' => 'Message to display to returning users who already cast their vote',
		'section' => 'settings',
		'settings' => 'poll_has_voted',
		'input_attrs' => array(
			'placeholder' => __( 'Enter message' ),
		)
	));

	// poll closed message
	$wp_customize->add_setting('poll_ended_message');
	$wp_customize->add_control('poll_ended_message_control', array(
		'type' => 'textarea',
		'label' => 'Poll closed message',
		'description' => 'Message to display after the poll has ended',
		'section' => 'settings',
		'settings' => 'poll_ended_message',
		'input_attrs' => array(
			'placeholder' => __( 'Enter message' ),
		)
	));

	// footer disclaimer
	$wp_customize->add_setting('footer_disclaimer');
	$wp_customize->add_control('footer_disclaimer_control', array(
		'type' => 'textarea',
		'label' => 'Footer disclaimer',
		'description' => 'Optional',
		'section' => 'settings',
		'settings' => 'footer_disclaimer',
		'input_attrs' => array(
			'placeholder' => __( 'Enter message' ),
		)
	));

	// reset poll
	$wp_customize->add_setting('poll_reset');
	$wp_customize->add_control('poll_reset_control', array(
		'type' => 'button',
		'label' => 'Reset poll',
		'description' => 'This will reset all vote counts to zero.',
		'input_attrs' => array(
			'class' => 'button button-primary',
			'value' => 'Reset poll'
		),
		'section' => 'settings',
		'settings' => array(),
	));

endif;

// add customizer scripts
function custom_customize_enqueue() {
	wp_enqueue_script( 'custom-customize', get_template_directory_uri() . '/assets/js/pollster-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
	wp_localize_script('custom-customize', 'js_vars', array(
		'tplDir' => get_theme_file_uri()
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue' );