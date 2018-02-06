<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly

	global $gt3_photo_gallery_defaults, $gt3_photo_gallery;
	$plugin_info    = get_plugin_data( GT3PG_PLUGINPATH . '/gt3-photo-video-gallery.php' );
	$theme_list     = (array) gt3_banner_addon();
	$plugin_title   = apply_filters( 'gt3pg_admin_title', GT3PG_ADMIN_TITLE );
	$plugin_version = apply_filters( 'gt3pg_admin_version', $plugin_info['Version'] );
	wp_enqueue_script('gt3pg_admin_js');
?>
<script>
	var gt3pg_admin_ajax_url = "<?=admin_url( "admin-ajax.php" )?>";
</script>

<div class="gt3pg_optimized_notice" style="display: none">
	<?=__('It requires GT3 Image Optimizer plugin','gt3pg');?>
</div>
<div class="gt3pg_admin_wrap">
	<div class="gt3pg_inner_wrap">
		<form action="" method="post" class="gt3pg_page_settings">
			<div class="gt3pg_main_line">
				<div class="gt3pg_themename">
					<?=$plugin_title?>
					<span class="gt3pg_theme_ver"><?=$plugin_version?></span>
				</div>
				<div class="gt3pg_links">
					<a href="<?=GT3PG_WORDPRESS_URL?>" target="_blank"><?php _e( 'Need Help?', 'gt3pg' ) ?></a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="gt3pg_admin_mix-container2">
				<div class="gt3pg_admin_mix-tabs type2">
					<div class="gt3pg_admin_mix-tabs-inner">
						<div class="gt3pg_admin_head_wrap">
							<div class="gt3pg_admin_head_caption">
								<div class="gt3pg_innerpadding with_text">
									<?php _e( 'This plugin lets you extend the functionality of the default WordPress gallery. To make the changes, please use the settings below. Once you\'ve chosen the right parameters, please click <strong>"Save Settings"</strong> button.', 'gt3pg' ); ?>
								</div>
							</div>
							<div class="gt3pg_admin_head_buttons">
								<div class="gt3pg_innerpadding">
									<div class="gt3pg_theme_settings_submit_cont">
										<div class="gt3pg_header_button_grow"></div>
										<input type="button" name="gt3pg_reset_theme_settings" class="gt3pg_admin_reset_settings gt3pg_admin_button gt3pg_admin_danger_btn"
										       value="<?php _e( 'Reset Settings', 'gt3pg' ); ?>" />
										<input type="submit" name="gt3pg_submit_theme_settings" class="gt3pg_admin_save_all gt3pg_admin_button gt3pg_admin_ok_btn"
										       value="<?php _e( 'Save Settings', 'gt3pg' ); ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="gt3pg_admin_mix-tab-content">
							<div class="gt3pg_admin_mix-tab-controls">
								<?php
									$controls = apply_filters( 'gt3_admin_mix_tabs_controls', array() );
									if ( is_array( $controls ) && count( $controls ) ) {
										ksort( $controls, SORT_NUMERIC );
										foreach ( $controls as $position => $control ) {
											/* @var gt3pg_admin_mix_tab_control $control */
											$control = apply_filters( 'gt3_before_render_admin_control_' . $control->name, $control, $control->name );
											if ( $control instanceof gt3pg_admin_mix_tab_control ) {
												$control->render();
											}
										}
									}
								?>


							</div>
							<div class="gt3pg_stand_setting gt3pg_admin_mix-tab-control gt3pg_video_tutorial_cont">
								<h2 class="gt3pg_option_heading"><?php _e( 'How to Use Gallery. Video Tutorial.', 'gt3pg' ) ?></h2>
								<p><?php _e( 'Please watch this short video tutorial to see how to use our GT3 photo & video gallery.', 'gt3pg' ) ?></p>
								<iframe width="100%" height="350" src="https://www.youtube.com/embed/eIUfmr91D8g" frameborder="0" allowfullscreen></iframe>
							</div>

							<div class="gt3pg_stand_setting gt3pg_admin_mix-tab-control gt3pg_video_tutorial_cont">
								<h2 class="gt3pg_option_heading"><?php _e( 'Premium Photography WordPress Themes', 'gt3pg' ) ?></h2>
								<p><?php _e( 'Check out our professionally developed Photo and Video WordPress themes. Easy way to build your awesome website.', 'gt3pg' ) ?></p>
								<div class="gt3pg-banner_items-wrapper">
									<?php
										foreach ( $theme_list as $theme_item ) {
											echo '<div class="gt3pg-banner_item-wrapper"><a href="' . $theme_item["item_url"] . '" class="gt3pg-banner_item_link" target="_blank"><span>' . __( 'View Demo', 'gt3pg' ) . '</span><img class="gt3pg-banner-image" src="' . $theme_item["image_url"] . '" alt="gt3themes"></a></div>';
										}
									?>
								</div>
							</div>

							<div class="clear"></div>
							<div class="gt3pg_theme_settings_submit_cont albotoom">
								<div class="gt3pg_theme_settings_submit_cont">
									<input type="button" name="gt3pg_reset_theme_settings" class="gt3pg_admin_reset_settings gt3pg_admin_button gt3pg_admin_danger_btn"
									       value="<?php _e( 'Reset Settings', 'gt3pg' ); ?>" />
									<input type="submit" name="gt3pg_submit_theme_settings" class="gt3pg_admin_save_all gt3pg_admin_button gt3pg_admin_ok_btn"
									       value="<?php _e( 'Save Settings', 'gt3pg' ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

