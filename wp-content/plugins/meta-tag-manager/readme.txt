=== Meta Tag Manager ===
Contributors: netweblogic
Tags: google, SEO, yahoo, tags, webmaster tools, meta, meta tags, ogp, open graph, twitter cards
Text Domain: meta-tag-manager
Requires at least: 3.6
Tested up to: 4.7.2
Stable tag: 2.1

Easily add and manage custom meta tags to various parts of your site or on individual posts, such as Yahoo and Google verification tags.

== Description ==

<blockquote>Meta Tag Manager 2.0 is a complete rewrite with many improvments on the first versions. Whilst there are many improvements, this first rewrite isn't a great departure from the original plugin, although it adds some fundemental improvements. 

We have plenty of ideas of what to add to the plugin, we'd love to hear your suggestions too, please let us know on our <a href="https://wordpress.org/support/plugin/meta-tag-manager">support forums</a>.</blockquote>

Meta Tags Manager is a simple, lightweight plugin which allows you to add custom meta tags to your site. Features include:

* Supports meta tags including the name, property, http-equiv, charset and itemprop attributes.
* Add meta tags to specific posts, choose what Custom Post Types to support from our settings page.
* Add global meta tags that will display on specific CPTs, Taxonomies, your front page or your whole site.

Use cases include:

* Adding Google and Yahoo site verification tags
* Adding additional open graph, twitter card or other social media meta info not supported by other SEO/Meta plugins

== Installation ==

1. Upload the entire `meta-tag-manager` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to *Settings > Meta Tag Manager*
1. Start adding Meta Tags! See the FAQ for 

== Frequently Asked Questions ==

= OK, I've installed the plugin, how and where do I start adding meta tags? =

You can manage your meta tags in two areas of your WordPress dashboard.

* Within Settings > Meta Tag Manager.

*The general settings page is where you can add tags that appear on various areas of your site, such as your front page, archive pages, category/taxonomy pages, etc. Each tag you create can be assigned to a specific are of the site.*

* On specific post type pages.

*When editing a post, page, or other CPT (such as an event, product, etc.) you can add meta tags that will only be displayed on that item's page. The Meta Tag Manager will be available as an individual meta box.*

= I don't see the Meta Tag Manager meta box when editing a page on my site =

This may be because your editing a CPT and it's not selected within our settings page for Meta Tag Management. See next question for more information.

= How do I enable/disable Meta Tag Manager for specific Custom Post Types (CPTs)? =

By default (since 2.1) all custom post types are enabled, previous versions only had posts/pages enabled. If you install a plugin that introduces a new CPT, that also needs to be added, as it is not added automatically.

You can add or remove this via Settings > Meta Tag Manager > General Options (tab). You'll see an input box containing a list of already enabled CPTs and you can click the input box to show and select other available CPTs to include, or click the X next to the CPT you wish to remove.

= I'm stuck, or have a suggestion. =

Please visit our <a href="https://wordpress.org/support/plugin/meta-tag-manager">support forums</a> if you have any questions.

== Screenshots ==

1. Once the plugin is activated you can add/edit/delete tags from the menu in *Settings > Meta Tag Manager*

2. You can also choose what post types to manage specific meta tags

3. If enabled you can add meta tags to a specific post in it's own meta box

== Changelog ==
= 2.1 =
* removed freemius insights
* changed default instllation to include all CPTs
* fixed PHP warning when mtm_data is missing during initial installation
* changed sanitization of content attribute when http-equiv="Link", allowing for prefetch rules

= 2.0.2 =
* fixed front page meta tags not showing if using a static front page

= 2.0.1 =
* updated freemius SDK to prevent PHP notices

= 2.0 =
* complete rewrite of plugin using up-to-date WP best practices
* improved interface for adding meta tags including support for creating tags using either the property, charset, http-equiv or itemprop attributes
* added ability to add individual meta tags to specific individual CPTs which can be chosen in settings page

= 1.2 =
* fixed stripslashes bug
* added languages

= 1.1 =
* Added danish translation
* Fixed added slashes for apostrophe values

= 1.0 =
* code styling: code now wrapped in classes
* bug fixed: magic quotes
* bug fixed: character escaping using wp_specialchars on the site and htmlspecialchars on the admin page
* separated the code into two .php files
  * meta-tag-manager.php the main plugin file, always loaded, contains minimal code to reduce loading time
  * meta-tag-manager-admin.php contains the admin backend parts of the plugin and is only loaded in the backend
* i18n
* l10n for: de_DE (language file by [Martin Lormes](http://ten-fingers-and-a-brain.com))
* meta tags can be flagged to appear on the homepage only
* fixed bug which threw a Notice error when no meta tags were defined
* fixed the bug where the rss feeds kept breaking

