=== Header and Footer Scripts ===

Contributors: anand_kumar, jamify
Donate link: https://github.com/anandkumar/header-and-footer-scripts
Tags: head, header, footer, scripts, post
Requires at least: 4.6
Tested up to: 6.9
Stable tag: 2.4.1
Requires PHP: 8.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Header and Footer Scripts plugin allows you to add scripts to WordPress site's <head> and just before closing <body> tag.

== Description ==
If you are running a WordPress site then sooner or later you need to insert some kind of code to your website. It is most likley a web analytics code like Google Analytics or may be social media script or some CSS stylesheet or may be Custom fonts. This plugin will do all the magic. Even if you want to insert those codes in a custom post type.

All you have to do is adding appropriate html code.

Don't forget to wrap your code with proper tags.

	<script type="text/javascript">
	YOUR JS CODE HERE
	</script>

Or for CSS:

	<style type="text/css">
	YOUR CSS CODE HERE
	</style>

= Why use this plugin: =
* To insert CSS and JavaScript codes to `<head>` or before `</body>`.
* To insert code to `<head>` of any single page or post.
* To insert code to Custom Post Type [New Feature].

The plugin should be compatible with WooCommerce.

= What it does not offer =
* You can't insert/execute PHP codes.

Almost all WordPress theme do support this "Header and Footer Scripts" plugin. If the codes are not appearing in your site [ask for support] or look at your theme file if they have standard `wp_head` and `wp_footer` hooks.

= Important Links =
For furhter information you are welcomed to follow these links:

* **[Read Documentation][1]**
* **[Get Support][2]**
* **[GitHub Repository][3]**

  [1]: https://github.com/anandkumar/header-and-footer-scripts/wiki
  [2]: https://wordpress.org/support/plugin/header-and-footer-scripts/
  [3]: https://github.com/anandkumar/header-and-footer-scripts

== Installation ==
There is nothing special about installation of this plugin. It is as simple as uploading the plugin files to your plugins directory.

Upload the plugin to `/wp-content/plugins` and activate. OR Search "Header and Footer Scripts" from `WP Dashbard --> Plugins --> Add New` then hit Install and then activate.

Once the plugin is activated you will see "Header and Footer Scripts" menu item under setting of WordPress dashboard. Also a meta box on Post and Page edit page.

== Screenshots ==
1. Access this page from `Dashboard --> Settings --> Header and Footer Scripts`
2. This box will appear below the compose box on posts and pages. If not please refer to [our docs][4] if it's not there.

== Frequently Asked Questions ==

**Q. How could I access support and troubleshoot problem?**

A. I couldn't handle wp.org forums on regular basis. You are suggested to visit [GitHub Wiki](https://github.com/anandkumar/header-and-footer-scripts/wiki) for more updated plugin documentation and troubleshoot your problem.

**Q: Is there any paid version of the plugin available?**

A. Nope, There is none. If you need more feature send us feedback or feature request.

== Changelog ==

= 2.4.1 =
* New Feature: Added "Clean on Uninstall" option to allow users to remove all data upon deletion.
* Fix: Resolved issue where sidebar was not loading on settings page due to deprecated constant.
* Improvement: Enhanced WPCS compliance with comprehensive DocBlocks and formatting fixes.
* Improvement: Added strict sanitization to settings authentication to resolve Plugin Check warnings.

= 2.4.0 =
* Internal: Refactored codebase to "Jamify HFS" naming standards (`jamify_hfs_` prefix) while maintaining full backward compatibility.
* New Feature: Added support for wp_body_open hook to insert scripts immediately after body tag.
* New Feature: Added Syntax Highlighting for script editors in settings page.
* Improvement: Modernized permission system to use 'unfiltered_html' capability.
* Improvement: Added settings to allow Authors and Contributors to add scripts.
* Improvement: Added admin notice for backward compatibility migration.

= 2.3.1 =
* Security: Hardened nonce implementation with static action names.
* Security: Added strict sanitization for access level settings.
* Security: Improved input validation with isset() checks and wp_unslash().
* Security: Replaced __FILE__ menu slug to prevent path exposure.
* Security: Added security warning for privilege delegation.
* New: Added uninstall.php for clean database removal.
* Fix: Added proper ABSPATH checks to all files.
* Improvement: Added phpcs:ignore comments for intentional raw output.

= 2.3.0 =
* Fix: Stored Cross-Site Scripting (XSS) vulnerability.
* New Feature: Add minimum capability required to add scripts to posts.

= 2.2.1 =
* Updated readme.txt.

= 2.2.0 =
* New feature: Now set priority to sitewide script.
* Fix: Monoscript font for text area.
* Improved readme.txt.
* Reverted to PHP v5.6 as many people can't move to latest one.

= 2.1.1 =
* Fixed a bug causing singular post type scripts to appear in archives.
* Compatibility checked upto WordPress 5.2.2
* Now require PHP v7.0 at least.

= 2.1.0 =
* Support to Custom Post Type (CPT).
* Improved ReadMe

= 2.0.1 =
* Uniform Coding style.
* Improved Translatable strings.
* Fixed Links
* Code Cleanup

= 2.0.0 =
* Visual Improvements.
* better directory structure.

= 1.3.4 =
* Fixed variable undefined notice

= 1.3.3 =
* Started using PHP5 style construct

= 1.3.2 =
* Fixed https issue

= 1.1.0 =
* Made for official WordPress Repo.
* Added Single post Header script metabox
* Minor Bug Fixes

= 1.0.0 =
* Initial Public Release

== Upgrade Notice ==
Upgrade for more functionality and bug fixes.
