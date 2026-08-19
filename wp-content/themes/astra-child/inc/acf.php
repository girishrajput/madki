<?php
/**
 * All ACF Field Groups Configuration
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register All ACF Field Groups
 */
function astra_child_acf_all_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // ============================================
    // 1. HERO SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => __('Hero Section', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_hero_small_title',
                'label' => __('Small Title', 'astra-child'),
                'name' => 'hero_small_title',
                'type' => 'text',
                'default_value' => 'Premium Quality',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => __('Main Heading', 'astra-child'),
                'name' => 'hero_title',
                'type' => 'text',
                'required' => 1,
                'default_value' => 'Pure Indian <span class="highlight">Spices</span>',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => __('Description', 'astra-child'),
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'Experience the authentic taste of India with our handpicked, premium quality spices that bring traditional flavors to your kitchen.',
            ),
            array(
                'key' => 'field_hero_background_image',
                'label' => __('Background Image', 'astra-child'),
                'name' => 'hero_background_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_hero_product_image',
                'label' => __('Product Image', 'astra-child'),
                'name' => 'hero_product_image',
                'type' => 'image',
                'required' => 1,
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_hero_floating_spice',
                'label' => __('Floating Spice Image', 'astra-child'),
                'name' => 'hero_floating_spice',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_hero_button_text',
                'label' => __('Button Text', 'astra-child'),
                'name' => 'hero_button_text',
                'type' => 'text',
                'default_value' => 'Explore Products',
            ),
            array(
                'key' => 'field_hero_button_link',
                'label' => __('Button Link', 'astra-child'),
                'name' => 'hero_button_link',
                'type' => 'url',
                'default_value' => '#products',
            ),
            array(
                'key' => 'field_hero_decorative_element',
                'label' => __('Decorative Element', 'astra-child'),
                'name' => 'hero_decorative_element',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 1,
    ));
    
    // ============================================
    // 2. ABOUT SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_about_section',
        'title' => __('About Section', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_about_section_title',
                'label' => __('Section Title', 'astra-child'),
                'name' => 'about_section_title',
                'type' => 'text',
                'default_value' => 'About Madki Masala',
            ),
            array(
                'key' => 'field_about_heading',
                'label' => __('Heading', 'astra-child'),
                'name' => 'about_heading',
                'type' => 'text',
                'default_value' => 'Preserving the <span class="highlight">Authentic Taste</span> of India',
            ),
            array(
                'key' => 'field_about_description',
                'label' => __('Description', 'astra-child'),
                'name' => 'about_description',
                'type' => 'textarea',
                'default_value' => 'For generations, we have been sourcing the finest spices from the heart of India. Our commitment to quality and authenticity ensures every spice blend brings the true essence of Indian cuisine to your table.',
            ),
            array(
                'key' => 'field_about_image',
                'label' => __('About Image', 'astra-child'),
                'name' => 'about_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_about_signature',
                'label' => __('Signature/Brand Image', 'astra-child'),
                'name' => 'about_signature',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_about_cta_text',
                'label' => __('CTA Button Text', 'astra-child'),
                'name' => 'about_cta_text',
                'type' => 'text',
                'default_value' => 'Learn More About Us',
            ),
            array(
                'key' => 'field_about_cta_link',
                'label' => __('CTA Button Link', 'astra-child'),
                'name' => 'about_cta_link',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 2,
    ));
    
    // ============================================
    // 3. FEATURED PRODUCTS SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_featured_products',
        'title' => __('Featured Products', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_featured_section_title',
                'label' => __('Section Title', 'astra-child'),
                'name' => 'featured_section_title',
                'type' => 'text',
                'default_value' => 'Our Premium Selection',
            ),
            array(
                'key' => 'field_featured_section_subtitle',
                'label' => __('Section Subtitle', 'astra-child'),
                'name' => 'featured_section_subtitle',
                'type' => 'text',
                'default_value' => 'Handpicked spices for your culinary journey',
            ),
            array(
                'key' => 'field_featured_product_button_text',
                'label' => __('Product Button Label', 'astra-child'),
                'name' => 'featured_product_button_text',
                'type' => 'text',
                'default_value' => 'View Product',
            ),
            array(
                'key' => 'field_featured_products_empty_text',
                'label' => __('No Products Message', 'astra-child'),
                'name' => 'featured_products_empty_text',
                'type' => 'text',
                'default_value' => 'No published products found.',
            ),
            array(
                'key' => 'field_featured_products',
                'label' => __('Featured Products', 'astra-child'),
                'name' => 'featured_products',
                'type' => 'repeater',
                'required' => 1,
                'min' => 1,
                'max' => 12,
                'layout' => 'table',
                'button_label' => __('Add Product', 'astra-child'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_featured_product_image',
                        'label' => __('Product Image', 'astra-child'),
                        'name' => 'product_image',
                        'type' => 'image',
                        'required' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_featured_product_name',
                        'label' => __('Product Name', 'astra-child'),
                        'name' => 'product_name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_featured_product_description',
                        'label' => __('Short Description', 'astra-child'),
                        'name' => 'product_description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_featured_product_button',
                        'label' => __('Button Text', 'astra-child'),
                        'name' => 'product_button',
                        'type' => 'text',
                        'default_value' => 'View Product',
                    ),
                    array(
                        'key' => 'field_featured_product_url',
                        'label' => __('Button Link', 'astra-child'),
                        'name' => 'product_url',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_featured_product_badge',
                        'label' => __('Product Badge', 'astra-child'),
                        'name' => 'product_badge',
                        'type' => 'text',
                        'placeholder' => 'e.g., Best Seller, New, Sale',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 3,
    ));
    
    // ============================================
    // 4. WHY CHOOSE SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_why_choose',
        'title' => __('Why Choose Madki', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_why_choose_title',
                'label' => __('Section Title', 'astra-child'),
                'name' => 'why_choose_title',
                'type' => 'text',
                'default_value' => 'Why Choose Madki Masala',
            ),
            array(
                'key' => 'field_why_choose_subtitle',
                'label' => __('Section Subtitle', 'astra-child'),
                'name' => 'why_choose_subtitle',
                'type' => 'text',
                'default_value' => 'Quality, authenticity, and tradition in every spice',
            ),
            array(
                'key' => 'field_why_choose_features',
                'label' => __('Features', 'astra-child'),
                'name' => 'why_choose_features',
                'type' => 'repeater',
                'required' => 1,
                'min' => 3,
                'max' => 8,
                'layout' => 'table',
                'button_label' => __('Add Feature', 'astra-child'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_why_choose_icon',
                        'label' => __('Icon', 'astra-child'),
                        'name' => 'icon',
                        'type' => 'image',
                        'required' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_why_choose_feature_title',
                        'label' => __('Title', 'astra-child'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_why_choose_description',
                        'label' => __('Description', 'astra-child'),
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                        'required' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 4,
    ));
    
    // ============================================
    // 5. TESTIMONIALS SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_testimonials',
        'title' => __('Testimonials', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_testimonials_title',
                'label' => __('Section Title', 'astra-child'),
                'name' => 'testimonials_title',
                'type' => 'text',
                'default_value' => 'What Our Customers Say',
            ),
            array(
                'key' => 'field_testimonials_subtitle',
                'label' => __('Section Subtitle', 'astra-child'),
                'name' => 'testimonials_subtitle',
                'type' => 'text',
                'default_value' => 'Real reviews from real spice lovers',
            ),
            array(
                'key' => 'field_testimonials',
                'label' => __('Testimonials', 'astra-child'),
                'name' => 'testimonials',
                'type' => 'repeater',
                'required' => 1,
                'min' => 2,
                'max' => 12,
                'layout' => 'table',
                'button_label' => __('Add Testimonial', 'astra-child'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_image',
                        'label' => __('Customer Image', 'astra-child'),
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_testimonial_name',
                        'label' => __('Customer Name', 'astra-child'),
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_testimonial_designation',
                        'label' => __('Designation', 'astra-child'),
                        'name' => 'designation',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_rating',
                        'label' => __('Rating', 'astra-child'),
                        'name' => 'rating',
                        'type' => 'number',
                        'default_value' => 5,
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.5,
                    ),
                    array(
                        'key' => 'field_testimonial_review',
                        'label' => __('Review', 'astra-child'),
                        'name' => 'review',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 3,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 5,
    ));
    
    // ============================================
    // 6. CTA BANNER SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_cta_banner',
        'title' => __('CTA Banner', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_cta_background',
                'label' => __('Background Image', 'astra-child'),
                'name' => 'cta_background',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_cta_background_color',
                'label' => __('Background Color', 'astra-child'),
                'name' => 'cta_background_color',
                'type' => 'color_picker',
                'default_value' => '#C0392B',
            ),
            array(
                'key' => 'field_cta_heading',
                'label' => __('Heading', 'astra-child'),
                'name' => 'cta_heading',
                'type' => 'text',
                'default_value' => 'Ready to Experience the <span class="highlight">Authentic Taste</span>?',
            ),
            array(
                'key' => 'field_cta_description',
                'label' => __('Description', 'astra-child'),
                'name' => 'cta_description',
                'type' => 'textarea',
                'default_value' => 'Discover our premium collection of Indian spices and bring the flavors of India to your kitchen today.',
            ),
            array(
                'key' => 'field_cta_button_text',
                'label' => __('Button Text', 'astra-child'),
                'name' => 'cta_button_text',
                'type' => 'text',
                'default_value' => 'Shop Now',
            ),
            array(
                'key' => 'field_cta_button_url',
                'label' => __('Button URL', 'astra-child'),
                'name' => 'cta_button_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 6,
    ));
    
    // ============================================
    // 7. FOOTER CTA SECTION FIELDS
    // ============================================
    acf_add_local_field_group(array(
        'key' => 'group_footer_cta',
        'title' => __('Footer CTA', 'astra-child'),
        'fields' => array(
            array(
                'key' => 'field_footer_cta_heading',
                'label' => __('Heading', 'astra-child'),
                'name' => 'footer_cta_heading',
                'type' => 'text',
                'default_value' => 'Subscribe to Our <span class="highlight">Newsletter</span>',
            ),
            array(
                'key' => 'field_footer_cta_description',
                'label' => __('Description', 'astra-child'),
                'name' => 'footer_cta_description',
                'type' => 'textarea',
                'default_value' => 'Get the latest updates on new products, recipes, and exclusive offers.',
            ),
            array(
                'key' => 'field_footer_cta_newsletter_text',
                'label' => __('Newsletter Placeholder Text', 'astra-child'),
                'name' => 'footer_cta_newsletter_text',
                'type' => 'text',
                'default_value' => 'Enter your email address',
            ),
            array(
                'key' => 'field_footer_cta_button_text',
                'label' => __('Button Text', 'astra-child'),
                'name' => 'footer_cta_button_text',
                'type' => 'text',
                'default_value' => 'Subscribe',
            ),
            array(
                'key' => 'field_footer_cta_button_url',
                'label' => __('Button URL', 'astra-child'),
                'name' => 'footer_cta_button_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_slug',
                    'operator' => '==',
                    'value' => 'home',
                
                ),
            ),
        ),
        'menu_order' => 7,
    ));
}
add_action('acf/init', 'astra_child_acf_all_fields');
