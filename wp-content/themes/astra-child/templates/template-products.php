<?php
/**
 * Template Name: Products Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="products-page-wrapper">
            
            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php _e('Our Premium Spices', 'astra-child'); ?></h1>
                <p class="page-subtitle"><?php _e('Discover our handpicked collection of authentic Indian spices', 'astra-child'); ?></p>
            </header>
            
            <!-- Product Filters (Optional) -->
            <div class="product-filters">
                <div class="filter-wrapper">
                    <select class="product-filter" aria-label="<?php esc_attr_e('Filter Products', 'astra-child'); ?>">
                        <option value="all"><?php _e('All Products', 'astra-child'); ?></option>
                        <option value="whole"><?php _e('Whole Spices', 'astra-child'); ?></option>
                        <option value="ground"><?php _e('Ground Spices', 'astra-child'); ?></option>
                        <option value="blends"><?php _e('Spice Blends', 'astra-child'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="products-grid">
                <?php
                // Query products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );
                
                $products_query = new WP_Query($args);
                
                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();
                        ?>
                        <article class="product-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="product-image">
                                    <?php the_post_thumbnail('astra-child-product', array('loading' => 'lazy')); ?>
                                    <?php if (function_exists('wc_get_product')) : ?>
                                        <?php $product = wc_get_product(get_the_ID()); ?>
                                        <?php if ($product && $product->is_on_sale()) : ?>
                                            <span class="product-badge sale"><?php _e('Sale', 'astra-child'); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <?php if (function_exists('wc_get_product')) : ?>
                                    <?php $product = wc_get_product(get_the_ID()); ?>
                                    <?php if ($product) : ?>
                                        <div class="product-price">
                                            <?php echo wp_kses_post($product->get_price_html()); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                                <div class="product-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="product-button">
                                    <?php _e('View Details', 'astra-child'); ?>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="no-products"><?php _e('No products found.', 'astra-child'); ?></p>
                    <?php
                endif;
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($products_query->max_num_pages > 1) : ?>
                <div class="pagination-wrapper">
                    <?php
                    echo paginate_links(array(
                        'total' => $products_query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
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