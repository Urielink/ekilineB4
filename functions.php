<?php
/**
 * ekiline functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ekiline
 */

if ( ! function_exists( 'ekiline_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ekiline_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ekiline, use a find and replace
	 * to change 'ekiline' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ekiline', get_template_directory() . '/languages' );

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
        'top' => esc_html__( 'Top Menu', 'ekiline' ),
        'primary' => esc_html__( 'Primary Menu', 'ekiline' ),
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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ekiline_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // ekiline_setup
add_action( 'after_setup_theme', 'ekiline_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ekiline_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ekiline_content_width', 640 );
}
add_action( 'after_setup_theme', 'ekiline_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ekiline_widgets_init() {
	
// **Sidebar por deafult
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar left', 'ekiline' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
// Un nuevo sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar right', 'ekiline' ),
        'id'            => 'sidebar-2',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
		
// Añadimos widgets en el footer
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widgets', 'ekiline' ),
        'id'            => 'footer-w1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

// Añadimos widgets dentro de posiciones prestablecidas para cada menu
    register_sidebar( array(
        'name'          => esc_html__( 'Widget in menu (top location)', 'ekiline' ),
        'id'            => 'navwidget-nw1',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s navbar-right"><div class="navbar-form">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<label>',
        'after_title'   => '</label>',
    ) );     

    register_sidebar( array(
        'name'          => esc_html__( 'Widget in menu (primary location)', 'ekiline' ),
        'id'            => 'navwidget-nw2',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s navbar-right"><div class="navbar-form">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<label>',
        'after_title'   => '</label>',
    ) );     

// Añadimos widgets dentro de widgets
    register_sidebar( array(
        'name'          => esc_html__( 'Widget in horizontal navbar widget', 'ekiline' ),
        'id'            => 'navwidget-nw3',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s navbar-right"><div class="navbar-form">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<label>',
        'after_title'   => '</label>',
    ) );     
    
// Añadimos widgets en el contenido ya sea pagina o entrada
    register_sidebar( array(
        'name'          => esc_html__( 'In content top widgets', 'ekiline' ),
        'id'            => 'content-w1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

        register_sidebar( array(
        'name'          => esc_html__( 'In content bottom widgets', 'ekiline' ),
        'id'            => 'content-w2',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    		   
// Añadimos widgets en la parte superior de la pagina fuera del contenido
	register_sidebar( array(
		'name'          => esc_html__( 'Top Page', 'ekiline' ),
		'id'            => 'toppage-w1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );				   
			   	
}
add_action( 'widgets_init', 'ekiline_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
  
function ekiline_scripts() {
	
	// // Extra CSS
	wp_enqueue_style( 'bootstrap-337', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
		// Css con condicion: https://developer.wordpress.org/reference/functions/wp_style_add_data/
	wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css', array(), '1', 'all' );
		wp_style_add_data( 'ie10-viewport-bug-workaround', 'conditional', 'gte IE 8' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	// Llamar google fonts desde url.
	// wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,300,700,300italic,400italic,700italic|Open+Sans:400,400italic,300italic,300,700,700italic', array(), '0.0.0', 'all' );
    // metodo ekiline, no modificar.
	wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/ekiline-layout.css', array(), '1.0', 'all' );	
	// U_ style: CSS (https://codex.wordpress.org/Function_Reference/wp_enqueue_script)
	wp_enqueue_style( 'ekiline-style', get_stylesheet_uri() );	
	
	/* Javascript : Desactivar Jquery para enviarlo al fondo (http://wordpress.stackexchange.com/questions/173601/enqueue-core-jquery-in-the-footer)
	 * en caso contrario, solo Agrega esta linea y el script se ubucara en el <head>.
	 *  wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20151113', true  );		
	 * Mas info: 
	 *	https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 *	https://www.godaddy.com/garage/webpro/wordpress/3-ways-to-insert-javascript-into-wordpress-pages-or-posts/
	 */	 
	// wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    // wp_enqueue_script( 'jquery' );	
        	
    /* ABR 22 2017 hay otro metodo para hacer que jquery se vaya al fondo sin de-registrarlo y aplica solo si no eres administrador 
     * http://stackoverflow.com/questions/35663927/wordpress-jquery-on-footer */
        
    if( !is_admin() ){
        wp_dequeue_script('jquery');
        wp_dequeue_script('jquery-core');
        wp_dequeue_script('jquery-migrate');
        wp_enqueue_script('jquery', false, array(), false, true);
        wp_enqueue_script('jquery-core', false, array(), false, true);
        wp_enqueue_script('jquery-migrate', false, array(), false, true);          
     }        	
        	
	// Javascript : Jquery libraries (https://codex.wordpress.org/Function_Reference/wp_enqueue_script)
	// Cuando los scripts dependen de JQuery se debe mencionar en el array
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true  );
    wp_enqueue_script( 'ekiline-swipe', get_template_directory_uri() . '/js/carousel-swipe.min.js', array('jquery'), '20150716', true  );
    wp_enqueue_script( 'lazy-load', get_template_directory_uri() . '/js/jquery.lazyload.js', array('jquery'), '20170327', true  );
    wp_enqueue_script( 'ekiline-layout', get_template_directory_uri() . '/js/ekiline-layout.js', array('jquery'), '20151226', true  );
    wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme.js', array('jquery'), '20151113', true  );
    
	// scripts con condicionales, caso IE https://developer.wordpress.org/reference/functions/wp_script_add_data/
	wp_enqueue_script( 'ie10-vpbugwkrnd', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.min.js' );
		wp_script_add_data( 'ie10-vpbugwkrnd', 'conditional', 'gte IE 8' );
	wp_enqueue_script( 'html5shiv', '//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond', '//oss.maxcdn.com/respond/1.4.2/respond.min.js' );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
			
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}		
	
}
add_action( 'wp_enqueue_scripts', 'ekiline_scripts', 0 );

/**
 * Allow short-codes work in widgets
 */
add_filter('widget_text', 'do_shortcode');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Navwalker, for bootstrap menus.
 * @link https://github.com/twittem/wp-bootstrap-navwalker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Ekiline overide items
 */
// theme frontend addons
require get_template_directory() . '/inc/custom-sidebars.php';
require get_template_directory() . '/inc/custom-navbars.php';
require get_template_directory() . '/inc/addon-breadcrumb.php';

// theme custom widgets
require get_template_directory() . '/inc/addon-verticalnavbar.php';
require get_template_directory() . '/inc/addon-horizontalnavbar.php';
require get_template_directory() . '/inc/addon-recentPostsCarousel.php';
require get_template_directory() . '/inc/addon-sublanguage.php';
require get_template_directory() . '/inc/addon-imageWidget.php';
require get_template_directory() . '/inc/addon-widgetoptions.php';

// theme custom shortcodes
require get_template_directory() . '/inc/addon-galleryslider.php';
require get_template_directory() . '/inc/addon-tabs.php';
require get_template_directory() . '/inc/addon-insertposts.php';
require get_template_directory() . '/inc/addon-shortcodes.php';
require get_template_directory() . '/inc/addon-extractshortcode.php';

// theme customizer services
require get_template_directory() . '/inc/addon-optimize.php';
// require get_template_directory() . '/inc/addon-minify.php';
// require get_template_directory() . '/inc/addon-privateaccess.php';
// require get_template_directory() . '/inc/addon-maintenance.php';

// theme admin extend options
require get_template_directory() . '/inc/addon-categoryfield.php';
require get_template_directory() . '/inc/addon-editor.php';

