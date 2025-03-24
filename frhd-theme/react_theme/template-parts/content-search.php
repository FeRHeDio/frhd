<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package React.dev_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
        <div class="post-meta">
            <?php react_dev_blog_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="post-excerpt">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more"><?php esc_html_e('Read more', 'react-dev-blog'); ?></a>
</article><!-- #post-<?php the_ID(); ?> -->
