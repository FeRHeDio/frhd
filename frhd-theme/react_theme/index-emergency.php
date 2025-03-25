<?php
/**
 * Emergency index file - doesn't use any custom functions
 */

// This file should show content even if the theme has errors
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fbfbfb;
            margin: 0;
            padding: 0;
        }
        header, main, footer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        a {
            color: #149ECA;
            text-decoration: none;
        }
        a:hover {
            color: #0e7895;
        }
        .post {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
        }
        h1, h2 {
            margin-top: 0;
        }
        footer {
            text-align: center;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body>
<header>
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
</header>

<main>
    <h2>Recent Posts</h2>
    
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="date"><?php the_date(); ?></div>
                <div class="excerpt"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>">Read more</a>
            </div>
        <?php endwhile; ?>
        
        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
            <div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
    
    <!-- Debug information -->
    <div style="margin-top: 50px; padding: 20px; background: #f5f5f5; border: 1px solid #ddd;">
        <h3>Theme Debug Info</h3>
        <p>Template directory: <?php echo get_template_directory(); ?></p>
        <p>Template directory URI: <?php echo get_template_directory_uri(); ?></p>
        <p>Stylesheet directory: <?php echo get_stylesheet_directory(); ?></p>
        <p>Template functions file exists: <?php echo file_exists(get_template_directory() . '/inc/template-functions.php') ? 'Yes' : 'No'; ?></p>
    </div>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html> 