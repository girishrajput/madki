<?php
/**
 * Front Page Template
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php if (trim(get_the_content()) !== '' || current_user_can('edit_post', get_the_ID())) : ?>
            <section class="front-page-editor-content">
                <div class="">
                    <div class="front-page-content">
                        <?php the_content(); ?>

                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Pages:', 'astra-child'),
                            'after'  => '</div>',
                        ));
                        ?>

                        <?php if (current_user_can('edit_post', get_the_ID())) : ?>
                            <div class="edit-link-wrapper">
                                <?php edit_post_link(__('Edit Page', 'astra-child'), '<p class="edit-link">', '</p>'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; endif; ?>
    
    <?php
    // Load homepage sections
    get_template_part('template-parts/home/hero');
    get_template_part('template-parts/home/about');
    get_template_part('template-parts/home/featured-products');
    get_template_part('template-parts/home/why-choose');
    get_template_part('template-parts/home/testimonials');
    get_template_part('template-parts/home/cta');
    get_template_part('template-parts/home/footer-cta');
    ?>
    
</main>

<?php get_footer(); ?>