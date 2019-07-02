<?php
/**
 * Plugin Options page
 *
 * @package    Header and Footer Scripts
 * @author     Anand Kumar <anand@anandkumar.net>
 * @copyright  Copyright (c) 2013 - 2019, Anand Kumar
 * @link       http://digitalliberation.org/plugins/header-and-footer-scripts
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */?>
<div class="wrap">
  <h2><?php _e( 'Header and Footer Scripts - Options', 'header-and-footer-scripts'); ?> <a class="add-new-h2" target="_blank" href="<?php echo esc_url( "http://digitalliberation.org/docs/header-and-footer-scripts/?utm_source=wpdash_hfs" ); ?>"><?php _e( 'Read Tutorial', 'header-and-footer-scripts'); ?></a></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'header-and-footer-scripts' ); ?>

            <h3 class="shfs-labels" for="shfs_insert_header"><?php _e( 'Scripts in header:', 'header-and-footer-scripts'); ?></h3>
            <textarea style="width:98%;" rows="10" cols="57" id="insert_header" name="shfs_insert_header"><?php echo esc_html( get_option( 'shfs_insert_header' ) ); ?></textarea>
            <p><?php _e( 'Above script will be inserted into the <code>&lt;head&gt;</code> section.', 'header-and-footer-scripts'); ?></p><hr />

            <h3 class="shfs-labels footerlabel" for="shfs_insert_footer"><?php _e( 'Scripts in footer:', 'header-and-footer-scripts'); ?></h3>
            <textarea style="width:98%;" rows="10" cols="57" id="shfs_insert_footer" name="shfs_insert_footer"><?php echo esc_html( get_option( 'shfs_insert_footer' ) ); ?></textarea>
            <p><?php _e( 'Above script will be inserted just before <code>&lt;/body&gt;</code> tag using <code>wp_footer</code> hook.', 'header-and-footer-scripts'); ?></p>

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php _e( 'Save settings', 'header-and-footer-scripts'); ?>" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(SHFS_PLUGIN_DIR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
