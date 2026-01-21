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
  <h2><?php esc_html_e( 'Header and Footer Scripts - Options', 'header-and-footer-scripts'); ?> <a class="add-new-h2" target="_blank" href="<?php echo esc_url( "https://github.com/anandkumar/header-and-footer-scripts/wiki" ); ?>"><?php esc_html_e( 'Read Tutorial', 'header-and-footer-scripts'); ?></a></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'header-and-footer-scripts' ); ?>

            <h3 class="shfs-labels"><?php esc_html_e( 'Who can insert scripts?', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'By default, only Administrators can add scripts. You can grant this ability to other roles below.', 'header-and-footer-scripts'); ?></p>
            
            <fieldset>
                <label for="shfs_allow_author">
                    <input type="checkbox" name="shfs_allow_author" id="shfs_allow_author" value="yes" <?php checked( 'yes', get_option( 'shfs_allow_author' ) ); ?>>
                    <?php esc_html_e( 'Allow Authors to add scripts (Grants unfiltered_html capability)', 'header-and-footer-scripts'); ?>
                </label>
                <br>
                <label for="shfs_allow_contributor">
                    <input type="checkbox" name="shfs_allow_contributor" id="shfs_allow_contributor" value="yes" <?php checked( 'yes', get_option( 'shfs_allow_contributor' ) ); ?>>
                    <?php esc_html_e( 'Allow Contributors to add scripts (Grants unfiltered_html capability)', 'header-and-footer-scripts'); ?>
                </label>
            </fieldset>

            <p class="description" style="color: #ea580c; font-weight: bold;">
                <?php esc_html_e( 'Caution: Enabling these options grants the "unfiltered_html" capability, allowing users to execute arbitrary JavaScript on your site. Only enable for trusted users.', 'header-and-footer-scripts'); ?>
            </p>
            <hr />

            <h3 class="shfs-labels" for="shfs_insert_header"><?php esc_html_e( 'Scripts in header:', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'The following script, if any, will be inserted into the &lt;head&gt; section using wp_head hook.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="shfs_insert_header" name="shfs_insert_header"><?php echo esc_html( get_option( 'shfs_insert_header' ) ); ?></textarea>

            <p><label for="shfs_insert_header_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'shfs_insert_header_priority', 10 ) ); ?>" name="shfs_insert_header_priority" id="shfs_insert_header_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

            <h3 class="shfs-labels" for="shfs_insert_body"><?php esc_html_e( 'Scripts in body:', 'header-and-footer-scripts'); ?></h3>
            <p><?php esc_html_e( 'The following script, if any, will be inserted immediately after the &lt;body&gt; tag using wp_body_open hook.', 'header-and-footer-scripts'); ?></p>
            <textarea style="width:98%;font-family:monospace;" rows="10" cols="57" id="shfs_insert_body" name="shfs_insert_body"><?php echo esc_html( get_option( 'shfs_insert_body' ) ); ?></textarea>

            <p><label for="shfs_insert_body_priority"><?php esc_html_e('Priority', 'header-and-footer-scripts'); ?></label>
            <input type="number" value="<?php echo \esc_html( \get_option( 'shfs_insert_body_priority', 10 ) ); ?>" name="shfs_insert_body_priority" id="shfs_insert_body_priority" style="width:6em;" /> <?php \esc_html_e('Default', 'header-and-footer-scripts'); ?>: 10</p><hr />

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
