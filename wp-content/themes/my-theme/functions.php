<?php
// Enqueue theme CSS
function custom_theme_assets() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('shop-style', get_template_directory_uri() . '/css/shop.css');
    
    // Tilføj JavaScript
    wp_enqueue_script('shop-script', get_template_directory_uri() . '/js/shop.js', array('jquery'), '1.0', true);
    
    // Localize script for AJAX
    wp_localize_script('shop-script', 'shop_vars', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');

// Registrer menuer
function register_shop_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'text_domain')
    ));
}
add_action('init', 'register_shop_menus');