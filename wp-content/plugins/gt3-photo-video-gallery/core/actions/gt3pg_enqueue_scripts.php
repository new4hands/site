<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly

	add_action( 'wp_enqueue_scripts', function () {

		wp_register_script( 'blueimp-gallery.js', GT3PG_PLUGINROOTURL . '/assets/js/blueimp-gallery.js', array(), GT3PG_PLUGIN_VERSION, true );
		wp_register_script( 'blueimp-gallery-video.js', GT3PG_PLUGINROOTURL . '/assets/js/blueimp-gallery-video.js', array(), GT3PG_PLUGIN_VERSION, true );
		wp_register_script( 'blueimp-gallery-vimeo.js', GT3PG_PLUGINROOTURL . '/assets/js/blueimp-gallery-vimeo.js', array(), GT3PG_PLUGIN_VERSION, true );
		wp_register_script( 'blueimp-gallery-youtube.js', GT3PG_PLUGINROOTURL . '/assets/js/blueimp-gallery-youtube.js', array(), GT3PG_PLUGIN_VERSION, true );
		wp_register_script( 'blueimp-helper.js', GT3PG_PLUGINROOTURL . '/assets/js/blueimp-helper.js', array(), GT3PG_PLUGIN_VERSION, true );
		wp_register_script( 'isotop', GT3PG_JSURL . 'isotope.pkgd.min.js', array( 'jquery' ), GT3PG_PLUGIN_VERSION, true );

		wp_register_style( 'blueimp-gallery.css', GT3PG_PLUGINROOTURL . '/assets/css/blueimp-gallery.css',null,GT3PG_PLUGIN_VERSION );
		wp_register_style( 'blueimp-gallery-video.css', GT3PG_PLUGINROOTURL . '/assets/css/blueimp-gallery-video.css', null,GT3PG_PLUGIN_VERSION );
		wp_register_style( 'gt3pg_hover.css', GT3PG_PLUGINROOTURL . '/assets/css/hover.css' , null,GT3PG_PLUGIN_VERSION );

		wp_enqueue_script( 'blueimp-gallery.js' );
		wp_enqueue_script( 'blueimp-gallery-video.js' );
		wp_enqueue_script( 'blueimp-gallery-vimeo.js' );
		wp_enqueue_script( 'blueimp-gallery-youtube.js' );

		wp_enqueue_style( 'blueimp-gallery.css' );
		wp_enqueue_style( 'blueimp-gallery-video.css' );
		wp_enqueue_style( 'gt3pg_hover.css' );

		wp_localize_script( 'blueimp-gallery.js', 'gt3pg_ajax', array(
			'url' => admin_url( 'admin-ajax.php' )
		) );

	} );
