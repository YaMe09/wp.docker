<?php
/*
Plugin Name: Footer Text Plugin
Author: Arein Hussein
Author URI: www.areinhussein.dk
Description: Adds text at bottom of posts.
Version: 1.0
*/
/ Produkt database (simplet array)
function get_products() {
    return array(
        array('id' => 1, 'name' => 'Produkt 1', 'price' => 99, 'image' => 'https://via.placeholder.com/150'),
        array('id' => 2, 'name' => 'Produkt 2', 'price' => 149, 'image' => 'https://via.placeholder.com/150'),
        array('id' => 3, 'name' => 'Produkt 3', 'price' => 199, 'image' => 'https://via.placeholder.com/150'),
        array('id' => 4, 'name' => 'Produkt 4', 'price' => 249, 'image' => 'https://via.placeholder.com/150')
    );
}

// Shortcode til at vise produkter
function display_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => -1
    ), $atts);
    
    $products = get_products();
    $output = '<div class="product-grid">';
    
    $count = 0;
    foreach ($products as $product) {
        if ($atts['limit'] != -1 && $count >= $atts['limit']) break;
        
        $output .= '
        <div class="product-card">
            <img src="' . $product['image'] . '" alt="' . $product['name'] . '">
            <h3>' . $product['name'] . '</h3>
            <p class="price">' . $product['price'] . ' kr</p>
            <button class="add-to-cart" data-id="' . $product['id'] . '">Tilføj til kurv</button>
        </div>';
        $count++;
    }
    
    $output .= '</div>';
    return $output;
}
add_shortcode('display_products', 'display_products_shortcode');

// Shortcode til indkøbskurv
function display_cart_shortcode() {
    $output = '<div id="shopping-cart">';
    $output .= '<div id="cart-items"></div>';
    $output .= '<p class="cart-total">Total: <span id="cart-total-amount">0</span> kr</p>';
    $output .= '</div>';
    return $output;
}
add_shortcode('display_cart', 'display_cart_shortcode');

// AJAX til at håndtere indkøbskurv
function handle_cart_ajax() {
    $product_id = intval($_POST['product_id']);
    $products = get_products();
    
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            wp_send_json_success($product);
            return;
        }
    }
    
    wp_send_json_error('Produkt ikke fundet');
}
add_action('wp_ajax_add_to_cart', 'handle_cart_ajax');
add_action('wp_ajax_nopriv_add_to_cart', 'handle_cart_ajax');