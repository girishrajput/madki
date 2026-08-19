<?php
/**
 * Custom Single Blog Post Detail Template for Madki Food
 *
 * @package Astra_Child
 */

get_header(); ?>

<main id="main" class="site-main single-post-wrapper" role="main">

	<?php while ( have_posts() ) : the_post();
		$categories = get_the_category();
		$primary_cat = ! empty( $categories ) ? $categories[0]->name : 'Culinary & Spices';
	?>

		<!-- Post Hero Header -->
		<section class="post-header-hero">
			<div class="ast-container">
				<span class="post-category-tag"><?php echo esc_html( $primary_cat ); ?></span>
				<h1 class="post-main-title"><?php the_title(); ?></h1>
				
				<div class="post-meta-bar">
					<span>✍️ By <?php echo get_the_author(); ?></span>
					<span>•</span>
					<span>📅 <?php echo get_the_date( 'F j, Y' ); ?></span>
				</div>
			</div>
		</section>

		<!-- Featured Image Container -->
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-featured-image-container">
				<?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
			</div>
		<?php endif; ?>

		<!-- Post Body Content -->
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content-container' ); ?>>
			<?php the_content(); ?>
		</article>

		<!-- Related Posts Section -->
		<section class="related-posts-section" style="background-color: #F8FAFC; padding: 60px 0;">
			<div class="ast-container" style="max-width: 960px; margin: 0 auto;">
				<h3 style="font-size: 1.5rem; font-weight: 700; color: #1E293B; margin-bottom: 24px; text-align: center;">
					<?php _e( 'More Insights & Articles', 'astra-child' ); ?>
				</h3>

				<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
					<?php
					$related_args = array(
						'post_type'      => 'post',
						'posts_per_page' => 3,
						'post__not_in'   => array( get_the_ID() ),
					);
					$related_query = new WP_Query( $related_args );
					if ( $related_query->have_posts() ) :
						while ( $related_query->have_posts() ) : $related_query->the_post();
					?>
						<div style="background: #FFF; border: 1px solid #E2E8F0; border-radius: 12px; overflow: hidden; padding: 20px;">
							<h4 style="font-size: 1.1rem; font-weight: 700; margin: 0 0 8px 0;">
								<a href="<?php the_permalink(); ?>" style="color: #1E293B; text-decoration: none;"><?php the_title(); ?></a>
							</h4>
							<p style="font-size: 0.85rem; color: #64748B; margin-bottom: 12px;"><?php echo get_the_date( 'M j, Y' ); ?></p>
							<a href="<?php the_permalink(); ?>" style="color: #C0392B; font-weight: 600; font-size: 0.88rem; text-decoration: none;">Read Article &rarr;</a>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Comment Form Area -->
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="comments-area-custom">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
