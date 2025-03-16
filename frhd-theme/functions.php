<?php
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array( 
        'primary' => __('Primary Menu', 'frhd-theme')
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_enqueue_styles() {
    wp_enqueue_style('frhd-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');
?>