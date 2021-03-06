<?php
/**
 * customizer -- settings
 */

/*** SECTION ***/

//set up settings section
$wp_customize->add_section('settings' , array(
    'title' => __('Settings','pollster'),
));

/*** FIELDS ***/

// poll end date-time
$wp_customize->add_setting('poll_end_date_time_settings');
$wp_customize->add_control(new WP_Customize_Date_Time_Control($wp_customize, 'poll_end_date_time_settings_control', array(
    'label' => 'Poll exiry date',
    'section' => 'settings',
    'settings' => 'poll_end_date_time_settings',
)));

// vote button text
$wp_customize->add_setting('vote_button_text');
$wp_customize->add_control('vote_button_text_control', array(
    'type' => 'text',
    'label' => 'Vote button text',
    'section' => 'settings',
    'settings' => 'vote_button_text',
    'input_attrs' => array(
        'placeholder' => __( 'Enter message' ),
    )
));

// graph type
$wp_customize->add_setting('graph_type', array(
    'default' => 'bar'
));
$wp_customize->add_control('graph_type_control', array(
    'type' => 'select',
    'choices'  => array(
        'bar'  => 'Bar',
        'pie' => 'Pie',
        'doughnut' => 'Doughnut',
    ),
    'label' => 'Graph type',
    'section' => 'settings',
    'settings' => 'graph_type',
));

// graph color - contestant #1
$wp_customize->add_setting('graphColor_1', array(
    'default' => '#0066b2'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'graphColor_1_control', array(
    'label' => 'Graph color for Contestant #1',
    'section' => 'settings',
    'settings' => 'graphColor_1',
)));

// graph color - contestant #2
$wp_customize->add_setting('graphColor_2', array(
    'default' => '#ffc600'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'graphColor_2_control', array(
    'label' => 'Graph color for Contestant #2',
    'section' => 'settings',
    'settings' => 'graphColor_2',
)));

// has voted message
$wp_customize->add_setting('poll_has_voted', array(
    'default' => 'You already cast your vote'
));
$wp_customize->add_control('poll_has_voted_control', array(
    'type' => 'textarea',
    'label' => 'Has voted message',
    'description' => 'Message to display to returning users who already cast their vote',
    'section' => 'settings',
    'settings' => 'poll_has_voted',
    'input_attrs' => array(
        'placeholder' => __( 'Enter message' ),
    )
));

// poll closed message
$wp_customize->add_setting('poll_ended_message');
$wp_customize->add_control('poll_ended_message_control', array(
    'type' => 'textarea',
    'label' => 'Poll closed message',
    'description' => 'Message to display after the poll has ended',
    'section' => 'settings',
    'settings' => 'poll_ended_message',
    'input_attrs' => array(
        'placeholder' => __( 'Enter message' ),
    )
));

// footer disclaimer
$wp_customize->add_setting('footer_disclaimer');
$wp_customize->add_control('footer_disclaimer_control', array(
    'type' => 'textarea',
    'label' => 'Footer disclaimer',
    'description' => 'Optional',
    'section' => 'settings',
    'settings' => 'footer_disclaimer',
    'input_attrs' => array(
        'placeholder' => __( 'Enter message' ),
    )
));

// reset poll
$wp_customize->add_setting('poll_reset');
$wp_customize->add_control('poll_reset_control', array(
    'type' => 'button',
    'label' => 'Reset poll',
    'description' => 'This will reset all vote counts to zero.',
    'input_attrs' => array(
        'class' => 'button button-primary',
        'value' => 'Reset poll'
    ),
    'section' => 'settings',
    'settings' => array(),
));
