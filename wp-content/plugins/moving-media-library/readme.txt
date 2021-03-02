=== Moving Media Library ===
Contributors: Katsushi Kawamori
Donate link: https://shop.riverforest-wp.info/donate/
Tags: media, media library, moving
Requires at least: 4.6
Requires PHP: 5.6
Tested up to: 5.6
Stable tag: 1.11
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Supports the transfer of Media Library between servers.

== Description ==

Supports the transfer of Media Library between servers.

= Export =
* Outputs the database as a JSON format file.

= Import =
* It reads the exported JSON format file and outputs it to the database.
* Have the option to replace all media user IDs with the current user ID.

= Maintain the following =
* ID
* user ID
* Date and time
* Folder structure
* File name
* File type
* File size
* Dimensions
* Thumbnails
* Exif data
* Alternative Text
* Caption
* Description
* Comments

= Sibling plugin =
* [Bulk Media Register](https://wordpress.org/plugins/bulk-media-register/).
* [Media from FTP](https://wordpress.org/plugins/media-from-ftp/).
* [Media from ZIP](https://wordpress.org/plugins/media-from-zip/).
* [ZIP from Media](https://wordpress.org/plugins/zip-from-media/).

== Installation ==

1. Upload `moving-media-library` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

none

== Screenshots ==

1. Export
2. Import

== Changelog ==

= 1.11 =
Fixed credit screen.

= 1.10 =
Added a note of caution.

= 1.09 =
Supported XAMPP.

= 1.08 =
Fixed an issue with database prefixes.

= 1.07 =
Fixed an issue with database prefixes.

= 1.06 =
Added a link to the [Bulk Media Register](https://wordpress.org/plugins/bulk-media-register/).

= 1.05 =
Fixed an issue with getting the date.

= 1.04 =
Fixed translation.

= 1.03 =
Fixed translation.

= 1.02 =
Fixed a problem with the JSON output of comments.

= 1.01 =
Fixed translation.

= 1.00 =
Initial release.

== Upgrade Notice ==

= 1.00 =
Initial release.
