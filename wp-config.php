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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'addwebsolutions' );

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
define( 'AUTH_KEY',         'M?XFLSBuLKr??U#o:NwzCnGQKRTKt~>bVgkW6B6dDqu/O6AqJh|(@{`+0~WH4S~>' );
define( 'SECURE_AUTH_KEY',  '!ObwXzx3>;RA@<di1Af:1v%a4,$Uwh?-8=C;RQ&1O!4_9bwmjVC#I/C],O,LB%3<' );
define( 'LOGGED_IN_KEY',    'BVDfPc^QZZ_[0=/Q*fUw|PLIgzy_+_G4VRAd;%<.e%A{<j,;@iLBe?*1_ms)G9=)' );
define( 'NONCE_KEY',        '+ 4F?a},@1wH<4XEcY;P8_2CB.rW>DS!AD@1H[/[vmm)p!m]p}*Vt>HT&vh;2^kq' );
define( 'AUTH_SALT',        'jly(E0S1unLJ*GhPbR&#x#dH>wa7~.[&,0,SBN.[_emO+No0!~3Of8l2#q7AU^7/' );
define( 'SECURE_AUTH_SALT', 'tb@RzjBoKS)b,LJgYg8fdVQ!1Ae.wF3_7YO$!R4@L|)]qq$>X{<GF.!$vYXCA!Kw' );
define( 'LOGGED_IN_SALT',   '$I@>`)Ppx96VEHr^u&B+*D(LV5#/,7@lEht;C]flJ*k;3:0BY%*JK)|!F|p]sMRU' );
define( 'NONCE_SALT',       '.@t$(.WEh!(o_N ;hw*P-S|2-W53w,dDo(gjW6+F1{_4zlNv@MYeHL7CoxNs9tBl' );

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
