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
define( 'DB_NAME', 'edurey_patch' );

/** Database username */
define( 'DB_USER', 'edurey_patch' );

/** Database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         'R|$PBYip(v3EVWem^+`Y=>MeOZ&1WorcyA_y:sw5dQXD$mY17zn$(>^^0p.,*ocg' );
define( 'SECURE_AUTH_KEY',  'S$Skc+|76X;, jPeBLVCT0me_=|*14~INM;mwSi%kS4UpiK4XQ-22K}^Y]0y;t9{' );
define( 'LOGGED_IN_KEY',    '3Zq:Qv:^wb>k,N7Oi>`B0h*fB(l]6<=3D-iJ6CC{vk#%]xno1thY)KHq{skK+lh~' );
define( 'NONCE_KEY',        'M~in|p|zEKwux#$8tMSHu9d>LaGq4f_?bziV}gd}2+mCU%G6.|e`ORB^_R@bcg)n' );
define( 'AUTH_SALT',        '{j+^;AT:NYA?B>9.WCJ(4(;+#)W`_$O/tFIG>NpZ61BG#8)~zrPx<TV|(@K1ES,1' );
define( 'SECURE_AUTH_SALT', 'jHpHh;|^~v&KkBaqp>>*%;F44iP2o:pjSCp[F%d6J1+lsh99F`,eb39RCnF}2FOr' );
define( 'LOGGED_IN_SALT',   'T^Ca_6CWjdKb>%8;Y}T[-Hz}RLi#?Ole)wRXuzrhaKl_uEbW0Kmgv{Njpl13~~ZI' );
define( 'NONCE_SALT',       'e99i81*cR$M0L16Bo`MGl_u.,P-( R7x9$+&;p`C3BB#U^,4/kFV!1%]$vIIS{d ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'edurey_patch_';

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
