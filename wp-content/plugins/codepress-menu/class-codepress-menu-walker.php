<?php

class Codepress_Menu_Walker extends Walker_Nav_Menu {

    /**
	 * Indents any object as long as it has a unique id and that of its parent.
	 *
     * @since 2.1
	 */
	protected function indent( array $items, $root, $parent, $id ) {
        $indent = array();

		foreach( $items as $k => $item ) {
			if ( $item->$parent == $root ) {
				unset( $items[ $k ] );

                $item->children = $this->indent( $items, $item->$id, $parent, $id );
                $indent[]		= $item;
			}
		}

		return $indent;
	}

    /**
     * Only return a level from a indented list of items.
     *
     * @since 2.0
     */
    protected function level( $items, $level, $reached = 1, $currentBranch = false)  {
        foreach ( $items as $item ) {

            // check for current or ancestor
			if ( $item->current || $item->current_item_ancestor || $currentBranch ) {

                // catch top level
                if ( $level == 1 && $reached == 1 )
                    return array( $item );

                // catch all other levels
                if ( $reached + 1 == $level && ! empty( $item->children ) )
                    return $item->children;

                if ( ! empty( $item->children ) )
                   return $this->level( $item->children, $level, $reached + 1, true );
			}
		}

		return array();
    }

    /**
	 * Unset children exceeding max depth.
	 *
     * @since 1.0
	 */
	protected function depth( $items, $depth, $level = 1 ) {
		foreach( $items as $k => $item ) {
            // unset the children, or go a level deeper
			if ( $depth == $level )
				unset( $items[ $k ]->children );
			elseif ( ! empty( $item->children ) )
				$items[ $k ]->children = $this->depth( $item->children, $depth, $level + 1 );
		}

        return $items;
	}

    /**
	 * Sanitize classes by removing some of them and renaming others.
	 *
     * @since 2.3
	 */
	protected function map_classes( $items ) {
        foreach( $items as $k => $item ) {
			// custom control over an item's classes
			$item->classes = apply_filters( 'codepress_menu_item_classes', $item->classes, $item, $items, $k );

			if ( ! empty( $item->children ) )
                $item->children = $this->map_classes( $item->children );
        }

		return $items;
	}

    /**
     * Walkers have a walk method, makes sense.
     *
     * @since 2.1
     */
    public function walk( $items, $depth ) {
        $func_args = func_get_args();
        $args      = array_pop( $func_args );
        
        $items = $this->indent( $items, 0, $this->db_fields['parent'], $this->db_fields['id'] );

        if ( $args->level )
            $items = $this->level( $items, $args->level );

        $items = $this->depth( $items, $depth );
		$items = $this->map_classes( $items );

		$items = apply_filters( 'codepress_menu_filter', $items );

        return $this->get_menu( $items, $args );
    }

    /**
	 * Get the menu string.
	 *
     * @return string
     * @since 1.0
	 */
    public function get_menu( $items, $args, $level = 1 ) {
        $output = '';

        if ( $level > 1)
            $this->start_lvl( $output, 0, $args );

        foreach( $items as $item ) {
            $this->start_el( $output, $item, 0, $args );

            if ( ! empty( $item->children ) )
                $output .= $this->get_menu( $item->children, $args, $level + 1);

            $this->end_el( $output, $item, 0, $args );
        }

        if ( $level > 1 )
            $this->end_lvl( $output, 0, $args );

        return $output;
    }
}