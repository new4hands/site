<?php
if (! defined('ABSPATH')) {
    die();
}

// registering session
/* add_action('init', function(){
 if( !session_id() )
 session_start();
 }); */
 
 // Registering css.
 add_action('wp_enqueue_scripts', 'insgal_enqueue_scripts');
 function insgal_enqueue_scripts()
 {
     wp_enqueue_style('insta-gallery', INSGALLERY_URL . '/assets/insta-gallery.css',array(),INSGALLERY_VER);
     wp_enqueue_style( 'dashicons' );
     
     wp_register_script('insta-gallery', INSGALLERY_URL . '/assets/insta-gallery.js', array('jquery'),INSGALLERY_VER,true);
     wp_localize_script( 'insta-gallery', 'insgalajax', array(
         'ajax_url' => admin_url( 'admin-ajax.php' )
     ));
     wp_register_script('swiper', INSGALLERY_URL . '/assets/swiper/swiper.jquery.min.js', array('jquery'),null,true);
     wp_register_script('magnific-popup', INSGALLERY_URL . '/assets/magnific-popup/jquery.magnific-popup.min.js', array('jquery'),null,true);
     
 }
 include_once (INSGALLERY_PATH . 'app/Libra/InstagramSpider.php');
 
 
 // shortcode added
 add_shortcode('insta-gallery', 'insta_gallery');
 
 // Insta-Gallery shortcode handler
 function insta_gallery($atts)
 {
     if (empty($atts) || ! isset($atts['id'])) {
         return;
     }
     $gid = (int) $atts['id'];
     $InstaGalleryItems = get_option('insta_gallery_items');
     $InstaGallerySetting = get_option('insta_gallery_setting');
     if (! isset($InstaGalleryItems[$gid])) {
         return;
     }
     
     wp_enqueue_script('insta-gallery');
     
     $IGItem = $InstaGalleryItems[$gid];
     if ($IGItem['ig_display_type'] == 'gallery') {
         wp_enqueue_script('magnific-popup');
     } else if ($IGItem['ig_display_type'] == 'carousel') {
         wp_enqueue_script('swiper');
         wp_enqueue_script('magnific-popup');
     }
     
     $insta_source = ($IGItem['ig_select_from'] == 'username') ? 'user_'. $IGItem['insta_user'] : 'tag_'. $IGItem['insta_tag'];
     
     
     $results = '';
     $results .= '<!--[if lte IE 8]><div class="igblock-wrap-IElte8"><![endif]-->';
     $results .= '<div class="ig-block" id="ig-block-'.$gid.'" data-igalid="'.$gid.'" data-source="'.$insta_source.'">';
     $results .= '<div class="ig-spinner">';
     if(!empty($InstaGallerySetting['igs_spinner'])){
         $results .= '<img src="'.$InstaGallerySetting['igs_spinner'].'" alt="Instagram Gallery" class="ig-spin" />';
     }else {
         $results .= '<svg version="1.1" class="ig-spin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
        	<g>
        		<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
        			<stop  offset="0" style="stop-color:#E09B3D"/>
        			<stop  offset="0.3" style="stop-color:#C74C4D"/>
        			<stop  offset="0.6" style="stop-color:#C21975"/>
        			<stop  offset="1" style="stop-color:#7024C4"/>
        		</linearGradient>
        		<path style="fill:url(#SVGID_1_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
        		c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
        		C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
        		c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
        		c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>
        		<linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
        			<stop  offset="0" style="stop-color:#E09B3D"/>
        			<stop  offset="0.3" style="stop-color:#C74C4D"/>
        			<stop  offset="0.6" style="stop-color:#C21975"/>
        			<stop  offset="1" style="stop-color:#7024C4"/>
        		</linearGradient>
        		<path style="fill:url(#SVGID_2_);" d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517
        		S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083
        		s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z"/>
        		<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
        			<stop  offset="0" style="stop-color:#E09B3D"/>
        			<stop  offset="0.3" style="stop-color:#C74C4D"/>
        			<stop  offset="0.6" style="stop-color:#C21975"/>
        			<stop  offset="1" style="stop-color:#7024C4"/>
        		</linearGradient>
        		<circle style="fill:url(#SVGID_3_);" cx="418.31" cy="134.07" r="34.15"/>
        	</g>
        </svg>';
     }
     $results .= '</div>';
     $results .= '</div> <!-- // IG BLOCK -->';
     $results .= '<!--[if lte IE 8]></div><![endif]-->';
     return $results;
 }
 
 
 // ajax request served
 add_action( 'wp_ajax_nopriv_load_ig_item', 'load_ig_item' );
 add_action( 'wp_ajax_load_ig_item', 'load_ig_item' );
 
 function load_ig_item() {
     // loading session for AJAX request
     if( !session_id()){
         session_start();
     }
     
     if (! isset($_POST['igalid']) ) {
         return;
     }
     $gid = (int)$_POST['igalid'];
     $InstaGalleryItems = get_option('insta_gallery_items');
     if (! isset($InstaGalleryItems[$gid])) {
         return;
     }
     $IGItem = $InstaGalleryItems[$gid];
     $IGItem['gid'] = $gid; // push gallery ID for later use
     $igs = new InstagramSpider();
     
     // validating options
     if (empty($IGItem['ig_select_from'])) {
         return;
     }
     $IGItem['insta_limit'] = (int) $IGItem['insta_limit'];
     $IGItem['insta_limit'] = (($IGItem['insta_limit'] > 0) && ($IGItem['insta_limit'] <= 20)) ? $IGItem['insta_limit'] : 12;
     
     $IGItem['insta_gal-hover'] = filter_var($IGItem['insta_gal-hover'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_gal-spacing'] = filter_var($IGItem['insta_gal-spacing'], FILTER_VALIDATE_BOOLEAN);
	 
     $IGItem['insta_instalink'] = filter_var($IGItem['insta_instalink'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_instalink-text'] = empty($IGItem['insta_instalink-text']) ? 'view on Instagram' : $IGItem['insta_instalink-text'];
     $IGItem['insta_instalink-bgcolor'] = @$IGItem['insta_instalink-bgcolor'];
     $IGItem['insta_instalink-hvrcolor'] = @$IGItem['insta_instalink-hvrcolor'];
     
     $IGItem['insta_car-navarrows'] = @filter_var($IGItem['insta_car-navarrows'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_car-dots'] = @filter_var($IGItem['insta_car-dots'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_car-spacing'] = @filter_var($IGItem['insta_car-spacing'], FILTER_VALIDATE_BOOLEAN);
     
     $IGItem['insta_thumb-size'] = empty($IGItem['insta_thumb-size']) ? 'medium' : $IGItem['insta_thumb-size'];
     $IGItem['insta_hover-color'] = @$IGItem['insta_hover-color'];
     $IGItem['insta_gal-popup'] = filter_var($IGItem['insta_gal-popup'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_likes'] = @filter_var($IGItem['insta_likes'], FILTER_VALIDATE_BOOLEAN);
     $IGItem['insta_comments'] = @filter_var($IGItem['insta_comments'], FILTER_VALIDATE_BOOLEAN);
     
     // continue to results
     $results = '';
     $instaItems = '';
     $igsess_time = (current_user_can('administrator')) ? 60 : 300;
     if ($IGItem['ig_select_from'] == 'username') { // get from username
         if (! empty($IGItem['insta_user'])) { // valid Instagram Username
             $sk = 'user_'.$IGItem['insta_user'];
             if(isset($_SESSION['IGSession'][$sk])) {
                 $time = ($igsess_time - (time() - $_SESSION['IGSession'][$sk]['started']));
                 if($time <= 0) { // refresh session if expired
                     $instaItems = $igs->getUserItems($IGItem['insta_user']);
                     $_SESSION['IGSession'][$sk]['started'] = time();
                     $_SESSION['IGSession'][$sk]['items'] = $instaItems;
                 }else {
                     $instaItems = $_SESSION['IGSession'][$sk]['items'];
                 }
             } else { // create new session
                 $instaItems = $igs->getUserItems($IGItem['insta_user']);
                 $_SESSION['IGSession'][$sk]['started'] = time();
                 $_SESSION['IGSession'][$sk]['items'] = $instaItems;
             }
         }
     } else { // continue to tag
         if (! empty($IGItem['insta_tag'])) { // valid Instagram Tag;
             $sk = 'tag_'.$IGItem['insta_tag'];
             if(isset($_SESSION['IGSession'][$sk])){
                 $time = ($igsess_time - (time() - $_SESSION['IGSession'][$sk]['started']));
                 if($time <= 0)  { // refresh session if expired
                     $instaItems = $igs->getTagItems($IGItem['insta_tag']);
                     $_SESSION['IGSession'][$sk]['started'] = time();
                     $_SESSION['IGSession'][$sk]['items'] = $instaItems;
                 }else {
                     $instaItems = $_SESSION['IGSession'][$sk]['items'];
                 }
             } else { // create new session
                 $instaItems = $igs->getTagItems($IGItem['insta_tag']);
                 $_SESSION['IGSession'][$sk]['started'] = time();
                 $_SESSION['IGSession'][$sk]['items'] = $instaItems;
             }
         }
     }
     
     if (! empty($instaItems)) {
         
         $insta_source = ($IGItem['ig_select_from'] == 'username') ? 'user_' . $IGItem['insta_user'] : 'tag_'. $IGItem['insta_tag'];
         
         $instaUrl = 'https://www.instagram.com/';
         if($IGItem['ig_select_from'] == 'username') {
             $instaUrl .= $IGItem['insta_user'];
         } else {
             $instaUrl .= 'explore/tags/'.$IGItem['insta_tag'];
         }
         
         if ($IGItem['ig_display_type'] == 'gallery') {
             include (INSGALLERY_PATH . 'templates/gallery.php');
         } else if ($IGItem['ig_display_type'] == 'carousel') {
             include (INSGALLERY_PATH . 'templates/carousel.php');
         } else {
             if (current_user_can('administrator')) {
                 $results .= '<div class="ig-no-items-msg"><p class="ig_front_msg-color">ERROR: invalid display type, please check gallery settings.</p></div>';
             }
         }
     } else {
         if (current_user_can('administrator')) {
             $results .= '<div class="ig-no-items-msg"><p class="ig_front_msg-color"><strong>(Admin Notice) ERROR:</strong> unable to get results. possible reasons:</p>';
             $results .= '<ul>';
             $results .= '<li>your Instagram account may be private.</li>';
             $results .= '<li>inavalid Instagram username/tag.</li>';
             $results .= '<li>network or server issue.</li>';
             
             $igsMsgs = $igs->getMessages();
             if(!empty($igsMsgs)){
                 foreach ($igsMsgs as $igsMsg){
                     $results .= "<li>$igsMsg</li>";
                 }
             }
             
             $results .= '</ul></div>';
         }
     }
     // echo $results;
     $result = array(
         'igsuccess' => true,
         'result' => $results,
     );
     echo json_encode($result);
     die();
 }
 
 
 
 