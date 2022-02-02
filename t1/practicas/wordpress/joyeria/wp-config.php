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
define( 'DB_NAME', 'joyeria' );

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
define( 'AUTH_KEY',         '`?p}Uhccm-4,PugoV|69+9o<!xuJ$NxYrF}4w&a7D5^0MThC;?Z^fU2)=7C-_#ee' );
define( 'SECURE_AUTH_KEY',  'Af(pW(`1|b07DX5/UuYMWAPqxk)>Wm]iwo;K^HwWC?M`2O)Lw+H^70$[$Un;)Evk' );
define( 'LOGGED_IN_KEY',    'xTe3A(W=B9#{,`<*~6)lZ^oSB!hj{qj[bk$iD57FHyeCXVtzk9Ks3/}}3vop(~MN' );
define( 'NONCE_KEY',        '*PNCVf!%J3G,&,cKx<z7&=-A/<HY4q?XurbjS$O9_KgYFO*sT#z^J^0+S#G,%S;k' );
define( 'AUTH_SALT',        'AV.?KHvmiqZORciOk49zlO!m~CBg6ml@J;5yN:82Vc}Cr%Z}*&h(uV@W!k4tDEuY' );
define( 'SECURE_AUTH_SALT', '$s{1N|SPv)xcCM#|In(g}*!edWc{uE$F5|`QYrsKKr_E~wjT&H+k{}Ef%,L[KaG%' );
define( 'LOGGED_IN_SALT',   '`&Mz^0aR.&c!!3>DfiRA8*T4v 4ZBnG^R#5rz}l6M&@s7<zW0KSHNRXbi+#w$AAH' );
define( 'NONCE_SALT',       'UDoVV;4gBHo?K~p#<>lRs,xYTwsx6Pt1]KFmA5zp{}l$%T3$1$68o)tjEY}3h3A]' );

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
