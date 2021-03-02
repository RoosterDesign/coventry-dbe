<?php
/**
 * Moving Media Library
 *
 * @package    Moving Media Library
 * @subpackage MovingMediaLibrary Main function
/*  Copyright (c) 2020- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
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

$movingmedialibrary = new MovingMediaLibrary();

/** ==================================================
 * Class Main function
 *
 * @since 1.00
 */
class MovingMediaLibrary {

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		add_action( 'movingmedialibrary_generate_json_hook', array( $this, 'generate_json' ), 10, 1 );
		add_action( 'movingmedialibrary_update_db_hook', array( $this, 'update_db' ), 10, 2 );

	}

	/** ==================================================
	 * Gennerate json
	 *
	 * @param string $json_file  json_file.
	 * @since 1.00
	 */
	public function generate_json( $json_file ) {

		/* Scan files */
		global $wpdb;
		$posts = $wpdb->get_results(
			"
			SELECT	*
			FROM	{$wpdb->prefix}posts
			WHERE	post_type = 'attachment'
					AND post_status = 'inherit'
			"
		);

		if ( empty( $posts ) ) {
			?>
			<div class="notice notice-error is-dismissible"><ul><li><?php esc_html_e( 'There is no media.', 'moving-media-library' ); ?></li></ul></div>
			<?php
			exit;
		}

		$posts_meta = $wpdb->get_results(
			"
			SELECT	*
			FROM	{$wpdb->prefix}postmeta
			WHERE	meta_key = '_wp_attached_file'
					OR meta_key = '_wp_attachment_metadata'
			"
		);

		$posts_comment = $wpdb->get_results(
			"
			SELECT	comment_ID, comment_post_ID, comment_author, comment_author_email, comment_author_url, comment_author_IP, comment_date, comment_date_gmt, comment_content, comment_karma, comment_approved, comment_agent, comment_type, comment_parent, user_id
			FROM	{$wpdb->prefix}comments
			LEFT	JOIN {$wpdb->prefix}posts ON( {$wpdb->prefix}comments.comment_post_id = {$wpdb->prefix}posts.ID )
			WHERE	post_type = 'attachment'
					AND post_status = 'inherit'
			"
		);

		$post_json = json_encode(
			array(
				'post' => $posts,
				'postmeta' => $posts_meta,
				'comment' => $posts_comment,
			)
		);

		file_put_contents( $json_file, $post_json );

	}

	/** ==================================================
	 * Update DB
	 *
	 * @param string $json_file  json_file.
	 * @param int    $uid  uid.
	 * @since 1.00
	 */
	public function update_db( $json_file, $uid ) {

		global $wpdb;

		$json = file_get_contents( $json_file );
		$import_data = json_decode( $json );

		foreach ( $import_data as $key1 => $value1 ) {
			foreach ( $value1 as $key2 => $value2 ) {
				if ( 'post' === $key1 ) {
					$table = $wpdb->prefix . 'posts';
					if ( is_null( get_post( $value2->ID ) ) ) {
						$wpdb->insert( $table, array( 'ID' => $value2->ID ), array( '%d' ) );
					}
					$where = array( 'ID' => $value2->ID );
					if ( 0 < $uid ) {
						$value2->post_author = $uid;
					}
				} else if ( 'postmeta' === $key1 ) {
					$table = $wpdb->prefix . 'postmeta';
					if ( empty( get_post_meta( $value2->post_id ) ) ) {
						$wpdb->insert( $table, array( 'meta_id' => $value2->meta_id ), array( '%d' ) );
					}
					$where = array( 'meta_id' => $value2->meta_id );
				} else if ( 'comment' === $key1 ) {
					$table = $wpdb->prefix . 'comments';
					if ( is_null( get_comment( $value2->comment_ID ) ) ) {
						$wpdb->insert( $table, array( 'comment_ID' => $value2->comment_ID ), array( '%d' ) );
					}
					$where = array( 'comment_ID' => $value2->comment_ID );
					if ( 0 < $uid && 0 < $value2->user_id ) {
						$value2->user_id = $uid;
					}
				}
				$wpdb->update( $table, (array) $value2, $where );
			}
		}

		echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html__( 'The import is now complete.', 'moving-media-library' ) . '</li></ul></div>';

	}

}


