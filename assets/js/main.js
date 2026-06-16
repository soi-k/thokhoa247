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

	// Reveal on scroll (IntersectionObserver)
	var revealEls = document.querySelectorAll(
		'.service-card, .services-grid__item, .area-card, .product-card, .blog-card, .testimonial-card, .about__reason, .section-title'
	);
	revealEls.forEach( function ( el ) { el.classList.add( 'reveal' ); } );

	if ( 'IntersectionObserver' in window ) {
		var observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.1 } );
		revealEls.forEach( function ( el ) { observer.observe( el ); } );
	} else {
		revealEls.forEach( function ( el ) { el.classList.add( 'is-visible' ); } );
	}

	// Gallery sliders
	document.querySelectorAll( '[data-gallery-slider]' ).forEach( function ( slider ) {
		var slides = slider.querySelectorAll( '.gallery-slider__slide' );
		var thumbs = slider.querySelectorAll( '[data-gallery-thumb]' );
		var dots   = slider.querySelectorAll( '[data-gallery-dot]' );

		var goTo = function ( idx ) {
			slides.forEach( function ( s, i ) { s.classList.toggle( 'is-active', i === idx ); } );
			thumbs.forEach( function ( t, i ) { t.classList.toggle( 'is-active', i === idx ); } );
			dots.forEach( function ( d, i )   { d.classList.toggle( 'is-active', i === idx ); } );
		};

		thumbs.forEach( function ( t ) {
			t.addEventListener( 'click', function () {
				goTo( parseInt( t.getAttribute( 'data-gallery-thumb' ), 10 ) );
			} );
		} );

		dots.forEach( function ( d ) {
			d.addEventListener( 'click', function () {
				goTo( parseInt( d.getAttribute( 'data-gallery-dot' ), 10 ) );
			} );
		} );
	} );

	// Testimonials slider
	var testiSlider = document.querySelector( '[data-testi-slider]' );
	if ( testiSlider ) {
		var testiSlides = testiSlider.querySelectorAll( '.testimonials-slider__slide' );
		var testiDots   = document.querySelectorAll( '[data-testi-dot]' );
		var testiCur    = 0;
		var testiTimer  = null;

		var testiGo = function ( idx ) {
			if ( idx < 0 ) idx = testiSlides.length - 1;
			if ( idx >= testiSlides.length ) idx = 0;
			testiSlides.forEach( function ( s, i ) { s.classList.toggle( 'is-active', i === idx ); } );
			testiDots.forEach( function ( d, i )   { d.classList.toggle( 'is-active', i === idx ); } );
			testiCur = idx;
		};

		testiDots.forEach( function ( d ) {
			d.addEventListener( 'click', function () {
				clearInterval( testiTimer );
				testiGo( parseInt( d.getAttribute( 'data-testi-dot' ), 10 ) );
				testiTimer = setInterval( function () { testiGo( testiCur + 1 ); }, 5000 );
			} );
		} );

		if ( testiSlides.length > 1 ) {
			testiTimer = setInterval( function () { testiGo( testiCur + 1 ); }, 5000 );
		}
	}

	// Header shadow on scroll
	var siteHeader = document.querySelector( '.site-header' );
	if ( siteHeader ) {
		window.addEventListener( 'scroll', function () {
			siteHeader.classList.toggle( 'scrolled', window.scrollY > 40 );
		}, { passive: true } );
	}
} );
