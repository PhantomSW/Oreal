<?php
/**
 * loreal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package loreal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

// ----------------------------------------------------------
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// L'en tête du site prends automatiquement le nom du site
add_theme_support( 'title-tag' );

// Pour ajouter des emplacements de menus
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
	'research-1' => 'Footer Thematique',
	'research-2' => 'Footer Interet',
	'research-3' => 'Footer Activite',
	'research-4' => 'Footer Langue',
	'research-5' => 'Footer Nature',
	'second' => 'Menu Secondaire'
) );

// Pour ajouter des emplacements de sidebar
register_sidebar( array(
	'id' => 'footer-bar',
	'name' => 'Footer',
	'before_widget'  => '<div class="footer__bar__widget %2$s">', // remplacer les <li> (défault) par des <div>
	'after_widget'  => '</div>',
	'before_title' => '<p class="footer__bar__widget__title">', // remplacer les h2 (défault) par des <p>
	'after_title' => '</p>',
  ) );

  register_sidebar( array(
	'id' => 'header-bar',
	'name' => 'Header',
	'before_widget'  => '<div class="header__bar__widget %2$s">', // remplacer les <li> (défault) par des <div>
	'after_widget'  => '</div>',
	'before_title' => '<p class="header__bar__widget__title">', // remplacer les h2 (défault) par des <p>
	'after_title' => '</p>',
  ) );

function loreal_register_taxo() {

    register_taxonomy('thematique', 'post', [
        'labels' => [
            'name' => 'Thématique',
            'singular_name'     => 'Thématique',
            'plural_name'       => 'Thématiques',
            'search_items'      => 'Rechercher des thématiques',
            'all_items'         => 'Toutes les thématiques',
            'edit_item'         => 'Editer la thématique',
            'update_item'       => 'Mettre à jour la thématique',
            'add_new_item'      => 'Ajouter une nouvelle thématique',
            'new_item_name'     => 'Ajouter une nouvelle thématique',
            'menu_name'         => 'Thématique',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
		'show_in_nav_menus' => true,
    ]);

	register_taxonomy('nature', 'post', [
        'labels' => [
            'name' => 'Nature',
            'singular_name'     => 'Nature',
            'plural_name'       => 'Natures',
            'search_items'      => 'Rechercher dans Nature',
            'all_items'         => 'Toutes dans Nature',
            'edit_item'         => 'Editer Nature',
            'update_item'       => 'Mettre à jour Nature',
            'add_new_item'      => 'Ajouter un nouvel élément',
            'new_item_name'     => 'Ajouter un nouvel élément',
            'menu_name'         => 'Nature',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
		'show_in_nav_menus' => true,
    ]);

	register_taxonomy('centre-interet', 'post', [
        'labels' => [
            'name' => 'Centre(s) d\'intérêt',
            'singular_name'     => 'Centre d\intérêt',
            'plural_name'       => 'Centres d\intérêt',
            'search_items'      => 'Rechercher des centres d\intérêt',
            'all_items'         => 'Tous les centres d\intérêt',
            'edit_item'         => 'Editer le centre d\intérêt',
            'update_item'       => 'Mettre à jour le centre d\intérêt',
            'add_new_item'      => 'Ajouter un nouveau centre d\intérêt',
            'new_item_name'     => 'Ajouter un nouveau centre d\intérêt',
            'menu_name'         => 'Centre(s) d\intérêt',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
		'show_in_nav_menus' => true,
    ]);
}
add_action('init', 'loreal_register_taxo');

// Déclaration des Custom Post Types et Taxonomies
function loreal_register_post_types() {

	// CPT Portfolio
	$labels = array(
		'name' => 'Portfolio',
		'all_items' => 'Tous les projets',  // affiché dans le sous menu
		'singular_name' => 'Projet',
		'add_new_item' => 'Ajouter un projet',
		'edit_item' => 'Modifier le projet',
		'menu_name' => 'Portfolio'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_rest' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor','thumbnail' ),
		'menu_position' => 5, 
		'menu_icon' => 'dashicons-admin-customizer',
	);

	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'loreal_register_post_types' );


function the_breadcrumb() {

    $sep = ' &nbsp; / &nbsp; ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="/">Acceuil</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=', 'multiple');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
			
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
			echo '<span style="color:black;">';
            echo the_title();
			echo '</span>';
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
				
            }
        }

        echo '</div>';
    }
}




//-----------------------------------------------------------

function loreal_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on loreal, use a find and replace
		* to change 'loreal' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'loreal', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'loreal' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'loreal_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
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
add_action( 'after_setup_theme', 'loreal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function loreal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'loreal_content_width', 640 );
}
add_action( 'after_setup_theme', 'loreal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function loreal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'loreal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'loreal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'loreal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function loreal_scripts() {
	wp_enqueue_style( 'loreal-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'loreal-style', 'rtl', 'replace' );

	wp_enqueue_script( 'loreal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'loreal_scripts' );

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

