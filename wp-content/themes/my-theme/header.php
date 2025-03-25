<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?> <!-- WordPress head hook -->
</head>
<body <?php body_class(); ?>>
<header>
    
    <span><?php bloginfo('description'); ?></span> <!-- Tagline -->
    
    <nav  class="mainNav">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
            <li><a href="<?php echo esc_url(home_url('/product')); ?>">Product</a></li>
            <li><a href="<?php echo esc_url(home_url('/cart')); ?>">Cart</a></li>
        </ul>
    </nav>
</header>