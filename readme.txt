=== Header and Footer Scripts ===

Contributors: digitalliberation, anand_kumar
Donate link: https://www.digitalliberation.org/contribute/?utm_source=wphfs_donate_link
Tags: head, header, footer, scripts, post, admin
Requires at least: 4.0
Tested up to: 5.4
Stable tag: 2.2.1
Requires PHP: 5.6
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
* **[Contribute][4]**
* **[Digital Liberation - Blog][5]**

  [1]: https://www.digitalliberation.org/docs/header-and-footer-scripts/?utm_source=wporg&utm_medium=wppluginpage&utm_campaign=wp_hfs
  [2]: https://forums.digitalliberation.org/?utm_source=wporg&utm_medium=wppluginpage&utm_campaign=wp_hfs
  [3]: https://github.com/anandkumar/header-and-footer-scripts
  [4]: https://www.digitalliberation.org/contribute/?utm_source=wporg&utm_medium=donation_link&utm_campaign=wp_hfs
  [5]: https://www.digitalliberation.org/blog/?utm_source=wporg&utm_medium=wppluginpage&utm_campaign=wp_hfs

== Installation ==
There is nothing special about installation of this plugin. It is as simple as uploading the plugin files to your plugins directory.

Upload the plugin to `/wp-content/plugins` and activate. OR Search "Header and Footer Scripts" from `WP Dashbard --> Plugins --> Add New` then hit Install and then activate.

Once the plugin is activated you will see "Header and Footer Scripts" menu item under setting of WordPress dashboard. Also a meta box on Post and Page edit page.

== Screenshots ==
1. Access this page from `Dashboard --> Settings --> Header and Footer Scripts`
2. This box will appear below the compose box on posts and pages. If not please refer to [our docs][4] if it's not there.

== Frequently Asked Questions ==

**Q. How could I access support and troubleshoot problem?**

A. I couldn't handle wp.org forums on regular basis. You are suggested to visit [Digital Liberation](https://forum.digitalliberation.org/) for more updated plugin documentation and troubleshoot your problem.

**Q: Is there any paid version of the plugin available?**

A. Nope, There is none. If you need more feature send us feedback or feature request.

== Changelog ==

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
