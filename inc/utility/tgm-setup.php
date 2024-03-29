<?php
/**
 * TGM Plugin Activation setup
 *
 * @package _s
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
include_once get_template_directory() . '/inc/vendor/tgm-plugin-activation/class-tgm-plugin-activation.php';

/**
 * Reset install notice if previously dismissed.
 */
// TGM_Plugin_Activation::get_instance()->update_dismiss();

/**
 * Register the required plugins for this theme.
 */
function _s_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins_local = array(
    array(
      'name' => 'Advanced Custom Fields',
      'slug' => 'advanced-custom-fields',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Advanced Custom Fields: Repeater Field',
      'slug' => 'acf-repeater',
      'source' => 'http://www.ecm-design.com/assets/plugins/acf-repeater.zip',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Force Regenerate Thumbnails',
      'slug' => 'force-regenerate-thumbnails',
      'required' => true,
      'force_activation' => true
    )
  );

  $plugins_remote = array(
    array(
      'name' => 'Brute Force Login Protection',
      'slug' => 'brute-force-login-protection',
      'required' => true,
      'force_activation' => true
    )
  );

	// load development plugins or both development
	// and production plugins based on WP_ENV value
	if ( WP_ENV === 'development' ) {
		$plugins = $plugins_local;
	} else {
		$plugins = array_merge( $plugins_local, $plugins_remote );
	}

	/**
	 * Configuration settings
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
			'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
			'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', '_s_register_required_plugins' );

/**
 * Reset install notice if previously dismissed.
 */
// TGM_Plugin_Activation::get_instance()->update_dismiss();
