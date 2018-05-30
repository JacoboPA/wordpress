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
define('AUTH_KEY',         '*Q.ng$Pxxbp`go*hKo1b.kPY=P&+ub/)y,fN^>4VBwJQmD#g29Cr82$k2PnhRqa.');
define('SECURE_AUTH_KEY',  '3p=K%g9Gzjd;Qi]xKfDdV$=Av^X]lux5K5k.#@,n!i;X*kWOEXLI!#np4L1k3SKC');
define('LOGGED_IN_KEY',    '!aaY/~1iI^LoI5fr#=eI>RN_C3G+&!e.j9ky!LssJ*Qlw)qfXE#;`wut5@M=qc0r');
define('NONCE_KEY',        '=QW&A l_*%H__8?$K4OmZ3F&g`<]*zt6PJxNHx/B&[H~pS3lLQf^SK7}ul]Hmq0-');
define('AUTH_SALT',        '(|MKO-GrN=p-bT/qy7Bfw{WVaMs$)*-@sn[?Tq&1!czi;/%]xDL]$l1mm/Ns9bnY');
define('SECURE_AUTH_SALT', '!neZX=8Tx!C-YFUYikf)kj^oKlt8ien8NBt7,IPwlc~/YpO2Cz7K^uyi9K:/dO r');
define('LOGGED_IN_SALT',   '#c6F?#=lf9W]4M2*>NZ_n,6ecPc{5N6iQ.Wi%$]JEHw&<8Mq8ZYS.rKn^n]qT1*4');
define('NONCE_SALT',       '?/2~V].wdA w#ebs`0.= RTx*mra=g &lIyWM%E/pK46z7e].PV~D$Q:|Xsb@Wzr');

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
