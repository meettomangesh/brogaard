<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'brogaard');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Nx:Lo{JkBGV|;j1U!<YO=(/vj3oH3l.c|3^ON$J|0M&`%OIhRb/On98vs89vQK]3');
define('SECURE_AUTH_KEY',  'gU>?b-~RI>)V&Un8Pm92+X@[APa2BpMPL:0~,Jb`DUbMsE;xa21*l&Oa#Ca%4hB!');
define('LOGGED_IN_KEY',    'QdO{Gs(?8]}fyUGK*^*#w=-aX_ uv|2? Ge:G*1o#`}>Tz4vx9J6@P( 7/f&[0@w');
define('NONCE_KEY',        '8QgtsiBOiVE.fH&r6S#l})9W`!Oj.Brq#*;@&I`Tm7aFwwp~||%O4pRCCw)(#Lkf');
define('AUTH_SALT',        'L)GNW`CTzk:#C1KpP~csgA^[Z,BL)C-Jc;HQP*frvD9k9=7-@n&j5MuIo44U!-!{');
define('SECURE_AUTH_SALT', 'gqq2EO 9Km9Rmsb[YqR@`K&.:.A[v!h>cyl?)8]xFu%}KZ2]lOfU9Py ~6v$L>S$');
define('LOGGED_IN_SALT',   'sr`I4{PL(]HPX3P7M/Lb1~z1%X,.zZfBwAr 1oB}h1Qi8l`xYrpd3_xf-lY _&&=');
define('NONCE_SALT',       'oO/,B?4]!%:XT-$aj50Z=xyalI=5@**Y0nBW9yObGP$^k#)>3Y:(JX#vy_>{|HMP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
