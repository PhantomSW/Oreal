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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('AUTH_KEY',         'sjf/jbtCBwRauIwHgIfiWsmk4PRnmuowdVrZ5ylBsLARaOPf9r8N7dMi74TAeO9wCrDEwh/cIg4aJTPlIYV+CA==');
define('SECURE_AUTH_KEY',  '2J8eHcOsf8LvQPVv/ExjstuSN/s9M/0koDbLAC9VQ6WS1JPN2DyLEr+rLiNRaRIqgsK2vbduyhqbtXiUnHD4xg==');
define('LOGGED_IN_KEY',    'hMk55qXsJ2vWRYquZExFCoYuTR/KUFO7HHa7Ie+2yiZdYuTp4PiUZeb/m5e8tEOcbW1B5Pe60xomLqpqL37erg==');
define('NONCE_KEY',        'IaVYnkZ+pjf+9vmqIzlCGPDn9bKQqYxXJG3S4gx1nzhfvxDTRMd1CfpdVdUTFr6IXBuWKhXYRAo/i4ezM+sKyw==');
define('AUTH_SALT',        '42rlnryBaU7dc6SeEt/WaiemWh71+ulM1Vr3K57fECdee/XLRR1KcJJ2J3AYAiLwfgB1yk8Zj3N9BC8kkz71qw==');
define('SECURE_AUTH_SALT', '8QRTPy6AorjPKCYqv3TWSoYYFKDqY8hzimVGf4YXwlbTO80RajVLuleM1YcG26YR0kG00+FWgAo2KTvKMZLODg==');
define('LOGGED_IN_SALT',   '34b/3F7iGjT33FQHeK8KqpR+jF3PTobYfawoccbuhxiJAD0QYKFgIOso8lFFLL0IRWi64Iyc9x3lsWTvGcMd0g==');
define('NONCE_SALT',       'm+jTodiA3gZb3TV6EyHeOfse3rqGKOFp/yazIgScysf0nt8CRKS88JcOy+Os4zAVw6blUy1YBfmV4sARFk1NKQ==');