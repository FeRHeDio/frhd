<?php
/**
 * Basic Working Theme functions and definitions
 */

// Add theme support
function basic_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'basic-theme'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'basic_theme_setup');

// Enqueue scripts and styles
function basic_theme_scripts() {
    wp_enqueue_style('basic-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'basic_theme_scripts'); 