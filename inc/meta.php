<?php
/**
 * Plugin meta for single post or page type.
 *
 * @package    Header and Footer Scripts
 * @author     Anand Kumar <anand@anandkumar.net>
 * @copyright  Copyright (c) 2013 - 2025, Anand Kumar
 * @link       https://github.com/anandkumar/header-and-footer-scripts
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */?>
 <div class="shfs_meta_control">

	<p><?php esc_html_e('The script in the following textbox will be inserted to the &lt;head&gt; section', 'header-and-footer-scripts'); ?>.</p>
	<p>
		<textarea name="_inpost_head_script[synth_header_script]" rows="5" style="width:98%;font-family:monospace;"><?php if(!empty($meta['synth_header_script'])) echo $meta['synth_header_script']; ?></textarea>
	</p>
</div>
