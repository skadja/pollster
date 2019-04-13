<?php
/**
 * customizer -- contestants
 */

/*** SECTION ***/

//set up contestants section
$wp_customize->add_section('content' , array(
	'title' => __('Contestants','pollster'),
));

/*** FIELDS ***/

// CONTESTANT #1

// header
$wp_customize->add_setting('custom_info_1');
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'custom_info_1', array(
	'label'    		=> esc_html__('Contestant - 1', 'pollster'),
	'description' 	=> esc_html__('First contestant information.', 'pollster'),
	'settings'		=> 'custom_info_1',
	'section'  		=> 'content',
)));

// image for contestant #1
$wp_customize->add_setting('c1_img_settings');
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'c1_img_settings_control', array(
	'label' => 'Image',
	'mime_type' => 'image',
	'section' => 'content',
	'settings' => 'c1_img_settings',
)));

// name for contestant #1
$wp_customize->add_setting('c1_name_settings');
$wp_customize->add_control('c1_name_settings_control', array(
	'type' => 'text',
	'label' => 'Name',
	'section' => 'content',
	'settings' => 'c1_name_settings',
));

// details for contestant #1
$wp_customize->add_setting('c1_details_settings');
$wp_customize->add_control('c1_details_settings_control', array(
	'type' => 'textarea',
	'label' => 'Bio',
	'section' => 'content',
	'settings' => 'c1_details_settings',
	'input_attrs' => array(
		'placeholder' => __( 'Optional' ),
	)
));

/**************/

// CONTESTANT #2

// separator
$wp_customize->add_setting('separator_0', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_0', array(
	'settings'		=> 'separator_0',
	'section'  		=> 'content',
)));

// header
$wp_customize->add_setting('custom_info_2');
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'custom_info_2', array(
	'label'    		=> esc_html__('Contestant - 2', 'pollster'),
	'description' 	=> esc_html__('First contestant information.', 'pollster'),
	'settings'		=> 'custom_info_2',
	'section'  		=> 'content',
)));

// image for contestant #2
$wp_customize->add_setting('c2_img_settings');
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'c2_img_settings_control', array(
	'label' => 'Image',
	'mime_type' => 'image',
	'section' => 'content',
	'settings' => 'c2_img_settings',
)));

// name for contestant #2
$wp_customize->add_setting('c2_name_settings');
$wp_customize->add_control('c2_name_settings_control', array(
	'type' => 'text',
	'label' => 'Name',
	'section' => 'content',
	'settings' => 'c2_name_settings',
));

// details for contestant #2
$wp_customize->add_setting('c2_details_settings');
$wp_customize->add_control('c2_details_settings_control', array(
	'type' => 'textarea',
	'label' => 'Bio',
	'section' => 'content',
	'settings' => 'c2_details_settings',
	'input_attrs' => array(
		'placeholder' => __( 'Optional' ),
	)
));
