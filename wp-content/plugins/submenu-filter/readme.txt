=== Subtitle Filter ===
Contributors: marcus.downing
Tags: menu, nav
Requires at least: 3.0.0
Tested up to: 3.1.2
Stable tag: trunk

Adds tha ability to show only a submenu with wp_nav_menu().

== Description ==

When writing or modifying a theme, the function wp_nav_menu() displays the contents of menus configured in your settings. If you have a lot of little menus the list can get hard to manage, so this plugin lets you group several menus under a single menu.

To use it, simply add a `submenu` parameter to the arguments of wp_nav_menu, like so:

    wp_nav_menu(array(
      'menu' => 'header',
      'submenu' => 'About Us'
    ));


== Installation ==

Install this plugin in the normal way:

1. Place it in your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the `wp_nav_menu` function with a `submenu` parameter in your templates

    wp_nav_menu(array(
      'menu' => 'header',
      'submenu' => 'About Us'
    ));

== Frequently Asked Questions ==

= What happens if there's no submenu with the right name? =

It defaults to the main menu, the same as if the plugin wasn't installed.

= How do I select a menu more than one level deep? =

You can go several levels deep by putting slashes in:

    wp_nav_menu(array(
      'menu' => 'header',
      'submenu' => 'About Us/Board of Directors'
    ));

Or if you prefer with an array:

    wp_nav_menu(array(
      'menu' =>
      'submenu' => array('About Us', 'Board of Directors')
    ));

= Can I use a page's slug? =

No, the plugin uses the page's title, not its slug.

= Do I have to type the title exactly the same? =

The plugin should be forgiving of small differences in punctuation, capital letters and so on as long as all the letters are the same.

