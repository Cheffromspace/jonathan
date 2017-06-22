<?php
/**
 * Emika functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Emika
 */

if ( ! function_exists( 'emika_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function emika_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Emika, use a find and replace
	 * to change 'emika' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'emika', get_template_directory() . '/languages' );

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

	add_image_size( 'emika-small-thumb', 288, 242, true );
	add_image_size( 'emika-medium-thumb', 737, 1000, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header_menu' => esc_html__( 'Primary', 'emika' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'gallery',
		'video',
		'quote',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'emika_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'emika_setup' );

/**
 * Define Constants
 */
define( 'EMIKA_THEME_ROOT', esc_url( get_template_directory_uri() ) );
define( 'EMIKA_THEME_NAME', wp_get_theme( 'emika' )->get( 'Name' ) );
define( 'EMIKA_THEME_VERSION', wp_get_theme( 'emika' )->get( 'Version' ) );
define( 'EMIKA_THEME_AUTHOR', wp_get_theme( 'emika' )->get( 'Author' ) );

define( 'EMIKA_PRIMARY_COLOR', '#3598db' );
define( 'EMIKA_SECONDARY_COLOR', '#34495e' );
define( 'EMIKA_PRIMARY_FONT', 'Roboto' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function emika_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'emika_content_width', 1170 );
}
add_action( 'after_setup_theme', 'emika_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function emika_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'emika' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Instagram Widget', 'emika' ),
		'id'            => 'instagram-sidebar',
		'description'   => esc_html__( 'For only instagram widget.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="instagram-title"><h3 class="instagram-widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'emika' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer-1 section widgets here.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'emika' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add footer-2 section widgets here.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'emika' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add footer-3 section widgets here.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'emika' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add footer-4 section widgets here.', 'emika' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'emika_widgets_init' );

/**
 * Menu
 */
function emika_navigation() {
	wp_nav_menu( array(
		'menu'							=> 'primary',
		'theme_location'		=> 'header_menu',
		'depth'							=> 2,
		'container'					=> esc_attr( 'div' ),
		'container_class'		=> esc_attr( 'collapse navbar-collapse' ),
		'container_id'			=> esc_attr( 'navbar-collapse' ),
		'menu_class'				=> esc_attr( 'nav navbar-nav top-nav' ),
		'fallback_cb'				=> 'wp_bootstrap_navwalker::fallback',
		'walker'						=> new wp_bootstrap_navwalker()
	));
}

/**
 * Enqueue scripts and styles.
 */
function emika_scripts() {
	$sidebar = Kirki::get_option( 'emika_customizer', 'emika_sidebar_enable' ); 

	wp_enqueue_style( 'emika-style', get_stylesheet_uri() );

	// CSS files
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array() );
	wp_enqueue_style( 'nanoscroller', get_template_directory_uri() . '/assets/css/nanoscroller.css', array() );
	wp_enqueue_style( 'emika-base-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0' );

	// CSS file only in IE
	wp_enqueue_style( 'emika-ie', get_stylesheet_directory_uri() . "/assets/css/ie.css", array(), '1.0.0' );
	wp_style_add_data( 'emika-ie', 'conditional', 'IE' );

	// JS files in header
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '', false );

	// JS files for IE in header
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '', false );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	// JS files in footer
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', true );
	wp_enqueue_script( 'bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'device', get_template_directory_uri() . '/assets/js/device.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/assets/js/classie.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/parallax.js', array( 'jquery' ), '', true );
	if ( $sidebar == 1 ) { wp_enqueue_script( 'slideEffect', get_template_directory_uri() . '/assets/js/slideEffect.js', array( 'jquery' ), '', true ); }
	wp_enqueue_script( 'nanoscroller', get_template_directory_uri() . '/assets/js/nanoscroller.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'emika-init', get_template_directory_uri() . '/assets/js/init.js', array( 'jquery' ), EMIKA_THEME_VERSION, true );

	// JS files for IE in header
	wp_enqueue_script( 'placeholders', get_template_directory_uri() . '/assets/js/placeholders.js', array(), '', true );
	wp_script_add_data( 'placeholders', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'emika-init-for-ie', get_template_directory_uri() . '/assets/js/init-for-ie.js', array(), EMIKA_THEME_VERSION, true );
	wp_script_add_data( 'emika-init-for-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'emika_scripts' );

/**
 * Custom CSS
 */
function emika_include_custom_css() {
	$custom_css = Kirki::get_option( 'emika_customizer', 'emika_custom_css' );
	if ( !empty ( $custom_css ) ) {
		wp_add_inline_style( 'emika-base-style', esc_attr( $custom_css ) );
	}
}

add_action( 'wp_enqueue_scripts', 'emika_include_custom_css' );

/**
 * Custom JS
 */
function emika_include_custom_js() {
	$custom_js = Kirki::get_option( 'emika_customizer', 'emika_custom_js' );
	if ( !empty ( $custom_js ) ) {
		wp_add_inline_script( 'emika-init', esc_attr( $custom_js ) );
	}
}

add_action( 'wp_enqueue_scripts', 'emika_include_custom_js' );

/**
 * Search Only Posts
 */
function emika_search_filter( $query ) {
	$search_filter = Kirki::get_option( 'emika_customizer', 'emika_search_only_posts' );
	
	if ( $search_filter == 1 ) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
	} 

	return $query;
}

add_action( 'pre_get_posts', 'emika_search_filter' );

/**
 * Disqus Comments
 */
function emika_disqus_embed( $disqus_shortname ) {
	global $post;

	$disqus_shortname = esc_attr($disqus_shortname);

	wp_enqueue_script( 'disqus_embed', 'http://' . $disqus_shortname . '.disqus.com/embed.js', true  );
	echo wp_kses( '<div id="disqus_thread"></div>', array( 'div' => array( 'id' => true ) ) );

	wp_add_inline_script( 'disqus_embed', '
	var disqus_shortname = "' . $disqus_shortname . '";
	var disqus_title = "' . $post->post_title . '";
	var disqus_url = "' . get_permalink($post->ID) . '";
	var disqus_identifier = "' . $disqus_shortname . '-' . $post->ID . '";',
	'before' );
}

/**
 * Include theme files.
 */
require get_parent_theme_file_path( '/core/initial.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer/social-block.php' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_parent_theme_file_path( '/inc/extras.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_parent_theme_file_path( '/inc/jetpack.php' );
