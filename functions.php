<?php
/**
 * jobview functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jobview
 */

if ( ! function_exists( 'jobview_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jobview_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jobview, use a find and replace
		 * to change 'jobview' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jobview', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'jobview' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'jobview_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'jobview_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jobview_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jobview_content_width', 640 );
}
add_action( 'after_setup_theme', 'jobview_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jobview_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jobview' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jobview' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jobview_widgets_init' );



function jobview_custom_post_type() {
	$labels = array(
	 			'name'          => _x( 'Tips & tricks', 'post type general name' ),
        'singular_name'      => _x( 'Tips & Tricks', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Tip' ),
        'add_new_item'       => __( 'Add New Tip' ),
        'edit_item'          => __( 'Edit Tip' ),
        'new_item'           => __( 'New Tip' ),
        'all_items'          => __( 'All Tips & Tricks' ),
        'view_item'          => __( 'View Tips' ),
        'search_items'       => __( 'Search Tips' ),
        'not_found'          => __( 'No Tips found' ),
        'not_found_in_trash' => __( 'No Tips found in the Trash' ),
        'parent_item_colon'  => '',

        'menu_name'          => 'Tips & Tricks'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Tips & Tricks',
        'public'        => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
    		'menu_icon'					 => 'dashicons-lightbulb',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,

        //'taxonomies' => array('category'),
    );
    register_post_type( 'tips-tricks', $args );

}
add_action( 'init', 'jobview_custom_post_type' );



/** add categories for custom post type */
add_action( 'init', 'build_taxonomies', 0 );
function build_taxonomies() {
    register_taxonomy( 'mycategories', 'tips-tricks', array( 'hierarchical' => true, 'label' => 'Tips & Tricks Categories', 'query_var' => true, 'rewrite' => true ) );
}

/* Add bootstrap support to the Wordpress theme*/

function theme_add_bootstrap() {
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

/**
 * Enqueue scripts and styles.
 */
function jobview_scripts() {
	wp_enqueue_style( 'jobview-style', get_stylesheet_uri() );
	wp_enqueue_style('Main css', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style('tips-tricks-style' , get_template_directory_uri() . '/css/tips-tricks.css'  );
	wp_enqueue_style( 'jobview-style', get_stylesheet_uri() . '/css/header.css', array() );


	wp_enqueue_script( 'jobview-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jobview-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jobview_scripts' );






/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
