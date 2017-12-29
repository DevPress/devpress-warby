<?php
/**
 * Search form template
 *
 * @package Warby
 */
?>

<form role="search" method="get" class="search-form clearfix" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'warby' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( 'Search...', 'warby' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'warby' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<div class="warby-icon-search"></div><span class="screen-reader-text"><?php _e( 'Search...', 'warby' ); ?></span>
	</button>
</form>
