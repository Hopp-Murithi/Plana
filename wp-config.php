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
define( 'DB_NAME', 'plana' );

/** Database username */
define( 'DB_USER', 'admin10' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'rMNX?}J=hL><|`z{nGN3(0r08nY->Vn!GyVcODOm%3E}p=FcYP#]#W&o0j=^KSJw' );
define( 'SECURE_AUTH_KEY',  '!L+3?G,kx|D2qBTS8}4JlCPa3b:jTkXqda|],Uk095-=?L4k5H;0eHL@p_q8RUTR' );
define( 'LOGGED_IN_KEY',    'G!O|4cHo+LyXGAM:I+&8R*l}=xI~WW*+rXv4iFdm|Lz-Ia!9--127WW,k-*o o7y' );
define( 'NONCE_KEY',        '648`2i3e}!hwP5:3LhoF^{/mnc?}hj7=/;M:OG#jNXB}b+6bFT/uOV}UFJW<w/{U' );
define( 'AUTH_SALT',        'F<:7s+j()X{9<cG{;+Om/8Ddk8of2+(AfERYi)l*0J%<[1o;vX4w+nPq dyY.$!X' );
define( 'SECURE_AUTH_SALT', '^d}ajdv[8~|9:*|Y8SN}y!p}@G&gP.+NmT$2o.!~10zY8!7CFK{TQv07JLcDAsZY' );
define( 'LOGGED_IN_SALT',   '4#U}l0pq?0Hx3B^tyz7@8`@B$a~];v~=&sO[#kp.ac]t8(Z&KkMJs=Jbr;c(i.j`' );
define( 'NONCE_SALT',       ';#zt/muxCP|}2Z9g7ZAEHZUkr(X!/Jl!L0,ZbunS]70L8~?<^vj(^Q%~}NxqYPS>' );

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
