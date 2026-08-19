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
			'key'      => 'group_astra_child_about_page',
			'title'    => __( 'About Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_about_hero_bg', 'label' => __( 'Hero Background Image', 'astra-child' ), 'name' => 'about_hero_bg', 'type' => 'image', 'return_format' => 'url' ),
				array( 'key' => 'field_about_hero_subtitle', 'label' => __( 'Hero Subtitle', 'astra-child' ), 'name' => 'about_hero_subtitle', 'type' => 'text' ),
				array( 'key' => 'field_about_hero_title', 'label' => __( 'Hero Title', 'astra-child' ), 'name' => 'about_hero_title', 'type' => 'text' ),
				array( 'key' => 'field_about_hero_description', 'label' => __( 'Hero Description', 'astra-child' ), 'name' => 'about_hero_description', 'type' => 'textarea' ),
				array( 'key' => 'field_about_hero_btn_text', 'label' => __( 'Hero Button Text', 'astra-child' ), 'name' => 'about_hero_btn_text', 'type' => 'text' ),
				array( 'key' => 'field_about_hero_btn_link', 'label' => __( 'Hero Button Link', 'astra-child' ), 'name' => 'about_hero_btn_link', 'type' => 'text' ),
				array( 'key' => 'field_about_mission_title', 'label' => __( 'Mission Title', 'astra-child' ), 'name' => 'mission_title', 'type' => 'text' ),
				array( 'key' => 'field_about_mission_desc', 'label' => __( 'Mission Description', 'astra-child' ), 'name' => 'mission_desc', 'type' => 'textarea' ),
				array( 'key' => 'field_about_vision_title', 'label' => __( 'Vision Title', 'astra-child' ), 'name' => 'vision_title', 'type' => 'text' ),
				array( 'key' => 'field_about_vision_desc', 'label' => __( 'Vision Description', 'astra-child' ), 'name' => 'vision_desc', 'type' => 'textarea' ),
				array(
					'key'          => 'field_our_values_list',
					'label'        => __( 'Our Values List', 'astra-child' ),
					'name'         => 'our_values_list',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => __( 'Add Value', 'astra-child' ),
					'sub_fields'   => array(
						array( 'key' => 'field_value_title', 'label' => __( 'Value Title', 'astra-child' ), 'name' => 'value_title', 'type' => 'text', 'required' => 1 ),
						array( 'key' => 'field_value_desc', 'label' => __( 'Value Description', 'astra-child' ), 'name' => 'value_desc', 'type' => 'textarea', 'required' => 1 ),
					),
				),
				array( 'key' => 'field_about_process_image', 'label' => __( 'Process Image', 'astra-child' ), 'name' => 'process_image', 'type' => 'image', 'return_format' => 'url' ),
				array( 'key' => 'field_about_process_title', 'label' => __( 'Process Title', 'astra-child' ), 'name' => 'process_title', 'type' => 'text' ),
				array( 'key' => 'field_about_process_desc', 'label' => __( 'Process Description', 'astra-child' ), 'name' => 'process_desc', 'type' => 'textarea' ),
				array( 'key' => 'field_about_qa_title', 'label' => __( 'Quality Assurance Title', 'astra-child' ), 'name' => 'qa_title', 'type' => 'text' ),
				array( 'key' => 'field_about_qa_desc', 'label' => __( 'Quality Assurance Description', 'astra-child' ), 'name' => 'qa_desc', 'type' => 'textarea' ),
			),
			'location' => array(
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-about.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-about.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-about - Copy.php' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'about-us' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'about' ) ),
			),
		)
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_astra_child_contact_page',
			'title'    => __( 'Contact Page Content', 'astra-child' ),
			'fields'   => array(
				array( 'key' => 'field_contact_hero_image', 'label' => __( 'Hero Background Image', 'astra-child' ), 'name' => 'contact_hero_image', 'type' => 'image', 'return_format' => 'url' ),
				array( 'key' => 'field_contact_hero_subtitle', 'label' => __( 'Hero Subtitle', 'astra-child' ), 'name' => 'contact_hero_subtitle', 'type' => 'text' ),
				array( 'key' => 'field_contact_hero_title', 'label' => __( 'Hero Title', 'astra-child' ), 'name' => 'contact_hero_title', 'type' => 'text' ),
				array( 'key' => 'field_contact_intro_text', 'label' => __( 'Intro Text', 'astra-child' ), 'name' => 'contact_intro_text', 'type' => 'textarea' ),
				array( 'key' => 'field_contact_address', 'label' => __( 'Address', 'astra-child' ), 'name' => 'contact_address', 'type' => 'text' ),
				array( 'key' => 'field_contact_phone', 'label' => __( 'Phone', 'astra-child' ), 'name' => 'contact_phone', 'type' => 'text' ),
				array( 'key' => 'field_contact_email', 'label' => __( 'Email', 'astra-child' ), 'name' => 'contact_email', 'type' => 'text' ),
				array( 'key' => 'field_contact_whatsapp', 'label' => __( 'WhatsApp Number', 'astra-child' ), 'name' => 'whatsapp_number', 'type' => 'text' ),
				array( 'key' => 'field_contact_form_shortcode', 'label' => __( 'Contact Form Shortcode', 'astra-child' ), 'name' => 'contact_form_shortcode', 'type' => 'text' ),
				array( 'key' => 'field_contact_google_map', 'label' => __( 'Google Map Iframe HTML', 'astra-child' ), 'name' => 'google_map_iframe', 'type' => 'textarea' ),
			),
			'location' => array(
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'template-contact.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-contact.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-contact.php' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'contact' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'contact-us' ) ),
			),
		)
	);

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
			'location' => array(
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-faq.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-faq.php' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'faq' ) ),
			),
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
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'home.php' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'blog' ) ),
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
			'location' => array(
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-products.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-products.php' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'products' ) ),
				array( array( 'param' => 'page_slug', 'operator' => '==', 'value' => 'shop' ) ),
			),
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
			'location' => array(
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'templates/template-default.php' ) ),
				array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'default' ) ),
			),
		)
	);
}
add_action( 'acf/init', 'astra_child_register_page_fields' );
