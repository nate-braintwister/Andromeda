<?php
/**
 * Andromeda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Andromeda
 */

if ( ! function_exists( 'andromeda_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function andromeda_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Andromeda, use a find and replace
		 * to change 'andromeda' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'andromeda', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Main Menu', 'andromeda' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'andromeda' ),
			'mobile' => esc_html__( 'Mobile', 'andromeda' ),
			'social' => esc_html__( 'Social Media Menu', 'andromeda' ),
			'marketing-services' => esc_html__( 'Marketing Services', 'andromeda' ),
			'website-services' => esc_html__( 'Website Services', 'andromeda' ),
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
		add_theme_support( 'custom-background', apply_filters( 'andromeda_custom_background_args', array(
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
add_action( 'after_setup_theme', 'andromeda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function andromeda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'andromeda_content_width', 640 );
}
add_action( 'after_setup_theme', 'andromeda_content_width', 0 );

/************************************************************************
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 ************************************************************************/
function andromeda_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Left', 'andromeda' ),
        'id'            => 'blog-left',
        'description'   => esc_html__( 'Add widgets here.', 'andromeda' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Right', 'andromeda' ),
        'id'            => 'blog-right',
        'description'   => esc_html__( 'Add widgets here.', 'andromeda' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Contact Sidebar', 'andromeda' ),
        'id'            => 'contact-sidebar',
        'description'   => esc_html__( 'Add contact widgets here.', 'andromeda' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Single Post Sidebar', 'andromeda' ),
        'id'            => 'single-post',
        'description'   => esc_html__( 'Add single post widgets here.', 'andromeda' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'andromeda_widgets_init' );

/************************************************************************
 * Enqueue scripts and styles.
 ************************************************************************/


function andromeda_scripts() {
    wp_enqueue_style( 'andromeda-settings', get_stylesheet_uri() );
    wp_enqueue_style( 'andromeda-styles', get_template_directory_uri() . '/public/css/styles.min.css', array(), '');
    wp_enqueue_style( 'andromeda-extended-styles', get_template_directory_uri() . '/public/css/extended.css', array(), '');

	wp_enqueue_script( 'andromeda-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '', true );
	wp_enqueue_script( 'andromeda-aos', get_template_directory_uri() . '/public/js/aos.js', array( 'andromeda-jquery' ), 'ver01', true );
	wp_enqueue_script( 'andromeda-custom', get_template_directory_uri() . '/public/js/custom.js', array( 'andromeda-jquery' ), 'ver01', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'andromeda_scripts' );


remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/************************************************************************
 * CUSTOM POST TYPES
 ************************************************************************/
/************************
 * SERVICES CPT
 ************************/
function services() {
    $labels = array(
        'name'								=> _x( 'Services', 'Post Type General Name' ),
        'singular_name'						=> _x( 'Service', 'Post Type Singular Name' ),
        'menu_name'							=> __( 'Services' ),
        'name_admin_bar'					=> __( 'Service' ),
        'archives'							=> __( 'Service Archives' ),
        'attributes'						=> __( 'Service Attributes' ),
        'parent_item_colon' 				=> __( 'Parent Service:' ),
        'all_items'							=> __( 'All Services' ),
        'add_new_item'						=> __( 'Add New Service' ),
        'add_new'							=> __( 'Add New Service' ),
        'new_item'							=> __( 'New Service' ),
        'edit_item'							=> __( 'Edit Service' ),
        'update_item'						=> __( 'Update Service' ),
        'view_item'							=> __( 'View Service' ),
        'view_items'						=> __( 'View Services' ),
        'search_items'						=> __( 'Search Service' ),
        'not_found'							=> __( 'Not found' ),
        'not_found_in_trash' 				=> __( 'Not found in Trash' ),
        'featured_image'					=> __( 'Featured Image' ),
        'set_featured_image' 				=> __( 'Set featured image' ),
        'remove_featured_image' 	    	=> __( 'Remove featured image' ),
        'use_featured_image' 				=> __( 'Use as featured image' ),
        'insert_into_item'					=> __( 'Insert into service' ),
        'uploaded_to_this_item' 		    => __( 'Uploaded to this service' ),
        'items_list'						=> __( 'Services list' ),
        'items_list_navigation' 	    	=> __( 'Services list navigation' ),
        'filter_items_list' 				=> __( 'Filter services list' ),
    );

    $args = array(
        'label'					    		=> __( 'Service' ),
        'description'						=> __( 'All the services offered by the business.' ),
        'labels'							=> $labels,
        'supports'							=> array('title', 'editor', 'page-attributes', 'thumbnail'),
        'taxonomies'						=> array( ),
        'hierarchical'						=> true,
        'public'							=> true,
        'menu_icon'                         => 'dashicons-products',
        'show_ui'							=> true,
        'show_in_menu'						=> true,
        'menu_position'						=> 6,
        'show_in_admin_bar' 	    		=> true,
        'show_in_nav_menus' 	    		=> true,
        'can_export'						=> true,
        'has_archive'						=> true,
        'exclude_from_search' 				=> false,
        'publicly_queryable' 				=> true,
        'capability_type'					=> 'page',
    );

    register_post_type( 'services', $args );

}

add_action( 'init', 'services', 0 );

/************************
 * TESTIMONIALS CPT
 ************************/
function testimonials() {
    $labels = array(
        'name'								=> _x( 'Testimonials', 'Post Type General Name' ),
        'singular_name'						=> _x( 'Testimonial', 'Post Type Singular Name' ),
        'menu_name'							=> __( 'Testimonials' ),
        'name_admin_bar'					=> __( 'Testimonial' ),
        'archives'							=> __( 'Testimonial Archives' ),
        'attributes'						=> __( 'Testimonial Attributes' ),
        'parent_item_colon' 				=> __( 'Parent Testimonial:' ),
        'all_items'							=> __( 'All Testimonials' ),
        'add_new_item'						=> __( 'Add New Testimonial' ),
        'add_new'							=> __( 'Add New Testimonial' ),
        'new_item'							=> __( 'New Testimonial' ),
        'edit_item'							=> __( 'Edit Testimonial' ),
        'update_item'						=> __( 'Update Testimonial' ),
        'view_item'							=> __( 'View Testimonial' ),
        'view_items'						=> __( 'View Testimonials' ),
        'search_items'						=> __( 'Search Testimonial' ),
        'not_found'							=> __( 'Not found' ),
        'not_found_in_trash' 				=> __( 'Not found in Trash' ),
        'featured_image'					=> __( 'Featured Image' ),
        'set_featured_image' 				=> __( 'Set featured image' ),
        'remove_featured_image' 	    	=> __( 'Remove featured image' ),
        'use_featured_image' 				=> __( 'Use as featured image' ),
        'insert_into_item'					=> __( 'Insert into service' ),
        'uploaded_to_this_item' 		    => __( 'Uploaded to this service' ),
        'items_list'						=> __( 'Testimonials list' ),
        'items_list_navigation' 	    	=> __( 'Testimonials list navigation' ),
        'filter_items_list' 				=> __( 'Filter testimonials list' ),
    );

    $args = array(
        'label'					    		=> __( 'Testimonials' ),
        'description'						=> __( 'Client testimonials.' ),
        'labels'							=> $labels,
        'supports'							=> array('title', 'editor', 'thumbnail', 'page-attributes'),
        'taxonomies'						=> array( ),
        'hierarchical'						=> false,
        'public'							=> true,
        'show_ui'							=> true,
        'show_in_menu'						=> true,
        'menu_position'						=> 7,
        'show_in_admin_bar' 	    		=> true,
        'show_in_nav_menus' 	    		=> true,
        'can_export'						=> true,
        'has_archive'						=> true,
        'exclude_from_search' 				=> false,
        'publicly_queryable' 				=> true,
        'capability_type'					=> 'post',
    );

    register_post_type( 'testimonials', $args );

}

add_action( 'init', 'testimonials', 0 );

/************************
 * PROJECTS CPT
 ************************/
function projects() {
    $labels = array(
        'name'									=> _x( 'Projects', 'Post Type General Name'),
        'singular_name'							=> _x( 'Project', 'Post Type Singular Name' ),
        'menu_name'								=> __( 'Projects' ),
        'name_admin_bar'						=> __( 'Project' ),
        'archives'								=> __( 'Project Archives' ),
        'attributes'							=> __( 'Project Attributes' ),
        'parent_item_colon' 					=> __( 'Parent Project:' ),
        'all_items'								=> __( 'All Projects' ),
        'add_new_item'							=> __( 'Add New Project' ),
        'add_new'								=> __( 'Add New Project' ),
        'new_item'								=> __( 'New Project' ),
        'edit_item'								=> __( 'Edit Project' ),
        'update_item'							=> __( 'Update Project' ),
        'view_item'								=> __( 'View Project' ),
        'view_items'							=> __( 'View Projects' ),
        'search_items'							=> __( 'Search Project' ),
        'not_found'								=> __( 'Project Not found' ),
        'not_found_in_trash' 		    		=> __( 'Project Not found in Trash' ),
        'featured_image'						=> __( 'Featured Image' ),
        'set_featured_image' 			    	=> __( 'Set featured image' ),
        'remove_featured_image' 		        => __( 'Remove featured image' ),
        'use_featured_image' 				    => __( 'Use as featured image' ),
        'insert_into_item'					    => __( 'Insert into project' ),
        'uploaded_to_this_item' 		        => __( 'Uploaded to this project' ),
        'items_list'							=> __( 'projects list' ),
        'items_list_navigation' 		        => __( 'Projects list navigation' ),
        'filter_items_list' 				    => __( 'Filter projects list' ),
    );

    $args = array(
        'label'							        => __( 'Projects' ),
        'description'							=> __( 'Some of the notable recent completed projects.' ),
        'labels'								=> $labels,
        'supports'							    => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'taxonomies'							=> array( ),
        'hierarchical'							=> false,
        'public'								=> true,
        'menu_icon'                             => 'dashicons-portfolio',
        'show_ui'								=> true,
        'show_in_menu'							=> true,
        'menu_position'							=> 5,
        'show_in_admin_bar' 					=> true,
        'show_in_nav_menus' 					=> true,
        'can_export'							=> true,
        'has_archive'							=> true,
        'exclude_from_search'   				=> false,
        'publicly_queryable' 					=> true,
        'capability_type'						=> 'post',
    );

    register_post_type( 'projects', $args );

}

add_action( 'init', 'projects', 0 );


/************************
 * Service Packages CPT
 ************************/
function packages() {
    $labels = array(
        'name'									=> _x( 'Service Packages', 'Post Type General Name'),
        'singular_name'							=> _x( 'Service Package', 'Post Type Singular Name' ),
        'menu_name'								=> __( 'Service Packages' ),
        'name_admin_bar'						=> __( 'Service Package' ),
        'archives'								=> __( 'Service Package Archives' ),
        'attributes'							=> __( 'Service Package Attributes' ),
        'parent_item_colon' 					=> __( 'Parent Service Package:' ),
        'all_items'								=> __( 'All Service Packages' ),
        'add_new_item'							=> __( 'Add New Service Package' ),
        'add_new'								=> __( 'Add New Service Package' ),
        'new_item'								=> __( 'New Service Package' ),
        'edit_item'								=> __( 'Edit Service Package' ),
        'update_item'							=> __( 'Update Service Package' ),
        'view_item'								=> __( 'View Service Package' ),
        'view_items'							=> __( 'View Service Packages' ),
        'search_items'							=> __( 'Search Service Package' ),
        'not_found'								=> __( 'Service Package Not found' ),
        'not_found_in_trash' 		    		=> __( 'Service Package Not found in Trash' ),
        'featured_image'						=> __( 'Featured Image' ),
        'set_featured_image' 			    	=> __( 'Set featured image' ),
        'remove_featured_image' 		        => __( 'Remove featured image' ),
        'use_featured_image' 				    => __( 'Use as featured image' ),
        'insert_into_item'					    => __( 'Insert into project' ),
        'uploaded_to_this_item' 		        => __( 'Uploaded to this project' ),
        'items_list'							=> __( 'packages list' ),
        'items_list_navigation' 		        => __( 'Service Packages list navigation' ),
        'filter_items_list' 				    => __( 'Filter packages list' ),
    );

    $args = array(
        'label'							        => __( 'Service Packages' ),
        'description'							=> __( 'Some of the notable recent completed packages.' ),
        'labels'								=> $labels,
        'supports'								=> array( ),
        'taxonomies'							=> array( ),
        'hierarchical'							=> false,
        'public'								=> true,
        'menu_icon'                             => 'dashicons-portfolio',
        'show_ui'								=> true,
        'show_in_menu'							=> true,
        'menu_position'							=> 7,
        'show_in_admin_bar' 					=> true,
        'show_in_nav_menus' 					=> true,
        'can_export'							=> true,
        'has_archive'							=> true,
        'exclude_from_search'   				=> false,
        'publicly_queryable' 					=> true,
        'capability_type'						=> 'post',
    );

    register_post_type( 'packages', $args );

}

add_action( 'init', 'packages', 0 );


/************************
 * SERVICE TYPE TAXONOMY
 ************************/
add_action( 'init', 'define_service_type_taxonomy' );

function define_service_type_taxonomy(){
    $labels = array(
        'name'							=> 'Service Type',
        'singular_name'					=> 'Service Type',
        'search_items'					=> 'Search Service Types',
        'all_items'						=> 'All Service Types',
        'parent_item'					=> 'Parent Service Type',
        'parent_item_colon'		    	=> 'Parent Service Type:',
        'edit_item'						=> 'Edit Service Type',
        'update_item'					=> 'Update Service Type',
        'add_new_item'					=> 'Add New Service Type',
        'new_item_name'					=> 'New Service Type Name',
        'menu_name'						=> 'Service Types',
        'view_item'						=> 'View Service Types'
    );

    $args = array(
        'labels'						=> $labels,
        'hierarchical'					=> false,
        'quer_var'	    				=> true,
        'rewrite'						=> true
    );

    register_taxonomy( 'service_type', 'services', $args );
}


function custom_excerpt_length( $length ){
    return 30;
}
add_filter(
    'excerpt_length',
    'custom_excerpt_length',
    999
);

function my_theme_archive_title( $title ){
    if ( is_category() ){
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ){
        $title = single_tag_title( '', false );
    } elseif ( is_author() ){
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ){
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ){
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

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

/**
 * Custom Login Area
 */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/public/images/site-login-logo.png);
            height:80px;
            width:80px;
            background-size: 80px 80px;
            background-repeat: no-repeat;
            padding-bottom: 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function is_child($pageID) {
    global $post;
    if( is_page() && ($post->post_parent==$pageID) ) {
        return true;
    } else {
        return false;
    }
}