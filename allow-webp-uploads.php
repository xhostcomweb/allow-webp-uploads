<?php
/**
 * Plugin Name: Xhostcom Allow Webp Uploads
 * @author            Paul Anthony McGowan
 * @copyright         2019  Xhostcom
 * @license           GPL-2.0-or-later
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Plugin to allow upload of webp files/extension in Wordpress.
 */

function webp_file_and_ext( $mime, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    if ( in_array( $wp_filetype['ext'], [ 'webp' ] ) ) {
        $mime['ext']  = true;
        $mime['type'] = true;
    }

    return $mime;
}
add_filter( 'wp_check_filetype_and_ext', 'webp_file_and_ext', 10, 4 );

function add_webp_mime_type( $mimes ) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'add_webp_mime_type' );