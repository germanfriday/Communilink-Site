<?php
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
define('DB_NAME', 'db1364_communilink_bp');

/** MySQL database username */
define('DB_USER', 'thegermanfrida');

/** MySQL database password */
define('DB_PASSWORD', 'pissedoff1');

/** MySQL hostname */
define('DB_HOST', 'internal-db.s1364.gridserver.com');

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
define('AUTH_KEY',         '21z)iAc<,t7HkZhh!8i2qY![8)!i#|6yeC1Em({~e<1y5Y%60rj5`|lF/WzYem^,');
define('SECURE_AUTH_KEY',  'J7:`u|z%TB3f+P5qu|U/$@PeLLj:aOV`>#1<{&2`3?$KZ7#B55[8z]q+V0$-]UA<');
define('LOGGED_IN_KEY',    'op>@g5(,YOpt!o}&ih0h;m~W/JQK9$f,o`2{d9g_Sv}Ktqo%D-$yBHefD1pywyT+');
define('NONCE_KEY',        'Iq[]f6I;.VA 9Fs0sG?f4>c+< j?j|-*| #C;1+R=j F-s0+!$xfHc(plZ=lgf.l');
define('AUTH_SALT',        's-)CF=e]<|-8vI)qDDr$%}L4}[a@JUmq0@?;ger98^*%-3L|S<~.*=C7VNdq 2o]');
define('SECURE_AUTH_SALT', 'Z.PVWk5#4V*{ho,|9k1^8I/]@-GL*qU-B@JW->nG$A)TF{r{2^^3n@fX.+L+-wQ-');
define('LOGGED_IN_SALT',   '&c%0ZehY9/hp}t.ruzDu/@VQF,uW/Kr$LVZIKT+][=@[(buVC0)L{8|/aV3oo%4%');
define('NONCE_SALT',       'M |edR5xG&n} (fVKlR#|n-pj0AX>-gw-x6]9X*oqA<YS- A%hU-GYP|&p:F?|e#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
