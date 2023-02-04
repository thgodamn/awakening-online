<!DOCTYPE html>
<html>
<head itemscope itemtype="http://schema.org/WebSite">
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <title>awakening-online.ru</title>
    <meta name="description" content="awakening-online description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='max-image-preview:large' />
</head>

<body <?php #body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<header class="header">

    <div class="header__wrapper container">

        <div class="header__logo">
            <a href="/">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
            </a>
        </div>

        <div class="header__menu menu">
            <div class="menu__list">
                <div class="menu__item">
                    <a href="/donate">Пожертвовать</a>
                </div>
                <div class="menu__item">
                    <a href="#contact__lead">Оставить заявку</a>
                </div>
            </div>
        </div>

        <div class="header__toggle menu__toggle"></div>
        <div class="header__menu menu menu__mobile">
            <div class="menu__list">
                <div class="menu__item">
                    <a href="/donate">Пожертвовать</a>
                </div>
                <div class="menu__item">
                    <a href="#contact__lead">Оставить заявку</a>
                </div>
                <div class="menu__item">
                    <a href="#contact__ray">О проекте</a>
                </div>
                <div class="menu__item">
                    <a class="js-modal-contact" href="#">Контакты</a>
                </div>
            </div>
        </div>

    </div>

</header>