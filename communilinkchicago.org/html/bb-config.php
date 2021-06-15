<?php
/** 
 * The base configurations of bbPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys and bbPress Language. You can get the MySQL settings from your
 * web host.
 *
 * This file is used by the installer during installation.
 *
 * @package bbPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for bbPress */
define( 'BBDB_NAME', 'db1364_communilink_bp' );

/** MySQL database username */
define( 'BBDB_USER', 'thegermanfrida' );

/** MySQL database password */
define( 'BBDB_PASSWORD', 'pissedoff1' );

/** MySQL hostname */
define( 'BBDB_HOST', 'internal-db.s1364.gridserver.com' );

/** Database Charset to use in creating database tables. */
define( 'BBDB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'BBDB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/bbpress/ WordPress.org secret-key service}
 *
 * @since 1.0
 */
define( 'BB_AUTH_KEY', '21z)iAc<,t7HkZhh!8i2qY![8)!i#|6yeC1Em({~e<1y5Y%60rj5`|lF/WzYem^,' );
define( 'BB_SECURE_AUTH_KEY', 'J7:`u|z%TB3f+P5qu|U/$@PeLLj:aOV`>#1<{&2`3?$KZ7#B55[8z]q+V0$-]UA<' );
define( 'BB_LOGGED_IN_KEY', 'op>@g5(,YOpt!o}&ih0h;m~W/JQK9$f,o`2{d9g_Sv}Ktqo%D-$yBHefD1pywyT+' );
define( 'BB_NONCE_KEY', 'Iq[]f6I;.VA 9Fs0sG?f4>c+< j?j|-*| #C;1+R=j F-s0+!$xfHc(plZ=lgf.l' );
/**#@-*/

/**
 * bbPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$bb_table_prefix = 'wp_bb_';

/**
 * bbPress Localized Language, defaults to English.
 *
 * Change this to localize bbPress. A corresponding MO file for the chosen
 * language must be installed to a directory called "my-languages" in the root
 * directory of bbPress. For example, install de.mo to "my-languages" and set
 * BB_LANG to 'de' to enable German language support.
 */
define( 'BB_LANG', 'en_US' );
$bb->custom_user_table = 'wp_users';
$bb->custom_user_meta_table = 'wp_usermeta';

$bb->uri = 'http://communilinkchicago.org/communilink/wp-content/plugins/buddypress//bp-forums/bbpress/';
$bb->name = 'Communilink Chicago Forums';

define('BB_AUTH_SALT', 's-)CF=e]<|-8vI)qDDr$%}L4}[a@JUmq0@?;ger98^*%-3L|S<~.*=C7VNdq 2o]');
define('BB_LOGGED_IN_SALT', '&c%0ZehY9/hp}t.ruzDu/@VQF,uW/Kr$LVZIKT+][=@[(buVC0)L{8|/aV3oo%4%');
define('BB_SECURE_AUTH_SALT', 'Z.PVWk5#4V*{ho,|9k1^8I/]@-GL*qU-B@JW->nG$A)TF{r{2^^3n@fX.+L+-wQ-');

define('WP_AUTH_COOKIE_VERSION', 2);

?>