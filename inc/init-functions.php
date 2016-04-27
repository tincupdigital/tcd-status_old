<?php
/**
 * Initialize theme functions
 *
 * @package _s
 */

/**
 * Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/**
 * Hide update notices for all but me
 */
function _s_hide_update_notices_all() {
  global $wp_version;
  return(object) array( 'last_checked' => time(), 'version_checked' => $wp_version );
}
if ( wp_get_current_user()->user_login !== 'sean' ) {
  add_filter( 'pre_site_transient_update_core', '_s_hide_update_notices_all' );
  add_filter( 'pre_site_transient_update_plugins', '_s_hide_update_notices_all' );
  add_filter( 'pre_site_transient_update_themes', '_s_hide_update_notices_all' );
}

/**
 * Strip &nbsp; from end of posts
 */
function _s_trim_trailing_whitespace( $content ) {
  $content = preg_replace( "/&nbsp;/", "☺", $content );
  $content = rtrim( $content, "☺" . " \t\n\r\0\x0B" );
  $content = preg_replace( "/☺/", "&nbsp;", $content );
  return $content;
}
add_filter( 'the_content', '_s_trim_trailing_whitespace', 0 );

/**
 * Remove double space after period
 */
function _s_remove_double_space( $data ) {
  $data['post_content'] = preg_replace(
    "~( \x{C2}\x{A0}|\x{C2}\x{A0} )~m", " ", $data['post_content']
  );
  return $data;
}
add_filter( 'wp_insert_post_data', '_s_remove_double_space', 20 );

/**
 * Remove category and tag from admin menu
 */
function _s_remove_cat_tag_admin() {
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}
add_action( 'admin_menu', '_s_remove_cat_tag_admin' );

/**
 * Remove category and tag meta boxes
 */

function _s_remove_cat_tag_meta() {
  remove_meta_box( 'categorydiv','post','normal' );
  remove_meta_box( 'tagsdiv-post_tag','post','normal' );
}
add_action('admin_menu','_s_remove_cat_tag_meta');

/**
 * Add checkmark shortcode
 */
function _s_check_shortcode() {
  return '<span class="checkmark">&#10004;</span>';
}
add_shortcode( 'check', '_s_check_shortcode' );
