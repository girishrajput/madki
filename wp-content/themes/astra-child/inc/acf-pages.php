<?php
/**
 * ACF fields used by the FAQ, blog, products, and default page templates.
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register fields for the remaining page templates.
 */
function astra_child_register_page_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_astra_child_faq_page',
			'title'    => __( 'FAQ Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_faq_hero_image', 'label' => __( 'Hero Background Image', 'astra-child' ), 'name' => 'faq_hero_image', 'type' => 'image', 'return_format' => 'url' ),
				array( 'key' => 'field_faq_breadcrumb_home', 'label' => __( 'Breadcrumb Home Label', 'astra-child' ), 'name' => 'faq_breadcrumb_home', 'type' => 'text' ),
				array( 'key' => 'field_faq_breadcrumb_current', 'label' => __( 'Breadcrumb Current Label', 'astra-child' ), 'name' => 'faq_breadcrumb_current', 'type' => 'text' ),
				array( 'key' => 'field_faq_hero_subtitle', 'label' => __( 'Hero Subtitle', 'astra-child' ), 'name' => 'faq_hero_subtitle', 'type' => 'text' ),
				array( 'key' => 'field_faq_hero_title', 'label' => __( 'Hero Title', 'astra-child' ), 'name' => 'faq_hero_title', 'type' => 'text' ),
				array( 'key' => 'field_faq_hero_description', 'label' => __( 'Hero Description', 'astra-child' ), 'name' => 'faq_hero_description', 'type' => 'textarea' ),
				array(
					'key'          => 'field_faq_list',
					'label'        => __( 'FAQ Items', 'astra-child' ),
					'name'         => 'faq_list',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => __( 'Add FAQ', 'astra-child' ),
					'sub_fields'   => array(
						array( 'key' => 'field_faq_question', 'label' => __( 'Question', 'astra-child' ), 'name' => 'faq_question', 'type' => 'text', 'required' => 1 ),
						array( 'key' => 'field_faq_answer', 'label' => __( 'Answer', 'astra-child' ), 'name' => 'faq_answer', 'type' => 'wysiwyg', 'required' => 1, 'tabs' => 'visual', 'toolbar' => 'basic', 'media_upload' => 0 ),
					),
				),
			),
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-faq.php' ) ) ),
		)
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_astra_child_blog_page',
			'title'    => __( 'Blog Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_blog_hero_background', 'label' => __( 'Hero Background Image', 'astra-child' ), 'name' => 'blog_hero_background', 'type' => 'image', 'return_format' => 'url' ),
				array( 'key' => 'field_blog_hero_title', 'label' => __( 'Hero Title', 'astra-child' ), 'name' => 'blog_hero_title', 'type' => 'text' ),
				array( 'key' => 'field_blog_breadcrumb_home', 'label' => __( 'Breadcrumb Home Label', 'astra-child' ), 'name' => 'blog_breadcrumb_home', 'type' => 'text' ),
				array( 'key' => 'field_blog_breadcrumb_current', 'label' => __( 'Breadcrumb Current Label', 'astra-child' ), 'name' => 'blog_breadcrumb_current', 'type' => 'text' ),
				array( 'key' => 'field_blog_posts_per_page', 'label' => __( 'Posts Per Page', 'astra-child' ), 'name' => 'blog_posts_per_page', 'type' => 'number', 'default_value' => 9, 'min' => 1, 'max' => 48 ),
				array( 'key' => 'field_blog_read_more_text', 'label' => __( 'Read More Label', 'astra-child' ), 'name' => 'blog_read_more_text', 'type' => 'text' ),
				array( 'key' => 'field_blog_previous_text', 'label' => __( 'Previous Page Label', 'astra-child' ), 'name' => 'blog_previous_text', 'type' => 'text' ),
				array( 'key' => 'field_blog_next_text', 'label' => __( 'Next Page Label', 'astra-child' ), 'name' => 'blog_next_text', 'type' => 'text' ),
				array( 'key' => 'field_blog_empty_text', 'label' => __( 'No Posts Message', 'astra-child' ), 'name' => 'blog_empty_text', 'type' => 'text' ),
			),
			'location' => array(
				array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'posts_page' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-blog.php' ) ),
			),
		)
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_astra_child_products_page',
			'title'    => __( 'Products Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_products_page_title', 'label' => __( 'Page Title', 'astra-child' ), 'name' => 'products_page_title', 'type' => 'text' ),
				array( 'key' => 'field_products_page_subtitle', 'label' => __( 'Page Subtitle', 'astra-child' ), 'name' => 'products_page_subtitle', 'type' => 'textarea' ),
				array( 'key' => 'field_products_filter_label', 'label' => __( 'Filter Accessible Label', 'astra-child' ), 'name' => 'products_filter_label', 'type' => 'text' ),
				array(
					'key' => 'field_products_filters', 'label' => __( 'Product Filters', 'astra-child' ), 'name' => 'products_filters', 'type' => 'repeater', 'layout' => 'table', 'button_label' => __( 'Add Filter', 'astra-child' ),
					'sub_fields' => array(
						array( 'key' => 'field_products_filter_value', 'label' => __( 'Value', 'astra-child' ), 'name' => 'value', 'type' => 'text', 'required' => 1 ),
						array( 'key' => 'field_products_filter_text', 'label' => __( 'Label', 'astra-child' ), 'name' => 'label', 'type' => 'text', 'required' => 1 ),
					),
				),
				array( 'key' => 'field_products_per_page', 'label' => __( 'Products Per Page', 'astra-child' ), 'name' => 'products_per_page', 'type' => 'number', 'default_value' => 12, 'min' => 1, 'max' => 48 ),
				array( 'key' => 'field_products_sale_badge', 'label' => __( 'Sale Badge', 'astra-child' ), 'name' => 'products_sale_badge', 'type' => 'text' ),
				array( 'key' => 'field_products_button_text', 'label' => __( 'Product Button Label', 'astra-child' ), 'name' => 'products_button_text', 'type' => 'text' ),
				array( 'key' => 'field_products_previous_text', 'label' => __( 'Previous Page Label', 'astra-child' ), 'name' => 'products_previous_text', 'type' => 'text' ),
				array( 'key' => 'field_products_next_text', 'label' => __( 'Next Page Label', 'astra-child' ), 'name' => 'products_next_text', 'type' => 'text' ),
				array( 'key' => 'field_products_empty_text', 'label' => __( 'No Products Message', 'astra-child' ), 'name' => 'products_empty_text', 'type' => 'text' ),
			),
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-products.php' ) ) ),
		)
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_astra_child_default_page',
			'title'    => __( 'Default Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_default_page_title', 'label' => __( 'Display Title', 'astra-child' ), 'name' => 'default_page_title', 'type' => 'text', 'instructions' => __( 'Leave empty to use the WordPress page title.', 'astra-child' ) ),
				array( 'key' => 'field_default_page_subtitle', 'label' => __( 'Page Subtitle', 'astra-child' ), 'name' => 'default_page_subtitle', 'type' => 'textarea', 'instructions' => __( 'Leave empty to use the page excerpt.', 'astra-child' ) ),
			),
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-default.php' ) ) ),
		)
	);
}
add_action( 'acf/init', 'astra_child_register_page_fields' );
