;( function( $ ) {
	
	"use strict";
	var CHEF = window.CHEF || {};
	
	/* ---------- INIT MAIN NAVIG ---------- */
	CHEF.initMainMenu = function() {
		$( '#drop-down-left' ).dropdown_menu( {
			open_delay : 50,
			close_delay : 100
		} );
		// handle main menu items tagline
		if( $( '#drop-down-left' ).length ) {
			jQuery( '#drop-down-left > li > a' ).each( function() {
				var title_tag = jQuery( this ).attr( 'title' );
				if( title_tag != '' && title_tag != 'undefined' ) {
					var label = jQuery( this ).text();
					var tag = '<span class="k-item-desc">' + title_tag + '</span>';
					jQuery( this ).html( label + tag );
				}
			} );
		}
	}
	/* ---------- end INIT MAIN NAVIG --------- */
	
	/* ---------- handle navigation for smaller devices */
	CHEF.mobileMenuClone = '';
	if( $( 'nav#k-menu' ).length ) CHEF.mobileMenuClone = $( 'nav#k-menu' ).clone().attr( 'id', 'navigation-mobile' );
	CHEF.mobileNav = function() {
		CHEF.mobileMenuClone.insertAfter( 'nav#k-menu' );
		if( $( 'nav#navigation-mobile' ).length ) {
			$( 'nav#navigation-mobile' ).removeClass( 'k-main-navig' );
			$( 'nav#navigation-mobile > ul' ).removeAttr( 'id' ).removeClass( 'k-dropdown-menu' ).addClass( 'list-unstyled' );
		}
	}
	CHEF.listenerMenu = function() {
		$( '#mobile-nav-switch' ).on( 'click', function(e) {
			$( this ).toggleClass( 'open' );
			$( 'nav#navigation-mobile' ).stop().slideToggle( 'fast' );
			e.preventDefault();
		} );
	}
	/* ---------- end handle navigation for smaller devices */
	
	/* ---------- handle top-search toggle ---------- */
	CHEF.topSearchToggle = function() {
		$( '#bt-toggle-search' ).on( 'click', function(e) {
			$( this ).toggleClass( 'opened' );
			$( '#top-searchform' ).stop().slideToggle( 150, '', function() { $( '#sitesearch' ).focus(); } );
			e.preventDefault();
		} );
	}
	CHEF.chckNavigOpened = function() {
		var is_small_res = ( $( '.visible-xs' ).css( 'display' ) === 'block' ) ? true : false;
		var is_mobile_nav_visible = ( $( 'nav#navigation-mobile' ).css( 'display' ) === 'block' ) ? true : false;
		if( !is_small_res && is_mobile_nav_visible ) {
			$( 'nav#navigation-mobile' ).css( 'display', 'none' );
		}
	}
	/* ---------- end handle top-search toggle ---------- */

	/* ---------- Fancybox ---------- */
	CHEF.fancyBoxer = function() {
		if( $( '.fancybox' ).length || $( '.fancybox-media' ).length ) {
			
			$( '.fancybox' ).fancybox( {				
				padding : 0,
				helpers : {
					title : { type: 'inside' }
				}
			} );
				
			$( '.fancybox-media' ).fancybox( {
				padding : 0,
				openEffect  : 'none',
				closeEffect : 'none',
				helpers : {
					media : {}
				}
			} );

		}
	}
	/* ---------- end Fancybox ---------- */

	/* ---------- IE patches ---------- */
	CHEF.IEpatches = function() {
		if( navigator.userAgent.match( /IEMobile\/10\.0/ ) ) {
			var msViewportStyle = document.createElement( 'style' );
			msViewportStyle.appendChild( document.createTextNode( '@-ms-viewport{ width: auto!important; }' ) );
			document.querySelector( 'head' ).appendChild( msViewportStyle );
		}
	}
	/* ---------- end IE patches ---------- */

	
	// events
	$( document ).ready( function() {
		CHEF.initMainMenu(); // init main menu
		CHEF.mobileNav(); // create mobile nav menu
		CHEF.listenerMenu(); // toggle mobile nav
		CHEF.IEpatches(); // set of patches relating to IE
		CHEF.topSearchToggle(); // toggle top-search
		CHEF.fancyBoxer(); // fancybox
	} );
	
	$( window ).resize( function() {
		CHEF.chckNavigOpened(); // check if mobile nav is opened while the screen res is sufficient
	} );
	
} )( jQuery );