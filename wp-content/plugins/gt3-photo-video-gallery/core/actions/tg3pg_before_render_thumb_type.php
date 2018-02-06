<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly

	add_filter( 'tg3pg_before_render_thumb_type', function ( $type, $atts ) {
		return in_array( $atts['thumb_type'], array(
			'square',
			'rectangle',
			'circle',
			'masonry'
		) ) ? $atts['thumb_type'] : $type;

	}, 10, 2 );