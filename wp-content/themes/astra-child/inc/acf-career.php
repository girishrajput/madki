<?php
/**
 * Register Career Custom Post Type & ACF Fields
 *
 * @package Astra_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Career Custom Post Type
 */
function astra_child_register_career_cpt() {
	$labels = array(
		'name'                  => _x( 'Careers', 'Post Type General Name', 'astra-child' ),
		'singular_name'         => _x( 'Career Opening', 'Post Type Singular Name', 'astra-child' ),
		'menu_name'             => __( 'Careers', 'astra-child' ),
		'name_admin_bar'        => __( 'Career Opening', 'astra-child' ),
		'archives'              => __( 'Career Archives', 'astra-child' ),
		'attributes'            => __( 'Career Attributes', 'astra-child' ),
		'parent_item_colon'     => __( 'Parent Opening:', 'astra-child' ),
		'all_items'             => __( 'All Job Openings', 'astra-child' ),
		'add_new_item'          => __( 'Add New Job Opening', 'astra-child' ),
		'add_new'               => __( 'Add New', 'astra-child' ),
		'new_item'              => __( 'New Job Opening', 'astra-child' ),
		'edit_item'             => __( 'Edit Job Opening', 'astra-child' ),
		'update_item'           => __( 'Update Job Opening', 'astra-child' ),
		'view_item'             => __( 'View Job Opening', 'astra-child' ),
		'view_items'            => __( 'View Openings', 'astra-child' ),
		'search_items'          => __( 'Search Job Openings', 'astra-child' ),
		'not_found'             => __( 'No job openings found', 'astra-child' ),
		'not_found_in_trash'    => __( 'No job openings found in Trash', 'astra-child' ),
	);
	$args = array(
		'label'                 => __( 'Career Opening', 'astra-child' ),
		'description'           => __( 'Madki Food career opportunities', 'astra-child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'revisions' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'career', $args );
}
add_action( 'init', 'astra_child_register_career_cpt', 0 );

/**
 * Register ACF Fields for Career Openings
 */
function astra_child_register_career_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_madki_career_details',
		'title' => __( 'Job Opening Details', 'astra-child' ),
		'fields' => array(
			array(
				'key' => 'field_job_department',
				'label' => __( 'Department', 'astra-child' ),
				'name' => 'job_department',
				'type' => 'text',
				'default_value' => 'Sales & Distribution',
				'required' => 1,
			),
			array(
				'key' => 'field_job_location',
				'label' => __( 'Location', 'astra-child' ),
				'name' => 'job_location',
				'type' => 'text',
				'default_value' => 'Jaipur, Rajasthan',
				'required' => 1,
			),
			array(
				'key' => 'field_job_type',
				'label' => __( 'Job Type', 'astra-child' ),
				'name' => 'job_type',
				'type' => 'select',
				'choices' => array(
					'Full-Time' => 'Full-Time',
					'Part-Time' => 'Part-Time',
					'Contract'  => 'Contract',
				),
				'default_value' => 'Full-Time',
			),
			array(
				'key' => 'field_job_experience',
				'label' => __( 'Experience Required', 'astra-child' ),
				'name' => 'job_experience',
				'type' => 'text',
				'default_value' => '2-4 Years',
			),
			array(
				'key' => 'field_job_description',
				'label' => __( 'Job Overview / Description', 'astra-child' ),
				'name' => 'job_description',
				'type' => 'textarea',
				'rows' => 3,
			),
			array(
				'key' => 'field_job_requirements',
				'label' => __( 'Key Requirements & Qualifications', 'astra-child' ),
				'name' => 'job_requirements',
				'type' => 'textarea',
				'rows' => 4,
			),
			array(
				'key' => 'field_job_additional_info',
				'label' => __( 'Additional Information (Optional)', 'astra-child' ),
				'name' => 'job_additional_info',
				'type' => 'textarea',
				'rows' => 2,
			),
			array(
				'key' => 'field_job_contact_email',
				'label' => __( 'HR Contact Email', 'astra-child' ),
				'name' => 'job_contact_email',
				'type' => 'email',
				'default_value' => 'careers@madkimasala.com',
			),
			array(
				'key' => 'field_job_contact_phone',
				'label' => __( 'HR Contact Phone / WhatsApp', 'astra-child' ),
				'name' => 'job_contact_phone',
				'type' => 'text',
				'default_value' => '+919876543210',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'career',
				),
			),
		),
	) );
}
add_action( 'acf/init', 'astra_child_register_career_fields' );
