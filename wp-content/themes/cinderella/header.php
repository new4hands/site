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

        <div class="video-container" style="z-index: 1">
            <video class="video" autoplay muted="muted" loop>
                <source src="http://new.4hands.ru/wp-content/themes/cinderella/video/video.mp4"
                        type="video/mp4; codecs=" avc1.42E01E, mp4a.40.2"' />
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
                                <?php
                                $logo = stm_option('logo', false, 'url');
                                if ($logo) {
                                    ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img
                                            src="<?php echo esc_attr($logo); ?>"
                                            alt="<?php bloginfo('name'); ?>"/></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                                <?php } ?>
                            </div>

                            <?php
                            wp_nav_menu(array(
                                    'theme_location' => 'primary_menu',
                                    'container' => false,
                                    'menu_class' => 'main_menu_nav'
                                )
                            );
                            ?>

                            <div class="entry">
                                <button class="entry__button">Записаться</button>
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
                        <div class="icon_texts">
                            <?php if ($header_phone = stm_option('header_phone')) { ?>
                                <div class="icon_text clearfix">
                                    <div class="icon"><i
                                            class="fa <?php echo esc_attr(stm_option('header_phone_icon')); ?>"></i>
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
                            <?php if ($header_hours = stm_option('working_hours')) { ?>
                                <div class="icon_text clearfix">
                                    <div class="icon"><i
                                            class="fa <?php echo esc_attr(stm_option('header_working_hours_icon')); ?>"></i>
                                    </div>
                                    <div class="text">
                                        <?php _e(nl2br(wp_kses_data($header_hours))); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($header_address = stm_option('header_address')) { ?>
                                <div class="icon_text clearfix">
                                    <div class="icon"><i
                                            class="fa <?php echo esc_attr(stm_option('header_address_icon')); ?>"></i>
                                    </div>
                                    <div class="text">
                                        <?php _e(nl2br(wp_kses_data($header_address))); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="entry entry_big">
                    <button class="entry__button entry__button_big">Записаться</button>
                </div>

                <div id="ouibounce-modal">
                    <div class="popup">
                        <div class="city">
                            <ul class="city__list">
                                <li class="city__item">
                                    Москва
                                </li>
                                <li class="city__item">
                                    Санкт-Петербург
                                </li>
                                <li class="city__item">
                                    Сочи
                                </li>
                                <li class="city__item">
                                    Томск
                                </li>
                                <li class="city__item">
                                    Норильск
                                </li>
                                <li class="city__item">
                                    Барнаул
                                </li>
                                <li class="city__item">
                                    Старый Оскол
                                </li>
                                <li class="city__item">
                                    Владивосток
                                </li>
                                <li class="city__item">
                                    Севастополь
                                </li>
                                <li class="city__item">
                                    Казань
                                </li>
                                <li class="city__item">
                                    Липецк
                                </li>
                                <li class="city__item">
                                    Ялта
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="ouibounce-modal_instagram">
                    <div class="underlay"></div>
                    <div class="popup-instagram">

                        <a class="popup-instagram__cross clearfix" href="#" target="_blank"></a>

                        <div class="popup-instagram__body">
                            <a class="popup-instagram__subscribe-btn" href="https://www.instagram.com/4hands_life">Подпишись</a>
                        </div>
                    </div>
                </div>

            </header>
        </div>
    </div>
    <div id="main">
    