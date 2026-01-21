<?php
/**
 * Plugin meta for single post or page type.
 *
 * @package    Header and Footer Scripts
 * @author     Anand Kumar <anand@anandkumar.net>
 * @copyright  Copyright (c) 2013 - 2026, Anand Kumar
 * @link       https://github.com/anandkumar/header-and-footer-scripts
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */

if (! defined('ABSPATH') ) {
    exit;
}?>
 <div class="jamify_hfs_meta_control">

	<p><?php esc_html_e('The script in the following textbox will be inserted to the &lt;head&gt; section', 'header-and-footer-scripts'); ?>.</p>
	<p>
		<textarea id="jamify_hfs_inpost_head_script" name="_inpost_head_script[synth_header_script]" rows="5" style="width:98%;font-family:monospace;"><?php if(!empty($meta['synth_header_script'])) echo esc_textarea( $meta['synth_header_script'] ); ?></textarea>
	</p>
</div>
