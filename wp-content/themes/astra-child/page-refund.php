<?php
/**
 * Template Name: Cancellation & Refund Policy Page
 *
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main policy-page-template" role="main">
	<div class="policy-container">
		<h1><?php the_title(); ?></h1>
		<p><em>Last Updated: <?php echo get_the_modified_date('F j, Y'); ?></em></p>
		
		<hr style="margin: 24px 0; border: none; border-top: 1px solid #E2E8F0;">

		<h2>1. Order Cancellation Policy</h2>
		<p>Orders for spice products may be cancelled prior to dispatch by contacting our sales team via phone or WhatsApp. Once a shipment has been processed and dispatched from our warehouse, cancellations are no longer permitted.</p>

		<h2>2. Quality Assurance & Returns</h2>
		<p>As food products, spice powders are non-returnable once unsealed for hygiene and food safety reasons. However, if you receive a damaged package, incorrect product shipment, or manufacturing defect, please notify us within 48 hours of delivery with photographic evidence.</p>

		<h2>3. Refund Process</h2>
		<p>Approved refunds for damaged or defective shipments will be processed within 5-7 business days to the original payment method or credit note account as mutually agreed.</p>

		<h2>4. Contact Us</h2>
		<p>For return or refund requests, please email <a href="mailto:<?php echo esc_attr(madki_get_option('site_email', 'info@madkimasala.com')); ?>"><?php echo esc_html(madki_get_option('site_email', 'info@madkimasala.com')); ?></a>.</p>
	</div>
</main>

<?php get_footer(); ?>
