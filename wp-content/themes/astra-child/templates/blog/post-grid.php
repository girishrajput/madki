<?php
/**
 * Blog Post Grid Template Part
 *
 * @package Astra_Child
 */

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args  = array(
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'paged'          => $paged,
    'post_status'    => 'publish',
);

$blog_query = new WP_Query( $args );
?>

<section class="blog-grid-section">
    <div class="ast-container">
        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="blog-cards-grid">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('culinary-blog-card'); ?>>
                        
                        <div class="card-image-wrapper">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="card-content">
                            <span class="card-date"><?php echo get_the_date('M j, Y'); ?></span>
                            
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <p class="card-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 22, '...' ); ?>
                            </p>
                            
                            <a href="<?php the_permalink(); ?>" class="card-read-more">
                                Read Full Post <span class="arrow">&rarr;</span>
                            </a>
                        </div>

                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="no-posts-found">No posts found.</p>
        <?php endif; ?>
    </div>
</section>