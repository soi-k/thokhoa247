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

	// Toggle ô tìm kiếm trên header
	var searchToggle = document.querySelector( '[data-search-toggle]' );
	var searchForm = document.querySelector( '[data-search-form]' );

	if ( searchToggle && searchForm ) {
		searchToggle.addEventListener( 'click', function () {
			var isOpen = searchForm.classList.toggle( 'is-open' );
			if ( isOpen ) {
				var input = searchForm.querySelector( 'input[type="search"]' );
				if ( input ) {
					input.focus();
				}
			}
		} );
	}

	// Hero slider
	var heroSlider = document.querySelector( '[data-hero-slider]' );

	if ( heroSlider ) {
		var slides = heroSlider.querySelectorAll( '.hero-slide' );
		var dots = heroSlider.querySelectorAll( '[data-hero-dot]' );
		var prevBtn = heroSlider.querySelector( '[data-hero-prev]' );
		var nextBtn = heroSlider.querySelector( '[data-hero-next]' );
		var current = 0;
		var timer = null;

		var goToSlide = function ( index ) {
			if ( index < 0 ) {
				index = slides.length - 1;
			} else if ( index >= slides.length ) {
				index = 0;
			}

			slides.forEach( function ( slide, i ) {
				slide.classList.toggle( 'is-active', i === index );
			} );

			dots.forEach( function ( dot, i ) {
				dot.classList.toggle( 'is-active', i === index );
			} );

			current = index;
		};

		var startAutoplay = function () {
			if ( slides.length > 1 ) {
				timer = setInterval( function () {
					goToSlide( current + 1 );
				}, 6000 );
			}
		};

		var stopAutoplay = function () {
			if ( timer ) {
				clearInterval( timer );
				timer = null;
			}
		};

		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', function () {
				stopAutoplay();
				goToSlide( current - 1 );
				startAutoplay();
			} );
		}

		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', function () {
				stopAutoplay();
				goToSlide( current + 1 );
				startAutoplay();
			} );
		}

		dots.forEach( function ( dot ) {
			dot.addEventListener( 'click', function () {
				stopAutoplay();
				goToSlide( parseInt( dot.getAttribute( 'data-hero-dot' ), 10 ) );
				startAutoplay();
			} );
		} );

		startAutoplay();
	}

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
