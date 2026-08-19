<?php
/**
 * Template Name: Privacy Policy Page
 *
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main policy-page-template" role="main">
	<div class="policy-container">
		<h1><?php the_title(); ?></h1>
		<p><em>Last Updated: <?php echo get_the_modified_date('F j, Y'); ?></em></p>
		
		<hr style="margin: 24px 0; border: none; border-top: 1px solid #E2E8F0;">

		<h2>1. Introduction</h2>
		<p>Welcome to Madki Food. We value your privacy and are committed to protecting your personal data. This privacy policy informs you about how we collect, handle, and safeguard your information when you visit our website or communicate with our business and distribution sales team.</p>

		<h2>2. Information We Collect</h2>
		<p>We may collect information including your name, company name, phone number, WhatsApp contact, email address, shipping/billing address, GST number, and business details provided during distributor inquiries or contact form submissions.</p>

		<h2>3. How We Use Your Information</h2>
		<p>The information collected is strictly used for fulfilling business orders, processing dealership inquiries, providing customer support, issuing tax invoices, and communicating product updates.</p>

		<h2>4. Data Protection & Security</h2>
		<p>We implement robust physical, technical, and managerial security procedures to prevent unauthorized access, disclosure, alteration, or loss of your personal and business information.</p>

		<h2>5. Contact Us</h2>
		<p>If you have any questions regarding this Privacy Policy, please contact us at <a href="mailto:<?php echo esc_attr(madki_get_option('site_email', 'info@madkimasala.com')); ?>"><?php echo esc_html(madki_get_option('site_email', 'info@madkimasala.com')); ?></a>.</p>
	</div>
</main>

<?php get_footer(); ?>
