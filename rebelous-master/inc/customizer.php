<?php
/**
 * rebelous Theme Customizer
 *
 * @package rebelous
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rebelous_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'rebelous_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rebelous_customize_preview_js() {
	wp_enqueue_script( 'rebelous_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rebelous_customize_preview_js' );

add_action( 'customize_register', 'rebelous_register_color_scheme_customizer' );

/**
 * Adding our colour scheme setting and control
 *
 * @wp-hook 	customize_register
 * @param	WP_Customize_Manager $wp_customize the wp_customize object.
 * @return	void
 */
function rebelous_register_color_scheme_customizer( WP_Customize_Manager $wp_customize ) {

	$schemes	= rebelous_get_color_schemes();
	$section	= 'colors';
	$key		= 'rebelous_color_scheme';
	$title		= __( 'Color scheme', 'rebelous' );

	$wp_customize->add_setting(
		$key,
		array(
			'default' => 'default',
			'transport' => 'postMessage',
			'sanitize_callback' => 'rebelous_sanitize_color',
		)
	);

	$wp_customize->add_control(
		$key, ( array(
		'label'    => $title,
		'section'  => $section,
		'settings' => $key,
		'schemes'  => $schemes,
		'default'  => 'default',
		'type'     => 'radio',
		'choices'  => $schemes,
		) ) );
}

/**
 * If colour is not in registerd colour schemes, return default.
 *
 * @param string $value Value of color scheme theme mod.
 */
function rebelous_sanitize_color( $value ) {
	if ( ! array_key_exists( $value, rebelous_get_color_schemes() ) ) {
		$value = 'default';
	}

	return $value;
}

/**
 * Get color schemes. You can filter this in your child theme.
 *
 * @return-filter	rebelous_get_color_schemes
 * @return			Array
 */
function rebelous_get_color_schemes() {

	$schemes = array(
		'default' => __( 'Default', 'rebelous' ),
		'blue' => __( 'Blue', 'rebelous' ),
		'red' => __( 'Red', 'rebelous' ),
		'green' => __( 'Green', 'rebelous' ),
		'teal' => __( 'Teal', 'rebelous' ),
	);

	return apply_filters( 'rebelous_get_color_schemes', $schemes );
}

add_filter( 'body_class', 'rebelous_filter_body_class_add_colorscheme' );

/**
 * Adding our color scheme to the body-classes
 *
 * @wp-hook	body_class
 * @uses	get_theme_mod, rebelous_get_color_schemes
 * @param	Array $classes the default body classes.
 * @return	Array $classes
 */
function rebelous_filter_body_class_add_colorscheme( Array $classes ) {

	$scheme		= get_theme_mod( 'rebelous_color_scheme' ) ? get_theme_mod( 'rebelous_color_scheme' ) : 'default' ;
	$schemes	= rebelous_get_color_schemes();

	if ( empty( $schemes ) || ! array_key_exists( $scheme, $schemes ) ) {
		$scheme = 'default';
	}

	$classes[] = $scheme;

	return $classes;
}
