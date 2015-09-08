<?php

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function register_my_menus(){

    register_nav_menus(
        array(
            'top-menu' => __('Top Menu', 'webtegrity-framework'),
        )
    );
}
add_action('init', 'register_my_menus');



/***********************************************************************************************/
/* Add Theme Support */
/***********************************************************************************************/

if (function_exists('add_theme_support')) {

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(300, 300, array( 'center', 'center'));
    add_image_size('custom-blog-thumb', 300, 300, array( 'center', 'center') );
    add_image_size('custom-sidebar-thumb', 80, 80, array( 'center', 'center') );
    if ( has_post_thumbnail() ) {
        the_post_thumbnail();
    }

    add_theme_support('automatic-feed-links');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

}



/***********************************************************************************************/
/* Register Widgets */
/***********************************************************************************************/

// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => 'Sidebar Widgets',
    'id'   => 'sidebar',
    'description'   => 'Display Widget Items in the Sidebar.',
    'before_widget' => '<div class="sidebar-widget col-lg-12 col-md-12 col-sm-12 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
            ));
}
// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => 'Page Widgets',
    'id'   => 'page_sidebar',
    'description'   => 'Display Widget Items in the Page Sidebar.',
    'before_widget' => '<div class="sidebar-widget col-lg-12 col-md-12 col-sm-12 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
            ));
}
// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => 'Blog Widgets',
    'id'   => 'blog_sidebar',
    'description'   => 'Display Widget Items in the Blog Sidebar.',
    'before_widget' => '<div class="sidebar-widget col-lg-12 col-md-12 col-sm-12 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
            ));
}
// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    'name' => 'Footer Widget',
    'id'   => 'footer_widget',
    'description'   => 'Display Widget Items in the Footer.',
    'before_widget' => '<div class="footer-widget col-lg-4 col-md-4 col-sm-4 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
            ));
}



/***********************************************************************************************/
/* Register Scripts and Style */
/***********************************************************************************************/

// Register style sheet.
function webtegrity_scripts() {

    wp_enqueue_style( 'bootstrap_min_css', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'main_css', get_stylesheet_uri(), NULL, NULL, 'all' );
    wp_enqueue_script( 'jquery_1_11_3', get_template_directory_uri() . '/jquery-1.11.3.min.js');
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/imagesloaded.pkgd.min.js');
    wp_enqueue_script( 'masonry_package', get_template_directory_uri() . '/masonry.pkgd.min.js');
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/skrollr.min.js');
    wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/script.min.js');

}

add_action( 'wp_enqueue_scripts', 'webtegrity_scripts' );

function load_google_fonts() {
    wp_register_style('googleRussoOne','http://fonts.googleapis.com/css?family=Russo+One');
        wp_enqueue_style( 'googleRussoOne');

    wp_register_style('googleOpenSans','http://fonts.googleapis.com/css?family=Open+Sans');
        wp_enqueue_style( 'googleOpenSans');

}
add_action('wp_print_styles', 'load_google_fonts');


remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );


/***********************************************************************************************/
/* Additional Functions */
/***********************************************************************************************/

