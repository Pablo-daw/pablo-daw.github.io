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
define( 'DB_NAME', 'zapateriamanolo' );

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
define( 'AUTH_KEY',         '1ZjTU{dX_Ea~M.?qF{1aa4igjva rHM=sG%CjA{=C3n]y/zTCHfM`~[M>P4{<L<I' );
define( 'SECURE_AUTH_KEY',  '],A~C$(GW)y&[y}[`8t+(1{&N1>|z~a&|+|daZT.cJKfY.n~2mYmm)3?f3Lri[A.' );
define( 'LOGGED_IN_KEY',    'GQlnY={1n{5^~5&O}Fq(-xk6wwa13(sb79RIn7S7b L<r5k54)qz=MEzv3-/1*}b' );
define( 'NONCE_KEY',        'C() tjL&!f*5(?-PEQVz!x3}:#fk-z1H8>%<2jhx0]^O?sW#v)yJeYB}n<R^(EJn' );
define( 'AUTH_SALT',        '`/y@[SdhT1kZ{^O<L;7Y3kGGZ)%y2RY.KT:>Is{;<xdJ1<:!qr+wp^bQX/9H.6! ' );
define( 'SECURE_AUTH_SALT', 'mJ_^EQ)J{_^AmV=B3^st%T%Nfdsy;bCr]M=|CdvWB+kZm^*qimz1,TxR4><5J#,k' );
define( 'LOGGED_IN_SALT',   ';v,(sa|/CC:rNH60*.qoDC<| `6z*a{i2Sf]}yD}XJ%;&fk0S<e|d^1R79k%cw.1' );
define( 'NONCE_SALT',       'hQf+Q^LCLJ}0}XxyvB;J,yzLLWL[HAO7S9Vn_8If2 MiIMj8S.[P]6u$&FyX}Sg*' );

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
