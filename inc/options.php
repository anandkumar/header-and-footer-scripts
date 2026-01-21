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

if (! defined('ABSPATH') ) {
    exit;
}?>
<div class="wrap">
  <h2><?php esc_html_e( 'Header and Footer Scripts - Options', 'header-and-footer-scripts'); ?> <a class="add-new-h2" target="_blank" href="<?php echo esc_url( "https://digitalliberation.org/docs/header-and-footer-scripts/?utm_source=wpdash_hfs" ); ?>"><?php esc_html_e( 'Read Tutorial', 'header-and-footer-scripts'); ?></a></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'header-and-footer-scripts' ); ?>

            <h3 class="shfs-labels" for="shfs_script_access_level"><?php esc_html_e( 'Who can add scripts to posts?', 'header-and-footer-scripts'); ?></h3>
             <p>
                 <select name="shfs_script_access_level" id="shfs_script_access_level">
                     <option value="manage_options" <?php selected( get_option( 'shfs_script_access_level', 'manage_options' ), 'manage_options' ); ?>><?php esc_html_e('Administrator Only', 'header-and-footer-scripts'); ?></option>
                     <option value="edit_others_posts" <?php selected( get_option( 'shfs_script_access_level', 'manage_options' ), 'edit_others_posts' ); ?>><?php esc_html_e('Administrator & Editor', 'header-and-footer-scripts'); ?></option>
                     <option value="publish_posts" <?php selected( get_option( 'shfs_script_access_level', 'manage_options' ), 'publish_posts' ); ?>><?php esc_html_e('Administrator, Editor & Author', 'header-and-footer-scripts'); ?></option>
                 </select>
             </p>
             <p class="description"><?php esc_html_e( 'Select the minimum capability required to add scripts to posts using the meta box.', 'header-and-footer-scripts'); ?></p>
             <p class="description" style="color: #ea580c; font-weight: bold;"><?php esc_html_e( 'Caution: Giving access to non-admins allows them to execute arbitrary JavaScript on your site.', 'header-and-footer-scripts'); ?></p>
             <hr />

            <h3 class="shfs-labels" for="shfs_insert_header"><?php esc_html_e( 'Scripts in header:', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'The following script, if any, will be inserted into the &lt;head&gt; section using wp_head hook.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="insert_header" name="shfs_insert_header"><?php echo esc_html( get_option( 'shfs_insert_header' ) ); ?></textarea>

            <p><label for="shfs_insert_header_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'shfs_insert_header_priority', 10 ) ); ?>" name="shfs_insert_header_priority" id="shfs_insert_header_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

            <h3 class="shfs-labels footerlabel" for="shfs_insert_footer"><?php esc_html_e( 'Scripts in footer:', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'The following script, if any, will be inserted before &lt;/body&gt; tag using wp_footer hook.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="shfs_insert_footer" name="shfs_insert_footer"><?php echo esc_html( get_option( 'shfs_insert_footer' ) ); ?></textarea>

            <p><label for="shfs_insert_footer_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'shfs_insert_footer_priority', 10 ) ); ?>" name="shfs_insert_footer_priority" id="shfs_insert_footer_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p>

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php esc_html_e( 'Save settings', 'header-and-footer-scripts'); ?>" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(SHFS_PLUGIN_DIR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
