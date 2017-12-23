<div class="wrap">
  <h2>Header and Footer Scripts - Options <a class="add-new-h2" target="_blank" href="#">Read Tutorial</a></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'insert-headers-and-footers' ); ?>

            <h3 class="shfs-labels" for="shfs_insert_header">Scripts in header:</h3>
            <textarea style="width:98%;" rows="15" cols="57" id="insert_header" name="shfs_insert_header"><?php echo esc_html( get_option( 'shfs_insert_header' ) ); ?></textarea><br />
          Above script will be inserted into the <code>&lt;head&gt;</code> section.

            <h3 class="shfs-labels footerlabel" for="shfs_insert_footer">Scripts in footer:</h3>
            <textarea style="width:98%;" rows="15" cols="57" id="shfs_insert_footer" name="shfs_insert_footer"><?php echo esc_html( get_option( 'shfs_insert_footer' ) ); ?></textarea><br />
          Above script will be inserted just before <code>&lt;/body&gt;</code> tag using <code>wp_footer</code> hook.

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="Save settings" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(SHFS_PLUGIN_DIR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
