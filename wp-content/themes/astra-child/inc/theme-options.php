<?php
/**
 * Theme Options & Settings Page
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register ACF Options Page if ACF Pro is active
 */
function astra_child_register_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' 	=> __( 'Madki Site Options', 'astra-child' ),
			'menu_title'	=> __( 'Site Options', 'astra-child' ),
			'menu_slug' 	=> 'madki-site-options',
			'capability'	=> 'manage_options',
			'redirect'		=> false,
			'icon_url'      => 'dashicons-store',
			'position'      => 59,
		) );
	}
}
add_action( 'acf/init', 'astra_child_register_options_page' );

/**
 * Register Local Fields for Theme Options Page
 */
function astra_child_register_options_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_madki_theme_options',
		'title' => __( 'Madki Global Site & Business Options', 'astra-child' ),
		'fields' => array(
			// Business / Registration Info Tab
			array(
				'key' => 'field_opt_business_tab',
				'label' => __( 'Business & Registrations', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_opt_gst_number',
				'label' => __( 'GST Number', 'astra-child' ),
				'name' => 'gst_number',
				'type' => 'text',
				'default_value' => '08AAAAA0000A1Z5',
			),
			array(
				'key' => 'field_opt_msme_number',
				'label' => __( 'MSME Registration Number', 'astra-child' ),
				'name' => 'msme_number',
				'type' => 'text',
				'default_value' => 'UDYAM-RJ-14-0000000',
			),
			array(
				'key' => 'field_opt_msme_logo',
				'label' => __( 'MSME Badge / Logo', 'astra-child' ),
				'name' => 'msme_logo',
				'type' => 'image',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_opt_startup_number',
				'label' => __( 'Startup India Registration Number', 'astra-child' ),
				'name' => 'startup_number',
				'type' => 'text',
				'default_value' => 'DIPP00000',
			),
			array(
				'key' => 'field_opt_startup_logo',
				'label' => __( 'Startup India Logo', 'astra-child' ),
				'name' => 'startup_logo',
				'type' => 'image',
				'return_format' => 'url',
			),

			// Contact Info Tab
			array(
				'key' => 'field_opt_contact_tab',
				'label' => __( 'Contact Information', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_opt_phone',
				'label' => __( 'Phone Number', 'astra-child' ),
				'name' => 'site_phone',
				'type' => 'text',
				'default_value' => '+91 98765 43219',
			),
			array(
				'key' => 'field_opt_whatsapp',
				'label' => __( 'WhatsApp Number', 'astra-child' ),
				'name' => 'site_whatsapp',
				'type' => 'text',
				'default_value' => '919876543210',
			),
			array(
				'key' => 'field_opt_email',
				'label' => __( 'Email Address', 'astra-child' ),
				'name' => 'site_email',
				'type' => 'text',
				'default_value' => 'info@madkimasala.com',
			),
			array(
				'key' => 'field_opt_address',
				'label' => __( 'Full Address', 'astra-child' ),
				'name' => 'site_address',
				'type' => 'textarea',
				'default_value' => '12, Spice Avenue, Industrial Area, Jaipur, Rajasthan 302001, India',
			),
			array(
				'key' => 'field_opt_distributor_cta_text',
				'label' => __( 'Distributor Banner CTA Subtitle', 'astra-child' ),
				'name' => 'distributor_cta_text',
				'type' => 'text',
				'default_value' => 'For dealership, distributorship, and bulk orders, connect with our sales team directly.',
			),

			// Footer & Copyright Tab
			array(
				'key' => 'field_opt_footer_tab',
				'label' => __( 'Footer & Copyright Settings', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_opt_footer_logo',
				'label' => __( 'Footer Custom Logo (Optional)', 'astra-child' ),
				'name' => 'footer_logo',
				'type' => 'image',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_opt_footer_about_text',
				'label' => __( 'Footer About / Brand Intro Description', 'astra-child' ),
				'name' => 'footer_about_text',
				'type' => 'textarea',
				'default_value' => 'Madki Masala delivers authentic, pure Indian spices and premium masala blends crafted with care for families, food businesses, and regional distributors.',
				'rows' => 3,
			),
			array(
				'key' => 'field_opt_copyright_left_text',
				'label' => __( 'Copyright Left Text', 'astra-child' ),
				'name' => 'copyright_left_text',
				'type' => 'text',
				'default_value' => '© 2026 Madki Food. All Rights Reserved.',
			),
			array(
				'key' => 'field_opt_copyright_right_text',
				'label' => __( 'Copyright Right Attribution HTML', 'astra-child' ),
				'name' => 'copyright_right_text',
				'type' => 'text',
				'default_value' => 'Developed by Veda',
			),

			// Social Media Tab
			array(
				'key' => 'field_opt_social_tab',
				'label' => __( 'Social Media Links', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_opt_social_facebook',
				'label' => __( 'Facebook URL', 'astra-child' ),
				'name' => 'social_facebook',
				'type' => 'url',
			),
			array(
				'key' => 'field_opt_social_instagram',
				'label' => __( 'Instagram URL', 'astra-child' ),
				'name' => 'social_instagram',
				'type' => 'url',
			),
			array(
				'key' => 'field_opt_social_youtube',
				'label' => __( 'YouTube URL', 'astra-child' ),
				'name' => 'social_youtube',
				'type' => 'url',
			),
			array(
				'key' => 'field_opt_social_linkedin',
				'label' => __( 'LinkedIn URL', 'astra-child' ),
				'name' => 'social_linkedin',
				'type' => 'url',
			),
			array(
				'key' => 'field_opt_social_twitter',
				'label' => __( 'X (Twitter) URL', 'astra-child' ),
				'name' => 'social_twitter',
				'type' => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'madki-site-options',
				),
			),
		),
	) );
}
add_action( 'acf/init', 'astra_child_register_options_fields' );

/**
 * Helper function to retrieve a site option with fallback
 */
function madki_get_option( $name, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $name, 'option' );
		if ( ! empty( $value ) ) {
			return $value;
		}
	}
	$wp_option = get_option( 'madki_opt_' . $name );
	if ( ! empty( $wp_option ) ) {
		return $wp_option;
	}
	return $default;
}
