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
define('DB_NAME', 'db_vestiukraine');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'QF,E^ OE%i5mM9]!px^?3Zi?:5zYLNIJ([1}<1gx[`Bn?i2oX/[0+4oFJ,}K|b&E');
define('SECURE_AUTH_KEY',  '2gQ4[M%i+JO<J[|f5O|aoY{0Y8(@,0qkva0mG<V+Od]#tzG)7^K46C:+,vv8{Qsc');
define('LOGGED_IN_KEY',    '97Xo%kKWn]c6c.2Tg!494M [-eWm`]3%}34gnj:F?:~Co444`T4CL8Ua+b=kZzq ');
define('NONCE_KEY',        'CO9b )6;@rA3}$T``P&+dsi291yyVH[&tww|2^f):(uf`s+r]LV~8h_tu!U#zC2j');
define('AUTH_SALT',        '*$~t| m$nwWq8=tV9@!PD^.+&+k(Z-57-N9n-,+=pj1G2zJq^Qh[lC:&82J;&wP=');
define('SECURE_AUTH_SALT', 'X%hX}>9i@]ME_i(A7;Mc%1]puq-<7<)c:u(uLswj?gmV)T3,5HZn(%!$+K%T$-P:');
define('LOGGED_IN_SALT',   '32v+II<uQR.5.BdL`<#czFe.Mf!,<>/w=Y4o~Iob1({5#X+]RVTPFRO,068EUR;#');
define('NONCE_SALT',       '|-.<+0vW=$vuMv*_T}pCQ^ljt{_5&BY0ZwPnj6o$w0f|5nCd=~#/Q.tY-2AQy-^)');

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
