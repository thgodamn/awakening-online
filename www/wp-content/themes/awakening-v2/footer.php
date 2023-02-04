<footer class="footer">

    <div class="container">

        <div class="footer__wrapper">

            <div class="footer__menu menu">
                <div class="menu__list">
                    <div class="menu__item">
                        <a class="homepage" href="#contact__ray">О проекте</a>
                    </div>
                    <div class="menu__item">
                        <a class="js-modal-contact" href="#">Контакты</a>
                    </div>
                </div>
            </div>

            <div class="footer__social social">

                <a href="https://www.instagram.com/awakening.online/" class="social__item" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instagram_icon.png" />
                    <div class="social__text">Instagram</div>
                </a>

                <a href="https://www.youtube.com/channel/UCZXVTDKNyp8jNCGIOUEWSrQ" class="social__item" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/youtube_icon.png" />
                    <div class="social__text">YouTube</div>
                </a>

            </div>

        </div>

    </div>

    <div class="modal modal__contact">
        <div class="modal__box">
            <div class="modal__title">
                <div>Контакты</div>
                <img class="modal__close" src="<?php echo get_template_directory_uri() ?>/images/close_menu.svg" />
            </div>
            <div class="modal__list">
                <a href="https://www.instagram.com/awakening.online/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instagram_icon.png" />
                    <div>Awakening.online</div>
                </a>
                <a href="https://www.instagram.com/awaken.ray/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instagram_icon.png" />
                    <div>Awaken.ray</div>
                </a>
                <a href="https://t.me/awaken_supp" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/telegram_icon.png" />
                    <div>Awakening.online</div>
                </a>
                <a href="mailto:info@awakening-online.ru" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/email_icon.png" />
                    <div>Awakening.online</div>
                </a>
            </div>
        </div>

    </div>

</footer>

<div class="bg"></div>

<?php wp_footer(); ?>
</body>
</html>
