<?php
/**
 * Template Name: About Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="about-page-wrapper">
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                <!-- Page Header -->
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="page-subtitle"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </header>
                
                <!-- Page Content -->
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
                
            <?php endwhile; endif; ?>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>