<?php
/**
 * Register Product Custom Fields & Nutrition Information Table
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register ACF Fields for WooCommerce Products
 */
function astra_child_register_product_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_madki_product_enhancements',
		'title' => __( 'Madki B2B Product & Nutrition Options', 'astra-child' ),
		'fields' => array(
			// Price / Inquiry Settings Tab
			array(
				'key' => 'field_prod_pricing_tab',
				'label' => __( 'Pricing & Distributor Inquiry', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_prod_price_mode',
				'label' => __( 'Pricing Display Option', 'astra-child' ),
				'name' => 'price_display_mode',
				'type' => 'select',
				'choices' => array(
					'inquiry' => __( 'Option B: Hide Price & Show B2B Inquiry CTA (Recommended)', 'astra-child' ),
					'display' => __( 'Option A: Display Price Directly', 'astra-child' ),
				),
				'default_value' => 'inquiry',
				'instructions' => __( 'Select whether to display retail pricing or show a B2B Distributor Inquiry CTA.', 'astra-child' ),
			),
			array(
				'key' => 'field_prod_inquiry_notice',
				'label' => __( 'Custom Inquiry Message', 'astra-child' ),
				'name' => 'inquiry_custom_notice',
				'type' => 'text',
				'default_value' => 'For bulk pricing & distributorship, contact us via WhatsApp or Email.',
			),

			// Nutrition Table Tab
			array(
				'key' => 'field_prod_nutrition_tab',
				'label' => __( 'Nutrition Information (3-Column)', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_prod_nutrition_facts',
				'label' => __( 'Nutrition Facts Table', 'astra-child' ),
				'name' => 'nutrition_facts',
				'type' => 'repeater',
				'layout' => 'table',
				'button_label' => __( 'Add Nutrient Row', 'astra-child' ),
				'sub_fields' => array(
					array(
						'key' => 'field_nutr_type',
						'label' => __( 'Type', 'astra-child' ),
						'name' => 'type',
						'type' => 'text',
						'required' => 1,
						'placeholder' => 'e.g., Protein',
					),
					array(
						'key' => 'field_nutr_value',
						'label' => __( 'Value', 'astra-child' ),
						'name' => 'value',
						'type' => 'text',
						'required' => 1,
						'placeholder' => 'e.g., 100',
					),
					array(
						'key' => 'field_nutr_parameter',
						'label' => __( 'Parameter / Unit', 'astra-child' ),
						'name' => 'parameter',
						'type' => 'text',
						'required' => 1,
						'placeholder' => 'e.g., mg or g or kcal',
					),
				),
			),

			// Specifications Tab
			array(
				'key' => 'field_prod_specs_tab',
				'label' => __( 'Product Specifications', 'astra-child' ),
				'type' => 'tab',
			),
			array(
				'key' => 'field_prod_packaging_sizes',
				'label' => __( 'Available Packaging Sizes', 'astra-child' ),
				'name' => 'packaging_sizes',
				'type' => 'text',
				'default_value' => '50g, 100g, 200g, 500g, 1kg Bulk Pack',
			),
			array(
				'key' => 'field_prod_shelf_life',
				'label' => __( 'Shelf Life', 'astra-child' ),
				'name' => 'shelf_life',
				'type' => 'text',
				'default_value' => '12 Months from Manufacturing',
			),
			array(
				'key' => 'field_prod_storage_instructions',
				'label' => __( 'Storage Instructions', 'astra-child' ),
				'name' => 'storage_instructions',
				'type' => 'text',
				'default_value' => 'Store in a cool, dry, and hygienic place away from direct sunlight.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				),
			),
		),
	) );
}
add_action( 'acf/init', 'astra_child_register_product_acf_fields' );
