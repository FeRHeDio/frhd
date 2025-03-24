<?php
/**
 * Search form template
 *
 * @package React.dev_Blog
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'react-dev-blog'); ?></label>
    <div class="search-form-container">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'react-dev-blog'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <span class="screen-reader-text"><?php echo esc_html_x('Search', 'submit button', 'react-dev-blog'); ?></span>
        </button>
    </div>
</form>
