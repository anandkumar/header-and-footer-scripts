<?php
/**
 * Plugin Name: Header and Footer Scripts
 * Plugin URI: https://github.com/anandkumar/header-and-footer-scripts
 * Description: Essential WordPress plugin for almost every website to insert codes like Javascript and CSS. Inserting script to your wp_head and wp_footer made easy.
 * Version: 2.4.2
 * Author: Anand Kumar
 * Author URI: http://www.anandkumar.net
 * Text Domain: header-and-footer-scripts
 * Domain Path: /lang
 * License: GPLv2 or later
 */

/*
Header and Footer Scripts
Copyright (C) 2013 - 2026, Anand Kumar <anand@anandkumar.net>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'JAMIFY_HFS_PLUGIN_DIR', str_replace( '\\', '/', dirname( __FILE__ ) ) );

if ( !class_exists( 'HeaderAndFooterScripts' ) ) {

	class HeaderAndFooterScripts {

		/**
		 * Constructor.
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'init' ) );
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
			add_action( 'update_option_jamify_hfs_allow_author', array( $this, 'update_role_author' ), 10, 2 );
			add_action( 'update_option_jamify_hfs_allow_contributor', array( $this, 'update_role_contributor' ), 10, 2 );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			add_action( 'wp_head', array( $this, 'wp_head' ), \get_option( 'jamify_hfs_insert_header_priority', 10 ) );
			add_action( 'wp_body_open', array( $this, 'wp_body_open' ), \get_option( 'jamify_hfs_insert_body_priority', 10 ) );
			add_action( 'wp_footer', array( $this, 'wp_footer' ), \get_option( 'jamify_hfs_insert_footer_priority', 10 ) );

		}

		/**
		 * Load textdomain for internationalization.
		 */
		public function init() {

			load_plugin_textdomain( 'header-and-footer-scripts', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
		}

		/**
		 * Initialize admin settings, migration logic, and meta boxes.
		 */
		public function admin_init() {

			// Migration Logic
			$options_to_migrate = array(
				'shfs_insert_header'          => 'jamify_hfs_insert_header',
				'shfs_insert_body'            => 'jamify_hfs_insert_body',
				'shfs_insert_footer'          => 'jamify_hfs_insert_footer',
				'shfs_insert_header_priority' => 'jamify_hfs_insert_header_priority',
				'shfs_insert_body_priority'   => 'jamify_hfs_insert_body_priority',
				'shfs_insert_footer_priority' => 'jamify_hfs_insert_footer_priority',
				'shfs_allow_author'           => 'jamify_hfs_allow_author',
				'shfs_allow_contributor'      => 'jamify_hfs_allow_contributor',
			);

			foreach ( $options_to_migrate as $old => $new ) {
				if ( false === get_option( $new ) && false !== get_option( $old ) ) {
					update_option( $new, get_option( $old ) );
				}
			}

			// register settings for sitewide script
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_header', 'trim' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_body', 'trim' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_footer', 'trim' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_header_priority', 'intval' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_body_priority', 'intval' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_insert_footer_priority', 'intval' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_allow_author', 'sanitize_text_field' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_allow_contributor', 'sanitize_text_field' );
			register_setting( 'header-and-footer-scripts', 'jamify_hfs_clean_on_uninstall', 'sanitize_text_field' );


			// add meta box to all post types
			foreach ( get_post_types( '', 'names' ) as $type ) {
				if ( current_user_can( 'unfiltered_html' ) ) {
					add_meta_box( 'jamify_hfs_all_post_meta', esc_html__( 'Insert Script to &lt;head&gt;', 'header-and-footer-scripts' ), array( $this, 'meta_setup' ), $type, 'normal', 'high' );
				}
			}

			add_action( 'save_post', array( $this, 'post_meta_save' ) );
		}

		/**
		 * Register the options page.
		 */
		public function admin_menu() {
			$page = add_submenu_page( 'options-general.php', esc_html__( 'Header and Footer Scripts', 'header-and-footer-scripts' ), esc_html__( 'Header and Footer Scripts', 'header-and-footer-scripts' ), 'manage_options', 'header-and-footer-scripts', array( $this, 'jamify_hfs_options_panel' ) );
		}

		/**
		 * Enqueue admin scripts (CodeMirror).
		 *
		 * @param string $hook Current admin page hook.
		 */
		public function admin_enqueue_scripts( $hook ) {
			if ( 'settings_page_header-and-footer-scripts' !== $hook && 'post.php' !== $hook && 'post-new.php' !== $hook ) {
				return;
			}

			// Enqueue code editor for syntax highlighting
			$settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

			// Enqueue admin styles
			wp_enqueue_style( 'jamify-hfs-admin-css', plugins_url( 'css/jamify-hfs-admin.css', __FILE__ ), array(), '2.4.2' );

			// If the code editor is enabled, we need to initialize it.
			if ( false !== $settings ) {
				wp_add_inline_script(
					'code-editor',
					sprintf(
						'jQuery( function() { 
							if ( jQuery( "#jamify_hfs_insert_header" ).length ) { wp.codeEditor.initialize( "jamify_hfs_insert_header", %1$s ); }
							if ( jQuery( "#jamify_hfs_insert_body" ).length ) { wp.codeEditor.initialize( "jamify_hfs_insert_body", %1$s ); }
							if ( jQuery( "#jamify_hfs_insert_footer" ).length ) { wp.codeEditor.initialize( "jamify_hfs_insert_footer", %1$s ); }
							if ( jQuery( "#jamify_hfs_inpost_head_script" ).length ) {
								var inpostSettings = wp.codeEditor.initialize( "jamify_hfs_inpost_head_script", %1$s );
								var cm = inpostSettings.codemirror;
								// Fallback for some WP versions where initialize returns jQuery object or structure differs.
								if ( ! cm && jQuery( "#jamify_hfs_inpost_head_script" ).next( ".CodeMirror" ).length ) {
									cm = jQuery( "#jamify_hfs_inpost_head_script" ).next( ".CodeMirror" ).get( 0 ).CodeMirror;
								}
								if ( cm ) {
									cm.on( "change", function() {
										cm.save();
										jQuery( "#jamify_hfs_inpost_head_script" ).trigger( "change" );
									} );
									// Refresh to ensure gutter renders correctly
									setTimeout( function() { cm.refresh(); }, 1 );
								}
							}
						} );',
						wp_json_encode( $settings )
					)
				);
			}
		}

		/**
		 * Output scripts in wp_head.
		 */
		public function wp_head() {
			$meta = get_option( 'jamify_hfs_insert_header', '' );
			if ( '' !== $meta ) {
				echo $meta, "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			$shfs_post_meta = get_post_meta( get_the_ID(), '_inpost_head_script', true );
			if ( is_singular() && ! empty( $shfs_post_meta ) ) {
				echo $shfs_post_meta['synth_header_script'], "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		/**
		 * Output scripts in wp_body_open.
		 */
		public function wp_body_open() {
			if ( ! is_admin() && ! is_feed() && ! is_robots() && ! is_trackback() ) {
				$meta = get_option( 'jamify_hfs_insert_body', '' );
				if ( '' !== $meta ) {
					echo $meta, "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		/**
		 * Output scripts in wp_footer.
		 */
		public function wp_footer() {
			if ( ! is_admin() && ! is_feed() && ! is_robots() && ! is_trackback() ) {
				$text = get_option( 'jamify_hfs_insert_footer', '' );
				$text = convert_smilies( $text );
				$text = do_shortcode( $text );

				if ( '' !== $text ) {
					echo $text, "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		/**
		 * Render the plugin options page.
		 */
		public function jamify_hfs_options_panel() {
			// Load options page
			require_once JAMIFY_HFS_PLUGIN_DIR . '/inc/options.php';
		}

		/**
		 * Display admin notices (e.g. migration warning).
		 */
		public function admin_notices() {
			// Check for previous version option to show notice
			if ( get_option( 'shfs_script_access_level' ) ) {
				$dismiss_link = add_query_arg( 'shfs_dismiss_notice', 'true' );
				if ( isset( $_GET['shfs_dismiss_notice'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
					delete_option( 'shfs_script_access_level' );
				} else {
					?>
                    <div class="notice notice-warning is-dismissible">
                        <p>
							<?php esc_html_e( 'Header and Footer Scripts permission system has been updated. Please check the ', 'header-and-footer-scripts' ); ?>
                             <a href="<?php echo esc_url( admin_url( 'options-general.php?page=header-and-footer-scripts' ) ); ?>"><?php esc_html_e( 'Settings', 'header-and-footer-scripts' ); ?></a> 
							<?php esc_html_e( 'to configure Author/Contributor access if needed.', 'header-and-footer-scripts' ); ?>
                            <a href="<?php echo esc_url( $dismiss_link ); ?>" style="float:right; text-decoration:none;">X</a>
                        </p>
                    </div>
					<?php
				}
			}
		}

		/**
		 * Update 'author' role capabilities when option changes.
		 *
		 * @param mixed $old_value Old option value.
		 * @param mixed $new_value New option value.
		 */
		public function update_role_author( $old_value, $new_value ) {
			$role = get_role( 'author' );
			if ( 'yes' === $new_value ) {
				$role->add_cap( 'unfiltered_html' );
			} else {
				$role->remove_cap( 'unfiltered_html' );
			}
		}

		/**
		 * Update 'contributor' role capabilities when option changes.
		 *
		 * @param mixed $old_value Old option value.
		 * @param mixed $new_value New option value.
		 */
		public function update_role_contributor( $old_value, $new_value ) {
			$role = get_role( 'contributor' );
			if ( 'yes' === $new_value ) {
				$role->add_cap( 'unfiltered_html' );
			} else {
				$role->remove_cap( 'unfiltered_html' );
			}
		}

		/**
		 * Render the post meta box.
		 */
		public function meta_setup() {
			global $post;

			// using an underscore, prevents the meta variable
			// from showing up in the custom fields section
			$meta = get_post_meta( $post->ID, '_inpost_head_script', true );

			// instead of writing HTML here, lets do an include
			include_once JAMIFY_HFS_PLUGIN_DIR . '/inc/meta.php';

			// create a custom nonce for submit verification later
			echo '<input type="hidden" name="jamify_hfs_post_meta_noncename" value="' . esc_attr( wp_create_nonce( 'jamify_hfs_post_meta_save' ) ) . '" />';
		}

		/**
		 * Save post meta data.
		 *
		 * @param int $post_id The ID of the post being saved.
		 * @return int Post ID.
		 */
		public function post_meta_save( $post_id ) {
			// authentication checks

			// make sure data came from our meta box
			if ( ! isset( $_POST['jamify_hfs_post_meta_noncename'] )
			     || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['jamify_hfs_post_meta_noncename'] ) ), 'jamify_hfs_post_meta_save' ) ) {
				return $post_id;
			}

			// check user permissions
			if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}

			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}

			}

			// check configured access level
			if ( ! current_user_can( 'unfiltered_html' ) ) {
				return $post_id;
			}

			$current_data = get_post_meta( $post_id, '_inpost_head_script', true );

			$new_data = isset( $_POST['_inpost_head_script'] ) ? wp_unslash( $_POST['_inpost_head_script'] ) : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Intentional raw input for script insertion.

			$this->post_meta_clean( $new_data );

			if ( $current_data ) {

				if ( is_null( $new_data ) ) {
					delete_post_meta( $post_id, '_inpost_head_script' );
				} else {
					update_post_meta( $post_id, '_inpost_head_script', $new_data );
				}

			} elseif ( ! is_null( $new_data ) ) {

				add_post_meta( $post_id, '_inpost_head_script', $new_data, true );

			}

			return $post_id;
		}

		/**
		 * Clean empty values from the meta array.
		 *
		 * @param array $arr The array to clean.
		 */
		public function post_meta_clean( &$arr ) {

			if ( is_array( $arr ) ) {

				foreach ( $arr as $i => $v ) {

					if ( is_array( $arr[ $i ] ) ) {
						$this->post_meta_clean( $arr[ $i ] );

						if ( ! count( $arr[ $i ] ) ) {
							unset( $arr[ $i ] );
						}

					} else {

						if ( trim( $arr[ $i ] ) == '' ) {
							unset( $arr[ $i ] );
						}
					}
				}

				if ( ! count( $arr ) ) {
					$arr = null;
				}
			}
		}
	}

	$jamify_hfs = new HeaderAndFooterScripts();
	
	// Legacy global for backward compatibility
	$GLOBALS['shfs_header_and_footer_scripts'] = $jamify_hfs;
}

/**
 * Backward Compatibility Shims
 * These functions ensure that external code calling the old global functions
 * continues to work by delegating to the new class instance.
 */

if ( ! function_exists( 'shfs_meta_setup' ) ) {
	function shfs_meta_setup() {
		global $jamify_hfs;
		if ( isset( $jamify_hfs ) ) {
			$jamify_hfs->meta_setup();
		}
	}
}

if ( ! function_exists( 'shfs_post_meta_save' ) ) {
	function shfs_post_meta_save( $post_id ) {
		global $jamify_hfs;
		if ( isset( $jamify_hfs ) ) {
			return $jamify_hfs->post_meta_save( $post_id );
		}
		return $post_id;
	}
}

if ( ! function_exists( 'shfs_post_meta_clean' ) ) {
	function shfs_post_meta_clean( &$arr ) {
		global $jamify_hfs;
		if ( isset( $jamify_hfs ) ) {
			$jamify_hfs->post_meta_clean( $arr );
		}
	}
}
