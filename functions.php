<?php
/**
 * Theme functions.
 */

namespace DustPressStarter;

require __DIR__ . '/vendor/autoload.php';

// Enable DustPress.
if ( function_exists( 'dustpress' ) ) {
    \DustPress();
}
else {
    wp_die('DustPress must be installed when using the DustPress Starter Theme!');
}

// Define some constants.
if ( ! defined( 'ASSETS_DIR' ) ) {
	define( 'ASSETS_DIR', get_template_directory_uri() . '/assets' );
}

/**
 * Theme setup
 */
function setup() {
    \load_theme_textdomain( 'dustpress-demo', get_template_directory() . '/lang' );
    \add_theme_support( 'title-tag' );
    \register_nav_menus( [
        'primary_navigation' => __( 'Primary navigation', 'dustpress-demo' ),
    ] );
    \add_theme_support( 'post-thumbnails' );
    \add_theme_support(
        'html5',
        [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ]
    );
}

\add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Add theme scripts and styles.
 */
function scripts_and_styles() {
    $theme = \wp_get_theme();
    $version = $theme->get( 'Version' );
    
    \wp_enqueue_script( 'app-js', ASSETS_DIR . '/dist/app.js', [ 'jquery' ], $version, true );
    \wp_enqueue_style( 'app-css', ASSETS_DIR . '/dist/app.css', [], $version, 'all' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts_and_styles' );

function register_event_post_type() {
    $args = [
        'public'    => true,
        'label'     => __( 'Events', 'dustpress-demo' ),
        'supports'	=> [ 'title', 'excerpt', 'editor' ],
        'menu_icon' => 'dashicons-calendar',
    ];
    register_post_type( 'event', $args );
}
\add_action( 'init', __NAMESPACE__ . '\\register_event_post_type' );
