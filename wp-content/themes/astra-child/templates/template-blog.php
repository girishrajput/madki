<?php
/**
 * Template Name: Blog Page
 *
 * @package Astra_Child
 */

get_header();
?>
<main id="main" class="site-main blog-list-page" role="main">
	<?php
	get_template_part( 'template-parts/blog/hero' );
	get_template_part( 'template-parts/blog/post-grid' );
	?>
</main>
<?php get_footer(); ?>
