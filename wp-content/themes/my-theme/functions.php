<?php
// Enqueue theme CSS
function custom_theme_assets() {
}
// Hook to enqueue scripts and styles
add_action('wp_enqueue_scripts', 'custom_theme_assets');

?>