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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DlCB/2r5Y1ejf0xqG9r/HZTulIrr2rPYPPCKVx7p46tIL3lk6By/BT5A5F65XutYUPm9UumRGEcuS5rgXuYKMw==');
define('SECURE_AUTH_KEY',  'w9A1wiYdkkjOlXQWUWPxdB+W1XleNdKSAjEYRcmE12BPVle8wKmEUv7Ixehp9jJcj0wqK1WMHQBCdvG23htiXA==');
define('LOGGED_IN_KEY',    '1E0BkRF7pPuMAF3em+BcnXT3yZiM1Yi5uDd6jE3MGofAv10eU025sKt8nBDptPnQkajGmXpaF4KMB/J8wXWO/Q==');
define('NONCE_KEY',        'Tu6sb7qkP/ZrFaNwNStbyteJ3p8w31lQh5vaDsQSdExE9jxpDxCzNaPir+eCwbEZX8b4u6W3d0FiErexhVn2Zg==');
define('AUTH_SALT',        'GvGu5+GEsah17mzXpkgTuYIlxDnFyW6ZRxUWPc9M6ke0Zp5Wtk7q7A5kftMsdw+JyZGZOaWY/NGMrWUENki9jQ==');
define('SECURE_AUTH_SALT', 'St2tgXrxP34BftNl9SOzOTwSCJYFt89TM0waFIfwzm95ArecD06D4418nyY4G0KcIIn0eUm/tUu2VpHKxqHypQ==');
define('LOGGED_IN_SALT',   '60vYEcrw3+bLiHUIlbSAP2z9SvoEsk0FaMdtcIgem3XFwd0DtGjkgkCUzGYELaGDZ4Mxj3137VRcmnGLnWFKlg==');
define('NONCE_SALT',       'jHVlndZxC/fVzZ3Rsw+s0Tc09jkadmwaAWxKBxVYS4v1Pvmbxz8Qgq/GK9If2x2yvv12BaM2wIWMosTC3Ql+Jw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );