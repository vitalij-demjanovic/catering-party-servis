<?php
/**
 * Catering Party Servis functions and definitions
 */

define('THEME_VERSION', '1.0.0');

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


add_action('after_setup_theme', 'catering_party_servis_setup');
function catering_party_servis_setup()
{
    /**
     * Theme support
     */
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
}

function register_main_menu() {
    register_nav_menus(array(
        'main-menu' => __('Main menu'),
        'footer-menu'  => __('Footer menu', 'catering_party_servis'),
    ));
}
add_action('after_setup_theme', 'register_main_menu');

function bootstrap_css_js() {
    $bootstrap_css_url = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';

    $bootstrap_js_url = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';

    wp_enqueue_style('bootstrap-css', $bootstrap_css_url);

    wp_enqueue_script('bootstrap-js', $bootstrap_js_url, array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'bootstrap_css_js');

function swiper_css_js() {
    $swiper_css_url = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';

    $swiper_js_url = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';

    wp_enqueue_style('swiper-css', $swiper_css_url);

    wp_enqueue_script('swiper-js', $swiper_js_url, array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'swiper_css_js');

function add_theme_style() {
    wp_enqueue_style('wp-core-styles', get_template_directory_uri() . '/css/wp-styles.css', [], '1.1', false);
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], THEME_VERSION);
}

add_action('wp_enqueue_scripts', 'add_theme_style');

function add_theme_script() {
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.min.js', array(), THEME_VERSION, true);
}

add_action('wp_enqueue_scripts', 'add_theme_script');


function vito_dev_blocks($categories, $post) {
    $my_custom_category = array(
        array(
            'slug'  => 'vito-dev-blocks',
            'title' => __('Vito Dev blocks', 'catering_party_servis'),
            'icon'  => 'wordpress',
        ),
    );

    // Zlúč novú kategóriu na začiatok zoznamu
    return array_merge($my_custom_category, $categories);
}
add_filter('block_categories_all', 'vito_dev_blocks', 10, 2);


/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function tt3child_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'tt3child_register_acf_blocks' );