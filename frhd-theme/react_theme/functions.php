<?php
/**
 * React.dev Blog Theme functions and definitions
 */

// Theme setup
function react_dev_blog_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Set post thumbnail size
    set_post_thumbnail_size(800, 450, true);

    // This theme uses wp_nav_menu() in one location
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'react-dev-blog'),
        'footer' => esc_html__('Footer Menu', 'react-dev-blog'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'react_dev_blog_setup');

// Register widget area
function react_dev_blog_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'react-dev-blog'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'react-dev-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'react_dev_blog_widgets_init');

// Enqueue scripts and styles
function react_dev_blog_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('react-dev-blog-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue custom scripts
    wp_enqueue_script('react-dev-blog-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'react_dev_blog_scripts');

/**
 * Register custom post type for React Releases
 */
function react_dev_blog_register_post_types() {
    $labels = array(
        'name'                  => _x('React Releases', 'Post type general name', 'react-dev-blog'),
        'singular_name'         => _x('React Release', 'Post type singular name', 'react-dev-blog'),
        'menu_name'             => _x('React Releases', 'Admin Menu text', 'react-dev-blog'),
        'name_admin_bar'        => _x('React Release', 'Add New on Toolbar', 'react-dev-blog'),
        'add_new'               => __('Add New', 'react-dev-blog'),
        'add_new_item'          => __('Add New React Release', 'react-dev-blog'),
        'new_item'              => __('New React Release', 'react-dev-blog'),
        'edit_item'             => __('Edit React Release', 'react-dev-blog'),
        'view_item'             => __('View React Release', 'react-dev-blog'),
        'all_items'             => __('All React Releases', 'react-dev-blog'),
        'search_items'          => __('Search React Releases', 'react-dev-blog'),
        'parent_item_colon'     => __('Parent React Releases:', 'react-dev-blog'),
        'not_found'             => __('No React Releases found.', 'react-dev-blog'),
        'not_found_in_trash'    => __('No React Releases found in Trash.', 'react-dev-blog'),
        'featured_image'        => _x('React Release Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'react-dev-blog'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'react-dev-blog'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'react-dev-blog'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'react-dev-blog'),
        'archives'              => _x('React Release archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'react-dev-blog'),
        'insert_into_item'      => _x('Insert into React Release', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'react-dev-blog'),
        'uploaded_to_this_item' => _x('Uploaded to this React Release', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'react-dev-blog'),
        'filter_items_list'     => _x('Filter React Releases list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'react-dev-blog'),
        'items_list_navigation' => _x('React Releases list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'react-dev-blog'),
        'items_list'            => _x('React Releases list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'react-dev-blog'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'react-release'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
    );

    register_post_type('react_release', $args);
}
add_action('init', 'react_dev_blog_register_post_types');

/**
 * Customize excerpt length
 */
function react_dev_blog_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'react_dev_blog_excerpt_length');

/**
 * Customize excerpt more string
 */
function react_dev_blog_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'react_dev_blog_excerpt_more');

/**
 * Implement custom header image
 */
function react_dev_blog_custom_header_setup() {
    add_theme_support('custom-header', apply_filters('react_dev_blog_custom_header_args', array(
        'default-image'      => '',
        'default-text-color' => '000000',
        'width'              => 1000,
        'height'             => 250,
        'flex-height'        => true,
        'wp-head-callback'   => 'react_dev_blog_header_style',
    )));
}
add_action('after_setup_theme', 'react_dev_blog_custom_header_setup');

/**
 * Add custom blog info
 */
function react_dev_blog_customize_register($wp_customize) {
    // Add section for blog info
    $wp_customize->add_section('react_dev_blog_options', array(
        'title'    => __('Blog Options', 'react-dev-blog'),
        'priority' => 130,
    ));

    // Add setting for blog description
    $wp_customize->add_setting('react_dev_blog_description', array(
        'default'           => 'This blog is the official source for the updates from the React team. Anything important, including release notes or deprecation notices, will be posted here first.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for blog description
    $wp_customize->add_control('react_dev_blog_description', array(
        'label'    => __('Blog Description', 'react-dev-blog'),
        'section'  => 'react_dev_blog_options',
        'type'     => 'textarea',
    ));

    // Add setting for social media text
    $wp_customize->add_setting('react_dev_blog_social_text', array(
        'default'           => 'You can also follow the @react.dev account on Bluesky, or @reactjs account on Twitter, but you won\'t miss anything essential if you only read this blog.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for social media text
    $wp_customize->add_control('react_dev_blog_social_text', array(
        'label'    => __('Social Media Text', 'react-dev-blog'),
        'section'  => 'react_dev_blog_options',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'react_dev_blog_customize_register');

/**
 * Include additional template functions
 */
require get_template_directory() . '/inc/template-functions.php';

// Hook theme setup function
add_action('after_setup_theme', 'react_dev_blog_setup');

// Hook scripts and styles
add_action('wp_enqueue_scripts', 'react_dev_blog_scripts');

// Hook widget initialization
add_action('widgets_init', 'react_dev_blog_widgets_init');

// Hook excerpt modifications
add_filter('excerpt_length', 'react_dev_blog_excerpt_length');
add_filter('excerpt_more', 'react_dev_blog_excerpt_more');

// Hook custom header setup
add_action('after_setup_theme', 'react_dev_blog_custom_header_setup');

// Hook customizer registration
add_action('customize_register', 'react_dev_blog_customize_register');
