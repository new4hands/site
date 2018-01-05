<?php global $stm_option; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <script src="http://new.4hands.ru/wp-content/themes/cinderella/js/jquery.lockfixed.js"></script>
    <script src="http://new.4hands.ru/wp-content/themes/cinderella/js/jquery.spincrement.js"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<div class="content_wrapper">
<div class="attached-nav js-attached-nav">
    <nav class="attached-nav__wrapper">
        <ul class="attached-nav__list js-one-page-nav">
            <li class="attached-nav__item js-menu-item"><a href="#header"
                                                           class="attached-nav__link js_scroll">Начало</a></li>
            <li class="attached-nav__item js-menu-item"><a href="#main" class="attached-nav__link js_scroll">Популярные
                    услуги</a></li>
            <li class="attached-nav__item js-menu-item js-studios" data-delta="-100"><a href="#studios"
                                                                                        class="attached-nav__link  js_scroll">Ближайшие
                    студии</a></li>
            <li class="attached-nav__item js-menu-item"><a href="#instagram"
                                                           class="attached-nav__link js_scroll">Мы в
                    Instagram</a></li>
            <li class="attached-nav__item js-menu-item"><a href="#about" class="attached-nav__link js_scroll">О
                    нас</a>
            </li>
        </ul>
        <div class="attached-nav__next-link-container js-next">
            <a href="javascript:void(0)" class="attached-nav__next-link">&nbsp;</a>
        </div>
    </nav>
</div>

<!--  choose city popup-->

<div class="ouibounce-modal_city">
    <div class="popup">
        <div class="city">
            <ul class="city__list">
                <li class="city__item city__item_msk">
                    Москва
                </li>
                <li class="city__item city__item_piter">
                    Санкт-Петербург
                </li>
                <li class="city__item city__item_sochi">
                    Сочи
                </li>
                <li class="city__item city__item_tomsk">
                    Томск
                </li>
                <li class="city__item city__item_norilsk">
                    Норильск
                </li>
                <li class="city__item city__item_barnaul">
                    Барнаул
                </li>
                <li class="city__item city__item_stariy-oskol">
                    Старый Оскол
                </li>
                <li class="city__item city__item_vladik">
                    Владивосток
                </li>
                <li class="city__item city__item_sevastopol">
                    Севастополь
                </li>
                <li class="city__item city__item_kazan">
                    Казань
                </li>
                <li class="city__item city__item_lipeck">
                    Липецк
                </li>
                <li class="city__item city__item_yalta">
                    Ялта
                </li>
                   <li class="city__item city__item_nsk">
                    Новосибирск
                </li>
                <li class="city__item city__item_voroneg">
                    Воронеж
                </li>
            </ul>
        </div>
    </div>
</div>

<!--  instagram popup-->

<div class="ouibounce-modal_instagram">
    <div class="underlay"></div>
    <div class="popup-instagram">

        <a class="popup-instagram__cross clearfix" href="#" target="_blank"></a>

        <div class="popup-instagram__body">
            <a class="popup-instagram__subscribe-btn" href="https://www.instagram.com/4hands_life">Подпишись</a>
        </div>
    </div>
</div>




<!--  video -->

<div class="video-container" style="z-index: 1">
    <video class="video" muted="muted" loop>
        <source src="http://new.4hands.ru/wp-content/themes/cinderella/video/header-screen_4hands.mp4"
                type="video/mp4; codecs=" avc1.42E01E, mp4a.40.2
        " />
    </video>

</div>


<div class="header-wrapper">

<header id="header">
<?php if (is_top_bar()) { ?>
    <div class="top_bar clearfix">
        <div class="container">
            <?php
            if (stm_option('top_bar_wpml')) {
                stm_wpml_lang_switcher();
            }
            $top_bar_info = get_top_bar_info();
            ?>
            <?php if (count($top_bar_info) > 1) { ?>
                <div class="top_bar_info_switcher">
                    <div class="active"><?php _e(esc_html($top_bar_info[1]['office'])); ?></div>
                    <ul>
                        <?php foreach ($top_bar_info as $key => $val) { ?>
                            <li>
                                <a href="#top_bar_info_<?php echo esc_attr($key); ?>"><?php _e(esc_html($val['office'])); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <?php if ($top_bar_info) {
                foreach ($top_bar_info as $key => $val) {
                    ?>
                    <ul class="top_bar_info"
                        id="top_bar_info_<?php echo esc_attr($key); ?>"<?php if ($key == 1) {
                        echo ' style="display: block;"';
                    } ?>>
                        <?php if ($val['address']) { ?>
                            <li>
                                <i class="fa <?php echo esc_attr($val['address_icon']); ?>"></i> <?php _e(esc_html($val['address'])); ?>
                            </li>
                        <?php } ?>
                        <?php if ($val['phone']) { ?>
                            <li>
                                <i class="fa <?php echo esc_attr($val['phone_icon']); ?>"></i> <?php _e(esc_html($val['phone'])); ?>
                            </li>
                        <?php } ?>
                        <?php if ($val['hours']) { ?>
                            <li>
                                <i class="fa <?php echo esc_attr($val['hours_icon']); ?>"></i> <?php _e(esc_html($val['hours'])); ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            <?php } ?>
            <?php if (stm_option('top_bar_social')) { ?>
                <div class="top_bar_socials">
                    <?php
                    if (stm_option('top_bar_use_social')) {
                        foreach ($stm_option['top_bar_use_social'] as $key => $val) {
                            if (!empty($stm_option[$key]) && $val == 1) {
                                ?>
                                <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                        class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<div class="header_top clearfix">
    <div class="container">
        <?php
        if (stm_option('header_wpml')) {
            stm_wpml_lang_switcher();
        }
        ?>
        <?php if (stm_option('header_social')) { ?>
            <div class="header_socials">
                <?php
                if (stm_option('header_use_social')) {
                    foreach ($stm_option['header_use_social'] as $key => $val) {
                        if (!empty($stm_option[$key]) && $val == 1) {
                            ?>
                            <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                    class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                        <?php
                        }
                    }
                }
                ?>
            </div>
        <?php } ?>
        <?php if ($header_hours = stm_option('working_hours')) { ?>
            <div class="icon_text clearfix">
                <div class="icon"><i
                        class="<?php echo esc_attr(stm_option('header_working_hours_icon')); ?>"></i>
                </div>
                <div class="text">
                    <?php _e(nl2br(wp_kses_data($header_hours))); ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($header_address = stm_option('header_address')) { ?>
            <div class="icon_text clearfix">
                <div class="icon"><i
                        class="<?php echo esc_attr(stm_option('header_address_icon')); ?>"></i></div>
                <div class="text">
                    <?php _e(nl2br(wp_kses_data($header_address))); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="top_nav">
    <div class="container-fluid container_top-nav">
        <div class="top_nav_wrapper clearfix">

            <div class="logo">
                <a href="<?php echo esc_url(home_url('/'));?>" class="logo__link"></a>
            </div>

            <?php
            wp_nav_menu(array(
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'main_menu_nav'
                )
            );
            ?>

            <div class="entry entry_top_nav">
                <button class="entry__button entry__button_nav ms_booking" data-url="https://w12204.yclients.com">Записаться</button>
            </div>

            <?php if (stm_option('header_phone')) { ?>
                <div class="icon_text clearfix">

                    <div class="current-city">
                        <p class="current-city__item"></p>
                    </div>

                    <div class="icon_text-wrapper">
                        <div class="icon_text-phone clearfix">
                            <div class="icon icon_phone">
                            </div>
                            <div class="text">
                                <?php if ($header_phone = stm_option('header_phone')) { ?>
                                    <strong><?php _e(esc_html($header_phone)); ?></strong>
                                <?php } ?>
                                <?php if ($header_phone_label = stm_option('header_phone_label')) { ?>
                                    <span><?php _e(esc_html($header_phone_label)); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="social">
                            <li class="social__item"><a
                                    class="social__link social__link_to_inst social__link_to_inst_small"
                                    href="https://www.instagram.com/4hands_life"
                                    target="_blank"
                                    rel="nofollow"></a></li>

                            <li class="social__item"><a
                                    class="social__link social__link_to_vk social__link_to_vk_small"
                                    href="https://vk.com/4hands_life"
                                    target="_blank" rel="nofollow"></a>
                            </li>

                            <li class="social__item"><a
                                    class="social__link social__link_to_youtube social__link_to_youtube_small"
                                    href="https://www.youtube.com/channel/UCp8aLRP5ZDRUma8TrKjlnRw?sub_confirmation=1"
                                    target="_blank"
                                    rel="nofollow"></a></li>
                        </div>
                    </div>
                    <div class="location">
                        <div class="location__icon icon showf-btn"></div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<div class="mobile_header">
    <?php if (stm_option('header_social')) { ?>
        <div class="header_socials">
            <?php
            if (stm_option('header_use_social')) {
                foreach ($stm_option['header_use_social'] as $key => $val) {
                    if (!empty($stm_option[$key]) && $val == 1) {
                        ?>
                        <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                    <?php
                    }
                }
            }
            ?>
        </div>
    <?php } ?>
    <div class="logo_wrapper clearfix">

        <div class="logo logo_mobile">
            <a href="http://new.4hands.ru/"><img
                    src="http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/logo_default.png"
                    alt="4hands"></a>
        </div>

        <div id="menu_toggle">
            <button></button>
        </div>
    </div>
    <div class="header_info">
        <div class="top_nav_mobile">
            <?php
            wp_nav_menu(array(
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'main_menu_nav'
                )
            );
            ?>
        </div>
        <div class="icon_texts clearfix">
            <?php if ($header_phone = stm_option('header_phone')) { ?>
                <div class="icon_text icon_text_phone-mobile clearfix">
                    <div class="icon icon_phone icon_phone_mobile">
                    </div>
                    <div class="text">
                        <?php if ($header_phone = stm_option('header_phone')) { ?>
                            <strong><?php _e(esc_html($header_phone)); ?></strong>
                        <?php } ?>
                        <?php if ($header_phone_label = stm_option('header_phone_label')) { ?>
                            <span><?php _e(esc_html($header_phone_label)); ?></span>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="location location_mobile">
                <div class="location__icon icon showf-btn"></div>
            </div>

        </div>
    </div>
</div>

<div class="header-content">
    <div class="slogan-container">

        <div class="slogan">
            <h1 class="slogan__text">Cеть студий маникюра и педикюра</h1>
        </div>

    </div>
    <div class="entry entry_big">
        <button class="entry__button entry__button_big ms_booking" data-url="https://w12204.yclients.com">Записаться
        </button>
    </div>
</div>
</header>
</div>
</div>

<section class="stripe">
    <img class="stripe__img" width="2600" height="25" src="http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/stripe.jpg" alt=""/>
</section>

<div id="main">
    