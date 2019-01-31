<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'norton_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function norton_customize_search_form() {

		$form = '<div class="sidebar-container sidebar-search"><form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<label>
			<span class="screen-reader-text">' . esc_html( '', 'label', 'norton' ) . '</span>
			<input type="search" class="search-query form-control" placeholder="' . esc_attr_x( 'Search..', 'placeholder', 'norton' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'norton' ) . '" />
			</label>
			<button type="submit" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button></form></div> ';

		return $form;
    }
	
	endif;
add_filter( 'get_search_form', 'norton_customize_search_form', 15 );
?>

