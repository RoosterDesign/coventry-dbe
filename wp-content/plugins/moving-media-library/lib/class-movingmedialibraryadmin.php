<?php
/**
 * Moving Media Library
 *
 * @package    Moving Media Library
 * @subpackage MovingMediaLibraryAdmin Management screen
	Copyright (c) 2020- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$movingmedialibraryadmin = new MovingMediaLibraryAdmin();

/** ==================================================
 * Management screen
 */
class MovingMediaLibraryAdmin {

	/** ==================================================
	 * Path
	 *
	 * @var $upload_dir  upload_dir.
	 */
	private $upload_dir;

	/** ==================================================
	 * Path
	 *
	 * @var $upload_url  upload_url.
	 */
	private $upload_url;

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		$wp_uploads         = wp_upload_dir();
		$relation_path_true = strpos( $wp_uploads['baseurl'], '../' );
		if ( $relation_path_true > 0 ) {
			$basepath   = substr( $wp_uploads['baseurl'], 0, $relation_path_true );
			$upload_url = $this->realurl( $basepath, $relationalpath );
			$upload_dir = wp_normalize_path( realpath( $wp_uploads['basedir'] ) );
		} else {
			$upload_url = $wp_uploads['baseurl'];
			$upload_dir = wp_normalize_path( $wp_uploads['basedir'] );
		}
		if ( is_ssl() ) {
			$upload_url = str_replace( 'http:', 'https:', $upload_url );
		}
		$upload_dir = untrailingslashit( $upload_dir );
		$upload_url = untrailingslashit( $upload_url );
		$this->upload_dir = trailingslashit( $upload_dir );
		$this->upload_url = trailingslashit( $upload_url );

		add_action( 'admin_menu', array( $this, 'add_pages' ) );
		add_filter( 'plugin_action_links', array( $this, 'settings_link' ), 10, 2 );
		add_filter( 'upload_mimes', array( $this, 'allow_upload_json' ) );

	}

	/** ==================================================
	 * Add a "Settings" link to the plugins page
	 *
	 * @param  array  $links  links array.
	 * @param  string $file   file.
	 * @return array  $links  links array.
	 * @since 1.00
	 */
	public function settings_link( $links, $file ) {
		static $this_plugin;
		if ( empty( $this_plugin ) ) {
			$this_plugin = 'moving-media-library/movingmedialibrary.php';
		}
		if ( $file == $this_plugin ) {
			$links[] = '<a href="' . admin_url( 'admin.php?page=movingmedialibrary' ) . '">Moving Media Library</a>';
			$links[] = '<a href="' . admin_url( 'admin.php?page=movingmedialibrary-generate-json' ) . '">' . __( 'Export' ) . '</a>';
			$links[] = '<a href="' . admin_url( 'admin.php?page=movingmedialibrary-update-db' ) . '">' . __( 'Import' ) . '</a>';
		}
		return $links;
	}

	/** ==================================================
	 * Add page
	 *
	 * @since 1.0
	 */
	public function add_pages() {
		add_menu_page(
			'Moving Media Library',
			'Moving Media Library',
			'manage_options',
			'movingmedialibrary',
			array( $this, 'manage_page' ),
			'dashicons-admin-media'
		);
		add_submenu_page(
			'movingmedialibrary',
			__( 'Export' ),
			__( 'Export' ),
			'manage_options',
			'movingmedialibrary-generate-json',
			array( $this, 'generate_json_page' )
		);
		add_submenu_page(
			'movingmedialibrary',
			__( 'Import' ),
			__( 'Import' ),
			'manage_options',
			'movingmedialibrary-update-db',
			array( $this, 'update_db_page' )
		);
	}

	/** ==================================================
	 * Export Generate Json
	 *
	 * @since 1.00
	 */
	public function generate_json_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		$scriptname = admin_url( 'admin.php?page=movingmedialibrary-generate-json' );

		$name = 'moving_media_library.json';
		$filename = $this->upload_dir . $name;
		$fileurl  = $this->upload_url . $name;
		if ( isset( $_POST['Cjson'] ) && ! empty( $_POST['Cjson'] ) ) {
			if ( check_admin_referer( 'zm_file_json', 'movingmedialibrary_file_json' ) ) {
				do_action( 'movingmedialibrary_generate_json_hook', $filename );
			}
		}
		if ( isset( $_POST['Djson'] ) && ! empty( $_POST['Djson'] ) ) {
			if ( check_admin_referer( 'zm_file_json', 'movingmedialibrary_file_json' ) ) {
				if ( ! empty( $_POST['delete_file'] ) ) {
					$delete_file = sanitize_text_field( wp_unslash( $_POST['delete_file'] ) );
					if ( file_exists( $delete_file ) ) {
						unlink( $delete_file );
					}
				}
			}
		}

		?>
		<div class="wrap">

		<h2>Moving Media Library <a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-generate-json' ) ); ?>" style="text-decoration: none;"><?php esc_html_e( 'Export' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-update-db' ) ); ?>" class="page-title-action"><?php esc_html_e( 'Import' ); ?></a>
			<?php
			if ( class_exists( 'BulkMediaRegister' ) ) {
				$bulkmediaregister_url = admin_url( 'admin.php?page=bulkmediaregister' );
			} else {
				if ( is_multisite() ) {
					$bulkmediaregister_url = network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				} else {
					$bulkmediaregister_url = admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				}
			}
			?>
			<a href="<?php echo esc_url( $bulkmediaregister_url ); ?>" class="page-title-action">Bulk Media Register</a>
		</h2>
		<div style="clear: both;"></div>

		<h3><?php esc_html_e( 'Export' ); ?></h3>
		<form method="post" action="<?php echo esc_url( $scriptname ); ?>">
		<div style="margin: 5px; padding: 5px;">
			<p class="description">
			<?php esc_html_e( 'Export the data related to the media library to JSON files. The media files must be copied separately.', 'moving-media-library' ); ?>
			</p>
			<?php wp_nonce_field( 'zm_file_json', 'movingmedialibrary_file_json' ); ?>
			<?php submit_button( __( 'Export as JSON' ), 'large', 'Cjson', true ); ?>
		</div>
		<?php
		if ( file_exists( $filename ) ) {
			if ( function_exists( 'wp_date' ) ) {
				$json_time = wp_date( 'Y-m-d H:i:s', filemtime( $filename ) );
			} else {
				$json_time = date_i18n( 'Y-m-d H:i:s', filemtime( $filename ) );
			}
			$json_byte = filesize( $filename );
			$json_size = size_format( $json_byte, 2 );
			?>
			<h3>JSON <?php esc_html_e( 'File' ); ?></h3>
			<div style="margin: 5px; padding: 5px;">
			<p class="description">
			<?php
			/* translators: %1$s: Date time %2$s File size */
			echo esc_html( sprintf( __( 'The file created on %1$s can be downloaded from the following. The file size is %2$s.', 'moving-media-library' ), $json_time, $json_size ) );
			?>
			</p>
			<p class="submit">
			<button type="button" class="button button-large" onclick="location.href='<?php echo esc_url( $fileurl ); ?>'"><?php esc_html_e( 'View' ); ?></button>
			&nbsp;
			<a href="<?php echo esc_url( $fileurl ); ?>" download="<?php echo esc_attr( $name ); ?>"><button type="button" class="button button-large"><?php esc_html_e( 'Download', 'moving-media-library' ); ?></button></a>
			&nbsp;
			<input type="hidden" name="delete_file" value="<?php echo esc_attr( $filename ); ?>">
			<?php submit_button( __( 'Delete' ), 'large', 'Djson', false ); ?>
			</p>
			</div>
			<?php
		}
		?>
		</form>

		</div>

		<?php

	}

	/** ==================================================
	 * Import update db page
	 *
	 * @since 1.00
	 */
	public function update_db_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		$scriptname = admin_url( 'admin.php?page=movingmedialibrary-update-db' );

		$max_upload_size = wp_max_upload_size();
		if ( ! $max_upload_size ) {
			$max_upload_size = 0;
		}
		if ( isset( $_SERVER['CONTENT_LENGTH'] ) && ! empty( $_SERVER['CONTENT_LENGTH'] ) ) {
			if ( 0 < $max_upload_size && $max_upload_size < intval( $_SERVER['CONTENT_LENGTH'] ) ) {
				echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'This is larger than the maximum size. Please try another.' ) . '</li></ul></div>';
			}
		}

		$import_html = null;
		if ( isset( $_POST['Import'] ) && ! empty( $_POST['Import'] ) ) {
			if ( check_admin_referer( 'mml_file_load', 'movingmedialibrary_import_file_load' ) ) {
				if ( isset( $_FILES['filename']['tmp_name'] ) && ! empty( $_FILES['filename']['tmp_name'] ) &&
						isset( $_FILES['filename']['name'] ) && ! empty( $_FILES['filename']['name'] ) &&
						isset( $_FILES['filename']['type'] ) && ! empty( $_FILES['filename']['type'] ) &&
						isset( $_FILES['filename']['error'] ) ) {
					if ( 0 === intval( wp_unslash( $_FILES['filename']['error'] ) ) ) {
						$tmp_file_path_name = wp_strip_all_tags( wp_unslash( wp_normalize_path( $_FILES['filename']['tmp_name'] ) ) );
						$tmp_file_name = sanitize_file_name( wp_basename( $tmp_file_path_name ) );
						$tmp_path_name = str_replace( $tmp_file_name, '', $tmp_file_path_name );
						$tmp_file_path_name = $tmp_path_name . $tmp_file_name;
						$filename = sanitize_file_name( wp_unslash( $_FILES['filename']['name'] ) );
						$mimetype = sanitize_text_field( wp_unslash( $_FILES['filename']['type'] ) );
						$filetype = wp_check_filetype( $filename );
						if ( ! $filetype['ext'] && ! current_user_can( 'unfiltered_upload' ) ) {
							echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'Sorry, this file type is not permitted for security reasons.' ) . '</li></ul></div>';
						} else {
							$filetype2 = wp_check_filetype( $filename, array( $filetype['ext'] => $mimetype ) );
							if ( ! empty( $filetype2['type'] ) ) {
								$json_file = wp_normalize_path( $this->upload_dir . $filename );
								$move = rename( $tmp_file_path_name, $json_file );
								if ( $move ) {
									if ( ! empty( $_POST['current_user_id'] ) ) {
										$uid = get_current_user_id();
									} else {
										$uid = 0;
									}
									do_action( 'movingmedialibrary_update_db_hook', $json_file, $uid );
									unlink( $json_file );
								} else {
									echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'Could not copy file.' ) . '</li></ul></div>';
								}
							} else {
								echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'Sorry, this file type is not permitted for security reasons.' ) . '</li></ul></div>';
							}
						}
					} else {
						echo '<div class="notice notice-error is-dismissible"><ul><li>' . esc_html__( 'No such file exists! Double check the name and try again.' ) . '</li></ul></div>';
					}
				}
			}
		}

		?>
		<div class="wrap">

		<h2>Moving Media Library <a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-update-db' ) ); ?>" style="text-decoration: none;"><?php esc_html_e( 'Import' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-generate-json' ) ); ?>" class="page-title-action"><?php esc_html_e( 'Export' ); ?></a>
			<?php
			if ( class_exists( 'BulkMediaRegister' ) ) {
				$bulkmediaregister_url = admin_url( 'admin.php?page=bulkmediaregister' );
			} else {
				if ( is_multisite() ) {
					$bulkmediaregister_url = network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				} else {
					$bulkmediaregister_url = admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				}
			}
			?>
			<a href="<?php echo esc_url( $bulkmediaregister_url ); ?>" class="page-title-action">Bulk Media Register</a>
		</h2>
		<div style="clear: both;"></div>

		<h3><?php esc_html_e( 'Read JSON file', 'moving-media-library' ); ?></h3>
		<div style="margin: 5px; padding: 5px;">
			<p class="description">
			<?php esc_html_e( 'The media files must be copied before importing the data.', 'moving-media-library' ); ?>
			</p>
			<form method="post" action="<?php echo esc_url( $scriptname ); ?>" enctype="multipart/form-data">
			<?php wp_nonce_field( 'mml_file_load', 'movingmedialibrary_import_file_load' ); ?>
			<div style="padding: 5px;">
			<input type="checkbox" name="current_user_id" value="1" />
			<?php
			$user = wp_get_current_user();
			/* translators: Current user display name */
			echo wp_kses_post( sprintf( __( 'Replace all media user IDs with the current user ID [%s]', 'moving-media-library' ), '<strong>' . $user->display_name . '</strong>' ) );
			?>
			</div>
			<?php
			if ( 0 == $max_upload_size ) {
				$limit_str = __( 'No limit', 'moving-media-library' );
			} else {
				$limit_str = size_format( $max_upload_size, 0 );
			}
			?>
			<div style="padding: 5px;">
			<?php
			/* translators: Maximum upload file size */
			echo esc_html( sprintf( __( 'Maximum upload file size: %s.' ), $limit_str ) );
			?>
			</div>
			<div style="padding: 5px;">
			<input name="filename" type="file" accept="application/json" size="80" />
			<?php submit_button( __( 'Import from JSON' ), 'large', 'Import', false ); ?>
			</div>
			<div style="padding: 5px;">
			<h4><span style="color: red;"><?php esc_html_e( 'Caution' ); ?></span> : <?php esc_html_e( 'This should be done first on a new site, before any other content. This is because you will inherit the post ID. If you do this after moving other content of a type that does not inherit post IDs, it will overwrite the post IDs and may break your site.', 'moving-media-library' ); ?></h4>
			</div>
			</form>
		</div>

		</div>
		<?php

	}

	/** ==================================================
	 * Main
	 *
	 * @since 1.00
	 */
	public function manage_page() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		?>
		<div class="wrap">

		<h2>Moving Media Library
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-generate-json' ) ); ?>" class="page-title-action"><?php esc_html_e( 'Export' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=movingmedialibrary-update-db' ) ); ?>" class="page-title-action"><?php esc_html_e( 'Import' ); ?></a>
			<?php
			if ( class_exists( 'BulkMediaRegister' ) ) {
				$bulkmediaregister_url = admin_url( 'admin.php?page=bulkmediaregister' );
			} else {
				if ( is_multisite() ) {
					$bulkmediaregister_url = network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				} else {
					$bulkmediaregister_url = admin_url( 'plugin-install.php?tab=plugin-information&plugin=bulk-media-register' );
				}
			}
			?>
			<a href="<?php echo esc_url( $bulkmediaregister_url ); ?>" class="page-title-action">Bulk Media Register</a>
		</h2>
		<div style="clear: both;"></div>

		<h3><?php esc_html_e( 'Supports the transfer of Media Library between servers.', 'moving-media-library' ); ?></h3>

		<?php $this->credit(); ?>

		</div>
		<?php

	}

	/** ==================================================
	 * Credit
	 *
	 * @since 1.00
	 */
	private function credit() {

		$plugin_name    = null;
		$plugin_ver_num = null;
		$plugin_path    = plugin_dir_path( __DIR__ );
		$plugin_dir     = untrailingslashit( wp_normalize_path( $plugin_path ) );
		$slugs          = explode( '/', $plugin_dir );
		$slug           = end( $slugs );
		$files          = scandir( $plugin_dir );
		foreach ( $files as $file ) {
			if ( '.' === $file || '..' === $file || is_dir( $plugin_path . $file ) ) {
				continue;
			} else {
				$exts = explode( '.', $file );
				$ext  = strtolower( end( $exts ) );
				if ( 'php' === $ext ) {
					$plugin_datas = get_file_data(
						$plugin_path . $file,
						array(
							'name'    => 'Plugin Name',
							'version' => 'Version',
						)
					);
					if ( array_key_exists( 'name', $plugin_datas ) && ! empty( $plugin_datas['name'] ) && array_key_exists( 'version', $plugin_datas ) && ! empty( $plugin_datas['version'] ) ) {
						$plugin_name    = $plugin_datas['name'];
						$plugin_ver_num = $plugin_datas['version'];
						break;
					}
				}
			}
		}
		$plugin_version = __( 'Version:' ) . ' ' . $plugin_ver_num;
		/* translators: FAQ Link & Slug */
		$faq       = sprintf( __( 'https://wordpress.org/plugins/%s/faq', 'moving-media-library' ), $slug );
		$support   = 'https://wordpress.org/support/plugin/' . $slug;
		$review    = 'https://wordpress.org/support/view/plugin-reviews/' . $slug;
		$translate = 'https://translate.wordpress.org/projects/wp-plugins/' . $slug;
		$facebook  = 'https://www.facebook.com/katsushikawamori/';
		$twitter   = 'https://twitter.com/dodesyo312';
		$youtube   = 'https://www.youtube.com/channel/UC5zTLeyROkvZm86OgNRcb_w';
		$donate    = __( 'https://shop.riverforest-wp.info/donate/', 'moving-media-library' );

		?>
		<span style="font-weight: bold;">
		<div>
		<?php echo esc_html( $plugin_version ); ?> | 
		<a style="text-decoration: none;" href="<?php echo esc_url( $faq ); ?>" target="_blank" rel="noopener noreferrer">FAQ</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $support ); ?>" target="_blank" rel="noopener noreferrer">Support Forums</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $review ); ?>" target="_blank" rel="noopener noreferrer">Reviews</a>
		</div>
		<div>
		<a style="text-decoration: none;" href="<?php echo esc_url( $translate ); ?>" target="_blank" rel="noopener noreferrer">
		<?php
		/* translators: Plugin translation link */
		echo esc_html( sprintf( __( 'Translations for %s' ), $plugin_name ) );
		?>
		</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-facebook"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-twitter"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-video-alt3"></span></a>
		</div>
		</span>

		<div style="width: 250px; height: 180px; margin: 5px; padding: 5px; border: #CCC 2px solid;">
		<h3><?php esc_html_e( 'Please make a donation if you like my work or would like to further the development of this plugin.', 'moving-media-library' ); ?></h3>
		<div style="text-align: right; margin: 5px; padding: 5px;"><span style="padding: 3px; color: #ffffff; background-color: #008000">Plugin Author</span> <span style="font-weight: bold;">Katsushi Kawamori</span></div>
		<button type="button" style="margin: 5px; padding: 5px;" onclick="window.open('<?php echo esc_url( $donate ); ?>')"><?php esc_html_e( 'Donate to this plugin &#187;' ); ?></button>
		</div>

		<?php

	}

	/** ==================================================
	 * Real Url
	 *
	 * @param  string $base  base.
	 * @param  string $relationalpath relationalpath.
	 * @return string $realurl realurl.
	 * @since  1.00
	 */
	private function realurl( $base, $relationalpath ) {

		$parse = array(
			'scheme'   => null,
			'user'     => null,
			'pass'     => null,
			'host'     => null,
			'port'     => null,
			'query'    => null,
			'fragment' => null,
		);
		$parse = wp_parse_url( $base );

		if ( strpos( $parse['path'], '/', ( strlen( $parse['path'] ) - 1 ) ) !== false ) {
			$parse['path'] .= '.';
		}

		if ( preg_match( '#^https?://#', $relationalpath ) ) {
			return $relationalpath;
		} elseif ( preg_match( '#^/.*$#', $relationalpath ) ) {
			return $parse['scheme'] . '://' . $parse['host'] . $relationalpath;
		} else {
			$base_path = explode( '/', dirname( $parse['path'] ) );
			$rel_path  = explode( '/', $relationalpath );
			foreach ( $rel_path as $rel_dir_name ) {
				if ( '.' === $rel_dir_name ) {
					array_shift( $base_path );
					array_unshift( $base_path, '' );
				} elseif ( '..' === $rel_dir_name ) {
					array_pop( $base_path );
					if ( count( $base_path ) === 0 ) {
						$base_path = array( '' );
					}
				} else {
					array_push( $base_path, $rel_dir_name );
				}
			}
			$path = implode( '/', $base_path );
			return $parse['scheme'] . '://' . $parse['host'] . $path;
		}

	}

	/** ==================================================
	 * Allow upload json
	 *
	 * @param array $mimes  mimes.
	 * @since 1.00
	 */
	public function allow_upload_json( $mimes ) {
		$mimes['json'] = 'application/json';
		return $mimes;
	}

}


