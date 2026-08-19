<?php
/**
 * Custom WooCommerce Single Product Template for Madki Food
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main id="main" class="site-main product-detail-page" role="main">
	<div class="ast-container" style="padding-top: 40px; padding-bottom: 80px;">

		<?php while ( have_posts() ) : the_post();
			global $product;
			$product_id = get_the_ID();

			$price_mode    = get_field( 'price_display_mode', $product_id ) ?: 'inquiry';
			$custom_notice = get_field( 'inquiry_custom_notice', $product_id ) ?: 'For bulk pricing & distributorship, contact us via WhatsApp or Email.';
			$nutrition     = get_field( 'nutrition_facts', $product_id );
			$pkg_sizes     = get_field( 'packaging_sizes', $product_id ) ?: '50g, 100g, 200g, 500g, 1kg Bulk Pack';
			$shelf_life    = get_field( 'shelf_life', $product_id ) ?: '12 Months from Manufacturing';
			$storage       = get_field( 'storage_instructions', $product_id ) ?: 'Store in a cool, dry place away from direct sunlight.';

			$phone_raw     = preg_replace('/[^0-9]/', '', madki_get_option('site_whatsapp', '919876543210'));
			$site_email    = madki_get_option('site_email', 'info@madkimasala.com');
			$wa_msg        = rawurlencode("Hi! I am interested in distributorship/bulk order for " . get_the_title() . ".");
		?>

			<!-- Product Details 2-Column Grid -->
			<div class="product-detail-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: flex-start;">
				
				<!-- Left Column: Enlarged Product Image Display -->
				<div class="product-gallery-container" style="background: #FFF; padding: 20px; border-radius: 16px; border: 1px solid #E2E8F0; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="main-image-wrapper" style="width: 100%; height: 440px; overflow: hidden; border-radius: 12px; display: flex; align-items: center; justify-content: center; background-color: #FAFAFA;">
							<?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: 100%; object-fit: contain;', 'alt' => get_the_title() ) ); ?>
						</div>
					<?php else : ?>
						<div class="image-placeholder" style="height: 440px; background: #F1F5F9; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #94A3B8;">
							<span>No Product Image</span>
						</div>
					<?php endif; ?>
				</div>

				<!-- Right Column: Product Meta & B2B Inquiry -->
				<div class="product-info-container">
					<div class="product-breadcrumbs" style="font-size: 0.88rem; color: #64748B; margin-bottom: 12px;">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #64748B; text-decoration: none;">Home</a> &gt; 
						<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" style="color: #64748B; text-decoration: none;">Products</a> &gt; 
						<span style="color: #1E293B; font-weight: 600;"><?php the_title(); ?></span>
					</div>

					<h1 class="product-title" style="font-size: 2.4rem; font-weight: 800; color: #1E293B; margin: 0 0 12px 0; line-height: 1.2;"><?php the_title(); ?></h1>

					<!-- Product Short Description -->
					<div class="product-short-description" style="font-size: 1rem; color: #475569; line-height: 1.7; margin-bottom: 24px;">
						<?php if ( has_excerpt() ) : ?>
							<?php the_excerpt(); ?>
						<?php else : ?>
							<p><?php echo wp_trim_words( get_the_content(), 40 ); ?></p>
						<?php endif; ?>
					</div>

					<!-- Packaging & Product Specs -->
					<div class="product-specs-card" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
						<div style="margin-bottom: 10px; font-size: 0.92rem; color: #334155;">
							<strong>📦 Available Packaging:</strong> <span><?php echo esc_html( $pkg_sizes ); ?></span>
						</div>
						<div style="margin-bottom: 10px; font-size: 0.92rem; color: #334155;">
							<strong>⏳ Shelf Life:</strong> <span><?php echo esc_html( $shelf_life ); ?></span>
						</div>
						<div style="font-size: 0.92rem; color: #334155;">
							<strong>☀️ Storage:</strong> <span><?php echo esc_html( $storage ); ?></span>
						</div>
					</div>

					<!-- Pricing & B2B Inquiry Section -->
					<?php if ( 'display' === $price_mode && $product && $product->get_price() ) : ?>
						<div class="price-display-wrapper" style="margin-bottom: 24px;">
							<span class="price-amount" style="font-size: 2rem; font-weight: 800; color: #C0392B;">
								<?php echo $product->get_price_html(); ?>
							</span>
						</div>
					<?php endif; ?>

					<!-- Distributor Inquiry CTAs (Option B - Recommended for B2B) -->
					<div class="distributor-inquiry-box">
						<p class="inquiry-notice-text">💬 <?php echo esc_html( $custom_notice ); ?></p>
						<div class="inquiry-actions-row">
							<a href="https://wa.me/<?php echo esc_attr( $phone_raw ); ?>?text=<?php echo $wa_msg; ?>" target="_blank" rel="noopener noreferrer" class="inquiry-btn-whatsapp">
								💬 Order via WhatsApp
							</a>
							<a href="mailto:<?php echo esc_attr( $site_email ); ?>?subject=Distributor Inquiry: <?php echo rawurlencode( get_the_title() ); ?>" class="inquiry-btn-email">
								✉️ Inquiry via Email
							</a>
							<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">
								📞 Contact Sales Team
							</a>
						</div>
					</div>

				</div>
			</div>

			<!-- Bottom Section: 3-Column Nutrition Information Table & Full Description -->
			<div class="product-bottom-section" style="margin-top: 60px;">
				
				<!-- 3-Column Nutrition Table -->
				<?php if ( ! empty( $nutrition ) && is_array( $nutrition ) ) : ?>
					<div class="nutrition-table-wrapper">
						<h3 class="nutrition-table-title">🥗 Nutrition Information</h3>
						<table class="nutrition-table">
							<thead>
								<tr>
									<th>Nutrient / Type</th>
									<th>Value</th>
									<th>Parameter / Unit</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $nutrition as $row ) :
									$type = isset( $row['type'] ) ? $row['type'] : '';
									$val  = isset( $row['value'] ) ? $row['value'] : '';
									$param = isset( $row['parameter'] ) ? $row['parameter'] : '';
								?>
									<tr>
										<td><strong><?php echo esc_html( $type ); ?></strong></td>
										<td><?php echo esc_html( $val ); ?></td>
										<td><?php echo esc_html( $param ); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php else : ?>
					<!-- Default Standard Nutrition Information -->
					<div class="nutrition-table-wrapper">
						<h3 class="nutrition-table-title">🥗 Nutrition Facts (Per 100g Approx.)</h3>
						<table class="nutrition-table">
							<thead>
								<tr>
									<th>Nutrient / Type</th>
									<th>Value</th>
									<th>Parameter / Unit</th>
								</tr>
							</thead>
							<tbody>
								<tr><td><strong>Energy</strong></td><td>380</td><td>kcal</td></tr>
								<tr><td><strong>Protein</strong></td><td>12.5</td><td>g</td></tr>
								<tr><td><strong>Carbohydrates</strong></td><td>55.0</td><td>g</td></tr>
								<tr><td><strong>Fat</strong></td><td>14.0</td><td>g</td></tr>
								<tr><td><strong>Dietary Fiber</strong></td><td>22.0</td><td>g</td></tr>
							</tbody>
						</table>
					</div>
				<?php endif; ?>

				<!-- Full Product Description -->
				<div class="full-description-card" style="background: #FFF; border: 1px solid #E2E8F0; border-radius: 12px; padding: 32px; margin-top: 30px;">
					<h3 style="font-size: 1.4rem; font-weight: 700; color: #1E293B; margin-top: 0; margin-bottom: 16px;">Product Overview &amp; Quality Standard</h3>
					<div style="font-size: 1rem; color: #475569; line-height: 1.8;">
						<?php the_content(); ?>
					</div>
				</div>

			</div>

		<?php endwhile; ?>

	</div>
</main>

<?php get_footer(); ?>
