<?php
/**
 * redbiz header
 *
 * @package redbiz
 */

if ( ! function_exists( 'themesflat_header' ) ) :
function themesflat_header() {		
	get_template_part( 'tpl/topbar');
	get_template_part( 'tpl/site-header');
}
endif;