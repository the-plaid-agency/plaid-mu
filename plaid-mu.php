<?php
/*
  Plugin Name: PLAID Must-Use Plugin
  Plugin URI: https://github.com/the-plaid-agency/plaid-mu
  Description: Boilerplate MU-Plugin for custom actions and filters to run for a site instead of setting in WP-config.php
  Version: 0.1
  Author: THE PLAID AGENCY
  Author URI: https://github.com/the-plaid-agency
*/



/*
Plugin Name: WP-CFM SSOT
Description: Sets WP-CFM bundles as the Single Source of Truth.
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Enable WP-CFM SSOT only for Pantheon Live environment.
 * @param bool $is_ssot - default is false
 * @return bool
 */
function wp_lock_live_config( $is_ssot ) {
    if ( defined( 'PANTHEON_ENVIRONMENT' ) && PANTHEON_ENVIRONMENT == 'live' ) {
        return true;
    }
    return $is_ssot;
}
add_filter( 'wpcfm_is_ssot', 'wp_lock_live_config' );
