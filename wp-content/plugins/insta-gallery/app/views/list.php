<?php
if (! defined('ABSPATH')) {
    die();
}
$InstaGalleryItems = get_option('insta_gallery_items');
$InstaGallerySetting = get_option('insta_gallery_setting');

?>

<?php
// check cURL / remote url access
if (! function_exists('curl_version') && ! @ini_get('allow_url_fopen')) {
    ?>
<div class="ig_phpc_warning">
	<p>
		<strong>Warning: </strong> cURL is NOT installed in your PHP installation. <br />
		<sub>cURL is the required PHP extension to work this plugin properly. Please
			install/activate cURL OR contact with your Server Administrator.</sub>
	</p>
</div>
<?php } ?>

<p>
	<a href="<?php echo INSGALLERY_URL_ADMIN_PAGE; ?>&tab=edit"
		title="Add New Gallery" class="ig-btn"><span class="dashicons dashicons-plus"></span>Add
		New Gallery</a>
</p>
<?php
// update_option( 'insta_gallery_items', '' );
// delete_option('wpshout_tut_option');
if (empty($InstaGalleryItems)) {
    ?>
<h3 class="ig-no-items-msg">It looks like you have not added any gallery yet.
	Please Click on 'ADD NEW GALLERY' to add one.</h3>
<?php } ?>

<?php if( !empty($InstaGalleryItems) && is_array($InstaGalleryItems) ){  ?>
<div>
	<table class="widefat">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Item</th>
				<th>Shortcode</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 1; foreach($InstaGalleryItems as $k => $IGItem){ ?>
		<tr>
				<td><?php echo $i++; ?></td>
				<td>
			<?php
        
        if ($IGItem['ig_select_from'] == 'username') {
            echo 'Username / ' . $IGItem['insta_user'];
        } else {
            echo '# Tag / ' . $IGItem['insta_tag'];
        }
        ?>
			</td>
				<td><code>[insta-gallery id="<?php echo $k; ?>"]</code></td>
				<td><a
					href="<?php echo INSGALLERY_URL_ADMIN_PAGE; ?>&tab=edit&ig_item=<?php echo $k; ?>"
					class="ig-btn"><span class="dashicons dashicons-edit"></span> Edit</a> <a
					href="<?php echo INSGALLERY_URL_ADMIN_PAGE; ?>&ig_item_delete=<?php echo $k; ?>"
					class="ig-btn" onclick="return ig_item_delete();"><span
						class="dashicons dashicons-trash"></span> Delete</a></td>
			</tr>
		<?php } unset($i); ?>
	</tbody>
	</table>
</div>
<br />
<hr />
<div id="ig_adv-setting-panel">
	<p>
		<button class="ig_adv-setting-toggle ig-btn">
			<span class="dashicons dashicons-plus"></span><span
				class="dashicons dashicons-minus"></span>Additional Setting
		</button>
	</p>
	<div class="ig_adv-setting">
		<form method="post">
			<table class="widefat">
				<tbody>
					<tr>
						<th>Gallery Loader Image URL:</th>
						<td><input type="url" name="igs-spinner"
							value="<?php if(!empty($InstaGallerySetting['igs_spinner'])) echo $InstaGallerySetting['igs_spinner'];?>"
							onchange="ig_change_spinner(this)" /><span class="description"><br />please
								paste the image url to replace with default Gallery loader(Instagram
								icon). </span></td>
						<td rowspan="2">
							<div class="ig-spinner">
								<svg version="1.1" class="ig-spin" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									viewBox="0 0 551.034 551.034"
									style="enable-background: new 0 0 551.034 551.034;"
									xml:space="preserve">
            						<g>
                                		<linearGradient id="SVGID_1_"
										gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517"
										y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                			<stop offset="0" style="stop-color:#E09B3D" />
                                			<stop offset="0.3" style="stop-color:#C74C4D" />
                                			<stop offset="0.6" style="stop-color:#C21975" />
                                			<stop offset="1" style="stop-color:#7024C4" />
                                		</linearGradient>
                                		<path style="fill:url(#SVGID_1_);"
										d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
                                		c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
                                		C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
                                		c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
                                		c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z" />
                                		<linearGradient id="SVGID_2_"
										gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517"
										y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                			<stop offset="0" style="stop-color:#E09B3D" />
                                			<stop offset="0.3" style="stop-color:#C74C4D" />
                                			<stop offset="0.6" style="stop-color:#C21975" />
                                			<stop offset="1" style="stop-color:#7024C4" />
                                		</linearGradient>
                                		<path style="fill:url(#SVGID_2_);"
										d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517
                                		S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083
                                		s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z" />
                                		<linearGradient id="SVGID_3_"
										gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31"
										y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                			<stop offset="0" style="stop-color:#E09B3D" />
                                			<stop offset="0.3" style="stop-color:#C74C4D" />
                                			<stop offset="0.6" style="stop-color:#C21975" />
                                			<stop offset="1" style="stop-color:#7024C4" />
                                		</linearGradient>
                                		<circle style="fill:url(#SVGID_3_);"
										cx="418.31" cy="134.07" r="34.15" />
                                	</g>
                           		</svg>
							</div>
						</td>
					</tr>
					<tr>
						<th>Remove everything on uninstall</th>
						<td><input type="checkbox" name="igs-flush" value="1"
							onclick="ig_validate_flush(this)"
							<?php if(!empty($InstaGallerySetting['igs_flush'])) echo 'checked';?> /><span
							class="description"> check this to remove all data related to this plugin
								when removing this plugin. </span></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"><button type="submit" class="ig-btn">update</button> <span
							class="ig_adv-setting-fmsg"></span></td>
					</tr>
				</tfoot>
			</table>
			<input type="hidden" name="igadvs_nonce"
				value="<?php echo wp_create_nonce( 'igadvs_nonce_key' ); ?>" /> <input
				type="hidden" name="action" value="save_igadvs" />
		</form>
	</div>
</div>
<div class="ig_donation-wrap">
	<p>
		Please Donate now to support the Advancement of this plugin. Thanks <a
			class="ig_donation_btn" href="https://www.paypal.me/karanpay" target="blank">Donate
			<img src="<?php echo INSGALLERY_URL; ?>/assets/media/paypal-logo.svg"
			class="ig-logo" />
		</a>
	</p>
</div>
<?php } ?>

<script>
function ig_item_delete(){
	var c = confirm('Are you sure want to delete this item ?');
	if(!c){
		return false;
	}	
}
function ig_change_spinner(ele){
	if(ele.value != ''){
		var img = '<img src="'+ele.value+'" class="ig-spin" />';
		jQuery('.ig_adv-setting .ig-spinner').append(img);
		jQuery('.ig_adv-setting .ig-spinner .ig-spin').hide();
		jQuery('.ig_adv-setting .ig-spinner img').show();
	} else {
		jQuery('.ig_adv-setting .ig-spinner .ig-spin').show();
		jQuery('.ig_adv-setting .ig-spinner img').remove();
	}
	
}
function ig_validate_flush(ele){
	if(ele.checked){
	var c = confirm('please make sure every setting will be removed on plugin uninstall.');
    	if(!c){
    		ele.checked = false;
    	}
	}
}
jQuery(function($){
	$('.ig_adv-setting input[name="igs-spinner"]').trigger('change');
    jQuery('.ig_adv-setting-toggle').on('click',function(){
    	$(this).toggleClass('active');
    	$('.ig_adv-setting').slideToggle();
    });
    $('.ig_adv-setting form').on('submit',function(ev){
    	ev.preventDefault();
    	$f = $(this);
    	jQuery.ajax({
			url : ajaxurl,
			type : 'post',
            dataType: 'JSON',
			data : $f.serialize(),
			beforeSend : function()
			{				
			},
			success : function( response ) {
				if ((typeof response === 'object') && response.hasOwnProperty('igsuccess')) {
					$('.ig_adv-setting-fmsg').html(response.message);
                    setTimeout(function(){
                        $('.ig_adv-setting-fmsg').empty();
                    },2000);
                }
			}
		}).fail(function (jqXHR, textStatus) {
            console.log(textStatus);
        }).always(function()
		{
		});
    });
});
</script>