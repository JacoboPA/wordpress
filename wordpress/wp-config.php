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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         'T/9IPn:boR:)z=$p^w.`@#xj5m+BeZ!yT#FjL7hxR3aboXm}V0KC-FaFny,$O:8>');
define('SECURE_AUTH_KEY',  '8ZmPNFKvj_k8+$[~1gDm[7z[NBt2]4ws7Vnk?Zx$%31`q6q@v^eivlJ*hxg0Y3Dx');
define('LOGGED_IN_KEY',    'O3A-0f`D]7J9(nm3Agi?(C1kP%TpJ7 Ki^GT(XVe 1rg{m`DzjLgWDqvlRpHC(JI');
define('NONCE_KEY',        '$B^8lG{YPZ e^T#!X7*1 yUjgbyhqty?Zf6%(e6-a`u(Sq;}*^ro{xI@-Qyy~Yw6');
define('AUTH_SALT',        '%B%q$2!{cz_K>iBw&@q2FQ8oI:Av!%GWT)j,N$z5jE!xMWe#$Yq(|*`pM5~;Tvl$');
define('SECURE_AUTH_SALT', '_fGn[`f-~U#gsRk _xr]E7SHCjpqT<,q{WuE[r>H{$^n/:C~#T0NY#r#$CoJ_cuA');
define('LOGGED_IN_SALT',   'Lta=d=&?`> lS0&Dyd(13B+8jU:(&K^A^-|c2|[VT@WoV}y`z|Qs.w&)q0z-BA))');
define('NONCE_SALT',       '8Hk3Y`_cpwiZ%xgK[VeOaI<aqfvnxBvP[e&5OjVUc,G*)jn2vrDl|pzC)_HGC]{7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 *
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
