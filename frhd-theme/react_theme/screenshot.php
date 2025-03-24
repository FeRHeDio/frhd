<?php
/**
 * Generate a simple screenshot for the theme
 * PHP GD is required to run this script
 */

// Set the content type header
header('Content-Type: image/png');

// Create an 1200x900 image (WordPress recommended screenshot size)
$image = imagecreatetruecolor(1200, 900);

// Define colors
$background = imagecolorallocate($image, 23, 27, 47); // Dark blue background
$textColor = imagecolorallocate($image, 255, 255, 255); // White text
$accentColor = imagecolorallocate($image, 20, 158, 202); // React blue

// Fill the background
imagefill($image, 0, 0, $background);

// Draw a header bar
imagefilledrectangle($image, 0, 0, 1200, 60, imagecolorallocate($image, 255, 255, 255));

// Load the React logo if it exists
$logoPath = __DIR__ . '/images/react-logo.png';
if (file_exists($logoPath)) {
    $logo = imagecreatefrompng($logoPath);
    if ($logo) {
        // Copy the logo onto our image
        imagecopy($image, $logo, 30, 15, 0, 0, imagesx($logo), imagesy($logo));
    }
}

// Add theme title
$font = 5; // Built-in font
imagestring($image, $font, 70, 20, 'React.dev Blog Theme', imagecolorallocate($image, 20, 158, 202));

// Draw a blog post mock-up
imagefilledrectangle($image, 100, 200, 1100, 260, $accentColor);
imagestring($image, 5, 120, 220, 'React Blog', $textColor);

imagefilledrectangle($image, 100, 280, 1100, 350, imagecolorallocate($image, 255, 255, 255));
imagestring($image, 4, 120, 300, 'This blog is the official source for updates from the React team.', imagecolorallocate($image, 50, 50, 50));

// Draw post entries
$postY = 400;
for ($i = 0; $i < 3; $i++) {
    imagefilledrectangle($image, 100, $postY, 1100, $postY + 40, imagecolorallocate($image, 255, 255, 255));
    imagestring($image, 4, 120, $postY + 10, 'React v' . (19 - $i) . ' Release', imagecolorallocate($image, 50, 50, 50));

    imagefilledrectangle($image, 100, $postY + 50, 1100, $postY + 90, imagecolorallocate($image, 245, 245, 245));
    imagestring($image, 3, 120, $postY + 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', imagecolorallocate($image, 80, 80, 80));

    imagefilledrectangle($image, 120, $postY + 100, 200, $postY + 120, $accentColor);
    imagestring($image, 2, 130, $postY + 105, 'Read more', $textColor);

    $postY += 150;
}

// Add footer
imagefilledrectangle($image, 0, 850, 1200, 900, imagecolorallocate($image, 245, 245, 245));
imagestring($image, 3, 500, 870, '© 2025 React.dev Blog Theme', imagecolorallocate($image, 100, 100, 100));

// Output the image
imagepng($image);

// Free memory
imagedestroy($image);
if (isset($logo)) {
    imagedestroy($logo);
}

// Exit to prevent any other output
exit;
