<header>
    <div class="site-branding">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="custom-logo">
        </a>
    </div>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </nav>
</header>