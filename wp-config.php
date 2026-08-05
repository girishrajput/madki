<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'madki' );

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
define( 'AUTH_KEY',         '<N`%BmtV*t%*e)D};N8BM`m]|IF7f%6YO,_,OJG9$_u=$Lfm<w=f^[UCQ2flT-Qc' );
define( 'SECURE_AUTH_KEY',  'O< /bU.|%S=-if)F/0*mO8*=ZTRf~6yob1EVIgR89{&_KP0k!I|w8rQpF)IE.hED' );
define( 'LOGGED_IN_KEY',    '&@ >_pg(GS5!eETU _z<~+sqFG&e$si8{.r.Q02t.*%a[hNKNaw/#FLpY&1.W7;-' );
define( 'NONCE_KEY',        'U-*QZ;~:#Up0w$Z%|>.:~#vxSHy}As%jbX0L6OM_5=]P1kTsaKtk8yF?B9>Z2PXN' );
define( 'AUTH_SALT',        'XA0!?L_*oSl_V$L|NU:Q<TG4yZP%Gt:s>0Bw;M(R+uH~2;I(0Tn_+I0-Z/>)Em}n' );
define( 'SECURE_AUTH_SALT', 'is-_l=:?7~i;/DG3A)pkzeMcs$C%qeW9;#3gbX3GW)4S%MPf[Lu6Q;9mR[_^:&}<' );
define( 'LOGGED_IN_SALT',   '{0YYB+I2GZisj2dkq}pc]j(B-/FYS X@YBzTH:-GS^#+D~wq)ZP,/y!rnK*z$t)#' );
define( 'NONCE_SALT',       '3v~~h7}!Z2i@E7Y%cJy>tVv}WUkoSNivJW;e})!h`3-2>yk68t`:WnbPNLtWWtwF' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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


/* That's all, stop editing! Happy publishing. */

