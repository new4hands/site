<?php

	/*
	Plugin Name: GT3 Photo & Video Gallery - Lite
	Plugin URI: https://gt3themes.com/
	Description: This powerful plugin lets you extend the functionality of the default WordPress gallery. You can easily customize the look and feel of the photo or video gallery. Discover the power of GT3themes products.
	Version: 1.6.5.6
	Author: GT3 Themes
	Author URI: https://gt3themes.com/
	*/

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly

	define( 'GT3PG_PLUGIN_VERSION', '1.6.5.6' );
	define( 'GT3PG_PLUGINNAME', 'GT3 Photo & Video Gallery' );
	define( 'GT3PG_ADMIN_TITLE', 'GT<span class="digit">3</span> Photo & Video Gallery - Lite' );
	define( 'GT3PG_PLUGINSHORT', 'gt3_photo_gallery' );
	define( 'GT3PG_JSURL', plugins_url( 'js/', __FILE__ ) );
	define( 'GT3PG_IMGURL', plugins_url( 'img/', __FILE__ ) );
	define( 'GT3PG_CSSURL', plugins_url( 'css/', __FILE__ ) );
	define( 'GT3PG_PLUGINROOTURL', plugins_url( '', __FILE__ ) );
	define( 'GT3PG_PLUGINPATH', plugin_dir_path( __FILE__ ) );
	define( 'GT3PG_WORDPRESS_URL', 'https://wordpress.org/support/plugin/gt3-photo-video-gallery' );

	/*Load files*/
	require_once( GT3PG_PLUGINPATH . "core/loader.php" );
	register_activation_hook( __FILE__, 'activationHook' );

#Load textdomain
	add_action( 'init', 'gt3pg_locale' );

	function gt3pg_locale() {
		load_plugin_textdomain( 'gt3pg', false, dirname( plugin_basename( __FILE__ ) ) . '/core/languages/' );
	}

#Register Admin CSS and JS
	function gt3pg_register_admin_css_js() {
		#CSS (Admin)
		wp_enqueue_style( 'gt3pg_admin_css', GT3PG_CSSURL . 'admin.css', null, GT3PG_PLUGIN_VERSION );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'selectBox_css', GT3PG_CSSURL . 'jquery.selectBox.css', null, GT3PG_PLUGIN_VERSION );
		wp_enqueue_style( 'onOff_css', GT3PG_CSSURL . 'on_off.css' , null, GT3PG_PLUGIN_VERSION);

		#JS (Admin)
		wp_register_script( 'gt3pg_admin_js', GT3PG_JSURL . 'admin.js', array( 'jquery' ), GT3PG_PLUGIN_VERSION );

		wp_enqueue_script( "jquery" );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'selectBox_js', GT3PG_JSURL . 'jquery.selectBox.js', null, GT3PG_PLUGIN_VERSION );
	}

	add_action( 'admin_init', 'gt3pg_register_admin_css_js' );

	function gt3pg_enqueue_media() {
		wp_enqueue_media();
	}

	add_action( 'admin_enqueue_scripts', 'gt3pg_enqueue_media' );

#Register Front CSS and JS
	function gt3pg_register_front_css_js() {

		#CSS (Front)
		wp_enqueue_style( 'gt3pg_css', GT3PG_CSSURL . 'gt3pg.css' , null, GT3PG_PLUGIN_VERSION);

		#JS (Front)
		wp_enqueue_script( "jquery" );
		wp_enqueue_script( 'gt3pg_js', GT3PG_JSURL . 'gt3pg.js', array(), GT3PG_PLUGIN_VERSION, true );

	}

	add_action( 'wp_enqueue_scripts', 'gt3pg_register_front_css_js' );

	function gt3pg_page_welcome_set_redirect() {
		set_transient( '_gt3pg_page_welcome_redirect', 1, 30 );
	}

	function activationHook() {
		do_action( 'gt3pg_activation_hook' );
	}

	function gt3pg_page_welcome_redirect() {
		$redirect = get_transient( '_gt3pg_page_welcome_redirect' );
		delete_transient( '_gt3pg_page_welcome_redirect' );
		$redirect && wp_redirect( admin_url( 'admin.php?page=' . GT3PG_PLUGINSHORT . '_options' ) );
	}

	// Enables redirect on activation.
	add_action( 'gt3pg_activation_hook', 'gt3pg_page_welcome_set_redirect' );
	add_action( 'admin_init', 'gt3pg_page_welcome_redirect' );

	function gt3pg_add_admin_page() {
		global $gt3_photo_gallery_defaults, $gt3_photo_gallery;

		$photo_gallery = gt3pg_get_option( "photo_gallery" );
		if ( $photo_gallery == false ) {
			gt3pg_update_option( "photo_gallery", $gt3_photo_gallery_defaults );
		} else {
			$gt3_photo_gallery = $photo_gallery;
		}

		unset( $photo_gallery );

		add_menu_page(
			apply_filters( 'gt3pg_menu_page_title', 'GT3 Gallery Lite' ),
			apply_filters( 'gt3pg_menu_title', 'GT3 Gallery Lite' ),
			'administrator',
			GT3PG_PLUGINSHORT . '_options',
			'gt3pg_plugin_options',
			apply_filters( 'gt3pg_menu_icon_url', 'dashicons-format-gallery' ),
			apply_filters( 'gt3pg_menu_position', '10.1' )
		);
	}

	add_action( 'admin_menu', 'gt3pg_add_admin_page' );

	function gt3pg_plugin_options() {
		require_once( GT3PG_PLUGINPATH . 'views/gt3pg_plugin_options.php' );
	}

#Work with options
	if ( ! function_exists( 'gt3pg_get_option' ) ) {
		function gt3pg_get_option( $optionname, $defaultValue = "" ) {
			if ( ! isset( $GLOBALS["gt3_photo_gallery"] ) || ! is_array( $GLOBALS["gt3_photo_gallery"] ) || ! count( $GLOBALS["gt3_photo_gallery"] ) ) {
				$returnedValue = get_option( "gt3pg_" . $optionname, $defaultValue );
				if ( $returnedValue == false || empty( $returnedValue ) ) {
					gt3pg_update_option( "photo_gallery", $GLOBALS["gt3_photo_gallery_defaults"] );

					return $GLOBALS["gt3_photo_gallery_defaults"];
				} else {
					return array_merge( $GLOBALS["gt3_photo_gallery_defaults"], $returnedValue );
				}

			} else {
				return $GLOBALS["gt3_photo_gallery"];
			}
		}
	}

	if ( ! function_exists( 'gt3pg_delete_option' ) ) {
		function gt3pg_delete_option( $optionname ) {
			return delete_option( "gt3pg_" . $optionname );
		}
	}

	if ( ! function_exists( 'gt3pg_update_option' ) ) {
		function gt3pg_update_option( $optionname, $optionvalue ) {
			if ( update_option( "gt3pg_" . $optionname, $optionvalue ) ) {
				return true;
			}
		}
	}

	if ( ! function_exists( 'gt3_banner_addon' ) ) {
		function gt3_banner_addon() {

			$url  = 'https://s3.amazonaws.com/gt3themes/api/items/photo-plugin.json';
			$json = wp_remote_request( $url );

			if ( ! is_wp_error( $json ) ) {
				$json = wp_remote_retrieve_body( $json );
				$json = json_decode( $json, true );

				if ( ! empty( $json ) && ! empty( $json['items'] ) ) {
					return $json['items'];
				}
			}

			return array();
		}
	}

	function gt3pg_add_plugin_meta_links( $meta_fields, $file ) {
		if ( plugin_basename( __FILE__ ) == $file ) {
			$meta_fields[] = "<a href='" . GT3PG_WORDPRESS_URL . "' target='_blank'>" . __( 'Support Forum', 'gt3pg' ) . "</a>";
			$meta_fields[] = "<a href='" . GT3PG_WORDPRESS_URL . "/reviews#new-post' target='_blank' title='" . __( 'Rate', 'gt3pg' ) . "'>
            <i class='wdi-rate-stars'>"
			                 . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			                 . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			                 . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			                 . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			                 . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			                 . "</i></a>";

			$stars_color = "#ffb900";

			echo "<style>"
			     . ".wdi-rate-stars{display:inline-block;color:" . $stars_color . ";position:relative;top:3px;}"
			     . ".wdi-rate-stars svg{fill:" . $stars_color . ";}"
			     . ".wdi-rate-stars svg:hover{fill:" . $stars_color . "}"
			     . ".wdi-rate-stars svg:hover ~ svg{fill:none;}"
			     . "</style>";
		}

		return $meta_fields;
	}

	add_filter( "plugin_row_meta", 'gt3pg_add_plugin_meta_links', 10, 2 );

	function gt3pg_plugin_action_links( $links, $file ) {
		if ( $file == 'gt3-photo-video-gallery/gt3-photo-video-gallery.php' ) {
			$settings_link = '<a href="' . menu_page_url('gt3_photo_gallery_options', false) . '">' . esc_html__( 'Settings', 'gt3pg' ) . '</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}
	add_filter( 'plugin_action_links', 'gt3pg_plugin_action_links', 10, 2 );
