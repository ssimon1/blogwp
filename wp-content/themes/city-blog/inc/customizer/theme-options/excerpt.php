<?php
/**
 * Excerpt
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_excerpt_options',
	array(
		'panel' => 'city_blog_theme_options',
		'title' => esc_html__( 'Excerpt', 'city-blog' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'city_blog_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'city_blog_sanitize_number_range',
		'validate_callback' => 'city_blog_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'city_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'city-blog' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'city-blog' ),
		'section'     => 'city_blog_excerpt_options',
		'settings'    => 'city_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
