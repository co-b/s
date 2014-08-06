<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'smyth');

/** MySQL database username */
define('DB_USER', 'smyth');

/** MySQL database password */
define('DB_PASSWORD', '>2Zu@mW/9*#Sn{r');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '~:D!DnrwN fWY;~=:Vy;R`=J*VRo_m~i%7DV=<%nx++:BNQ-:-!zj,B_S8m0}VA.');
define('SECURE_AUTH_KEY',  '5*;m&e7(]y>XKOn3nho!S%s$o*kau.C!<rxMm>vd)9ASg~D(^bGL7-|z-V`#uQ8D');
define('LOGGED_IN_KEY',    '?K?,d_]n,#3gxJeiBn0m{7&cev$=|e$fB<{D2]s8HCbOS?<j~KS3_p+vF.^cMi S');
define('NONCE_KEY',        'C>w}[(6Ms!bX1Z1n={pCZv. IL*|-T0b#])$s]6J^8l{$bFIV)_HN(jI&rb^B1f)');
define('AUTH_SALT',        'p+!T+0~Z;DBDN-zA:)Bjs5(FS20bR+D`X_ui[|:!%pUkAr?u<{B}e{*Q2+>{omCH');
define('SECURE_AUTH_SALT', 'p#{$=9WXTosA10>Ep8Sa$#=1uiJj+N8P[s ;B-7m^P[e5T_Ij)dx`XT%%U.Y{x7r');
define('LOGGED_IN_SALT',   'yQ{:iT`@{ ,&{|AQlJF!,+g(S.M0W08IvIJp*SLsFjpMR+n<rI8TVk,>q5I!qCmQ');
define('NONCE_SALT',       '>JY7Wd_p|VW<{GhE$c%G;UQSYKNb|CzfZLaqQ,yZ@{8G|MYyC$eJ$<Vdp[*J>1Vm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
