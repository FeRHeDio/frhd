<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function react_dev_blog_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'react_dev_blog_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function react_dev_blog_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'react_dev_blog_pingback_header');

/**
 * Change the read more link text
 */
function react_dev_blog_read_more_link() {
    return '<a class="read-more" href="' . esc_url(get_permalink()) . '">Read more</a>';
}
add_filter('the_content_more_link', 'react_dev_blog_read_more_link');

/**
 * Add custom CSS class to the more link
 *
 * @param string $link The read more link HTML.
 * @return string
 */
function react_dev_blog_modify_read_more_link($link) {
    return str_replace('more-link', 'more-link read-more', $link);
}
add_filter('the_content_more_link', 'react_dev_blog_modify_read_more_link');

/**
 * Custom template tags for this theme.
 */

if (!function_exists('react_dev_blog_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function react_dev_blog_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date())
        );

        echo '<span class="posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if (!function_exists('react_dev_blog_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function react_dev_blog_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'react-dev-blog'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

/**
 * Get the blog description with fallback to customizer option
 */
function react_dev_blog_get_description() {
    $description = get_theme_mod('react_dev_blog_description', 'This blog is the official source for the updates from the React team. Anything important, including release notes or deprecation notices, will be posted here first.');

    return wp_kses_post($description);
}

/**
 * Get the social media text with fallback to customizer option
 */
function react_dev_blog_get_social_text() {
    $social_text = get_theme_mod('react_dev_blog_social_text', 'You can also follow the @react.dev account on Bluesky, or @reactjs account on Twitter, but you won\'t miss anything essential if you only read this blog.');

    return wp_kses_post($social_text);
}
