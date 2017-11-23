</div> <!--.container-->
</div> <!--#main-->
</div> <!--.content_wrapper-->

<footer id="footer">
    <?php get_sidebar('footer'); ?>
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo-footer">
                        <a class="logo-footer__link" href="#"><img
                                src="http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/logo_big.png"
                                alt="4hands"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-info">
                        <div class="footer-contacts__container clearfix">
                            <div class="footer-contacts footer-contacts_phone">
                                <div class="footer-contacts__img-container">
                                    <img class="footer-contacts__icon footer-contacts__icon_phone"
                                         src="http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/phone-icon_2.png"
                                         alt="">
                                </div>
                                <div class="footer-contacts__info">
                                    <p class="footer-contacts__text"><strong>8 (800) 234 02 10</strong></p>
                                    <span class="footer-contacts__text_small">для звонков</span>
                                </div>
                            </div>

                            <div class="footer-contacts footer-contacts_chat">
                                <div class="footer-contacts__img-container">
                                    <img class="footer-contacts__icon footer-contacts__icon_chat"
                                         src="http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/chat-icon.png"
                                         alt="">
                                </div>
                                <div class="footer-contacts__info">
                                    <p class="footer-contacts__text"><strong>8 (383) 177 02 13</strong></p>
                                    <span class="footer-contacts__text_small">для cообщений в чат</span>
                                </div>
                            </div>
                        </div>

                        <div class="footer-info__4hands">
                            <span class="footer-info__text">2015-2017 &#169 Студия Экспресс-Маникюра</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="social social_footer">
                        <div class="social__footer-block clearfix">

                            <li class="social__item"><a class="social__link social__link_to_inst"
                                                        href="https://www.instagram.com/4hands_life" target="_blank"
                                                        rel="nofollow"></a></li>
                            <li class="social__item"><a class="social__link social__link_to_vk"
                                                        href="https://vk.com/4hands_life" target="_blank"
                                                        rel="nofollow"></a>
                            </li>

                            <li class="social__item"><a class="social__link social__link_to_youtube"
                                                        href="https://www.youtube.com/channel/UCp8aLRP5ZDRUma8TrKjlnRw?sub_confirmation=1"
                                                        target="_blank"
                                                        rel="nofollow"></a></li>
                        </div>
                        <div class="footer-entry">
                            <a href="https://www.instagram.com/4hands_life" class="footer__subscribe">Подписаться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php if ($appointment_button = stm_option('make_an_appointment')) { ?>
    <div class="make_an_appointment">
        <a href="<?php echo get_permalink($appointment_button); ?>"
           class="button"><?php echo stm_option('make_an_appointment_text', __('Make an appointment button', 'cinderella')) ?></a>
    </div>
<?php } ?>
<?php
global $wp_customize;
if (is_stm() && !$wp_customize) {
    get_template_part('partials/frontend_customizer');
}
?>
</div> <!--#wrapper-->
<?php wp_footer(); ?>
</body>
</html>