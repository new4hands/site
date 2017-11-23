<?php

$i = 1;

$results .= '<div class="swiper-container instacarousel" data-source="' . $insta_source . '" data-hvcolor="'.$IGItem['insta_hover-color'].'" id="instagal-' . $IGItem['gid']. '">';
$results .= '<div class="swiper-wrapper">';

foreach ($instaItems as $item) {
    if (! empty($item['img_low']) && ! empty($item['img_standard']) && ! empty($item['img_thumb'])) {
        $img_src = ($IGItem['insta_car-slidespv'] == 1) ? $item['img_standard'] : ((($IGItem['insta_car-slidespv'] > 10) || ($IGItem['insta_thumb-size'] == 'small')) ? $item['img_thumb'] : $item['img_low']);
        $results .= '<div class="swiper-slide" >';
        $results .= '<a href="' . $item['img_standard'] . '" target="blank" data-title="' .$item['caption']. '" class="nofancybox">'; // ' .substr($item['caption'],0,120). '
        $results .= '<img alt="instagram" class="instacarousel-image" src="' . $img_src. '" />';
        // $results .= '<img data-src="' . $img_src. '" class="swiper-lazy" /><div class="swiper-lazy-preloader"></div>';
        if ($IGItem['insta_likes'] || $IGItem['insta_comments']) {
            $results .= '<span class="ic-likes-comments">';
            if ($IGItem['insta_likes']) {
                $results .= '<span><span class="dashicons dashicons-heart"></span>' . $item['likes'] . '</span>';
            }
            if ($IGItem['insta_comments']) {
                $results .= '<span><span class="dashicons dashicons-admin-comments"></span>' . $item['comments'] . '</span>';
            }
            $results .= '</span>';
        }
        $results .= '</a>';
        $results .= '</div>';
    }
    $i ++;
    if (($IGItem['insta_limit'] != 0) && ($i > $IGItem['insta_limit']))
        break;
}

$results .= '</div>';
$results .= '<div class="swiper-pagination"></div>';

if ($IGItem['insta_car-navarrows']) {
    $results .= '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>';
}
$results .= '</div>';
if($IGItem['insta_instalink']){
    $results .= '<div class="instagallery-actions"><a href="'.$instaUrl.'" target="blank" class="igact-instalink"><span class="dashicons dashicons-external"></span>'.$IGItem['insta_instalink-text'].'</a></div>';
}
$JSICSelector = '#instagal-' . $IGItem['gid'];
$IGBSelector = '#ig-block-'.$IGItem['gid'];

$ig_dstyle = '';
if(!empty($IGItem['insta_instalink-bgcolor'])){
    $ig_dstyle .= $IGBSelector .' .instagallery-actions .igact-instalink {background: '.$IGItem['insta_instalink-bgcolor'].';}';
}
if(!empty($IGItem['insta_instalink-hvrcolor'])){
    $ig_dstyle .= $IGBSelector .' .instagallery-actions .igact-instalink:hover {background: '.$IGItem['insta_instalink-hvrcolor'].';}';
}
if(!empty($ig_dstyle)){
    $results .= "<script>jQuery(function(){jQuery('head').append('<style>$ig_dstyle</style>');});</script>";
}

$results .= "<script>
jQuery(document).ready(function ($) {
var mySwiper;
// resize images to square
var instacarouselImages = $('$JSICSelector img.instacarousel-image');
if(instacarouselImages.length){
var totalImages = instacarouselImages.length, imagesLoaded = 0,minHeight = 0;
instacarouselImages.load(function(){
imagesLoaded++;
if(minHeight == 0)minHeight = $(this).height();
// if(minHeight > $(this).height())minHeight = $(this).height();
if(($(this).width() == $(this).height()))minHeight = $(this).height();
if(imagesLoaded >= totalImages){
$('$JSICSelector img.instacarousel-image').each(function(){
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

mySwiper = new Swiper ('$JSICSelector', {
loop: true,autoplay: 3000,
autoHeight:true,";
if ($IGItem['insta_car-dots']) {
    $results .= "pagination: '.swiper-pagination',
    ";
}
if ($IGItem['insta_car-navarrows']) {
    $results .= "nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',paginationClickable: true,";
}
if ($IGItem['insta_car-spacing']) {
    $results .= "spaceBetween: 20,";
}

$results .= "slidesPerView: {$IGItem['insta_car-slidespv']},";

$results .= "breakpoints: {";
if ($IGItem['insta_car-slidespv'] > 3) {
    $results .= "1023: {
        slidesPerView: 3,
        spaceBetween: 20
    },";
}
if ($IGItem['insta_car-slidespv'] > 2) {
    $results .= "767: {
        slidesPerView: 2,
        spaceBetween: 15
    },";
}
$results .= "420: {
        slidesPerView: 1
    }";
$results .= "}";

$results .= "});";

if ($IGItem['insta_gal-popup']) {
    
    $results .= "jQuery('$JSICSelector .swiper-slide>a').magnificPopup({
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
});";
}
$results .= "});
</script>";

