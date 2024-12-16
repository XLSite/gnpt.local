<?php
function doveriecenter_enqueue_scripts() {
	wp_enqueue_style( 'doveriecenter-fonts', 'https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'doveriecenter-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'doveriecenter-bicons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri().'/assets/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/lib/animate/animate.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'tempusdominus', get_template_directory_uri().'/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(), '1.0.0', 'all' );
	//wp_enqueue_style( 'twentytwenty', get_template_directory_uri().'/assets/lib/twentytwenty/twentytwenty.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'doveriecenter-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0.0', 'all' );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js',array(),null,true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'wow', get_template_directory_uri(  ).'/assets/lib/wow/wow.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'easing', get_template_directory_uri(  ).'/assets/lib/easing/easing.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri(  ).'/assets/lib/waypoints/waypoints.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri(  ).'/assets/lib/owlcarousel/owl.carousel.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'tempusdominus-moment', get_template_directory_uri(  ).'/assets/lib/tempusdominus/js/moment.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'tempusdominus-timezone', get_template_directory_uri(  ).'/assets/lib/tempusdominus/js/moment-timezone.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'tempusdominus-bootstrap', get_template_directory_uri(  ).'/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array( 'jquery' ), 1.0, true );
	//wp_enqueue_script( 'twentytwenty', get_template_directory_uri(  ).'/assets/lib/twentytwenty/jquery.event.move.js', array( 'jquery' ), 1.0, true );
	//wp_enqueue_script( 'twentytwenty', get_template_directory_uri(  ).'/assets/lib/twentytwenty/jquery.twentytwenty.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'main', get_template_directory_uri(  ).'/assets/js/main.js', array( 'jquery' ), 1.0, true );
 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}

add_action('wp_enqueue_scripts', 'doveriecenter_enqueue_scripts' );

function doveriecenter_show_meta() {

}


if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function doveriecenter_setup() {
	load_theme_textdomain( 'doveriecenter', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'header_nav' => esc_html__( 'Главное меню в шапке', 'doveriecenter' ),
			'sidebar_nav' => esc_html__( 'Меню в сайдбаре', 'doveriecenter' ),
   
		)
	);
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
	add_theme_support(
		'custom-background',
		apply_filters(
			'doveriecenter_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'doveriecenter_setup' );

function doveriecenter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'doveriecenter_content_width', 640 );
}
add_action( 'after_setup_theme', 'doveriecenter_content_width', 0 );
function doveriecenter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'doveriecenter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'doveriecenter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'doveriecenter_widgets_init' );

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
require get_template_directory(  ).'/inc/Doverie_Menu.php';

