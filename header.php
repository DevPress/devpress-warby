<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Warby
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site">
	<div id="page">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'warby' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<div class="col-width">

					<div class="brand">
						<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<?php if ( get_theme_mod( 'logo', 0 ) ) : ?>
							<div class="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>">
								</a>
							</div>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( warby_brand_text() ) : ?>
						<div class="brand-text">
							<?php if ( get_theme_mod( 'display-site-title', 1 ) ) : ?>
								<div class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php echo get_bloginfo( 'name' ); ?>
									</a>
								</div>
							<?php endif; ?>

							<?php if ( get_theme_mod( 'display-site-description', 0 ) && get_bloginfo( 'description' ) != '' ) : ?>
								<div class="site-description"><?php bloginfo( 'description' ); ?></div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<div id="primary-navigation-section">
						<nav id="primary-navigation" class="navigation-menu clearfix" role="navigation">
							<?php wp_nav_menu( array(
								'theme_location' => 'primary',
								'link_before' => '<span>',
								'link_after' => '</span>',
								'depth' => '2'
							) ); ?>
						</nav>
						<div class="nav-search">
							<img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="Search" width="20" height="20">
						</div>
					</div>
					<?php endif; ?>

				</div><!-- .col-width -->
			</div><!-- .site-branding -->
		</header><!-- #masthead -->

		<div id="content" class="site-content clearfix">
			<div class="col-width clearfix">
