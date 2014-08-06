=== Codepress Menu ===
Contributors: davidmosterd,tschutter
Tags: wordpress, menu, submenu, walker, navigation, nav, php, code, wp_nav_menu
Requires at least: 3.1
Tested up to: 3.6
Stable tag: 2.3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to display a sub-menu, it's depth from there on and gives you control over the menu-item classes.

== Description ==

Uses the native [wp_nav_menu()](http://codex.wordpress.org/Function_Reference/wp_nav_menu). Add parameters to the wp_nav_menu() to enable functionality.
Also, ships with one-click delete menu-items in the WordPress admin. Turned off or on using the screen-options. Sweet.

**Examples**

This will get the first sub-menu from the active branch and 2 levels beyond (menu + sub-menu + sub-menu):
`
wp_nav_menu( array(
    'level' => 2,
    'depth' => 3
));
`

Show the current branch only:
`
wp_nav_menu( array(
    'level' => 1
));
`

Aimed on simple use in various use cases:
`
// display first level in the header
wp_nav_menu( array(
    'depth' => 1
));

// display first sub-menu from the current branch somewhere else
wp_nav_menu( array(
    'depth' => 2,
    'level' => 2
));
`

Another feature is it's control over the css classes that are given to a menu-item. You might be faced with css selectors
which you cannot change. The 'codepress_menu_filter_classes' filter can be used in your functions.php to set the class property:

`
/**
 * Change the classes of a menu item
 *
 * @param array $classes List current classes
 * @param object $item Current menu item
 * @param array $items Current list of items (per level)
 * @param integer $k Key of the current item in $items
 */
function codepress_menu_item_classes( $classes, $item, $items, $k ) {
	// mark the first item
	if ( reset( $items ) == $items[ $k ] )
		$classes[] = 'first';

	// mark the last item
	if ( end( $items ) == $items[ $k ] )
		$classes[] = 'last';

	// map the WordPress default 'current-menu-item' class to 'active'
	if ( in_array( 'current-menu-item', $classes ) )
		$classes[] = 'active';

	return $classes;
}
add_filter( 'codepress_menu_item_classes', 'codepress_menu_item_classes', 10, 4 );
`

**Simple Menu Delete**

It ships with one-click delete menu-items within WordPress. 
This functionality was integrated from our Simple Menu Delete plugin and enhanced a bit:

* Turned off or on using the screen-options.
* Display is more in line with WordPress's way of delete-links.
* Works exactly the same now as the nested delete-link which is a click further inside the menu item.


== Frequently Asked Questions ==

= Something is broken? Have an idea? =

Great! Tell us, we'd love to help out.


== Upgrade Notice ==

= 2.3 =
We have decided that current way of changing of classes is not in line with how WordPress works. We still offer the possibility to influence the
classes, but the focus is on using giving you the tools to do what you want with the 'codepress_menu_item_classes' filter.

= 2.2 =
We have kept it backwards compatible as much as possible, but there might have been a few sacrifices here and there. They should be minor though.

= 2.1 =
The changes from 2.0 to 2.1 are significant as it abandons the use of a custom function. A good step forward, but check the examples before you upgrade.


== Installation ==

Search for `codepress menu` as described in the [Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

or

1. Upload codepress-menu to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

Now you can use wp_nav_menu() with enhanced super-powers ;)


== Changelog ==

= 2.3.2 =

* Fixed a strict standards warning when calling walk()

= 2.3.1 =

* Fixed a bug where adding menu items would not show the remove link

= 2.3 =

* A more WordPress-like implementation of the menu-item class control.
* Added a one-click delete for menu-items in wp-admin (can be turned off or on via screen options).
* Minor code cleanup, adhering WordPress standards... even more!

= 2.2.2 =

* get_nav_menu_locations() in WordPress < 3.6 can return false, will now check if it is an array and not break the foreach loop.
* Minor code cleanup, adhering WordPress standards.

= 2.2.1 =

* Now checks if a given theme_location exists and is set or will just return the $args and let WordPress handle the parsing.
* Unsets an item once it has a match in the indent function, better performance.
* Removed the extraction from the indent function, slightly better performance.
* Minor code cleanup, adhering WordPress standards.

= 2.2 =

* Bugfix: level set higher then 2 sometimes gave incorrect results.
* Recoded it to match the WordPress coding standards (hope we managed to do this).
* The items no longer have a separate class. It was not needed after all and this is more of a WordPress approach.
* Added a filter (codepress_ignore_theme_locations) to tell the plugin not to apply on certain theme locations.
* Removed some hooks that could only cause unwanted behavior and mostly targeted the separate item class (codepress_menu_return_false_on_empty_list_after_filters, codepress_menu_filter_classes, codepress_menu_items, codepress_menu_set_walker, codepress_menu_item_sanitize_classes).
* Allowed the item-id. We see no harm in it after all. (codepress_menu_item_sanitize_id)

= 2.1.2 =

* Now checks if the filters have not reduced the amount of items to zero. If so, act as wp_nav_menu and return false.
* When a theme location is used in conjunction with the plugin, it now returns an empty string.

= 2.1.1 =

* 'sanitize' option is replaced by 'classes' and now defaults to doing nothing. Choosing 'simple' as option will result in what the default sanitize did in the 2.0 version.

= 2.1 =

* Now hooks into the native wp_nav_menu() and abandons the use of a custom function.
* Extends the Walker_Nav_Menu class and most of it's filters and functions are used to keep as close to the WordPress core as possible.
* You can no longer fetch an array of items and apply filters on it as you see fit. This functionality may return, but the focus of this version was on integration with wp_nav_menu().

= 2.0 =

* Initial public release.