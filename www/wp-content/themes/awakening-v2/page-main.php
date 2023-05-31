<?php /* Template Name: page-main */ ?>

<!--<!DOCTYPE html>-->

<!---->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>awakening-online.ru</title>-->
<!--    <meta name="description" content="awakening-online description">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!---->
<!--    <meta name='robots' content='max-image-preview:large' />-->
<!---->
<!--    --><?php
//        wp_head();
//    ?>
<!---->
<!--</head>-->
<!---->
<!--<body class="page-main">-->

<?php get_header(); ?>


<!--    <header class="header">-->
<!---->
<!--        <div class="header__wrapper container">-->
<!---->
<!--            <div class="header__logo">-->
<!--                <a href="/">-->
<!--                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/logo.png" />-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="header__menu menu">-->
<!--                <div class="menu__list">-->
<!--                    <div class="menu__item">-->
<!--                        <a href="/donate">Пожертвовать</a>-->
<!--                    </div>-->
<!--                    <div class="menu__item">-->
<!--                        <a href="#contact__lead">Оставить заявку</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="header__toggle menu__toggle"></div>-->
<!--            <div class="header__menu menu menu__mobile">-->
<!--                <div class="menu__list">-->
<!--                    <div class="menu__item">-->
<!--                        <a href="/donate">Пожертвовать</a>-->
<!--                    </div>-->
<!--                    <div class="menu__item">-->
<!--                        <a href="#contact__lead">Оставить заявку</a>-->
<!--                    </div>-->
<!--                    <div class="menu__item">-->
<!--                        <a href="#contact__ray">О проекте</a>-->
<!--                    </div>-->
<!--                    <div class="menu__item">-->
<!--                        <a class="js-modal-contact" href="#">Контакты</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </header>-->

    <section class="banner">

        <div class="container">

            <div class="banner__row">

                <div class="banner__box">
                    <div class="">
                        <iframe class="banner__video" src="https://www.youtube.com/embed/egj05L_ipjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; gyroscope" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="banner__box banner__box--right">

                    <div class="banner__text">
                        Полный отказ от наркотиков<br>
                        Модернизируй свою личность<br>
                        Под контролем основателя курса<br>
                        За 30 дней
                    </div>

                    <div class="banner__subtext desktop_l">
                        Подберем подходящий курс в 1 клик
                    </div>

                </div>
            </div>

            <div class="banner__row banner__bottom">

                <div class="banner__box banner__box--flex justify-right">
                    <div class="banner__subtext banner__subtext banner__subtext--center banner__subtext--mr">Awakening курс </div>
                    <a class="banner__button button button__small" href="/product/awakening/"><span class="number black mr"><?php $product = wc_get_product( 12 ); echo $product->get_price(); ?></span> рублей</a>
                </div>

                <div class="banner__box banner__box--flex justify-start">
                    <a class="banner__button button button__small" href="#contact__course">Подобрать</a>
                    <div class="banner__subtext banner__subtext banner__subtext--center banner__subtext--ml laptop">Подберем курс в 1 клик!</div>
                </div>

            </div>

        </div>

    </section>



    <section class="advantage">

        <div class="container">

            <div class="advantage__list">

                <div class="advantage__item">
                    <div class="advantage__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/adv_1.png" />
                    </div>
                    <div class="advantage__text">
                        Уважение к себе<br>
                        Психическое равновесие<br>
                        Нормальное поведение
                    </div>
                </div>

                <div class="advantage__item">
                    <div class="advantage__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/adv_2.png" />
                    </div>
                    <div class="advantage__text">
                        Правильное общество<br>
                        Стремление к цели<br>
                        Творческий потенциал
                    </div>

                </div>

                <div class="advantage__item">
                    <div class="advantage__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/adv_3.png" />
                    </div>
                    <div class="advantage__text">
                        Сильный иммунитет<br>
                        Чистая печень<br>
                        Здоровый сон
                    </div>
                </div>

                <div class="advantage__item">
                    <div class="advantage__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/adv_4.png" />
                    </div>
                    <div class="advantage__text">
                        Новейшая методика<br>
                        4 года  экспериментов<br>
                        Уникальный подход
                    </div>
                </div>

            </div>

        </div>

    </section>




    <section class="course">

        <div class="container">

            <div class="course__list">

                <a href="/product/mentor/" class="course__item">
                    <div class="course__title">
                        MENTOR
                    </div>
                    <div class="course__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/course_mentor.png" />
                    </div>
                    <div class="course__text">
                        Обучение<span class="number">:</span><br>
                        Прохождение пути вместе с близким в роли наставника<span class="number">.</span><br>
                        <span>Видеокурс</span>
                    </div>
                    <div class="course__button">
                        <div class="button"><span class="number black mr"><?php $product = wc_get_product( 13 ); echo $product->get_price(); ?></span> рублей</div>
                    </div>
                </a>

                <a href="/product/awakening/" class="course__item">
                    <div class="course__title">
                        AWAKENING
                    </div>
                    <div class="course__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/course_awaking.png" />
                    </div>
                    <div class="course__text">
                        Обучение<span class="number">:</span><br>
                        Основа пробуждения<span class="number">,</span><br>
                        самостоятельная практика<span class="number">.</span><br>
                        <span>Видеокурс</span>
                    </div>
                    <div class="course__button">
                        <div class="button"><span class="number black mr"><?php $product = wc_get_product( 12 ); echo $product->get_price(); ?></span> рублей</div>
                    </div>
                </a>

                <div class="course__item">
                    <a href="/contact">
                        <div class="course__title">
                            CONTACT
                        </div>
                        <div class="course__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/course_contact.png" />
                        </div>
                        <div class="course__text">
                            Введение в пробуждение<br>
                            в тесном контакте<br>
                            с основателем курса<br>
                            <span class="number">30</span> дней
                        </div>
                    </a>
                    <a href="#contact__lead" class="course__button">
                        <div class="button">Подать заявку</div>
                    </a>
                </div>

                <div class="course__item">
                    <a href="/connection">
                        <div class="course__title">
                            CONNECTION
                        </div>
                        <div class="course__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/course_connection.png" />
                        </div>
                        <div class="course__text">
                            Введение в пробуждение<br>
                            с основателем и специалистами проекта<br>
                        </div>
                    </a>
                    <a href="#contact__lead" class="course__button">
                        <div class="button">Подать заявку</div>
                    </a>
                </div>

            </div>

        </div>

    </section>



    <section class="contact" id="contact__course">

        <div class="container">
            <div class="contact__wrapper">

                <div class="contact__col">
                    <div class="contact__title">Подобрать <span>курс</span></div>
                    <div class="contact__box">
                        <div class="contact__text">
                            Наши эксперты свяжутся с вами и помогут выбрать  подходящий курс. Нерешенных задач нет. Помогаем абсолютно каждому в разных ситуациях:
                            <ul class="contact__list">
                                <li class="contact__item">Регулярное употребление марихуаны</li>
                                <li class="contact__item">Зависимость от мефедрона</li>
                                <li class="contact__item">Муж употребляет наркотики</li>
                                <li class="contact__item">Проблемы с алкоголем</li>
                                <li class="contact__item">Депрессия</li>
                                <li class="contact__item">Болезненное расставание</li>
                                <li class="contact__item">Не могу найти себя в жизни и т. д.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="contact__col">
                    <div class="contact__box">

                        <form class="contact__form js-form" method="POST">

                            <div class="contact__row">
                                <div class="contact__label">Имя</div>
                                <div class="contact__input">
                                    <input name="name" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Телефон</div>
                                <div class="contact__input">
                                    <input name="phone" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Почта</div>
                                <div class="contact__input">
                                    <input name="email" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Телеграм: @</div>
                                <div class="contact__input">
                                    <input name="telegram" type="text">
                                </div>
                            </div>

                            <div class="contact__button">
                                <input class="button" type="submit" value="Подобрать">
                            </div>
                            <div class="contact__result"></div>

                            <?php wp_nonce_field( 'form_contact_course', 'form_contact_course_nonce' ); ?>
                            <input type="hidden" name="form_id" value="1" />
                            <input type="hidden" name="form_slug" value="form_course" />
                            <input type="hidden" name="form_name" value="Подобрать курс" />
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>




<!--    <section class="project">-->
<!---->
<!--        <div class="container">-->
<!---->
<!--            <div class="project__left">-->
<!--                <div class="project__image">-->
<!--                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/ray.png" />-->
<!--                </div>-->
<!--                <div class="project__text">-->
<!--                    <span>Awaken Ray</span>-->
<!--                    Путем долгих исследований и экспериментов Ray открыл для себя уникальный способ борьбы с зависимостью. Ray употреблял наркотики с детства и в более осознанном возрасте искал выход с помощью познаний в нейробиологии, религии, эзотерики и сообществ. В результате тысячи экспериментов над собой, с помощью определенного алгоритма действий и осознания этиологических факторов, был открыт метод, который помог справиться с зависимостью и депрессией.-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="project__right">-->
<!--                <div class="project__title">-->
<!--                    Пробуждение-->
<!--                </div>-->
<!--                <div class="project__text">-->
<!--                    <span>Awakening</span>-->
<!--                    Данный проект представляет новые результаты в области модернизации личности и решение многих нерешенных проблем с зависимостью и депрессией. Он не касается вопросов медицины и не основан на научно проверяемых данных, но затрагивает философские темы, связанные с жизнью, смертью, религией и эзотерики. Учитывая сложность и многослойность каждой личности, методика пробуждения была адаптирована абсолютно для каждого думающего человека.-->
<!--                    <span>Beyond in you</span>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </section>-->

    <section class="contact contact__ray" id="contact__ray">

        <div class="container">
            <div class="contact__wrapper">

                <div class="contact__col">
                    <div class="contact__title"><img src="<?php echo get_template_directory_uri(); ?>/images/ray_foto.png" /></div>
                    <div class="contact__box">
                        <div class="contact__text">
                            <span>Awaken Ray</span><br>
                            Путем долгих исследований и экспериментов Ray открыл для себя уникальный способ борьбы с зависимостью. Ray употреблял наркотики с детства и в более осознанном возрасте искал выход с помощью познаний в нейробиологии, религии, эзотерики и сообществ. В результате тысячи экспериментов над собой, с помощью определенного алгоритма действий и осознания этиологических факторов, был открыт метод, который помог справиться с зависимостью и депрессией.
                        </div>
                    </div>
                </div>

                <div class="contact__col">
                    <div class="contact__title contact__title--image">
                        <img src="wp-content/themes/awakening/images/lotos.png">
                        <div>Пробуждение</div>
                    </div>
                    <div class="contact__box">
                        <div class="contact__text">
                            <span>Awakening</span><br>
                            Данный проект представляет новые результаты в области модернизации личности и решение многих нерешенных проблем с зависимостью и депрессией. Он не касается вопросов медицины и не основан на научно проверяемых данных, но затрагивает философские темы, связанные с жизнью, смертью, религией и эзотерики. Учитывая сложность и многослойность каждой личности, методика пробуждения была адаптирована абсолютно для каждого думающего человека.<br>
                            <span>Beyond in you</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>

    <div class="container mobile mb100">
        <iframe class="banner__video" src="https://www.youtube.com/embed/egj05L_ipjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; gyroscope" allowfullscreen></iframe>
    </div>



    <section class="contact" id="contact__lead">

        <div class="container">
            <div class="contact__wrapper contact__wrapper--center">

                <div class="contact__col">
                    <div class="contact__title">
                        Оставить <span>заявку</span>
                    </div>
                    <div class="contact__box">
                        <div class="contact__text">
                            Учет всех заявок проводится строго конфиденциально и ваши данные автоматически удаляются с сервера после отбора. Прохождение курса возможно в полной анонимности.
                        </div>
                    </div>
                </div>

                <div class="contact__col">
                    <div class="contact__box">

                        <form class="contact__form js-form" method="POST">

                            <div class="contact__row">
                                <div class="contact__label">Имя</div>
                                <div class="contact__input">
                                    <input name="name" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Телефон</div>
                                <div class="contact__input">
                                    <input name="phone" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Почта</div>
                                <div class="contact__input">
                                    <input name="email" type="text">
                                </div>
                            </div>

                            <div class="contact__row">
                                <div class="contact__label">Телеграм: @</div>
                                <div class="contact__input">
                                    <input name="telegram" type="text">
                                </div>
                            </div>

                            <div class="contact__button">
                                <input class="button" type="submit" value="Оставить заявку">
                            </div>
                            <div class="contact__result"></div>

                            <?php wp_nonce_field( 'form_contact_lead', 'form_contact_lead_nonce' ); ?>
                            <input type="hidden" name="form_id" value="2" />
                            <input type="hidden" name="form_slug" value="form_lead" />
                            <input type="hidden" name="form_name" value="Оставить заявку" />
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>



<!--    <footer class="footer">-->
<!---->
<!--        <div class="container">-->
<!---->
<!--            <div class="footer__wrapper">-->
<!---->
<!--                <div class="footer__menu menu">-->
<!--                    <div class="menu__list">-->
<!--                        <div class="menu__item">-->
<!--                            <a href="#">О проекте</a>-->
<!--                        </div>-->
<!--                        <div class="menu__item">-->
<!--                            <a href="#">Контакты</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="footer__social social">-->
<!---->
<!--                    <a href="#" class="social__item">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/instagram_icon.png" />-->
<!--                        <div class="social__text">Instagram</div>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social__item">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/images/youtube_icon.png" />-->
<!--                        <div class="social__text">YouTube</div>-->
<!--                    </a>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </footer>-->

<!--    <div class="bg"></div>-->

    <?php
        get_footer();
        wp_footer();
    ?>

<!--</body>-->

<!--</html>-->
