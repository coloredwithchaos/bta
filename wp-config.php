<?php
/** Enable W3 Total Cache */
define('WP_CACHE', false); // Added by W3 Total Cache






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
define('DB_NAME', 'bta');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '%Bkxo3:P0E!ZU1#kCV@?Wk:~{U(VVU8Gf,UK%c@PBC4lp%_S[m1Xpy+QN~c?uWvu');
define('SECURE_AUTH_KEY',  '=l+Obe<43,`FCD}#CVmJvq|h]Z|SV4H!]f8#}XF3*L4W2f~9?w0sq+}W{LsqyQO|');
define('LOGGED_IN_KEY',    '+{~q|w|fnzo1r:Je$p8$wMcILy&|<8`/extr#rPu< 4o0 )5LQ19F%SPk?2@]~3]');
define('NONCE_KEY',        '_KF,n{]^^7w]_[c&Wk4Y3|OR|EVrK.8w;8ebltM33g?)Uu~AD:qUeaW4J:6:r6Uk');
define('AUTH_SALT',        'YDy72<QO3Q:dr/SZ&m.EA3l94,OyIV{v+#qI0lgmIl1jUjxi+O|P/1|v|SbK]nNG');
define('SECURE_AUTH_SALT', ':U1Ll>/{jK_ [9CLGr$]y8qoD&To7.uDmC]sxRiFELo#u(A_NAs,i+&{o!=Rj:.j');
define('LOGGED_IN_SALT',   'TIXuPi^p~pxl/<VHB9vIAiW7]t7ilN1z4J>zFiQ<;=W 5DPqq}%)i9O&bu?LmZ;#');
define('NONCE_SALT',       'hL^]y.fdi7Fmkk{1QrR6w,DEr$o),=zeK1>QLUMdP%e44hr2i@sy+xqQUg=n}kIj');

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
define( 'WP_MEMORY_LIMIT', '256M' );
define('WP_POST_REVISIONS', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FORCE_SSL_ADMIN', true);