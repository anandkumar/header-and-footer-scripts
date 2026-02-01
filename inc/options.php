<?php
/**
 * Plugin Options page
 *
 * @package    Header and Footer Scripts
 * @author     Anand Kumar <anand@anandkumar.net>
 * @copyright  Copyright (c) 2013 - 2026, Anand Kumar
 * @link       https://github.com/anandkumar/header-and-footer-scripts
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}?>
<div class="wrap">
  <h2><?php esc_html_e( 'Header and Footer Scripts - Options', 'header-and-footer-scripts'); ?> <a class="add-new-h2" target="_blank" href="<?php echo esc_url( "https://github.com/anandkumar/header-and-footer-scripts/wiki" ); ?>"><?php esc_html_e( 'Read Tutorial', 'header-and-footer-scripts'); ?></a></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'header-and-footer-scripts' ); ?>

            <h3 class="shfs-labels"><?php esc_html_e( 'Permissions', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'By default, only Administrators can add scripts. Use the options below to grant access to other roles.', 'header-and-footer-scripts'); ?></p>
            
            <fieldset>
                <label for="jamify_hfs_allow_author">
                    <input type="checkbox" name="jamify_hfs_allow_author" id="jamify_hfs_allow_author" value="yes" <?php checked( 'yes', get_option( 'jamify_hfs_allow_author' ) ); ?>>
                    <?php esc_html_e( 'Allow Authors to add scripts', 'header-and-footer-scripts'); ?>
                </label>
                <br>
                <label for="jamify_hfs_allow_contributor">
                    <input type="checkbox" name="jamify_hfs_allow_contributor" id="jamify_hfs_allow_contributor" value="yes" <?php checked( 'yes', get_option( 'jamify_hfs_allow_contributor' ) ); ?>>
                    <?php esc_html_e( 'Allow Contributors to add scripts', 'header-and-footer-scripts'); ?>
                </label>
            </fieldset>

            <p class="description" style="color: #ea580c; font-weight: bold;">
                <?php esc_html_e( 'Security Warning: Enabling these options grants the "unfiltered_html" capability. This allows users to execute arbitrary JavaScript. Only enable this for trusted users.', 'header-and-footer-scripts'); ?>
            </p>
            <hr />

            <h3 class="shfs-labels" for="jamify_hfs_insert_header"><?php esc_html_e( 'Head Scripts (&lt;head&gt;)', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'Scripts entered here will be output in the &lt;head&gt; section.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="jamify_hfs_insert_header" name="jamify_hfs_insert_header"><?php echo esc_html( get_option( 'jamify_hfs_insert_header' ) ); ?></textarea>

            <p><label for="jamify_hfs_insert_header_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'jamify_hfs_insert_header_priority', 10 ) ); ?>" name="jamify_hfs_insert_header_priority" id="jamify_hfs_insert_header_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

            <h3 class="shfs-labels" for="jamify_hfs_insert_body"><?php esc_html_e( 'Body Scripts (After &lt;body&gt;)', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'Scripts entered here will be output immediately after the opening &lt;body&gt; tag.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="jamify_hfs_insert_body" name="jamify_hfs_insert_body"><?php echo esc_html( get_option( 'jamify_hfs_insert_body' ) ); ?></textarea>

            <p><label for="jamify_hfs_insert_body_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'jamify_hfs_insert_body_priority', 10 ) ); ?>" name="jamify_hfs_insert_body_priority" id="jamify_hfs_insert_body_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

            <h3 class="shfs-labels footerlabel" for="jamify_hfs_insert_footer"><?php esc_html_e( 'Footer Scripts (Before &lt;/body&gt;)', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'Scripts entered here will be output immediately before the closing &lt;/body&gt; tag.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="jamify_hfs_insert_footer" name="jamify_hfs_insert_footer"><?php echo esc_html( get_option( 'jamify_hfs_insert_footer' ) ); ?></textarea>

            <p><label for="jamify_hfs_insert_footer_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'jamify_hfs_insert_footer_priority', 10 ) ); ?>" name="jamify_hfs_insert_footer_priority" id="jamify_hfs_insert_footer_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

            <h3 class="shfs-labels"><?php esc_html_e( 'Uninstall Code Cleanup', 'header-and-footer-scripts'); ?></h3>
            <fieldset>
                <label for="jamify_hfs_clean_on_uninstall">
                    <input type="checkbox" name="jamify_hfs_clean_on_uninstall" id="jamify_hfs_clean_on_uninstall" value="yes" <?php checked( 'yes', get_option( 'jamify_hfs_clean_on_uninstall' ) ); ?>>
                    <?php esc_html_e( 'Delete all data on uninstall', 'header-and-footer-scripts'); ?>
                </label>
            </fieldset>
            <p class="description" style="color: #ea580c; font-weight: bold;">
                <?php esc_html_e( 'Warning: If checked, all saved scripts and settings will be permanently erased when you delete the plugin. This action cannot be undone.', 'header-and-footer-scripts'); ?>
            </p>

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php esc_html_e( 'Save settings', 'header-and-footer-scripts'); ?>" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(JAMIFY_HFS_PLUGIN_DIR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
