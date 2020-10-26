<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'thirdbd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's<r6YYG{s2Kmz^m<#GJvWSN[}r}&u#`O1._g+#)8CjxR|Of<%TEc,J/{d-],uy$)' );
define( 'SECURE_AUTH_KEY',  'Z%^<`)H/OskT9bn^T/q^k@/bddS~{T:X2P)y5~iMiHm}K?^zp{d+sM8 uB%(LO[(' );
define( 'LOGGED_IN_KEY',    ' H8aNw~UKrA9vO/Ryacc(4s4GV$M %I,FYSWPF)1(6B]Pmq5FLY@3O8_]7VqJ_^n' );
define( 'NONCE_KEY',        'BIWOeEK&%NHU-b+.^JC<oeMA5o(EZ~UvJf7{oyve`g4$jo^0*J91u0:7Ffo]Pr4F' );
define( 'AUTH_SALT',        'CfclDEnw0Dtrs %Ho>%J=f7T>HK14oI8.F6/Um|0/XYz?CU$|zOFDW/qS*GBp)ej' );
define( 'SECURE_AUTH_SALT', 'HC.HH>cmv~`d6;,|~U;xp{Q;b8#].rW](rMTG+.nj>x6w20-ODMl|P]Y_S6^Jv-|' );
define( 'LOGGED_IN_SALT',   '~8y$PE&tXZbzH{*6=q}x r2(OU/l)}37-,Q- << |$A84SCZv%LnQV4S@*B2obB,' );
define( 'NONCE_SALT',       'L;_Fnyr<Mz}`.~?d_J}AU*}dLX%$*jw-ei~yXLcExSv`O9-=KfEJ]//3eO->KG=g' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
