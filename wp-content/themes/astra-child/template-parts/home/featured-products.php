<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Directly query WooCommerce products
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
);
$loop = new WP_Query($args);
?>

<section id="featured-products" style="padding: 50px 0; background: #f9f9f9;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <h2 style="text-align: center; margin-bottom: 30px;">Featured Products Test</h2>
        
        <?php if ($loop->have_posts()) : ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <?php while ($loop->have_posts()) : $loop->the_post(); 
                    global $product;
                ?>
                    <div style="border: 1px solid #ddd; padding: 15px; background: #fff; text-align: center;">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo $product->get_image('woocommerce_thumbnail'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <p><?php echo $product->get_price_html(); ?></p>
                        <a href="<?php the_permalink(); ?>" style="display: inline-block; padding: 8px 15px; background: #333; color: #fff; text-decoration: none;">View Product</a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: red;">No published WooCommerce products found! Please go to WP Admin → Products → Add New to create products.</p>
        <?php endif; ?>
    </div>
</section>