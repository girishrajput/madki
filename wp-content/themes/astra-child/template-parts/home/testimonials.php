<?php
/**
 * Testimonials Section Template
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
$section_title = get_field('testimonials_title');
$section_subtitle = get_field('testimonials_subtitle');
$testimonials = get_field('testimonials');

// Set defaults
$section_title = !empty($section_title) ? $section_title : __('What Our Customers Say', 'astra-child');
$section_subtitle = !empty($section_subtitle) ? $section_subtitle : __('Real reviews from real spice lovers', 'astra-child');
?>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section">
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
                <span class="divider-icon">✧</span>
                <span class="divider-line"></span>
            </div>
        </div>
        
        <!-- Testimonials Grid -->
        <?php if (!empty($testimonials) && is_array($testimonials)) : ?>
            <div class="testimonials-grid">
                <?php foreach ($testimonials as $testimonial) : 
                    $image = isset($testimonial['image']) ? $testimonial['image'] : '';
                    $name = isset($testimonial['name']) ? $testimonial['name'] : '';
                    $designation = isset($testimonial['designation']) ? $testimonial['designation'] : '';
                    $rating = isset($testimonial['rating']) ? floatval($testimonial['rating']) : 5;
                    $review = isset($testimonial['review']) ? $testimonial['review'] : '';
                    
                    $image_url = astra_child_get_image_url($image);
                    
                    // Generate star rating
                    $stars_html = '';
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            $stars_html .= '<span class="star full">★</span>';
                        } elseif ($i - $rating < 1 && $rating - floor($rating) >= 0.5) {
                            $stars_html .= '<span class="star half">★</span>';
                        } else {
                            $stars_html .= '<span class="star empty">★</span>';
                        }
                    }
                ?>
                    <div class="testimonial-card">
                        <?php if (!empty($image_url)) : ?>
                            <div class="testimonial-image">
                                <img 
                                    src="<?php echo esc_url($image_url); ?>" 
                                    alt="<?php echo esc_attr($name); ?>"
                                    loading="lazy"
                                    width="100"
                                    height="100"
                                >
                            </div>
                        <?php endif; ?>
                        
                        <div class="testimonial-content">
                            <?php if (!empty($name)) : ?>
                                <h4 class="testimonial-name"><?php echo esc_html($name); ?></h4>
                            <?php endif; ?>
                            
                            <?php if (!empty($designation)) : ?>
                                <span class="testimonial-designation"><?php echo esc_html($designation); ?></span>
                            <?php endif; ?>
                            
                            <div class="testimonial-rating">
                                <?php echo $stars_html; ?>
                            </div>
                            
                            <?php if (!empty($review)) : ?>
                                <blockquote class="testimonial-review">
                                    <span class="quote-mark">"</span>
                                    <?php echo esc_html($review); ?>
                                    <span class="quote-mark">"</span>
                                </blockquote>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>