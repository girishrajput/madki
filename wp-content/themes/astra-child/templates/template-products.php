<?php
/**
 * Template Name: Products Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header();
$page_title = astra_child_get_field( 'products_page_title', get_the_title() );
$page_subtitle = astra_child_get_field( 'products_page_subtitle', get_the_excerpt() );
$filter_label = astra_child_get_field( 'products_filter_label', __( 'Filter Products', 'astra-child' ) );
$filters = astra_child_get_repeater_rows( 'products_filters' );
$products_count = absint( astra_child_get_field( 'products_per_page', 12 ) );
$sale_badge = astra_child_get_field( 'products_sale_badge', __( 'Sale', 'astra-child' ) );
$button_text = astra_child_get_field( 'products_button_text', __( 'View Details', 'astra-child' ) );
$previous_text = astra_child_get_field( 'products_previous_text', __( 'Previous', 'astra-child' ) );
$next_text = astra_child_get_field( 'products_next_text', __( 'Next', 'astra-child' ) );
$empty_text = astra_child_get_field( 'products_empty_text', __( 'No products found.', 'astra-child' ) );
$paged = max( 1, absint( get_query_var( 'paged' ) ), absint( get_query_var( 'page' ) ) );
?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="products-page-wrapper">
            
            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php echo esc_html( $page_title ); ?></h1>
                <?php if ( $page_subtitle ) : ?><p class="page-subtitle"><?php echo esc_html( $page_subtitle ); ?></p><?php endif; ?>
            </header>
            
            <!-- Product Filters (Optional) -->
            <div class="product-filters">
                <div class="filter-wrapper">
                    <select class="product-filter" aria-label="<?php echo esc_attr( $filter_label ); ?>">
                        <?php foreach ( $filters as $filter ) : ?>
                            <option value="<?php echo esc_attr( sanitize_title( $filter['value'] ?? '' ) ); ?>"><?php echo esc_html( $filter['label'] ?? '' ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="products-grid">
                <?php
                // Query products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => $products_count ? $products_count : 12,
                    'paged' => $paged,
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
                                            <span class="product-badge sale"><?php echo esc_html( $sale_badge ); ?></span>
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
                                    <?php echo esc_html( $button_text ); ?>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="no-products"><?php echo esc_html( $empty_text ); ?></p>
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
                        'current' => $paged,
                        'prev_text' => '&laquo; ' . esc_html( $previous_text ),
                        'next_text' => esc_html( $next_text ) . ' &raquo;',
                    ));
                    ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>
