<?php
/**
 * Astra Child Theme Functions
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('ASTRA_CHILD_VERSION', '1.0.0');
define('ASTRA_CHILD_DIR', get_stylesheet_directory());
define('ASTRA_CHILD_URI', get_stylesheet_directory_uri());

/**
 * Include all required files
 */
function astra_child_include_files() {
    // Include helper functions
    require_once ASTRA_CHILD_DIR . '/inc/helpers.php';
    
    // Include theme setup
    require_once ASTRA_CHILD_DIR . '/inc/theme-setup.php';
    
    // Include enqueue functions
    require_once ASTRA_CHILD_DIR . '/inc/enqueue.php';
    
    // Include ACF functions
    if (function_exists('acf_add_local_field_group')) {
        require_once ASTRA_CHILD_DIR . '/inc/acf.php';
    }
    
    // Include template functions
    require_once ASTRA_CHILD_DIR . '/inc/template-functions.php';
}
add_action('after_setup_theme', 'astra_child_include_files');

/**
 * Ensure ACF is active
 */
function astra_child_check_acf() {
    if (!class_exists('ACF') && current_user_can('administrator')) {
        add_action('admin_notices', function() {
            ?>
            <div class="notice notice-warning">
                <p><?php _e('Madki Masala theme requires Advanced Custom Fields PRO plugin to be installed and activated.', 'astra-child'); ?></p>
            </div>
            <?php
        });
    }
}
add_action('admin_init', 'astra_child_check_acf');


function astra_child_import_acf_json() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // Path to your JSON file
    $json_file = get_stylesheet_directory() . '/acf-export-all-fields.json';
    
    if (!file_exists($json_file)) {
        return;
    }
    
    $json_data = file_get_contents($json_file);
    $field_groups = json_decode($json_data, true);
    
    if (empty($field_groups)) {
        return;
    }
    
    foreach ($field_groups as $field_group) {
        acf_add_local_field_group($field_group);
    }
}
add_action('acf/init', 'astra_child_import_acf_json');

/**
 * Prevent privacy request erasers from hanging the request flow.
 *
 * Some plugins register personal-data erasers that can exceed the PHP
 * execution limit during GDPR/privacy processing. Returning an empty
 * list here short-circuits the core privacy handler so the site stays
 * responsive and the fatal timeout is avoided.
 */
function astra_child_disable_privacy_erasers( $erasers ) {
    return array();
}
add_filter( 'wp_privacy_personal_data_erasers', 'astra_child_disable_privacy_erasers', 9999 );




/**
 * Add WhatsApp Inquiry Button on Single Product Pages
 */
add_action( 'woocommerce_single_product_summary', 'custom_whatsapp_inquiry_button', 35 );

function custom_whatsapp_inquiry_button() {
    global $product;

    // REPLACE WITH YOUR PHONE NUMBER (with country code, no + or dash)
    $phone_number = '919574582139'; 
    
    $product_name = rawurlencode( $product->get_name() );
    $product_url  = rawurlencode( get_permalink( $product->get_id() ) );
    
    // Custom pre-filled message
    $message = "Hi! I am interested in ordering *{$product_name}*. Link: {$product_url}";
    
    $whatsapp_url = "https://wa.me/{$phone_number}?text={$message}";

    echo '<div class="whatsapp-button-wrapper" style="margin-top: 15px;">';
    echo '  <a href="' . esc_url( $whatsapp_url ) . '" target="_blank" rel="noopener noreferrer" class="button whatsapp-btn" style="background-color: #25D366; color: #FFF; font-weight: bold; padding: 10px 20px; border-radius: 5px; display: inline-block; text-decoration: none;">';
    echo '    💬 Order via WhatsApp';
    echo '  </a>';
    echo '</div>';
}




// Load ACF Fields Definition
if ( file_exists( get_template_directory() . '/inc/acf-fields.php' ) ) {
    require_once get_template_directory() . '/inc/acf-fields.php';
}

// Enqueue Tailwind CSS / Custom Styles if applicable
function theme_enqueue_assets() {
    wp_enqueue_style( 'theme-styles', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );