<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package React.dev_Blog
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'react-dev-blog'); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'react-dev-blog'); ?></p>

                        <?php get_search_form(); ?>
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
