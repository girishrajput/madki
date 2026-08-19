<?php
/**
 * Template Name: Terms & Conditions Page
 *
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main policy-page-template" role="main">
	<div class="policy-container">
		<h1><?php the_title(); ?></h1>
		<p><em>Last Updated: <?php echo get_the_modified_date('F j, Y'); ?></em></p>
		
		<hr style="margin: 24px 0; border: none; border-top: 1px solid #E2E8F0;">

		<h2>1. Terms of Agreement</h2>
		<p>By accessing or using the Madki Food website, placing product inquiries, or engaging in business transactions, you agree to comply with and be bound by these Terms & Conditions.</p>

		<h2>2. Business & Distributor Inquiries</h2>
		<p>Madki Food is primarily a spice manufacturer and B2B distributor supplier. All wholesale, bulk order quotes, product specifications, and pricing terms provided via email or WhatsApp are subject to confirmation upon final agreement.</p>

		<h2>3. Intellectual Property</h2>
		<p>All trademarks, logos, brand names, product packaging designs, photographs, and website content belong exclusively to Madki Food. Unauthorized reproduction or commercial misuse is strictly prohibited.</p>

		<h2>4. Limitation of Liability</h2>
		<p>Madki Food strives to ensure accurate product information, specifications, and nutritional details. However, we reserve the right to revise product specifications or availability as required by agricultural batch variations or regulatory compliance.</p>

		<h2>5. Governing Law</h2>
		<p>These terms shall be governed by and construed in accordance with the laws of India, with legal jurisdiction in Jaipur, Rajasthan.</p>
	</div>
</main>

<?php get_footer(); ?>
