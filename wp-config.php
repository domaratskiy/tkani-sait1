<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'TES' );
/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );
/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );
/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );
/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );
/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4;9dS.V+cmN,tK|+zc;wzIlYX8$y5Oq7ei9/R~1jp05cgIxt 4qh:$7PY4K chmY' );
define( 'SECURE_AUTH_KEY',  '9D5P>1qtI0bbB.!bGCZK1Cl;c]^_4JdXGw%m<[&EPi,n3kCL<VQ.xRSp/kOz(.`U' );
define( 'LOGGED_IN_KEY',    '@Y9Q(yE2RWkV,D+Q $@jrIX0VkC=-itXeF9G?w/DXb`-B}D^{?V^PI>D0hY]nh-M' );
define( 'NONCE_KEY',        'KG}7p?7,GP[](.vX-OLy@5rMJuokxNVs!LL<oEw9YfBXPu>@P%{PvBIP*#4~-`ru' );
define( 'AUTH_SALT',        'bYo?[lVc{qx_?7 z<(oO{?>7]jeL~#R5{C+Y(H;j@>RAp<I;XC}7v=^*gyW*5!0I' );
define( 'SECURE_AUTH_SALT', 'A}8+g2{v|2BtRAV]a:ZNiY^=xNtc*+cUS)17@q{ls$Zss7|VhWkoI}3lVT?s%VId' );
define( 'LOGGED_IN_SALT',   'tRAECgXK#qXcLGvkif0,3LU+[K{QmKhc[re%)T6Q]Br#&__@uP<3B$)*S*VV<7>(' );
define( 'NONCE_SALT',       'VRzV];fqF{hBsxV1x?$wDh#=(;AO;X+]{U?C/VeL vPl^jXM]i7LyZ2twpsy)GiB' );
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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
