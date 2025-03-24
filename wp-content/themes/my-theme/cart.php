<?php
/**
 * Template Name: Cart Page
 */
get_header(); ?>

<div class="container">
    <h1>Din Indkøbskurv</h1>
    
    <?php 
    // Vis indkøbskurv
    echo do_shortcode('[display_cart]'); 
    ?>
</div>

<?php get_footer(); ?>