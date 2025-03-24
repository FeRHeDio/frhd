<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package React.dev_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title single-post-title">', '</h1>'); ?>

        <div class="post-meta">
            <?php react_dev_blog_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="post-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'react-dev-blog'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'react-dev-blog'),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        // Display categories and tags
        $categories_list = get_the_category_list(', ');
        if ($categories_list) {
            echo '<div class="cat-links"><strong>' . esc_html__('Categories:', 'react-dev-blog') . '</strong> ' . $categories_list . '</div>';
        }

        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            echo '<div class="tags-links"><strong>' . esc_html__('Tags:', 'react-dev-blog') . '</strong> ' . $tags_list . '</div>';
        }
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
