<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <h1><?php bloginfo('name'); ?></h1>
    <span><?php bloginfo('description'); ?></span>
    <nav class="main-navigation">
        <ul>
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/products'); ?>">Products</a></li>
            <li><a href="<?php echo home_url('/cart'); ?>">Cart</a></li>
        </ul>
    </nav>
</header>