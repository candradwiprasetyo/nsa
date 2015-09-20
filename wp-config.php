<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nsa_real');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e;{(h*U=eJf8yrrT|&z-a3GMN^&)`ZhzadaVK9>Y2e6&kQM5`pQ!VT$^UVGg]=e#');
define('SECURE_AUTH_KEY',  'w1.QV^T+;=?m46~vp,<]CC_boO(q|dxWJP@0^%?IqngF[C;wL3i&[!_;;U)/=GvN');
define('LOGGED_IN_KEY',    '>)F_zAE]|?~pa?}|okanS_16?7l10^-^:5Wx.fa|Kb2G(kB!p/T.Q.X,s& s;&l_');
define('NONCE_KEY',        'niTRGnSR|*ZbyIesz`|rO>-Sbe#$k2P=z#HIH8!uLsLu;xxB35c8Yhy$cM 6-7kS');
define('AUTH_SALT',        'Q-_0[]%Vcvoy`^/H(D)6Fg6p7X-1{.+g&B0U.[wbE`W|($Qi`n/_?H&B{xchSCup');
define('SECURE_AUTH_SALT', '>HA:iLl&nmkOd;$l)=bgGSUvTE8r!Nd9E2Yb[KW$GET=Q:lQP8mc|RC,uVs.xyKI');
define('LOGGED_IN_SALT',   'J#j d[Y`9CnseKtx`_h_ip>U<>R+2(mnjij(Rv>7c%nRHt{yZ>>`pfw0,.7s=-g.');
define('NONCE_SALT',       'rUr!8lQzN@RhDD!SetR+9mhnO|o5kJvps$9|)N_io,P.4mv_a3w+ohZb/6wx~Uiz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = "nstar_";

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
