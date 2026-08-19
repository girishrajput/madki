<?php
/**
 * Dynamic 5-Column Footer Template for Madki Food
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch Dynamic Theme Options
$gst_number          = madki_get_option( 'gst_number', '08AAAAA0000A1Z5' );
$msme_number         = madki_get_option( 'msme_number', 'UDYAM-RJ-14-0000000' );
$startup_number      = madki_get_option( 'startup_number', 'DIPP00000' );
$phone               = madki_get_option( 'site_phone', '+91 98765 43293' );
$whatsapp            = madki_get_option( 'site_whatsapp', '919876543210' );
$email               = madki_get_option( 'site_email', 'info@madkimasala.com' );
$address             = madki_get_option( 'site_address', '12, Spice Avenue, Industrial Area, Jaipur, Rajasthan 302001, India' );

$footer_logo         = madki_get_option( 'footer_logo' );
$footer_about_text   = madki_get_option( 'footer_about_text', 'Madki Masala delivers authentic, pure Indian spices and premium masala blends crafted with care for families, food businesses, and regional distributors.' );

$copyright_left      = madki_get_option( 'copyright_left_text', '© ' . date( 'Y' ) . ' Madki Food. All Rights Reserved.' );
$copyright_right     = madki_get_option( 'copyright_right_text', 'Developed by Veda' );

// Replace {year} placeholder dynamically if present
$copyright_left      = str_replace( '{year}', date( 'Y' ), $copyright_left );

$social_fb           = madki_get_option( 'social_facebook' );
$social_ig           = madki_get_option( 'social_instagram' );
$social_yt           = madki_get_option( 'social_youtube' );
$social_li           = madki_get_option( 'social_linkedin' );
$social_tw           = madki_get_option( 'social_twitter' );
?>

	<?php astra_content_bottom(); ?>
	</div></div><!-- #content -->

	<?php astra_content_after(); ?>
	<?php astra_footer_before(); ?>

	<footer id="colophon" class="site-footer madki-custom-footer" role="contentinfo">
		<div class="madki-footer-container">
			<div class="madki-footer-grid">
				
				<!-- Column 1: Dynamic Logo & Brand Intro -->
				<div class="footer-col col-about">
					<?php if ( $footer_logo ) : ?>
						<img src="<?php echo esc_url( $footer_logo ); ?>" alt="Madki Food" class="footer-logo" loading="lazy">
					<?php else : ?>
						<h4>Madki Food</h4>
					<?php endif; ?>

					<p class="footer-about-text">
						<?php echo esc_html( $footer_about_text ); ?>
					</p>

					<?php if ( $gst_number || $msme_number || $startup_number ) : ?>
						<div class="footer-business-badges">
							<?php if ( $gst_number ) : ?><span class="badge-item">GST: <?php echo esc_html( $gst_number ); ?></span><?php endif; ?>
							<?php if ( $msme_number ) : ?><span class="badge-item">MSME: <?php echo esc_html( $msme_number ); ?></span><?php endif; ?>
							<?php if ( $startup_number ) : ?><span class="badge-item">Startup India</span><?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- Column 2: Quick Links (Nav Menu / Dynamic Fallback) -->
				<div class="footer-col col-quicklinks">
					<h4>Quick Links</h4>
					<?php
					if ( has_nav_menu( 'footer_quick_links' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'footer_quick_links',
							'container'      => false,
							'menu_class'     => 'footer-links-list',
							'depth'          => 1,
						) );
					} else {
						?>
						<ul class="footer-links-list">
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
							<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a></li>
							<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
							<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a></li>
							<li><a href="<?php echo esc_url( home_url( '/career/' ) ); ?>">Career</a></li>
							<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>
						</ul>
						<?php
					}
					?>
				</div>

				<!-- Column 3: Dynamic Product Categories -->
				<div class="footer-col col-categories">
					<h4>Product Categories</h4>
					<ul class="footer-links-list">
						<?php
						$categories = get_terms( array(
							'taxonomy'   => 'product_cat',
							'hide_empty' => false,
							'exclude'    => get_option( 'default_product_cat' ),
						) );
						if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
							foreach ( $categories as $cat ) {
								echo '<li><a href="' . esc_url( get_term_link( $cat ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
							}
						} else {
							echo '<li><a href="' . esc_url( home_url( '/shop/' ) ) . '">Indian Spices</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/shop/' ) ) . '">Garam Masala</a></li>';
						}
						?>
					</ul>
				</div>

				<!-- Column 4: Madki Policies (Nav Menu / Dynamic Fallback) -->
				<div class="footer-col col-policies">
					<h4>Madki Policies</h4>
					<?php
					if ( has_nav_menu( 'footer_policy_links' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'footer_policy_links',
							'container'      => false,
							'menu_class'     => 'footer-links-list',
							'depth'          => 1,
						) );
					} else {
						?>
						<ul class="footer-links-list">
							<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a></li>
							<li><a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>">Terms &amp; Conditions</a></li>
							<li><a href="<?php echo esc_url( home_url( '/shipping-policy/' ) ); ?>">Shipping Policy</a></li>
							<li><a href="<?php echo esc_url( home_url( '/refund-and-cancellation-policy/' ) ); ?>">Cancellation &amp; Refund</a></li>
						</ul>
						<?php
					}
					?>
				</div>

				<!-- Column 5: Dynamic Contact Info & Socials -->
				<div class="footer-col col-contact">
					<h4>Contact Information</h4>
					<div class="footer-contact-info">
						<?php if ( $address ) : ?>
							<p><span>📍</span> <span><?php echo esc_html( $address ); ?></span></p>
						<?php endif; ?>
						<?php if ( $phone ) : ?>
							<p><span>📞</span> <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"><?php echo esc_html( $phone ); ?></a></p>
						<?php endif; ?>
						<?php if ( $whatsapp ) : ?>
							<p><span>💬</span> <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $whatsapp); ?>" target="_blank" rel="noopener noreferrer">WhatsApp Sales</a></p>
						<?php endif; ?>
						<?php if ( $email ) : ?>
							<p><span>✉️</span> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
						<?php endif; ?>
					</div>

					<!-- Dynamic Social Icons Row -->
					<?php if ( $social_fb || $social_ig || $social_yt || $social_li || $social_tw ) : ?>
						<div class="social-icons-row">
							<?php if ( $social_fb ) : ?><a href="<?php echo esc_url( $social_fb ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Facebook">FB</a><?php endif; ?>
							<?php if ( $social_ig ) : ?><a href="<?php echo esc_url( $social_ig ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Instagram">IG</a><?php endif; ?>
							<?php if ( $social_yt ) : ?><a href="<?php echo esc_url( $social_yt ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="YouTube">YT</a><?php endif; ?>
							<?php if ( $social_li ) : ?><a href="<?php echo esc_url( $social_li ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="LinkedIn">IN</a><?php endif; ?>
							<?php if ( $social_tw ) : ?><a href="<?php echo esc_url( $social_tw ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="X Twitter">X</a><?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

		<!-- Dynamic Two-Sided Copyright Bar -->
		<div class="madki-copyright-bar">
			<div class="madki-footer-container">
				<div class="copyright-flex">
					<div class="copyright-left">
						<p><?php echo esc_html( $copyright_left ); ?></p>
					</div>
					<div class="copyright-right">
						<p><?php echo wp_kses_post( $copyright_right ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php astra_footer_after(); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
