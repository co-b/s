jQuery(document).ready(function() {
	codepress_menu_delete_menu_item();
	codepress_menu_advanced_menu_properties();
    codepress_menu_ajax_add_menu_item();
});

/**
 * Setup advnaced menu properties
 *
 */
function codepress_menu_advanced_menu_properties() {
	jQuery('#codepress-menu-simple-delete-hide').click( function() {
		codepress_menu_toggle_delete_menu_item();
	});

	codepress_menu_toggle_delete_menu_item();
}

/**
 * Toggle codepress_menu_delete_menu_item
 *
 */
function codepress_menu_toggle_delete_menu_item() {
	jQuery('.codepress-menu-link').toggleClass( 'hide', ! jQuery('#codepress-menu-simple-delete-hide:checked').length );
}

/**
 * Add menu-item dele link
 *
 */
function codepress_menu_delete_menu_item() {
	jQuery('#menu-to-edit li.menu-item').each( function() {
        var controls = jQuery(this).find('.item-controls');
        
        if( ! controls.find('.item-delete').length ) {          
            var delete_link	 = jQuery(this).find('a.item-delete').clone(true);

            delete_link.attr('id', delete_link.attr('id') + '-codepress-menu');
            delete_link.addClass('codepress-menu-link hide');

            controls.addClass( 'submitbox' );
            controls.prepend( delete_link );
        }
	});
}

/**
 * Add delete button when adding menu items
 *
 */
function codepress_menu_ajax_add_menu_item() {
	jQuery(document).ajaxComplete(function(e, xhr, settings) {	        
		if ( ( xhr.statusText == 'success' || xhr.statusText == 'OK' ) && settings.data.indexOf('action=add-menu-item') >= 0 ) {
            codepress_menu_delete_menu_item();
            codepress_menu_toggle_delete_menu_item();
		}		
	});
}