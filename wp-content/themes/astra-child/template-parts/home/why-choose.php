<?php
/**
 * Why Choose Madki Section Template
 * 
 * @package Astra_Child
 * @subpackage Template_Parts
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$section_title    = get_field('why_choose_title');
$section_subtitle = get_field('why_choose_subtitle');
$features         = get_field('features'); // Fixed: Top-level ACF field name is 'features'

// Set defaults
$section_title    = !empty($section_title) ? $section_title : __('Why Choose Madki Masala', 'astra-child');
$section_subtitle = !empty($section_subtitle) ? $section_subtitle : __('Quality, authenticity, and tradition in every spice', 'astra-child');
?>

<!-- Why Choose Section -->
<section id="why-choose" class="why-choose-section">
    <div class="ast-container">
        
        <!-- Section Header -->
        <div class="section-header text-center">
            <?php if (!empty($section_title)) : ?>
                <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($section_subtitle)) : ?>
                <p class="section-subtitle"><?php echo esc_html($section_subtitle); ?></p>
            <?php endif; ?>
            
            <div class="section-divider">
                <span class="divider-line"></span>
                <span class="divider-icon">⭐</span>
                <span class="divider-line"></span>
            </div>
        </div>
        
        <!-- Features Grid -->
        <?php if (!empty($features) && is_array($features)) : ?>
            <div class="features-grid">
                <?php foreach ($features as $feature) : 
                    $icon        = $feature['icon'] ?? '';
                    $title       = $feature['title'] ?? '';
                    $description = $feature['description'] ?? '';
                    
                    // Extract Image URL safely regardless of Return Format setting (ID, Array, or URL)
                    $icon_url = '';
                    if (is_array($icon) && isset($icon['url'])) {
                        $icon_url = esc_url($icon['url']);
                    } elseif (is_string($icon) && !empty($icon)) {
                        $icon_url = esc_url($icon);
                    } elseif (is_numeric($icon)) {
                        $icon_url = esc_url(wp_get_attachment_image_url($icon, 'full'));
                    }
                ?>
                    <div class="feature-card">
                        <?php if (!empty($icon_url)) : ?>
                            <div class="feature-icon">
                                <img 
                                    src="<?php echo $icon_url; ?>" 
                                    alt="<?php echo esc_attr($title); ?>"
                                    loading="lazy"
                                    width="80"
                                    height="80"
                                >
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($title)) : ?>
                            <h3 class="feature-title"><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>
                        
                        <?php if (!empty($description)) : ?>
                            <p class="feature-description"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>