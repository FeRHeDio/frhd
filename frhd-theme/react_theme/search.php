<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package React.dev_Blog
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'react-dev-blog'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </header><!-- .page-header -->

                    <div class="post-list">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overwrite this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        the_posts_navigation(array(
                            'prev_text' => __('Older posts', 'react-dev-blog'),
                            'next_text' => __('Newer posts', 'react-dev-blog'),
                            'screen_reader_text' => __('Posts navigation', 'react-dev-blog'),
                            'aria_label' => __('Posts', 'react-dev-blog'),
                            'class' => 'pagination',
                        ));
                        ?>
                    </div>

                <?php else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
