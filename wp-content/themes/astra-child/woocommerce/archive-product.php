<?php
/**
 * Custom WooCommerce Archive / Category Listing Template
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main id="main" class="site-main product-archive-page" role="main" style="background-color: #F8FAFC; padding-bottom: 90px;">

	<!-- Archive Hero Banner -->
	<section class="archive-hero-section" style="background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%); color: #FFF; padding: 60px 20px; text-align: center;">
		<div class="ast-container">
			<h1 style="font-size: 2.8rem; font-weight: 800; color: #FFF !important; margin-bottom: 10px;">
				<?php if ( is_product_category() ) : ?>
					<?php single_term_title(); ?>
				<?php else : ?>
					<?php _e( 'Our Spice Selection & Wholesale Products', 'astra-child' ); ?>
				<?php endif; ?>
			</h1>
			<p style="font-size: 1.05rem; color: #94A3B8; max-width: 640px; margin: 0 auto;">
				<?php _e( 'Pure Indian Spices and Premium Masala Blends crafted for household kitchens and commercial distributors.', 'astra-child' ); ?>
			</p>
		</div>
	</section>

	<div class="ast-container" style="padding-top: 50px;">
		
		<!-- Category Filter Tabs -->
		<div class="category-filter-nav" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-bottom: 40px;">
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="filter-tab <?php echo ! is_product_category() ? 'active' : ''; ?>" style="padding: 8px 20px; border-radius: 20px; background: <?php echo ! is_product_category() ? '#C0392B' : '#FFF'; ?>; color: <?php echo ! is_product_category() ? '#FFF' : '#334155'; ?>; text-decoration: none; font-weight: 600; font-size: 0.9rem; border: 1px solid #E2E8F0;">
				All Products
			</a>
			<?php
			$categories = get_terms( array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
				'exclude'    => get_option( 'default_product_cat' ),
			) );
			if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
				foreach ( $categories as $cat ) {
					$is_active = is_product_category( $cat->slug );
					echo '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="filter-tab ' . ( $is_active ? 'active' : '' ) . '" style="padding: 8px 20px; border-radius: 20px; background: ' . ( $is_active ? '#C0392B' : '#FFF' ) . '; color: ' . ( $is_active ? '#FFF' : '#334155' ) . '; text-decoration: none; font-weight: 600; font-size: 0.9rem; border: 1px solid #E2E8F0;">' . esc_html( $cat->name ) . '</a>';
				}
			}
			?>
		</div>

		<!-- Product Cards Grid -->
		<?php if ( have_posts() ) : ?>
			<div class="products-grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
				<?php while ( have_posts() ) : the_post(); global $product; ?>
					<div class="product-card-item" style="background: #FFF; border: 1px solid #E2E8F0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.25s ease, box-shadow 0.25s ease;">
						
						<!-- Card Thumbnail -->
						<div class="card-thumb-wrapper" style="height: 240px; background-color: #FAFAFA; overflow: hidden; display: flex; align-items: center; justify-content: center;">
							<a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: contain; padding: 16px;' ) ); ?>
								<?php else : ?>
									<div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #CBD5E1;">No Image</div>
								<?php endif; ?>
							</a>
						</div>

						<!-- Card Content -->
						<div class="card-body-wrapper" style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
							<h3 class="card-product-title" style="font-size: 1.25rem; font-weight: 700; color: #1E293B; margin: 0 0 10px 0;">
								<a href="<?php the_permalink(); ?>" style="color: #1E293B; text-decoration: none;"><?php the_title(); ?></a>
							</h3>
							
							<div class="card-excerpt-text" style="font-size: 0.9rem; color: #64748B; line-height: 1.6; margin-bottom: 20px; flex-grow: 1;">
								<?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
							</div>

							<!-- Card Action CTA -->
							<div class="card-action-box" style="margin-top: auto;">
								<a href="<?php the_permalink(); ?>" class="btn-primary" style="width: 100%;">
									View Product &amp; Inquiry
								</a>
							</div>
						</div>

					</div>
				<?php endwhile; ?>
			</div>

			<!-- Pagination -->
			<div class="archive-pagination" style="text-align: center; margin-top: 50px;">
				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '&laquo; Prev', 'astra-child' ),
					'next_text' => __( 'Next &raquo;', 'astra-child' ),
				) ); ?>
			</div>

		<?php else : ?>
			<div style="text-align: center; padding: 60px 20px; background: #FFF; border-radius: 16px; border: 1px dashed #CBD5E1;">
				<h3>No products found</h3>
				<p>There are no products available in this category at the moment.</p>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php get_footer(); ?>
