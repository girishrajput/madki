<?php
/**
 * Template Name: Default Template
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="default-page-wrapper">
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                $display_title = astra_child_get_field( 'default_page_title', get_the_title() );
                $subtitle      = astra_child_get_field( 'default_page_subtitle', get_the_excerpt() );
                ?>
                
                <!-- Page Header -->
                <header class="page-header">
                    <h1 class="page-title"><?php echo esc_html( $display_title ); ?></h1>
                    <?php if ( $subtitle ) : ?>
                        <p class="page-subtitle"><?php echo esc_html( $subtitle ); ?></p>
                    <?php endif; ?>
                </header>
                
                <!-- Page Content -->
                <div class="page-content">
                    <?php the_content(); ?>
                    
                    <?php
                    // Check for page breaks
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'astra-child'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>
                
                <!-- Edit Link -->
                <?php if (current_user_can('edit_post', get_the_ID())) : ?>
                    <div class="edit-link-wrapper">
                        <?php edit_post_link(__('Edit Page', 'astra-child'), '<span class="edit-link">', '</span>'); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Comments -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            <?php endwhile; endif; ?>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>
