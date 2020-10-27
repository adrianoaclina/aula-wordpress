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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SfHPh^qIc`oMqM<R,:t=w;AbKy15%Gh4MK4&:gC^u#ROu+I|aAxOebYXePW8!hZa' );
define( 'SECURE_AUTH_KEY',  'phUH$&9)~&t.s~PUI+I*W**73J.HBfDZX6V(Jq3-{2}<.UM,p`E}q+Ag>x5~M5sF' );
define( 'LOGGED_IN_KEY',    '^^6U=|K[shtL~B><lKk,iI# :nlcrc1c4Z)2n5O3hhtE=:o3q}|c4,5<gJ3}<?H`' );
define( 'NONCE_KEY',        '.FWd$lfjuIT0,>&#KkxPu#ub1mU=BDOGlt^j1mXBVnf^>OPxrk&heWt:1NQrdt]q' );
define( 'AUTH_SALT',        'N}xU(TAQviJ$_EH=Qoc79^z=DgsYZ.oY80#^U{!T(}e80nB(K1L:r[`}4dMs|;#{' );
define( 'SECURE_AUTH_SALT', 'r4$rc.P02`tU^Gl6cUVN|tPZ#Hchv!8mz=9W}}hB.a+D&]1-lGbUKto#(CpslA:c' );
define( 'LOGGED_IN_SALT',   '%Fa-|r/vm<<8MdA@qNdTyGX+n[GvT5++!]CChNj;K^~iYX0h)nlM<t{~}M;tzFW(' );
define( 'NONCE_SALT',       'B?]qEdD[~3|Ll%X#^qdktx1xa~r{n]Z5P[ng%%rbM#:P<4n)AkgWf_Sm8:v~UJ-]' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ac_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
