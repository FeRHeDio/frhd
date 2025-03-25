<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<header>
    <div class="container">
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    </div>
</header>

<main>
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
                <nav class="navigation">
                    <?php if (get_next_posts_link()) : ?>
                        <div class="nav-previous"><?php next_posts_link('Older posts'); ?></div>
                    <?php endif; ?>
                    <?php if (get_previous_posts_link()) : ?>
                        <div class="nav-next"><?php previous_posts_link('Newer posts'); ?></div>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 