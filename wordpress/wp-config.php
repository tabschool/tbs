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
define('DB_NAME', 'tabweb_h5p');

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
define('AUTH_KEY',         ' bFTG1iBtZrnL.lvq,5bT{jC4d=4@vgyKj/?YYE %P4x|pM~cZ,yUVs/>kj@Ep:@');
define('SECURE_AUTH_KEY',  'bXYK6*ksiSO8a&lVKs-fu+Gz+PgS=U)C2n)d&/c|uuvtn^aMWYP#nXNkb(vU^i69');
define('LOGGED_IN_KEY',    'I6OWQE<H@jXcVl?HX/AL6Pygr/p|A].hXpLN? J-*_&U2</:oSQwscB;-E6Lypz9');
define('NONCE_KEY',        'PG}sD0-x spp;.)i*xg|<TGJk%S!v|8}K$um;9&SFU|YJCqN&,F5*Hv2LHROv*k,');
define('AUTH_SALT',        '>QsNS1{KyizNUoNu5oDHPFxaej+.)`dZ<~}Ixotii0}p,8^Qv+Crs^f[[;RgGj$j');
define('SECURE_AUTH_SALT', 'tV6q)9W?y8Z(NtF.,i-)3m,l7T.Uioy!ml}0aO%3A]P=>6QfgmgZaGiYl*<C$@=H');
define('LOGGED_IN_SALT',   'n1;R<_Qv;}W.4A{t^<CuHXQc)CZSL(-5uxqiF,E4^&#:jl];x4OH9`u4Tq*vAEr[');
define('NONCE_SALT',       'o-(4b2ZJOLf%(XAnb&Gh4z*AE<bAs:0svZY#Z%Omn~<9WKVww0iB5[&7g,gsF<la');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
