<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Warby
 */
?>

<?php if ( ! in_array( get_theme_mod( 'theme_layout', 'sidebar-right' ), array( 'single-column', 'narrow-column' ) ) ) : ?>

	<div id="secondary-section" role="complementary">
		<div id="secondary">
		<?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>
			<?php the_widget( 'WP_Widget_Archives', array(), warby_sidebar_args() ); ?>
			<?php the_widget( 'WP_Widget_Pages',  array(), warby_sidebar_args() ); ?>
		<?php endif; // end sidebar widget area ?>
		</div>
	</div><!-- #secondary-section -->

<?php endif; ?>
