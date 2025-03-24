<?php
/**
 * Template Name: Products Page
 */
get_header(); ?>

<div class="container">
    <h1>Vores Produkter</h1>
    
    <?php 
    // Vis alle produkter
    echo do_shortcode('[display_products]'); 
    ?>
</div>

<?php get_footer(); ?>