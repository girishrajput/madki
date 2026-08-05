<?php
/**
 * Posts Page Template (Blog Archive)
 * 
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main blog-list-page" role="main">

    <?php 
    // 1. Load Hero Banner
    get_template_part( 'template-parts/blog/hero' );

    // 2. Load Blog Grid
    get_template_part( 'template-parts/blog/post-grid' );
    ?>

</main>

<?php get_footer(); ?>