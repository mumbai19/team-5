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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cfg' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'abc123' );

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
define( 'AUTH_KEY',         'K?FTMGo`58O7 t69[<T{32{=2m2XdpYf&B3.WY7W7u6ECMeXe(XD$UhqY!Rw?GC:' );
define( 'SECURE_AUTH_KEY',  'N0b{iKFWnyvYE=mBUyaj+;`)e.CIBK2+5!+nCDnVh^K>0*A{kYR+g IK@g@_0/x:' );
define( 'LOGGED_IN_KEY',    'na~omqU/FMea?y>v:T(Gm4y*zwf6RzzYhIo#dzP2kH1S(?Skd`i`&RagO+lqcRCQ' );
define( 'NONCE_KEY',        '#8Qr8@g}U%x}hR-a2!9lznl<9.Mzi]wr0RzGSIpqlStmMm%OKu?M`H5BAt;4]/z[' );
define( 'AUTH_SALT',        'X%;}<wg#W.L>R,2y[i4BHnyX|I0^X=e9{i0+`[F=ac68Jv 51LbmwyR,O)sA}cQ]' );
define( 'SECURE_AUTH_SALT', '6C/Rt&J2YE859#$M((I;*:k^9/->ugWmn^~T_*-#+gpv,g`0-LD.bv`IP=X*MW^G' );
define( 'LOGGED_IN_SALT',   '&/zf~+>>3;qiUVg#]7H-en-$-D^i[_],K|PnX8=OEfW&Rt<GqZ7PK3s<pO!|MMVt' );
define( 'NONCE_SALT',       'x)hMCf7<B)|wQjXd0G;B5fedcsPi;fN<v}f.2XdK]!!$$AyxxPl0n@Bt&sz73}Xi' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
