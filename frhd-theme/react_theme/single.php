<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package React.dev_Blog
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'single');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                    the_post_navigation(
                        array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'react-dev-blog') . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'react-dev-blog') . '</span> <span class="nav-title">%title</span>',
                            'screen_reader_text' => __('Post navigation', 'react-dev-blog'),
                            'aria_label' => __('Posts', 'react-dev-blog'),
                            'class' => 'pagination',
                        )
                    );

                endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
