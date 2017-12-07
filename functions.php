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
				'publicly_queryable' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
    		'menu_icon'					 => 'dashicons-lightbulb',
        'supports'      => array( 'title', 'editor',  'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,

        //'taxonomies' => array('category'),
    );
    register_post_type( 'tips-tricks', $args );

}

/*CPT*/
$labels = array(
      'name'          => _x( 'FAQ', 'post type general name' ),
      'singular_name'      => _x( 'FAQ', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'Question' ),
      'add_new_item'       => __( 'Add New Question' ),
      'edit_item'          => __( 'Edit Question' ),
      'new_item'           => __( 'New Question' ),
      'all_items'          => __( 'All Questions' ),
      'view_item'          => __( 'View Questions' ),
      'search_items'       => __( 'Search Questions' ),
      'not_found'          => __( 'No Questions found' ),
      'not_found_in_trash' => __( 'No Questions found in the Trash' ),
      'parent_item_colon'  => '',

      'menu_name'          => 'FAQ'
  );
  $args = array(
      'labels'        => $labels,
      'description'   => 'FAQ',
      'public'        => true,
      'hierarchical'      => true,
      'show_ui'           => true,
      'show_in_nav_menus' => true,
      'menu_icon'					 => 'dashicons-editor-help',
      'supports'      => array( 'title', 'editor', 'thumbnail' ),
      'has_archive'   => true,

      //'taxonomies' => array('category'),
  );
  register_post_type( 'FAQ', $args );


{
	$labels = array(
	 			'name'          => _x( 'Presse indlæg', 'post type general name' ),
        'singular_name'      => _x( 'Presse indlæg', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Indlæg' ),
        'add_new_item'       => __( 'Add New Indlæg' ),
        'edit_item'          => __( 'Edit Indlæg' ),
        'new_item'           => __( 'New Indlæg' ),
        'all_items'          => __( 'All Indlæg' ),
        'view_item'          => __( 'View Indlæg' ),
        'search_items'       => __( 'Search Indlæg' ),
        'not_found'          => __( 'No Indlæg found' ),
        'not_found_in_trash' => __( 'No Indlæg found in the Trash' ),
        'parent_item_colon'  => '',

        'menu_name'          => 'Presse indlæg'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Presse indlæg',
        'public'        => true,
				'publicly_queryable' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
    		'menu_icon'					 => 'dashicons-lightbulb',
        'supports'      => array( 'title', 'editor',  'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,

        //'taxonomies' => array('category'),
    );
    register_post_type( 'presse', $args );

}


add_action( 'init', 'jobview_custom_post_type' );






add_action( 'init', 'register_taxonomy_sectors' );

function register_taxonomy_sectors() {

    $labels = array(
        'name' => _x( 'Tips & Tricks ', 'Tips & Tricks ' ),
        'singular_name' => _x( 'Tips & Tricks ', 'Tips & Tricks ' ),
        'search_items' => _x( 'Search Tips & Tricks ', 'Tips & Tricks ' ),
        'popular_items' => _x( 'Popular Tips & Tricks ', 'Tips & Tricks ' ),
        'all_items' => _x( 'All Tips & Tricks ', 'Tips & Tricks' ),
        'parent_item' => _x( 'Parent Tips & Tricks Category', 'Tips & Tricks ' ),
        'parent_item_colon' => _x( 'Parent Tips & Tricks Category:', 'Tips & Tricks ' ),
        'edit_item' => _x( 'Edit Tips & Tricks ', 'Tips & Tricks ' ),
        'update_item' => _x( 'Update Tips & Tricks ', 'Tips & Tricks ' ),
        'add_new_item' => _x( 'Add New Tips & Tricks ', 'Tips & Tricks ' ),
        'new_item_name' => _x( 'New Tips & Tricks Name', 'Tips & Tricks ' ),
        'separate_items_with_commas' => _x( 'Separate Tips & Tricks Category with commas', 'sector' ),
        'add_or_remove_items' => _x( 'Add or remove Tips & Tricks Category', 'Tips & Tricks Category' ),
        'choose_from_most_used' => _x( 'Choose from the most used Tips & Tricks Category', 'Tips & Tricks Category' ),
        'menu_name' => _x( 'Tips & Tricks Category', 'Tips & Tricks Category' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
				'publicly_queryable' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,

        'rewrite' => array(
            'slug' => 'tips-tricks-kategori',
            'with_front' => false,
            'hierarchical' => true
        ),
        'query_var' => true
    );

    register_taxonomy( 'tips-tricks-cat', array('tips-tricks'), $args );
}

/* Taxonomy til FAQ */

add_action( 'init', 'register_taxonomy_faq' );

function register_taxonomy_faq() {

    $labels = array(
        'name' => _x( 'FAQ ', 'FAQ' ),
        'singular_name' => _x( 'FAQ ', 'FAQ' ),
        'search_items' => _x( 'Search FAQ', 'FAQ' ),
        'popular_items' => _x( 'Popular FAQ', 'FAQ' ),
        'all_items' => _x( 'All FAQ ', 'FAQ' ),
        'parent_item' => _x( 'Parent FAQ Category', 'FAQ ' ),
        'parent_item_colon' => _x( 'Parent FAQ Category:', ' FAQ ' ),
        'edit_item' => _x( 'Edit FAQ ', 'FAQ' ),
        'update_item' => _x( 'Update FAQ', 'FAQ ' ),
        'add_new_item' => _x( 'Add New FAQ ', 'FAQ ' ),
        'new_item_name' => _x( 'New FAQ Name', 'FAQ ' ),
        'separate_items_with_commas' => _x( 'Separate FAQ Category with commas', 'FAQ' ),
        'add_or_remove_items' => _x( 'Add or remove FAQ Category', 'FAQ Category' ),
        'choose_from_most_used' => _x( 'Choose from the most used FAQ Category', 'FAQ Category' ),
        'menu_name' => _x( 'FAQ Category', 'FAQ Category' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
				'publicly_queryable' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,

        'rewrite' => array(
            'with_front' => false,
            'hierarchical' => true
        ),
        'query_var' => true
    );

    register_taxonomy( 'FAQ-cat', array('faq'), $args );
}


/* Footer widgets  */


register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Vises i footeren',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Vises i footere',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Vises i footere',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );

register_sidebar( array(
'name' => 'Footer Sidebar 4',
'id' => 'footer-sidebar-4',
'description' => 'Vises i footere',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );






/* Add bootstrap support to the Wordpress theme*/

function theme_add_bootstrap() {
wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', false, '4.0.0', true);
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

/**
 * Enqueue scripts and styles.
 */
function jobview_scripts() {
	wp_enqueue_style( 'jobview-style', get_stylesheet_uri() );
	wp_enqueue_style('Main css', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style('tips-tricks-style' , get_template_directory_uri() . '/css/tips-tricks.css'  );
	wp_enqueue_style( 'header-css', get_template_directory_uri() . '/css/header.css' );
 	wp_enqueue_style( 'faq-css', get_template_directory_uri() . '/css/faq.css' );
	wp_enqueue_style( 'job-css', get_template_directory_uri() . '/css/jobs.css' );
	wp_enqueue_style('Front page css', get_template_directory_uri() . '/css/front-page.css' );
	wp_enqueue_style('Singel tips css', get_template_directory_uri() . '/css/single-tips-tricks.css' );
  wp_enqueue_style('Contact-css', get_template_directory_uri() . '/css/contact.css' );
  wp_enqueue_style('About-css', get_template_directory_uri() . '/css/about.css' );
	wp_enqueue_script( 'jobview-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'jobview-post', get_template_directory_uri() . '/js/post.js', array('jquery' ), '1.0.0', true );
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


// Register Custom Navigation Walker
require_once('class-wp-bootstrap-navwalker.php');



/* Exercpt */

function my_excerpt_length($length) {
return 25;
}
add_filter('excerpt_length', 'my_excerpt_length');




function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Læs opslag</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



/* ALLOW SPAN TAG IN WORDPRESS EDITOR */
/* Kilde https://blogsneeraj.wordpress.com/2016/02/16/allow-span-tag-in-wordpress-editor/ */

function override_mce_options($initArray)
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options');
