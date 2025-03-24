<?php
/**
 * The front page template file
 *
 * This is the template that displays the blog posts on the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package React.dev_Blog
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="blog-header">
                    <h1 class="blog-title"><?php echo esc_html__('React Blog', 'react-dev-blog'); ?></h1>
                    <p class="blog-description"><?php echo react_dev_blog_get_description(); ?></p>
                    <p class="social-text"><?php echo react_dev_blog_get_social_text(); ?></p>
                </div>

                <div class="post-list">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_type());

                        endwhile;

                        the_posts_navigation(array(
                            'prev_text' => __('Older posts', 'react-dev-blog'),
                            'next_text' => __('Newer posts', 'react-dev-blog'),
                            'screen_reader_text' => __('Posts navigation', 'react-dev-blog'),
                            'aria_label' => __('Posts', 'react-dev-blog'),
                            'class' => 'pagination',
                        ));

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
