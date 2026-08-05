<?php
/**
 * Template Name: About Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header();

// Fetch ACF values with strict fallbacks
$hero_bg          = get_field('about_hero_bg');
$hero_subtitle    = get_field('about_hero_subtitle') ? get_field('about_hero_subtitle') : 'COMPANY STORY';
$hero_title       = get_field('about_hero_title') ? get_field('about_hero_title') : 'Bringing trusted spice traditions to modern homes.';
$hero_description = get_field('about_hero_description') ? get_field('about_hero_description') : 'Madki Masala was born from a simple belief: food should taste authentic, wholesome, and deeply comforting. We curate spices with care and package them in a way that preserves flavor, freshness, and family appeal.';
$hero_btn_text    = get_field('about_hero_btn_text') ? get_field('about_hero_btn_text') : 'Get In Touch';
$hero_btn_link    = get_field('about_hero_btn_link') ? get_field('about_hero_btn_link') : home_url('/contact');

// Mission & Vision
$mission_title    = get_field('mission_title') ? get_field('mission_title') : 'To make everyday meals richer with authentic Indian flavors.';
$mission_desc     = get_field('mission_desc') ? get_field('mission_desc') : 'We believe quality spices should be accessible, trustworthy, and beautifully presented for families who value health and taste.';
$vision_title     = get_field('vision_title') ? get_field('vision_title') : 'To become a signature spice brand loved across kitchens and generations.';
$vision_desc      = get_field('vision_desc') ? get_field('vision_desc') : 'Our vision is rooted in delivering premium quality, culinary pride, and an elevated spice experience every single day.';

// Process Section
$process_image    = get_field('process_image');
$process_title    = get_field('process_title') ? get_field('process_title') : 'From sourcing to packaging, every step is intentional.';
$process_desc     = get_field('process_desc') ? get_field('process_desc') : 'We source premium spices from trusted growers, cleanse and blend them with precision, and package them for maximum freshness. Our process balances quality, safety, and consistency with artisanal care.';

// Quality Banner
$qa_title         = get_field('qa_title') ? get_field('qa_title') : 'Premium spice quality you can trust.';
$qa_desc          = get_field('qa_desc') ? get_field('qa_desc') : 'Every batch is tested for freshness, flavor, texture, and packaging integrity. We uphold strict hygiene protocols so our spice blends remain safe, flavorful, and ready for daily cooking.';

// Image URLs
$bg_url           = $hero_bg ? $hero_bg : get_stylesheet_directory_uri() . '/assets/images/about-hero-bg.jpg';
$proc_img_url     = $process_image ? $process_image : get_stylesheet_directory_uri() . '/assets/images/process-img.jpg';
?>

<main id="main" class="site-main about-page-template" role="main">

    <!-- 1. Hero Section -->
    <section class="about-hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-container">
            <nav class="about-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="delimiter">/</span>
                <span class="current">About</span>
            </nav>
            <span class="about-hero-subtitle"><?php echo esc_html($hero_subtitle); ?></span>
            <h1 class="about-hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="about-hero-description"><?php echo esc_html($hero_description); ?></p>
            <a href="<?php echo esc_url($hero_btn_link); ?>" class="about-hero-btn"><?php echo esc_html($hero_btn_text); ?></a>
        </div>
    </section>

    <!-- 2. Mission & Vision Cards Section -->
    <section class="mission-vision-section">
        <div class="about-container">
            <div class="mission-vision-grid">
                <div class="mv-card">
                    <span class="mv-card-subtitle">MISSION</span>
                    <h2 class="mv-card-title"><?php echo esc_html($mission_title); ?></h2>
                    <p class="mv-card-desc"><?php echo esc_html($mission_desc); ?></p>
                </div>
                <div class="mv-card">
                    <span class="mv-card-subtitle">VISION</span>
                    <h2 class="mv-card-title"><?php echo esc_html($vision_title); ?></h2>
                    <p class="mv-card-desc"><?php echo esc_html($vision_desc); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Our Values Section -->
    <section class="our-values-section">
        <div class="about-container">
            <div class="values-header">
                <span class="section-subtitle">OUR VALUES</span>
                <h2 class="section-title">Built on integrity, flavor, and lasting trust.</h2>
            </div>
            <div class="values-grid">
                <?php if ( function_exists('have_rows') && have_rows('our_values_list') ) : ?>
                    <?php while ( have_rows('our_values_list') ) : the_row(); ?>
                        <div class="value-card">
                            <h3 class="value-card-title"><?php echo esc_html(get_sub_field('value_title')); ?></h3>
                            <p class="value-card-desc"><?php echo esc_html(get_sub_field('value_desc')); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- Default Hardcoded Fallbacks -->
                    <div class="value-card">
                        <h3 class="value-card-title">Authenticity</h3>
                        <p class="value-card-desc">Preserving age-old spice heritage through modern quality standards.</p>
                    </div>
                    <div class="value-card">
                        <h3 class="value-card-title">Purity</h3>
                        <p class="value-card-desc">Carefully selected ingredients with no shortcuts or artificial enhancements.</p>
                    </div>
                    <div class="value-card">
                        <h3 class="value-card-title">Family Focus</h3>
                        <p class="value-card-desc">Products designed to support everyday cooking and special family moments.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 4. Manufacturing Process Section -->
    <section class="manufacturing-process-section">
        <div class="about-container">
            <div class="process-grid">
                <div class="process-image-col">
                    <?php if ( $process_image ) : ?>
                        <img src="<?php echo esc_url($proc_img_url); ?>" alt="Manufacturing Process" class="process-img">
                    <?php else : ?>
                        <div class="process-img-placeholder">
                            <p>Process Image Placeholder</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="process-content-col">
                    <span class="section-subtitle">MANUFACTURING PROCESS</span>
                    <h2 class="section-title"><?php echo esc_html($process_title); ?></h2>
                    <p class="process-desc"><?php echo esc_html($process_desc); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Quality Assurance Banner -->
    <section class="qa-banner-section">
        <div class="about-container">
            <div class="qa-banner-card">
                <div class="qa-grid">
                    <div class="qa-title-col">
                        <span class="qa-subtitle">QUALITY ASSURANCE</span>
                        <h2 class="qa-title"><?php echo esc_html($qa_title); ?></h2>
                    </div>
                    <div class="qa-desc-col">
                        <p class="qa-desc"><?php echo esc_html($qa_desc); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>