/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}
	
	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {

		menu.classList.toggle( 'nimblepress-mobile-menu-toggled' );
		siteNavigation.classList.toggle( 'nimblepress-site-navigation-toggled-on-mobile' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			
			
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );
	
	
	
	const nimblepress_arrow_icons = document.querySelectorAll('.nimblepress-arrow-icon');
	const nimblepress_parent_sub_menus = document.querySelectorAll('.nimblepress-menu-top-level');
	const nimblepress_sub_menus = document.querySelectorAll('.sub-menu');
	
	nimblepress_arrow_icons.forEach(el => el.addEventListener('click', event => {
		
		event.preventDefault();
		const nimblepress_this_submenu = event.target.closest('.nimblepress-menu-top-level');
		let selected_li = event.target.closest('li');
		let this_menu = event.target.closest('ul');

		let sub_menu = selected_li.querySelectorAll('.sub-menu')[0];

		nimblepress_parent_sub_menus.forEach(node => {

			if ( node != nimblepress_this_submenu ) {
				
				const nimblepress_child_sub_menus = node.querySelectorAll('.sub-menu');
				
				nimblepress_child_sub_menus.forEach(node => {

					node.classList.remove('nimblepress-submenu-toggled');
					
					let this_menu_sub_menu_icons = node.querySelectorAll('.nimblepress-arrow-icon');
					
						if ( node.classList.contains('menu-item-has-children') ) {
						
							this_menu_sub_menu_icons.forEach(node => {
								node.innerHTML='<svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="m5 6l5 5l5-5l2 1l-7 7l-7-7z"/></svg>';
							});
						
						}
					
				 });
				
				node.classList.remove('nimblepress-submenu-toggled');
			}
			
		  });
		
		if ( sub_menu ) {
			let already_toggled = sub_menu.classList.contains( 'nimblepress-submenu-toggled' );
			
			if ( already_toggled ) {
				sub_menu.classList.remove( 'nimblepress-submenu-toggled' );
			}
			else {
				sub_menu.classList.add( 'nimblepress-submenu-toggled' );
			}
		}
		
	}));


	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( !isClickInside ) {
				

			if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
				button.setAttribute( 'aria-expanded', 'false' );
			} else {
				button.setAttribute( 'aria-expanded', 'true' );
			}
			nimblepress_sub_menus.forEach(node => {

				node.classList.remove('nimblepress-submenu-toggled');
			
			});
			
			menu.classList.remove( 'nimblepress-mobile-menu-toggled' );
			siteNavigation.classList.remove( 'nimblepress-submenu-toggled' );
			siteNavigation.classList.remove( 'toggled' );
	
			button.setAttribute( 'aria-expanded', 'false' );
		}

		
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );