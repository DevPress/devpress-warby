<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Warby
 */
?>
			</div><!-- .col-width -->
		</div><!-- #content -->

	</div><!-- #page -->

	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
	<div class="footer-widgets <?php echo esc_attr( warby_footer_class() ); ?> clearfix">
		<div class="col-width">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div><!-- .footer-widgets -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-width">

			<?php if ( get_theme_mod( 'footer-text', warby_footer_text() ) != '' ) : ?>
			<div class="site-info">
				<?php echo do_shortcode( get_theme_mod( 'footer-text', warby_footer_text() ) ); ?>
			</div><!-- .site-info -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav id="footer-navigation" class="navigation-menu" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'footer',
					'link_before' => '<span>',
					'link_after' => '</span>',
					'depth' => '1',
				) ); ?>
			</nav>
			<?php endif; ?>

		</div><!-- .col-width -->
	</footer><!-- #colophon -->

</div><!-- .site -->

<div class="search-modal">
	<div class="flex">
		<div class="search-container">
			<h3>Search</h3>
		</div>
	</div>
	<div class="close-modal">×</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
