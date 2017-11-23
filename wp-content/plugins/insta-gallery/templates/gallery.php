<?php

$i = 1;
$results .= '<div class="instagallery-items instagallery" data-source="'.$insta_source.'" id="instagal-'.$IGItem['gid'].'">';
foreach ($instaItems as $item) {
    
    $img_src = ($IGItem['insta_gal-cols'] == 1) ? $item['img_standard'] : ((($IGItem['insta_gal-cols'] > 9) || ($IGItem['insta_thumb-size'] == 'small')) ? $item['img_thumb'] : $item['img_low']);
    $hovered = $IGItem['insta_gal-hover'] ? 'ighover' : '';
    $spacing = $IGItem['insta_gal-spacing'] ? '' : 'no-spacing';
    $results .= '<div class="ig-item '.$hovered.' '. $spacing .' cols-' . $IGItem['insta_gal-cols'] . '" style="width:' . (100 / $IGItem['insta_gal-cols']) . '%;">';
    
    $results .= '<a href="' . $item['img_standard'] . '" target="blank" data-title="' .$item['caption']. '" class="nofancybox">';
    $results .= '<img src="' . $img_src . '" alt="instagram" class="instagallery-image" />';
    if($IGItem['insta_likes'] || $IGItem['insta_comments']){
        $results .= '<span class="ig-likes-comments">';
        if($IGItem['insta_likes']){
            $results .= '<span><span class="dashicons dashicons-heart"></span>' . $item['likes'] . '</span>';
        }
        if($IGItem['insta_comments']){
            $results .= '<span><span class="dashicons dashicons-admin-comments"></span>' . $item['comments'] . '</span>';
        }
        $results .= '</span>';
    }
    $results .= '</a>';
    $results .= '</div>';
    
    $i ++;
    if (($IGItem['insta_limit'] != 0) && ($i > $IGItem['insta_limit']))
        break;
}
$results .= '</div>';
if($IGItem['insta_instalink']){
    $results .= '<div class="instagallery-actions"><a href="'.$instaUrl.'" target="blank" class="igact-instalink"><span class="dashicons dashicons-external"></span>'.$IGItem['insta_instalink-text'].'</a></div>';
}


$JSIGSelector = '#instagal-'.$IGItem['gid'];
$IGBSelector = '#ig-block-'.$IGItem['gid'];

$ig_dstyle = '';
if(!empty($IGItem['insta_hover-color'])){
    $ig_dstyle .= $JSIGSelector .' .ig-item.ighover a:hover:after, '.$JSIGSelector.' .swiper-slide a:hover:after {background: '.$IGItem['insta_hover-color'].';}';
}
if(!empty($IGItem['insta_instalink-bgcolor'])){
    $ig_dstyle .= $IGBSelector .' .instagallery-actions .igact-instalink {background: '.$IGItem['insta_instalink-bgcolor'].';}';
}
if(!empty($IGItem['insta_instalink-hvrcolor'])){
    $ig_dstyle .= $IGBSelector .' .instagallery-actions .igact-instalink:hover {background: '.$IGItem['insta_instalink-hvrcolor'].';}';
}
if(!empty($ig_dstyle)){
    $results .= "<script>jQuery(function(){jQuery('head').append('<style>$ig_dstyle</style>');});</script>";
}

if ($IGItem['insta_gal-popup']) {
    
    $rs = <<<JS
    <script>
    jQuery(document).ready(function ($) {
    
    // resize images to square
    	var instagalleryImages = $('$JSIGSelector .ig-item img.instagallery-image');
    	if(instagalleryImages.length){
    		var totalImages = instagalleryImages.length, imagesLoaded = 0,minHeight = 0;
    		instagalleryImages.load(function(){
    		    imagesLoaded++;
    		    if(minHeight == 0)minHeight = $(this).height();
    		    // if(minHeight > $(this).height())minHeight = $(this).height();
                if(($(this).width() == $(this).height()))minHeight = $(this).height();
    		    if(imagesLoaded >= totalImages){
    		   	 	$('$JSIGSelector .ig-item img.instagallery-image').each(function(){
                        var i = $(this);
                        var th = i.height();
    		   	 		if(minHeight < th){
                            var m = (th-minHeight)/2;
    		   	 			$(this).css('margin-top','-'+m+'px');
    		   	 			$(this).css('margin-bottom','-'+m+'px');
    		   	 		}
    		   	 	});
    		    }
    		});
    	}
      jQuery('$JSIGSelector .ig-item a').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        },
        gallery: {
            enabled: true
        },
        image: {
            titleSrc: function(item) {
              return item.el.attr('data-title');
            }
          }
      });
    });
    </script>
JS;
    $results .= $rs;
}
