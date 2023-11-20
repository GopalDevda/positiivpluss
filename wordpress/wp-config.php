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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'remote' );

/** Database password */
define( 'DB_PASSWORD', 'PositiivPlus@01' );

/** Database hostname */
define( 'DB_HOST', '13.233.1.73' );

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
define( 'AUTH_KEY',         '(evgW]1i]32k/DmCv NUVf8#@ UojLZ,?.l<<R6S74)9$.M0.E9<z,sjf[?G/3Se' );
define( 'SECURE_AUTH_KEY',  'pZncENB[X%.|7}V$BFSWQ1Xj,T;;UODD4so`vmygv3k6I2>_*@QEj_8_qH`Pf[9/' );
define( 'LOGGED_IN_KEY',    'mQ;wGdf)&6gxnC`FfOkEkn#VYV2ay,+M^t>kDH:xWya&taGG_e.9+@7Ub=MPSuy5' );
define( 'NONCE_KEY',        'J;-MPj%=dARJQu%zR,iAVrs3C*5-C3R73.&V6FnY1?};[pv?ob)RaH}@a9^P5$6X' );
define( 'AUTH_SALT',        'c*}64F;aD0)>NE$Bgg@zk-Yl0}|fXP.L>[ny`z;DsM%V#HGUl)]HYD3OP^h|G=im' );
define( 'SECURE_AUTH_SALT', 't)2.C=RIxN:1Hh0TguC/^<kL-Kr2lRH*JwuSdqi>Z4<j)<v$Fqx-g2MwNAZwm |U' );
define( 'LOGGED_IN_SALT',   '-na]0}Mw=rq{yP@stU,6x&nP+H#%rP] }e-Afa=[^aBHrGoAWP=H ;8i44n{EBRr' );
define( 'NONCE_SALT',       '8/|wc!}9e 62</=Ju@{Zx8Kg2|I[4<CzdBKfpu9a`M83pX?S=a$N/VUdYq KTC1p' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

