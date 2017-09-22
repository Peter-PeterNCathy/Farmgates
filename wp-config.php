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
define('DB_NAME', 'farmgates');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'D?1JuVG8vqH+/[SpS8XkrhbwoFTTox+CZ|@RpIw*%A^i!*JZAl2oou}lVCQ$RaH,');
define('SECURE_AUTH_KEY',  '0-E|XW<4pqA~L_9e`&/`xG>A;$Lod(L^Eq(;uD;:aH|LMW2d@IF# {x;D;C0x<z(');
define('LOGGED_IN_KEY',    'KHUW?hk?QF%M>!nl_9sUS=Cq6=}Ykli|~V4G9SvS8.2@ZX)[}YH+hhYC[Vq>?5v-');
define('NONCE_KEY',        'l-Im{ewB4y{|~-PCsEWjGfRXRghGL$U=JQC#RQg)m.F; GZE]=Y$sK@,]%@63JQ$');
define('AUTH_SALT',        '>hD,Yi-%_soz~7T&jju)]9_X/O^Rsf{67c Tg#x-mT!:C7==#{S:r><[c28$JH,{');
define('SECURE_AUTH_SALT', 'TH%6Mm_1R46}.&6u$#EBeT3,hcY/RI^/iYc/RtuS]&(5iPrfFhw-$P7ND}quE:?)');
define('LOGGED_IN_SALT',   'R}TH6rFZDU6sp:VduMzzivZ-bH7~X4x_n=34ev||~nnpQ|.mAS 7W0n81MfDg[M_');
define('NONCE_SALT',       '<hK{;j$TRWcHz,]{FVC@l/6(xeHi`Nm#f0,6IC@w>4rJquJ#]d_ahw!;>fnV)E5&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fg_';

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
