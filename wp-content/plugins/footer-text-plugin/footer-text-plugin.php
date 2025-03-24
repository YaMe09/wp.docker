<?php
/*
Plugin Name: Footer Text Plugin
Author: Arein Hussein
Author URI: www.areinhussein.dk
Description: Adds text at bottom of posts.
Version: 1.0
*/
?>
<?php
// Function to add custom text to post content
function add_footer_text($content) {
    return $content . '<p>Custom footer text by Arein Hussein.</p>';
}
// Hook function to 'the_content'
add_filter('the_content', 'add_footer_text');
?>