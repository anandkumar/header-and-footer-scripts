<?php
/**
 * Fired when the plugin is being uninstalled.
 *
 * @package    Header and Footer Scripts
 * @author     Anand Kumar <anand@anandkumar.net>
 * @copyright  Copyright (c) 2013 - 2026, Anand Kumar
 * @link       https://github.com/anandkumar/header-and-footer-scripts
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'shfs_insert_header' );
delete_option( 'shfs_insert_footer' );
delete_option( 'shfs_insert_header_priority' );
delete_option( 'shfs_insert_footer_priority' );
delete_option( 'shfs_script_access_level' );
