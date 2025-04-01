<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the 
installation.
 * You don't have to use the website, you can copy this file to 
"wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link 
https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 
secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing 
cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         
'B>:qIK+gP;]:Ko$6*a__Oc/$Cj@u7/#lL.RxigNk/*Q?1Wy@r0)?vm @vJMLjZ@6' );
define( 'SECURE_AUTH_KEY',  '` 
]`7WM36#Vu9T($~hvbn:t~S#,h4}}EQuu`xZHKVg,_0j6.0|%a<s|Z*@|mRO%F' );
define( 'LOGGED_IN_KEY',    'NEY4HW]DPE&xa 
I4)`VVdjVD5^)u]9IM-i`K2mhuJ0=TJ$DIn/jPk/5iSpX <q/B' );
define( 'NONCE_KEY',        '9yOXrI0y 
Gq]zIhR.~u_.ke@Z@rG`0#&@rq*w`sstx+44R90t#hY@j[H}?HFd/@g' );
define( 'AUTH_SALT',        
'0nG*;!,*Be-?hHOWo,@Ag)K,dq4Pt2y_]X]tHS^DAMZfOT0:L.LW~]m0>9&Q+c/l' );
define( 'SECURE_AUTH_SALT', '0~(}GY;^Cctj6Qrk1iviN 
@ndoqp(y#9m&poyIvw%x#C6vo[]Gx_Wb](,hj{5Eun' );
define( 'LOGGED_IN_SALT',   'E+UtAMBg 
)ac,fccw6d#05[<>DhgL;(apM|n1!^C~-H##_2@LS[gh]!n~&~44<Wb' );
define( 'NONCE_SALT',       
')t4}XP2Q|agKZ5/n:l{#zX1=w77NV/V;iL/,cl5bw;S*_4:|FlX:DDE}UUm>wB_E' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the 
specified prefix.
 * Changing this value after WordPress is installed will make your site 
think
 * it has not been installed.
 *
 * @link 
https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during 
development.
 * It is strongly recommended that plugin and theme developers use 
WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link 
https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

