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
define( 'DB_NAME', 'ideals-test' );

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
define( 'AUTH_KEY',         's ln _ik9#Do-rT?<L0Z:~q%PU-D0P@29Rnr-,;wr],=X=<=-JG9BA2V$)]LehuG' );
define( 'SECURE_AUTH_KEY',  'pi>)_-EkAZ+R@ SUiIqhDUbj!4wX-Pz#IOWglX7wVa*4(p<W@&;^Aoclf}Ul~b}:' );
define( 'LOGGED_IN_KEY',    'oy!M^qWAJa|z|bX1tPjOJWyw{Ia/1VgC2,SNzl&&<Ix+F#`c=6sO&BHY53FZ[=%u' );
define( 'NONCE_KEY',        '-W#mNNLkKn}3j-&dvIY+8-l>;6yd3s:ZOFJbVCHGV5d(r,AC<x)@B8`dFf.rM?GC' );
define( 'AUTH_SALT',        ']<[|Dp.dRmx;a@vRt}eDJ%Q;:lXTk%In+XiM8O-0Fv9v.!@q&80RQtA3bre}SUF.' );
define( 'SECURE_AUTH_SALT', '~>7FT&XTvpiMa|`nI`9uz]9/n-CDt~DmJ34=43UCy%b{zJugw#Q$D%en&&;DiKXt' );
define( 'LOGGED_IN_SALT',   'F@qwq;OqKb:#Dn/L3xq0RA$vP&eN}aL=ix#nN{I2WM!+*_5_FGB:@e[-kc#q]?Xp' );
define( 'NONCE_SALT',       '7?R&6;%|0NJbq.edjV9QNX:&78>Kykk4G 72*,Ht-baUVpm@[tkgr!VxVv5Kzlb}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ideals_';

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
