<?php
/**
 * Custom template tags for this theme.
 *
 * @package Warby
 */

if ( ! function_exists( 'warby_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function warby_posted_on() {

	if ( get_theme_mod( 'display-post-dates', 1 ) ) :

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'warby' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			_x( 'By %s', 'post author', 'warby' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>';
		echo '<span class="byline"> ' . $byline . '</span>';

	endif;

}
endif;

if ( ! function_exists( 'warby_post_meta' ) ) :
/**
 * Prints post meta information for categories and tags.
 */
function warby_post_meta( $type = 'post' ) {

	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'warby' ) );

	if ( $category_list ) {
		echo '<span class="category-meta meta-group">';
		echo '<span class="category-meta-list">' . $category_list . '</span>';
		echo '</span>';
	}

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', __( ', ', 'warby' ) );

	if ( $tag_list ) {
		echo '<span class="tag-meta meta-group">';
		echo '<span class="tag-meta-list">' . $tag_list . '</span>';
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'warby' ), '<span class="edit-meta meta-group"><span class="edit-link">', '</span></span></span>' );

}
endif;
