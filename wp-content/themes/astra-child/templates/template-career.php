<?php
/**
 * Template Name: Career Page
 * 
 * @package Astra_Child
 */

get_header();

$args = array(
	'post_type'      => 'career',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$career_query = new WP_Query( $args );
?>

<main id="main" class="site-main career-page-template" role="main">

	<!-- Hero Header -->
	<section class="career-hero-section">
		<div class="ast-container">
			<h1 class="career-hero-title"><?php _e( 'Build Your Career with Madki Food', 'astra-child' ); ?></h1>
			<p style="font-size: 1.1rem; max-width: 680px; margin: 0 auto; color: #CBD5E1;">
				<?php _e( 'Join our passionate team bringing pure, authentic Indian spice traditions to kitchens across India.', 'astra-child' ); ?>
			</p>
		</div>
	</section>

	<!-- Career Openings Grid -->
	<section class="career-grid-section">
		<div class="career-container">
			<?php if ( $career_query->have_posts() ) : ?>
				
				<?php while ( $career_query->have_posts() ) : $career_query->the_post();
					$department    = get_field( 'job_department' ) ?: 'Operations';
					$location      = get_field( 'job_location' ) ?: 'Jaipur, Rajasthan';
					$type          = get_field( 'job_type' ) ?: 'Full-Time';
					$experience    = get_field( 'job_experience' ) ?: '1-3 Years';
					$description   = get_field( 'job_description' ) ?: get_the_excerpt();
					$requirements  = get_field( 'job_requirements' );
					$extra_info    = get_field( 'job_additional_info' );
					$contact_email = get_field( 'job_contact_email' ) ?: 'careers@madkimasala.com';
					$contact_phone = get_field( 'job_contact_phone' ) ?: '+919876543210';
				?>
					<article id="job-<?php the_ID(); ?>" class="job-card">
						<div class="job-card-header">
							<div>
								<h2 class="job-title"><?php the_title(); ?></h2>
							</div>
							<div class="job-badges-row">
								<span class="job-badge badge-dept"><?php echo esc_html( $department ); ?></span>
								<span class="job-badge badge-type"><?php echo esc_html( $type ); ?></span>
							</div>
						</div>

						<div class="job-meta-row">
							<span>📍 <?php echo esc_html( $location ); ?></span>
							<span>💼 Experience: <?php echo esc_html( $experience ); ?></span>
						</div>

						<?php if ( $description ) : ?>
							<div class="job-description">
								<h4 class="job-section-title"><?php _e( 'Job Description', 'astra-child' ); ?></h4>
								<p><?php echo nl2br( esc_html( $description ) ); ?></p>
							</div>
						<?php endif; ?>

						<?php if ( $requirements ) : ?>
							<div class="job-requirements">
								<h4 class="job-section-title"><?php _e( 'Key Requirements', 'astra-child' ); ?></h4>
								<p><?php echo nl2br( esc_html( $requirements ) ); ?></p>
							</div>
						<?php endif; ?>

						<?php if ( $extra_info ) : ?>
							<div class="job-extra">
								<p><em><?php echo esc_html( $extra_info ); ?></em></p>
							</div>
						<?php endif; ?>

						<!-- Action CTAs (No CV upload required) -->
						<div class="job-actions-row">
							<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $contact_phone); ?>" class="btn-primary">
								📞 <?php _e( 'Call HR', 'astra-child' ); ?>
							</a>
							<a href="mailto:<?php echo esc_attr( $contact_email ); ?>?subject=Application for <?php echo rawurlencode( get_the_title() ); ?>" class="inquiry-btn-email">
								✉️ <?php _e( 'Email HR', 'astra-child' ); ?>
							</a>
							<a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $contact_phone); ?>?text=Hi,%20I%20am%20interested%20in%20the%20<?php echo rawurlencode( get_the_title() ); ?>%20position." target="_blank" rel="noopener noreferrer" class="inquiry-btn-whatsapp">
								💬 <?php _e( 'WhatsApp HR', 'astra-child' ); ?>
							</a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>

			<?php else : ?>

				<!-- Fallback: No current openings -->
				<div class="empty-careers-card">
					<h3><?php _e( 'No Current Openings', 'astra-child' ); ?></h3>
					<p><?php _e( 'There are currently no active job openings. Please check back soon or feel free to reach out to our team directly.', 'astra-child' ); ?></p>
					<div style="margin-top: 24px;">
						<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">
							<?php _e( 'Contact Us Directly', 'astra-child' ); ?>
						</a>
					</div>
				</div>

			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
