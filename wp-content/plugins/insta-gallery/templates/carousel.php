<?php
/**
 * The Template for displaying Carousel
 *
 * This template can be overridden by copying it to yourtheme/insta-gallery/carousel.php.
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

$JSICSelector = '#instagal-' . $IGItem['gid']; // Gallery selector
?>
<div class="swiper-container instacarousel" data-source="<?php echo $insta_source; ?>" id="instagal-<?php echo $IGItem['gid']; ?>">
	<div class="swiper-wrapper">
<?php
$i = 1;
foreach ($instaItems as $item) {
    if (! empty($item['img_low']) && ! empty($item['img_standard']) && ! empty($item['img_thumb'])) {
        $img_src = ($IGItem['insta_car-slidespv'] == 1) ? $item['img_standard'] : ((($IGItem['insta_car-slidespv'] > 10) || ($IGItem['insta_thumb-size'] == 'small')) ? $item['img_thumb'] : $item['img_low']);
        ?>
        <div class="swiper-slide">
			<a href="<?php echo $item['img_standard']; ?>" target="blank" data-title="<?php echo $item['caption']; ?>" class="nofancybox"> <img alt="instagram" class="instacarousel-image"
				src="<?php echo $img_src; ?>" />
        <?php
        if ($IGItem['insta_likes'] || $IGItem['insta_comments']) {
            echo '<span class="ic-likes-comments">';
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
    }
    $i ++;
    if (($IGItem['insta_limit'] != 0) && ($i > $IGItem['insta_limit']))
        break;
}
?>
</div>
	<div class="swiper-pagination"></div>
<?php if ($IGItem['insta_car-navarrows']) { ?>
    <div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
<?php } ?>
</div>
<?php if($IGItem['insta_instalink']){ ?>
<div class="instagallery-actions">
	<a href="<?php echo $instaUrl; ?>" target="blank" class="igact-instalink"><span class="dashicons dashicons-external"></span><?php echo $IGItem['insta_instalink-text']; ?></a>
</div>
<?php } ?>

<?php
// resize images to square and
// activate carousel
?>
<script>
jQuery(document).ready(function ($) {
var mySwiper;
// resize images to square
var instacarouselImages = $('<?php echo $JSICSelector; ?> img.instacarousel-image');
if(instacarouselImages.length){
var totalImages = instacarouselImages.length, imagesLoaded = 0,minHeight = 0;
instacarouselImages.load(function(){
imagesLoaded++;
if(minHeight == 0)minHeight = $(this).height();
// if(minHeight > $(this).height())minHeight = $(this).height();
if(($(this).width() == $(this).height()))minHeight = $(this).height();
if(imagesLoaded >= totalImages){
$('<?php echo $JSICSelector; ?> img.instacarousel-image').each(function(){
var i = $(this);
var th = i.height();
if(minHeight < th){
var m = (th-minHeight)/2;
$(this).css('margin-top','-'+m+'px');
$(this).css('margin-bottom','-'+m+'px');
}
});
mySwiper.update();
}
});
}

mySwiper = new Swiper ('<?php echo $JSICSelector; ?>', {
loop: true,autoplay: 3000,
autoHeight:true,
<?php

if ($IGItem['insta_car-dots']) {
    echo "pagination: '.swiper-pagination',";
}
if ($IGItem['insta_car-navarrows']) {
    echo "nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',paginationClickable: true,";
}
if ($IGItem['insta_car-spacing']) {
    echo "spaceBetween: 20,";
}
?>
slidesPerView: <?php echo $IGItem['insta_car-slidespv']; ?>,
breakpoints: {
<?php
if ($IGItem['insta_car-slidespv'] > 3) {
    echo "1023: {
        slidesPerView: 3,
        spaceBetween: 20
    },";
}
if ($IGItem['insta_car-slidespv'] > 2) {
    echo "767: {
        slidesPerView: 2,
        spaceBetween: 15
    },";
}
echo "420: {
        slidesPerView: 1
    }";
?>
}

});
<?php
if ($IGItem['insta_gal-popup']) {
    ?>
    
    jQuery('<?php echo $JSICSelector; ?> .swiper-slide>a').magnificPopup({
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
<?php } ?>
});
</script>
