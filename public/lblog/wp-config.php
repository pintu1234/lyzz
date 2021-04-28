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
define( 'DB_NAME', 'lblog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'mPjm6MNcd_&P9BK%y}slH(MiEnR~isF%PmO-%L%?i,Rnn$Fb>dyQ9NE#QUAt5`Cv' );
define( 'SECURE_AUTH_KEY',  'S1M)u{(T!<XZ{.%yy;oM:G#1v$Cq3-KLR!cS:W,mS#5Z-.L(}~N%l|J:y[q_NBja' );
define( 'LOGGED_IN_KEY',    '+ $SIe+7KspN.rGniPk*og(XF8J??90A;98#,.xnI&8x1Y^T3)7F}pFVg{:w)Yy>' );
define( 'NONCE_KEY',        ')wLi2ax1?}gBZYxe]a+x_u9&mvMF>vHKC:iH87+xL$*UT)HP^SOa[`@$i%*lE=V5' );
define( 'AUTH_SALT',        'A!S*4=PESu9(7@64$4cDPiH#6F;*uz)OcwLze[__vf%~lOz$F`k^,gJ*N]0kcpqs' );
define( 'SECURE_AUTH_SALT', '?@=]y]Yt[Vx~sF)J9xTP}szFf?5ZA.G`OrTGG$`Bf>~#kyU*-R2s=u~mWLNI|2Cf' );
define( 'LOGGED_IN_SALT',   'Pcmb_v;RX 2z9}PSQq-h7S/KS&^qwoLpH1U}x%Ua`cj|$636.L,a7L%ZtZS_NlD6' );
define( 'NONCE_SALT',       'td2puFxW{`,BNIl<9R@)U.<arxtgX0,IhfhX;+)GX)/06Ef,/*N3]M#PW6CLDzw/' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lb_';

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
define( 'WP_MEMORY_LIMIT', '256M' );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
