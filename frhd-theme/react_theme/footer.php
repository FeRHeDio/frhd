<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-info">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                </div>

                <nav class="footer-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
