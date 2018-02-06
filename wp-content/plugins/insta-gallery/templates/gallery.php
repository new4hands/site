<?php
/**
 * The Template for displaying Gallery
 *
 * This template can be overridden by copying it to yourtheme/insta-gallery/gallery.php.
 *
 * HOWEVER, on occasion will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen.
 *
 * @package 	insta-gallery/templates
 * @version     1.1.1
 */
if (! defined('ABSPATH')) {
    exit();
}

// $insta_source : gallery source like user or tag
// $IGItem : array of gallery item setting
// $instaItems : array of gallery items

$JSIGSelector = '#instagal-' . $IGItem['gid']; // Gallery selector
?>
<div class="instagallery-items instagallery" data-source="<?php echo $insta_source; ?>" id="instagal-<?php echo $IGItem['gid']; ?>">
<?php
$i = 1;
foreach ($instaItems as $item) {
    
    $img_src = ($IGItem['insta_gal-cols'] == 1) ? $item['img_standard'] : ((($IGItem['insta_gal-cols'] > 9) || ($IGItem['insta_thumb-size'] == 'small')) ? $item['img_thumb'] : $item['img_low']);
    $hovered = $IGItem['insta_gal-hover'] ? 'ighover' : '';
    $spacing = $IGItem['insta_gal-spacing'] ? '' : 'no-spacing';
    ?>
    <div class="ig-item <?php echo $hovered.' '. $spacing; ?> cols-<?php echo $IGItem['insta_gal-cols']; ?>" style="width: <?php echo (100 / $IGItem['insta_gal-cols']); ?>%;">
		<a href="<?php echo $item['img_standard']; ?>" target="blank" data-title="<?php echo $item['caption']; ?>" class="nofancybox"> <img src="<?php echo $img_src; ?>" alt="instagram"
			class="instagallery-image" />
	<?php
    if ($IGItem['insta_likes'] || $IGItem['insta_comments']) {
        echo '<span class="ig-likes-comments">';
        if ($IGItem['insta_likes']) {
            echo '<span><span class="dashicons dashicons-heart"></span>' . $item['likes'] . '</span>';
        }
        if ($IGItem['insta_comments']) {
            echo '<span><span class="dashicons dashicons-admin-comments"></span>' . $item['comments'] . '</span>';
        }
        echo '</span>';
    }
    ?>
    </a>
	</div>
	<?php
    $i ++;
    if (($IGItem['insta_limit'] != 0) && ($i > $IGItem['insta_limit']))
        break;
}
?>
</div>
<?php
if ($IGItem['insta_instalink']) {
    ?>
<div class="instagallery-actions">
	<a href="<?php echo $instaUrl; ?>" target="blank" class="igact-instalink"><span class="dashicons dashicons-external"></span><?php echo $IGItem['insta_instalink-text']; ?></a>
</div>
<?php } ?>


<?php

// resize images to square and
// activate popup
if ($IGItem['insta_gal-popup']) {
    ?>
<script>
    jQuery(document).ready(function ($) {

        // resize images to square
    	var instagalleryImages = $('<?php echo $JSIGSelector; ?> .ig-item img.instagallery-image');
    	if(instagalleryImages.length){
    		var totalImages = instagalleryImages.length, imagesLoaded = 0,minHeight = 0;
    		instagalleryImages.load(function(){
    		    imagesLoaded++;
    		    if(minHeight == 0)minHeight = $(this).height();
    		    // if(minHeight > $(this).height())minHeight = $(this).height();
                if(($(this).width() == $(this).height()))minHeight = $(this).height();
    		    if(imagesLoaded >= totalImages){
    		    $('<?php echo $JSIGSelector; ?> .ig-item img.instagallery-image').each(function(){
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
      jQuery('<?php echo $JSIGSelector; ?> .ig-item a').magnificPopup({
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
<?php
}
