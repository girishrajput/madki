<?php
/**
 * Template Name: Shipping Policy Page
 *
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main policy-page-template" role="main">
	<div class="policy-container">
		<h1><?php the_title(); ?></h1>
		<p><em>Last Updated: <?php echo get_the_modified_date('F j, Y'); ?></em></p>
		
		<hr style="margin: 24px 0; border: none; border-top: 1px solid #E2E8F0;">

		<h2>1. Processing & Dispatch Time</h2>
		<p>All confirmed orders are processed and packed at our hygienic facility within 1 to 2 business days. Bulk or distributor orders are scheduled according to production batch schedules and logistics agreements.</p>

		<h2>2. Shipping Partners & Delivery Timelines</h2>
		<p>Standard domestic deliveries across India take between 3 to 7 business days depending on the destination state and region. Bulk distributor consignments are shipped via verified transport partners.</p>

		<h2>3. Freight Charges & Tracking</h2>
		<p>Shipping charges for retail orders are calculated at checkout. For wholesale and distributor orders, freight terms (FOB/CIF) are specified in your invoice. Tracking details will be shared via SMS, WhatsApp, or Email upon dispatch.</p>

		<h2>4. Contact Us</h2>
		<p>For shipping status updates or logistics inquiries, reach out to our team at <a href="mailto:<?php echo esc_attr(madki_get_option('site_email', 'info@madkimasala.com')); ?>"><?php echo esc_html(madki_get_option('site_email', 'info@madkimasala.com')); ?></a>.</p>
	</div>
</main>

<?php get_footer(); ?>
