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
define('DB_NAME', 'improv');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'cjg=^m.C;eR_X+QQ[|cU#q:{~.~vG2nknh`UQ!zMrn!?,$J+GzOYTh0hHj|H7L ~');
define('SECURE_AUTH_KEY',  'k-iV7tjv0G=jhT?-M3^=]MH2{Ds<odi,=YI+k-*53b+iWBO4L1Ajzstry*qE,J{h');
define('LOGGED_IN_KEY',    'w{@}gbY@>qjDN_+ +lV-scMtZ76}Ksp:F<K,RI3kbY@gRCOglUpm&BbA5~C_VH97');
define('NONCE_KEY',        'Fi7D0Zy7V+4`k6k!>.bhSSkIWB;a;OT8]{oFaeK?eKu~c%~Nv@dN%j%|c>-4srh8');
define('AUTH_SALT',        'G[>+~|*aF;[CH-7e< .3*uxs<%W%T&7`xN9wD1l-jI12D_x3#EHrk<ZtG{k-3Yx/');
define('SECURE_AUTH_SALT', 'U5CEl(qO?ySwxF#/X.xnWP1up|OH_0!z3{[@t4e2=`d-*aB|U2gCb-!1H]>q^H~r');
define('LOGGED_IN_SALT',   '_],<-zb_0vAe75CiCH;>9moYSYTfcXEXwu03]s8-&{PJ]& /l9W1zu`llN{jgu-W');
define('NONCE_SALT',       '<Mo|F]rbZ1-+ <#,Ur`JPTn1HiZ7s3ksQC!gtPI=}88_*J+ZxQBVb1K*Va|lwM_0');

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
