<?php
/**
 * Functions used to implement options.
 *
 * @package Warby
 */

/**
* Adds custom classes to the array of body classes.
*
* @since Gather 1.0.0
*
* @param array $classes
* @return array $classes
*/
function warby_body_classes( $classes ) {

	if ( is_active_sidebar( 'primary' ) ) {
		// $classes[] = 'layout-sidebar-right';
	}

	return $classes;
}
add_filter( 'body_class', 'warby_body_classes' );

if ( ! function_exists( 'warby_footer_text' ) ) :
/**
 * Get default footer text
 *
 * @since Warby 1.0.0
 *
 * @return string $text
 */
function warby_footer_text() {
	$text = sprintf(
		__( 'Powered by %s', 'warby' ),
		'<a href="' . esc_url( __( 'http://wordpress.org/', 'warby' ) ) . '">WordPress</a>'
	);
	$text .= '<span class="sep"> | </span>';
	$text .= sprintf(
		__( '%1$s by %2$s.', 'warby' ),
			'Warby Theme',
			'<a href="http://devpress.com/" rel="designer">DevPress</a>'
	);
	return $text;
}
endif;

/**
 * Append class "social" to specific off-site links
 *
 * @since Warby 1.0.0
 */
function warby_social_nav_class( $classes, $item ) {

	if ( 0 == $item->parent && 'custom' == $item->type) {

		$url = parse_url( $item->url );

		if ( !isset( $url['host'] ) ) {
			return $classes;
		}

		$base = str_replace( "www.", "", $url['host'] );

		$social = array(
			'behance.com',
			'dribbble.com',
			'facebook.com',
			'flickr.com',
			'github.com',
			'linkedin.com',
			'pinterest.com',
			'plus.google.com',
			'instagr.am',
			'instagram.com',
			'skype.com',
			'spotify.com',
			'twitter.com',
			'vimeo.com'
		);
		$social = apply_filters( 'warby_social_links', $social );

		// Tumblr needs special attention
		if ( strpos( $base, 'tumblr' ) ) {
			$classes[] = 'social';
		}

		if ( in_array( $base, $social ) ) {
			$classes[] = 'social';
		}

	}

	return $classes;

}
add_filter( 'nav_menu_css_class', 'warby_social_nav_class', 10, 2 );

/**
 * Returns true if site title or tagline is visible
 *
 * @since Warby 1.0.0
 */
function warby_brand_text() {

	if ( get_theme_mod( 'display_site_title', 1 ) ) {
		return true;
	}

	if ( get_theme_mod( 'display_site_description', 0 ) && get_bloginfo( 'description' ) !== '' ) {
		return true;
	}

	return false;
}
