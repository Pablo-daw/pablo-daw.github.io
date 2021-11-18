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
define( 'DB_NAME', 'tienda' );

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
define( 'AUTH_KEY',         ' oOO* H{&r46Ir=vXg]R|zEyJPiu]n:lq$:M2.|L*)jMy:D87 _CL}nOwu~Ya4gu' );
define( 'SECURE_AUTH_KEY',  ']:GL7lwO,uX;k1D%26YO^GI6%9%;%K:~[jGPhv6vg,B.l2ql~DR;#$X]Zq;][Vsj' );
define( 'LOGGED_IN_KEY',    'mvOGu=]8bt:u-);[T)b~Ts( N`;~u~-HXv0{/FxQO1V;If>sN<Bme%XBlx.P|j$9' );
define( 'NONCE_KEY',        '*2l9xhK}KXZU1IK)@&+=YRW?h-7bPlTzLKUWzRQ%8Z:QjsjeeN(QGH|^8x+llwvz' );
define( 'AUTH_SALT',        'r?gV/vx`gAc/5gstS/oK=n7k<}tX5~YH:>qc+P94%eWHkta`It7Ju$OdXY+%SS<#' );
define( 'SECURE_AUTH_SALT', '/ZUV-u5uHTz}DI&(TdG4~)CTl:Z!PS(}T)OR&Iirv+ZiwXHGd:{++&}<|<3UO;_K' );
define( 'LOGGED_IN_SALT',   '_n>dSc56CEO!+Uvg?&F:}5 ylGuzRKFsvA9{)t,7KQGiE;,SD&RQj0+Eiu|:Tfk1' );
define( 'NONCE_SALT',       ':H7f:?@;<tX+c+GLSze5! pMkBUh,9K@EH3TEm.VHln|wOdsGkIK*wOhyFvsj>VL' );

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
