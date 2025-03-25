<?php
/**
 * Debug file to check for PHP errors
 */
// Display all PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<h1>React Dev Blog Theme Debug</h1>';

// Check if template-functions.php exists and is accessible
$template_functions_path = get_template_directory() . '/inc/template-functions.php';
echo '<p>Template functions path: ' . $template_functions_path . '</p>';
echo '<p>File exists: ' . (file_exists($template_functions_path) ? 'Yes' : 'No') . '</p>';

// Check theme directory structure
echo '<h2>Theme Directory Structure</h2>';
echo '<pre>';
print_r(glob(get_template_directory() . '/*'));
echo '</pre>';

// Check WordPress template loading
echo '<h2>Template Hierarchy</h2>';
echo '<p>Current template: ' . get_page_template() . '</p>';

// Test a critical function
echo '<h2>Function Test</h2>';
if (function_exists('react_dev_blog_posted_on')) {
    echo '<p>react_dev_blog_posted_on() function exists</p>';
} else {
    echo '<p>react_dev_blog_posted_on() function does NOT exist</p>';
}

// Check if styles are loading
echo '<h2>Enqueued Styles</h2>';
global $wp_styles;
echo '<pre>';
print_r($wp_styles->queue);
echo '</pre>'; 