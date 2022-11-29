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
define( 'DB_NAME', 'vilhelmsaxild_com' );

/** Database username */
define( 'DB_USER', 'vilhelmsaxild_com' );

/** Database password */
define( 'DB_PASSWORD', 'finis7562' );

/** Database hostname */
define( 'DB_HOST', 'vilhelmsaxild.com.mysql' );

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
define( 'AUTH_KEY',         '7*-d>0AJQqf.EFxbH);XCI0lP%Q^tQ0JK]4dYR@$4tYhoBe}Y~tQ;Br~G q0H*)F' );
define( 'SECURE_AUTH_KEY',  ':WQ*6MQYrciA2Qh[f0<T!9qRn_%IrMX=OYi)Ux[[c3U BkU>1NY->zWN-Krb@{)e' );
define( 'LOGGED_IN_KEY',    'U{,qp<4oe&N~b25{MpR_42#9KtNh)s%@Q_G?d|i;Q7jc>$qliK>QhZb0x@ mdSRV' );
define( 'NONCE_KEY',        '5oq]iDjeg7ZN@gj1h4QXk%=6~^x-wV04:D4))Y?L>alt/4^}!z1 =*=uZ=$D K:d' );
define( 'AUTH_SALT',        'W)yQ[xBqxO=^8A/9{.YYGWdUIk~_|X8,2:k!m_Fj#2-8v3DuF`@&L#8+J<ut+Pa>' );
define( 'SECURE_AUTH_SALT', 'bST2!}+%S:pM+0NC3EJIX9Rew)K{=bQDf^Q.evWcG0EJvm9g&]R%+WRj;is)t,GS' );
define( 'LOGGED_IN_SALT',   '94beNt*|H k_chi5z9(oxm!j.]v/a0:a9zk>_|tP%%3-7i[C}a:SwpVyQes=)w*_' );
define( 'NONCE_SALT',       'iDg>n*+kip?lvCfDbBju8 3N^t&}AAeW6p77&Y=N(UQ5?)/Z;}q)D/]`ZqcCTP>a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'heartbeatsstudio_';

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
