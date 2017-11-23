<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}
// remove all settings related to the plugin
function igal_delete_plugin() {
	$InstaGallerySetting = get_option('insta_gallery_setting');
	if(!empty($InstaGallerySetting['igs_flush'])){
	   delete_option( 'insta_gallery_setting' );
	   delete_option( 'insta_gallery_items' );
	}
}
igal_delete_plugin();
