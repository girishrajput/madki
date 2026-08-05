<?php
/**
 * Blog Post Grid Template Part
 *
 * @package Astra_Child
 */

// 1. Get current page number for pagination
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

// 2. Setup WP Query parameters
$args = array(
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
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'culinary-blog-card' ); ?>>
                        
                        <!-- Featured Image -->
                        <div class="card-image-wrapper">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>

                        <!-- Card Content -->
                        <div class="card-content">
                            <span class="card-date"><?php echo get_the_date( 'M j, Y' ); ?></span>
                            
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <p class="card-excerpt">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?>
                            </p>
                            
                            <a href="<?php the_permalink(); ?>" class="card-read-more">
                                Read Full Post <span class="arrow">&rarr;</span>
                            </a>
                        </div>

                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="blog-pagination">
                <?php
                echo paginate_links( array(
                    'total'        => $blog_query->max_num_pages,
                    'current'      => $paged,
                    'prev_text'    => '&laquo; Previous',
                    'next_text'    => 'Next &raquo;',
                    'type'         => 'plain',
                ) );
                ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <div class="no-posts-found">
                <p>No blog posts found.</p>
            </div>

        <?php endif; ?>
    </div>
</section>