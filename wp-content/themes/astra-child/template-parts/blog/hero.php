<?php
/**
 * Blog Hero Banner Template Part
 *
 * @package Astra_Child
 */
$posts_page_id      = (int) get_option( 'page_for_posts' );
$blog_title         = astra_child_get_field( 'blog_hero_title', get_the_title( $posts_page_id ), $posts_page_id );
$breadcrumb_home    = astra_child_get_field( 'blog_breadcrumb_home', __( 'Home', 'astra-child' ), $posts_page_id );
$breadcrumb_current = astra_child_get_field( 'blog_breadcrumb_current', get_the_title( $posts_page_id ), $posts_page_id );
$background         = astra_child_get_image_url( astra_child_get_field( 'blog_hero_background', '', $posts_page_id ) );
$hero_style         = $background ? 'background-image: url(' . esc_url( $background ) . ');' : '';
?>

<section class="blog-hero-section"<?php echo $hero_style ? ' style="' . esc_attr( $hero_style ) . '"' : ''; ?>>
    <div class="blog-hero-overlay"></div>
    <div class="blog-hero-content">
        <h1 class="blog-hero-title"><?php echo esc_html( $blog_title ); ?></h1>
        <nav class="blog-breadcrumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $breadcrumb_home ); ?></a>
            <span class="delimiter">&gt;</span>
            <span class="current"><?php echo esc_html( $breadcrumb_current ); ?></span>
        </nav>
    </div>
</section>
