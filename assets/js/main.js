document.addEventListener( 'DOMContentLoaded', function () {
	// Toggle menu mobile
	var toggle = document.querySelector( '.menu-toggle' );
	var nav = document.querySelector( '.main-nav' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			var isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );
	}

	// Dropdown submenu trên mobile (click để mở/đóng)
	document.querySelectorAll( '.main-nav__list li.menu-item-has-children > a' ).forEach( function ( link ) {
		link.addEventListener( 'click', function ( e ) {
			if ( window.innerWidth > 640 ) {
				return;
			}
			e.preventDefault();
			var parent = link.parentElement;
			parent.classList.toggle( 'is-open' );
			var submenu = parent.querySelector( '.sub-menu' );
			if ( submenu ) {
				submenu.style.display = parent.classList.contains( 'is-open' ) ? 'block' : 'none';
			}
		} );
	} );

	// Tabs sản phẩm nổi bật (Bán chạy / Khóa đồng)
	var tabButtons = document.querySelectorAll( '.products-tabs__btn' );
	var tabPanels = document.querySelectorAll( '.products-tabs__panel' );

	tabButtons.forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var target = btn.getAttribute( 'data-tab' );

			tabButtons.forEach( function ( b ) {
				b.classList.toggle( 'is-active', b === btn );
			} );

			tabPanels.forEach( function ( panel ) {
				panel.classList.toggle( 'is-active', panel.getAttribute( 'data-tab' ) === target );
			} );
		} );
	} );

	// Trang sản phẩm: click thumbnail để đổi ảnh chính
	var mainImage = document.getElementById( 'product-main-image' );
	document.querySelectorAll( '.product-page__thumb' ).forEach( function ( thumb ) {
		thumb.addEventListener( 'click', function () {
			var newSrc = thumb.getAttribute( 'data-image' );
			if ( mainImage && newSrc ) {
				mainImage.src = newSrc;
			}
		} );
	} );
} );
