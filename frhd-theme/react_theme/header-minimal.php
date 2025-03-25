<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        body {
            background-color: #fbfbfb !important;
            color: #23272F;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            margin: 0;
            padding: 0;
        }
        a {
            color: #149ECA;
            text-decoration: none;
        }
        a:hover {
            color: #0e7895;
        }
        .minimal-header {
            background-color: #ffffff;
            border-bottom: 1px solid #EBECF0;
            padding: 15px 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .minimal-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .site-branding {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .site-logo {
            width: 24px;
            height: 24px;
        }
        .site-title {
            font-weight: 500;
            font-size: 18px;
            margin: 0;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header class="minimal-header">
        <div class="container">
            <div class="minimal-header-inner">
                <div class="site-branding">
                    <img class="site-logo" src="<?php echo esc_url(get_template_directory_uri() . '/images/react-logo.png'); ?>" alt="React Logo">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </header>
</body>
</html> 