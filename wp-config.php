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
define( 'DB_NAME', 'window' );

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
define( 'AUTH_KEY',         's?G9-$qc2&hl/Vq|HXd(+om>`h+d$1c}%ooQH=sv3 3[Mj|I[1dVPCm-o~C(]P0,' );
define( 'SECURE_AUTH_KEY',  'C-0dB(dW:^%>V>3FEaAw,be*.:|5~gWu{6qm>X/`6* EdOuk3;?K6Fa59*beGAE[' );
define( 'LOGGED_IN_KEY',    ',q*&2b0ARgC5c&TgpdYk|;)$QdRU&Q[]VZJs/*]w=ELnbgwO`J=H`4+=~05s]izW' );
define( 'NONCE_KEY',        '^fL%|a6JWz>R~>+1A)M9F-w(Yi[~Yd)1K?M[AWT8 :fwb2mpIoeNWTWwm:GX/i&!' );
define( 'AUTH_SALT',        'Lt@ /{_J%O 6V..ZM 7$%7OBXR|)r^D@7*$w#fKtx7E~-n.weD_0U-B@]B2ntFdI' );
define( 'SECURE_AUTH_SALT', 'Xj=bB{meF(Y>E76{tK`TS^HyaU@5ZT]`Ba~dS%4h [B>U16N6v=!fAU`vojuy.cF' );
define( 'LOGGED_IN_SALT',   '`LIzW/GcypUF=`UhdbOuPS #Hnt$w-Y[S1k}@^ .`?H<R7ofQ.hWii9,<SDCc=m<' );
define( 'NONCE_SALT',       'pVKmqq[$ oVMtagB.M{!+J[J9$!m5@]hQX/HK]ovRA~^;:SCPKoJ:yyuxF@3W7+Y' );

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
