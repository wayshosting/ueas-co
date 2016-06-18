<?php

define( 'DISALLOW_FILE_EDIT', true );

define( 'BWPS_FILECHECK', true );

/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ftpuea_ueas');

/** MySQL database username */
define('DB_USER', 'ftpuea_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'i.MyStoneEye3742A');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'w$||Q{X.>NM4ub>fneiVf6@f56U$>I+)F]sCjwMu]XHw+%#mg-TW$/m1m$VF/T+q');
define('SECURE_AUTH_KEY',  '*z>2w;9d9iT#y7|%&hj8XuP}eG&hc?q(,D,FMUp-u|UTg{--H+1SZE|96}Tl3lLG');
define('LOGGED_IN_KEY',    'VVN%c?>PSSO-YULSuXh&a@:`1GM U(?yk};j2D(XO|S_(U{}!uVnK|@<RM*7!HIc');
define('NONCE_KEY',        '<#~|hXk7m_>6f=pEo6t4Q F/4Jmi:J~bhIZ<,$+0jCFr9VvvL~tT$kj*U[]5OSGS');
define('AUTH_SALT',        'SEke5p,a=t3nEg(Wp(+a?,l?(Oz4ayaV1.cy+x+g467g7fD)t7&WP]Tt<ym-fD<_');
define('SECURE_AUTH_SALT', 'P|^C#>L+h!~_V&HG%5$pmmsc@e>A2N.^1A|-0MQ8JP]hr61n3~4RoNL$ksX|tM;c');
define('LOGGED_IN_SALT',   'BwR]|>i%%+`?5?-fb{t=eSb~|V;@}e#.LDF+6u0F<W|Kn9)HOBN-f;OlHK}7Y%45');
define('NONCE_SALT',       '@|-(fzT@qI)3wH-&QHXQkI:Ld0nC88-,Zz.zn=o2Gn2}[7KtG+XKu}?!nGinXM@a');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'nn9dn9ry_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//BEGIN Better WP Security
//END Better WP Security
