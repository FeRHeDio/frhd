<?php
/**
 * Minimal index file for debugging
 */

// Include the minimal header
include(get_template_directory() . '/header-minimal.php');
?>

<div style="max-width: 1200px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h1 style="color: #149ECA;">React.dev Blog Theme - Minimal Test</h1>
    <p>This is a minimal test page to determine if the theme is functioning at the most basic level.</p>
    
    <?php if (have_posts()) : ?>
        <div style="margin-top: 30px;">
            <h2>Recent Posts</h2>
            <ul style="list-style-type: none; padding: 0;">
            <?php while (have_posts()) : the_post(); ?>
                <li style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
                    <h3><a href="<?php the_permalink(); ?>" style="color: #149ECA; text-decoration: none;"><?php the_title(); ?></a></h3>
                    <div><?php the_excerpt(); ?></div>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<footer style="text-align: center; margin-top: 50px; padding: 20px; color: #6b7280; font-size: 14px;">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
</footer>

<?php wp_footer(); ?> <!-- Don't forget to include this for plugins to work -->
</body>
</html> 