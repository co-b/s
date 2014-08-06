<?php
/*
Plugin Name: Submenu Filter
Plugin URI: http://www.bang-on.net
Description: Adds the ability to show only a submenu by adding a 'submenu' argument to wp_nav_menu().
Version: 1.2
Author: Marcus Downing
Aurhor URI: http://www.bang-on.net
License: GPL2
*/

/*  Copyright 2011  Marcus Downing  (email : marcus@bang-on.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('wp_nav_menu_objects', 'nav_submenu_objects_filter', 10, 2);
function nav_submenu_objects_filter ($items, $args) {
  // $loc should be an array of items. if it's empty, move along
  $loc = $args->submenu;
  if (!isset($loc) || empty($loc))
    return $items;
  if (is_string($loc))
    $loc = split("/", $loc);
  if (empty($loc))
    return $items;

  // prepare a slug for every item
  foreach ($items as $item) {
    if (empty($item->slug))
      $item->slug = sanitize_title_with_dashes($item->title);
  }

  //  find the selected parent item ID(s)
  $cursor = 0;
  foreach ($loc as $slug) {
    $slug = sanitize_title_with_dashes($slug);
    foreach ($items as $item) {
      if ($cursor == $item->menu_item_parent && $slug == $item->slug) {
        $cursor = $item->ID;
        continue 2;
      }
    }
    return array();
  }

  //  walk finding items until all levels are exhausted
  $parents = array($cursor);
  $out = array();
  while (!empty($parents)) {
    $newparents = array();

    foreach ($items as $item) {
      if (in_array($item->menu_item_parent, $parents)) {
        if ($item->menu_item_parent == $cursor)
          $item->menu_item_parent = 0;
        $out[] = $item;
        $newparents[] = $item->ID;
      }
    }

    $parents = $newparents;
  }

  return $out;
}
