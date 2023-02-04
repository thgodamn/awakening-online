<?php
/**
 * Customer completed order email (plain text)
 *
 * @author		WooThemes
 * @package		WooCommerce/Templates/Emails/Plain
 * @version		2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo $email_heading . "\n\n";

$status = $order->get_status();
$items = $order->get_items();
if ($status == "completed") {
    foreach ( $items as $item ) {
        $product_id = $item['product_id'];

        //mentor
        if ( in_array( $item['product_id'], 13 ) ) {
            ?>
            <style>
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
                    unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
                }
                /* latin-ext */
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }

                .email {
                    background: #2F3038;
                    background-image: url(https://awakening-online.ru/wp-content/themes/awakening-v2/images/bg.png);
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 100%;
                    padding: 40px;
                    box-sizing: border-box;
                }
                .email__logo {
                    display: block;
                    width: 100%;
                    text-align: center;
                    padding: 0 0 50px 0;
                    box-sizing: border-box;
                }
                .email__box {
                    background: #202027;
                    border: 1px solid #F9F7F7;
                    border-radius: 30px;
                    padding: 40px;
                    outline: 0;
                    box-sizing: border-box;
                    margin-bottom: 60px;
                }
                .text {
                    color: white;
                    font-size: 25px;
                }
                * {
                    margin: 0;
                    padding: 0;
                    font-family: 'Poppins', sans-serif;
                    overflow-wrap: normal !important;
                    font-style: normal;
                    font-weight: 100;
                    word-break: break-word;
                }
                a {
                    font-style: normal;
                    font-weight: 600;
                    font-size: 21px;
                    line-height: 36px;
                    text-decoration: none;
                    transition: .2s ease-out;
                    color: #D8A72B;
                }
            </style>
            <div class="email">
                <a class="email__logo" href="https://awakening-online.ru/">
                    <img src="https://awakening-online.ru/wp-content/themes/awakening-v2/images/logo.png">
                </a>
                <div class="email__box text">
                    Благодарим вас за покупку курса «Mentor».<br>
                    Сначала вы вместе c близким просматриваете курс Awakening.<br>
                    Ссылка для просмотра курса «Awakening»<br>
                    <a href="https://youtu.be/awPyD8AkAko">https://youtu.be/awPyD8AkAko</a><br>
                    ПРОСМОТР КУРСА «Mentor» ТОЛЬКО ДЛЯ НАСТАВНИКА<br>
                    Затем вы просматриваете курс Mentor<br>
                    Ссылка для просмотра курса «Mentor».<br>
                    <a href="https://youtu.be/0-33A019op8">https://youtu.be/0-33A019op8</a><br>
                    Экзамен <a href="https://youtu.be/dcmUGJmF0vE">https://youtu.be/dcmUGJmF0vE</a><br>
                    Медитация <a href="https://youtu.be/o2JnpWqWnmU">https://youtu.be/o2JnpWqWnmU</a><br>
                    По всем вопросам обращайтесь в телегам <a href="https://t.me/awaken_supp">@awaken_supp</a><br>
                    Удачного пути к пробуждению.<br>
                </div>
            </div>
            <?php
        }

        //awakening
        if ( in_array( $item['product_id'], 12 ) ) {
            ?>
            <style>
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
                    unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
                }
                /* latin-ext */
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                    font-family: 'Poppins';
                    font-style: normal;
                    font-weight: 400;
                    font-display: swap;
                    src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }

                .email {
                    background: #2F3038;
                    background-image: url(https://awakening-online.ru/wp-content/themes/awakening-v2/images/bg.png);
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 100%;
                    padding: 40px;
                    box-sizing: border-box;
                }
                .email__logo {
                    display: block;
                    width: 100%;
                    text-align: center;
                    padding: 0 0 50px 0;
                    box-sizing: border-box;
                }
                .email__box {
                    background: #202027;
                    border: 1px solid #F9F7F7;
                    border-radius: 30px;
                    padding: 40px;
                    outline: 0;
                    box-sizing: border-box;
                    margin-bottom: 60px;
                }
                .text {
                    color: white;
                    font-size: 25px;
                }
                * {
                    margin: 0;
                    padding: 0;
                    font-family: 'Poppins', sans-serif;
                    overflow-wrap: normal !important;
                    font-style: normal;
                    font-weight: 100;
                    word-break: break-word;
                }
                a {
                    font-style: normal;
                    font-weight: 600;
                    font-size: 21px;
                    line-height: 36px;
                    text-decoration: none;
                    transition: .2s ease-out;
                    color: #D8A72B;
                }
            </style>
            <div class="email">
                <a class="email__logo" href="https://awakening-online.ru/">
                    <img src="https://awakening-online.ru/wp-content/themes/awakening-v2/images/logo.png">
                </a>
                <div class="email__box text">
                    Благодарим вас за покупку курса «Awakening».<br>
                    Ссылка для просмотра курса <a href="https://youtu.be/Vm7HBz0WRgg">https://youtu.be/Vm7HBz0WRgg</a><br>
                    Медитация <a href="https://youtu.be/o2JnpWqWnmU">https://youtu.be/o2JnpWqWnmU</a><br>
                    По всем вопросам обращайтесь в телегам <a href="https://t.me/awaken_supp">@awaken_supp</a><br>
                    Удачного пути к пробуждению.<br>
                </div>
            </div>
            <?php
        }
    }
}