<?php
/**
 * volunteer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package volunteer
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'volunteer_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function volunteer_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on volunteer, use a find and replace
		 * to change 'volunteer' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'volunteer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );


		/**
		 * Add post-formats support.
		 */
		// add_theme_support(
		// 	'post-formats',
		// 	array(
		// 		'link',
		// 		'aside',
		// 		'gallery',
		// 		'image',
		// 		'quote',
		// 		'status',
		// 		'video',
		// 		'audio',
		// 		'chat',
		// 	)
		// );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary'	=> __( 'Primary menu', 'volunteer' ),
				'mobile'		=> __( 'Mobile Menu', 'volunteer' ),
				'social'		=> __( 'Social Menu', 'volunteer' ),
				'footer'		=> __( 'Footer Menu', 'volunteer' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'						=> 180,
				'width'						=> 180,
				'flex-width'				=> true,
				'flex-height'				=> true,
				'unlink-homepage-logo'	=> true,
			)
		);
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' ); // theme.min.css проверить

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.- // включает поддержку стилей для Gutenberg
		add_theme_support( 'editor-styles' );

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Enqueue editor styles.
		add_editor_style(
			array(
				volunteer_fonts_url(), 
				$editor_stylesheet_path, // файл стилей для редактора
			)
		);

		// Add custom editor font sizes.
		// add_theme_support(
		// 	'editor-font-sizes',
		// 	array(
		// 		array(
		// 			'name'      => esc_html__( 'Extra small', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'XS', 'Font size', 'volunteer' ),
		// 			'size'      => 16,
		// 			'slug'      => 'extra-small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Small', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'S', 'Font size', 'volunteer' ),
		// 			'size'      => 18,
		// 			'slug'      => 'small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Normal', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'M', 'Font size', 'volunteer' ),
		// 			'size'      => 20,
		// 			'slug'      => 'normal',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Large', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'L', 'Font size', 'volunteer' ),
		// 			'size'      => 24,
		// 			'slug'      => 'large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Extra large', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'XL', 'Font size', 'volunteer' ),
		// 			'size'      => 40,
		// 			'slug'      => 'extra-large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Huge', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'XXL', 'Font size', 'volunteer' ),
		// 			'size'      => 96,
		// 			'slug'      => 'huge',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Gigantic', 'volunteer' ),
		// 			'shortName' => esc_html_x( 'XXXL', 'Font size', 'volunteer' ),
		// 			'size'      => 144,
		// 			'slug'      => 'gigantic',
		// 		),
		// 	)
		// );

		// Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'volunteer_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Editor color palette.
		// $black     = '#000000';
		// $dark_gray = '#28303D';
		// $gray      = '#39414D';
		// $green     = '#D1E4DD';
		// $blue      = '#D1DFE4';
		// $purple    = '#D1D1E4';
		// $red       = '#E4D1D1';
		// $orange    = '#E4DAD1';
		// $yellow    = '#EEEADD';
		// $white     = '#FFFFFF';

		// add_theme_support(
		// 	'editor-color-palette',
		// 	array(
		// 		array(
		// 			'name'  => esc_html__( 'Black', 'volunteer' ),
		// 			'slug'  => 'black',
		// 			'color' => $black,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Dark gray', 'volunteer' ),
		// 			'slug'  => 'dark-gray',
		// 			'color' => $dark_gray,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Gray', 'volunteer' ),
		// 			'slug'  => 'gray',
		// 			'color' => $gray,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Green', 'volunteer' ),
		// 			'slug'  => 'green',
		// 			'color' => $green,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Blue', 'volunteer' ),
		// 			'slug'  => 'blue',
		// 			'color' => $blue,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Purple', 'volunteer' ),
		// 			'slug'  => 'purple',
		// 			'color' => $purple,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Red', 'volunteer' ),
		// 			'slug'  => 'red',
		// 			'color' => $red,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Orange', 'volunteer' ),
		// 			'slug'  => 'orange',
		// 			'color' => $orange,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Yellow', 'volunteer' ),
		// 			'slug'  => 'yellow',
		// 			'color' => $yellow,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'White', 'volunteer' ),
		// 			'slug'  => 'white',
		// 			'color' => $white,
		// 		),
		// 	)
		// );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// ниже проверить
		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
endif;
add_action( 'after_setup_theme', 'volunteer_setup' );

/**
 * Add Google webfonts.
 */
function volunteer_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
   */
  $roboto = esc_html_x( 'on', 'Roboto font: on or off', 'volunteer' );

	/* Translators: If there are characters in your language that are not
	* supported by Raleway, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$raleway = esc_html_x( 'off', 'Raleway font: on or off', 'volunteer' );

	if ( 'off' !== $roboto || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,700'; // проверить что лучше 600 или 700
		}

		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'cyrillic-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function volunteer_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header', 'volunteer' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your header.', 'volunteer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'volunteer' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'volunteer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'volunteer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'volunteer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'volunteer_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function volunteer_content_width() {
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'volunteer_content_width', 720 );
}
add_action( 'after_setup_theme', 'volunteer_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function volunteer_scripts() {
	// Enqueue Google fonts
	wp_enqueue_style( 'volunteer-fonts', volunteer_fonts_url(), array(), null );

	
	// wp_enqueue_style( 'volunteer-style', get_stylesheet_uri(), array(), _S_VERSION ); // включить на production
	// wp_style_add_data( 'volunteer-style', 'rtl', 'replace' ); // пока не добавляю поддержку RTL
	
	// wp_enqueue_script( 'volunteer-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	// Temp - на время разработки
	wp_enqueue_style( 'volunteer-style-temp', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime(get_template_directory() . '/assets/css/style.css') );
	wp_enqueue_script( 'volunteer-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), filemtime(get_template_directory() . '/assets/js/navigation.js'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'volunteer_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php'; // убрать, не нужно

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/////////////////////////////
/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-volunteer-svg-icons.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

////////////////////////////
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }
