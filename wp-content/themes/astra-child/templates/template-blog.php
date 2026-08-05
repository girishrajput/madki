<?php
/**
 * Template Name: Blog Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="blog-page-wrapper">
            
            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php _e('Our Blog', 'astra-child'); ?></h1>
                <p class="page-subtitle"><?php _e('Stories, recipes, and insights from our spice journey', 'astra-child'); ?></p>
            </header>
            
            <!-- Blog Grid -->
            <div class="blog-grid">
                <?php
                // Query blog posts
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                    'post_status' => 'publish',
                );
                
                $blog_query = new WP_Query($args);
                
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                        ?>
                        <article class="blog-card" <?php post_class(); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', array('loading' => 'lazy')); ?>
                                    </a>
                                    <?php if (has_category()) : ?>
                                        <span class="blog-category"><?php echo esc_html(get_the_category()[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="post-date">
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </span>
                                    <span class="post-author">
                                        <?php _e('by', 'astra-child'); ?> <?php the_author_posts_link(); ?>
                                    </span>
                                </div>
                                
                                <h3 class="blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="blog-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php _e('Read More', 'astra-child'); ?>
                                    <span class="arrow">→</span>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="no-posts"><?php _e('No blog posts found.', 'astra-child'); ?></p>
                    <?php
                endif;
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($blog_query->max_num_pages > 1) : ?>
                <div class="pagination-wrapper">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('&laquo; Previous', 'astra-child'),
                        'next_text' => __('Next &raquo;', 'astra-child'),
                    ));
                    ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>