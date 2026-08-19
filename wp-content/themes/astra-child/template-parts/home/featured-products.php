<?php
/**
 * Featured Products Section - Horizontal Scroll-Snap Card Container
 *
 * @package Astra_Child
 */

if (!defined('ABSPATH')) {
    exit;
}

$section_title    = astra_child_get_field( 'featured_section_title' ) ?: __( 'Our Premium Selection', 'astra-child' );
$section_subtitle = astra_child_get_field( 'featured_section_subtitle' ) ?: __( 'Crafted from the finest spice farms across India', 'astra-child' );
$button_text      = astra_child_get_field( 'featured_product_button_text', __( 'View Product', 'astra-child' ) );

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
);
$loop = new WP_Query($args);
?>

<section id="featured-products" class="featured-products-section" style="padding: 70px 0; background-color: #F8FAFC;">
    <div class="ast-container">
        
        <!-- Section Header -->
        <div class="section-header-wrap" style="text-align: center; margin-bottom: 45px;">
            <span style="font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; color: #C0392B; text-transform: uppercase; display: block; margin-bottom: 8px;">
                <?php _e( 'B2B & Wholesale Range', 'astra-child' ); ?>
            </span>
            <h2 style="font-size: 2.4rem; font-weight: 800; color: #1E293B; margin: 0 0 10px 0;"><?php echo esc_html( $section_title ); ?></h2>
            <?php if ( $section_subtitle ) : ?>
                <p style="font-size: 1.05rem; color: #64748B; max-width: 600px; margin: 0 auto;"><?php echo esc_html( $section_subtitle ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($loop->have_posts()) : ?>
            <!-- Horizontal Scroll-Snap Container -->
            <div class="horizontal-cards-scroll" style="display: flex; gap: 24px; overflow-x: auto; scroll-snap-type: x mandatory; padding: 10px 5px 30px; -webkit-overflow-scrolling: touch;">
                <?php while ($loop->have_posts()) : $loop->the_post(); global $product; ?>
                    <div class="product-scroll-card" style="flex: 0 0 300px; scroll-snap-align: start; background: #FFF; border: 1px solid #E2E8F0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.25s ease, box-shadow 0.25s ease;">
                        
                        <!-- Thumbnail Wrapper -->
                        <div class="card-img-wrap" style="height: 240px; background-color: #FAFAFA; overflow: hidden; display: flex; align-items: center; justify-content: center; position: relative;">
                            <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: contain; padding: 16px;' ) ); ?>
                                <?php else : ?>
                                    <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #94A3B8;">No Image</div>
                                <?php endif; ?>
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body" style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                            <h3 style="font-size: 1.2rem; font-weight: 700; color: #1E293B; margin: 0 0 8px 0; line-height: 1.3;">
                                <a href="<?php the_permalink(); ?>" style="color: #1E293B; text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            <div style="font-size: 0.88rem; color: #64748B; margin-bottom: 20px; flex-grow: 1;">
                                <?php echo wp_trim_words( get_the_excerpt(), 14, '...' ); ?>
                            </div>

                            <!-- Red CTA Button -->
                            <div style="margin-top: auto;">
                                <a href="<?php the_permalink(); ?>" class="btn-primary" style="width: 100%;">
                                    <?php echo esc_html( $button_text ); ?>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: #94A3B8;"><?php _e( 'No published products found.', 'astra-child' ); ?></p>
        <?php endif; ?>

    </div>
</section>
