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
define( 'DB_NAME', 'pescaderia' );

/** MySQL database username */
define( 'DB_USER', 'pablo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'pablo1234' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'XQ*Hr$CvAqgmL#JMff=cboc2Pi 9/qO<aeXZ]7r>KIzw9`3vAB9I$D!V(,F#GG>z' );
define( 'SECURE_AUTH_KEY',  '+!95bkL< P%B3f${[2l2&gKfBj_HcOPP/f7wTF#/Q<l82^Yf[,eix0QXZC1OQK&E' );
define( 'LOGGED_IN_KEY',    '(^M?Ov X<53--!n2%SuyLxde&ZMo#%E+5Us.^F+b?Q:qnOy#Uggz;y~M$~J+c=9Y' );
define( 'NONCE_KEY',        '&s$_q)|Vo<MI$g/qE:iE)Gg7jY}CIXdA8Av7{v`Q1o5q3GA@4WVU#D)!:1k8fG Y' );
define( 'AUTH_SALT',        '?$GkA>hPca@VvU^,#Y}r$PPeY!c.1j1Z:lQ}vIN,C2R}L]6sN0 sHu/~dm+zB66@' );
define( 'SECURE_AUTH_SALT', '-TTPG|y5&4;GbrveW{N}1R mSE[RKYM- TN[G2QeP(2Uy.tp~Y;{Rh^@]3<] 0:9' );
define( 'LOGGED_IN_SALT',   'iO9N$<p5o72.b+&+yCB!NAMmK+vax mgu#30MJ7]j<k,>H6./<(lxKv*F~ 2ZYW!' );
define( 'NONCE_SALT',       '8NA$huY&FuN{a2QjnvT~|g^RAQ/5|R4GUK,F}Tv.25[~f#1R0X&`,ys0-1z|i&q%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
