<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'wordpress' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'wordpress' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'mariadb' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qAz?po*g>LcqzRzgh`*n|-Sl-w42Ulmx#-<v/*E2_]SAb3Va9T<7)M8Jf6Cagw0u' );
define( 'SECURE_AUTH_KEY',  'Pw1od!J8]g#nZQK7:]<~$RkI1IAOj7fTREYIr{KSoKlGsgBKiwdI9G8K^=`9K46t' );
define( 'LOGGED_IN_KEY',    '03<>0w:S!Gi)mHtBUT6yVk7Q:iX|uvA`).nxto2@+}~nJzj}[dIOGq,OeI;D^QmM' );
define( 'NONCE_KEY',        '?O4~l0+k3;+`|s=Iw%$z^83<^ ^XUKVVK3Ym<udrb-FwO/|K!kjPX(%k S^cv5de' );
define( 'AUTH_SALT',        'C#2e4%IlmQV*D:UyG2#l*>WZEx}hf:p(mqxCH49:]+2yi2B<tgG%pwN&orZ7dxq,' );
define( 'SECURE_AUTH_SALT', 'nQY*j^3`dtD=BkryhuO/RvCes(<P.JH{wJ?Mpt/NIV7m$J9uyM^+dWo34(w2-241' );
define( 'LOGGED_IN_SALT',   '7s|eBu:9J_V|8D~}Pn<BiiL)Q9%&0>-6[6-Jfxf{_`_Jpf4x=CJe~P8SnQO)rpY=' );
define( 'NONCE_SALT',       ')UUU~U&?+mkS!xfUD9;^#<#0X1(IM5il1K$s48V>E$`:=Uc7bPf,)<BGrJ4s@E@w' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
