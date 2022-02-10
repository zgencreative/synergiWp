<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'synWp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '87Oy+:UjynIj1C5rb#lXMhEp@FK>0|h19BuR+zS1D)*u2PqM%)@R(I=calQSP)TT' );
define( 'SECURE_AUTH_KEY',  '4n*&R4S=8[*r-UFq9O6MQ{S|Dvi*stIZ@-Xs}K^{!2?8p-^&RX_8,q|iuXw@^`Hf' );
define( 'LOGGED_IN_KEY',    '9c{T`z}xY!f(D1>91M^<q*rwW0TGF*O^Uf>!ze=)|{KPuSC8K=[l[e<oR2}J6m ~' );
define( 'NONCE_KEY',        'cJjpp5mHtSwz7kMaiL)`6_]@RMP#g7e;<3Bd.,SJ}0L&d _@kZ=QvdCI]3m`yN7`' );
define( 'AUTH_SALT',        'w >2})G7ceItk:RGMQz8Co~@/N!-!7$(2F`}Cup4`06AF?wHAbgAkx2nYP+H(w_7' );
define( 'SECURE_AUTH_SALT', 'KvE$x@Nh0iP,$`AfuH`O$ $L7Kc(qu1X/wQ0r;(;3_f(%zFHL,7N34b>&-S`rI*o' );
define( 'LOGGED_IN_SALT',   '$TmycOg6,m,a2*UWiA.#O!kPJ8`T!t&X(tDWRuK=rA|Gk@-;0r6SNu]]tqJNm57v' );
define( 'NONCE_SALT',       '*.GolgSww9QR$/8&#$P7]2?jU= q d}%vF*4;@QaW$2)@2m],+;up` n=LA$_5PH' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'syn_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
