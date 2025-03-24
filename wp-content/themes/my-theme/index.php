<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<div class="container">
    <h1>Velkommen til vores webshop</h1>
    <p>Denne side viser vores populære produkter</p>
    
    <?php 
    // Vis 3 tilfældige produkter på forsiden
    echo do_shortcode('[display_products limit="3"]'); 
    ?>
</div>

<?php get_footer(); ?>