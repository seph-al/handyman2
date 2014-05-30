/* global google, CarpressJS, _ */

jQuery(document).ready(function($) {
	'use strict';

	var realScreenWidth =  function() {
		return ( window.innerWidth > 0 ) ? window.innerWidth : screen.width;
	};

	//  ==========
	//  = Smooth scroll to the top of the page =
	//  ==========
	$('#to-the-top').click(function(e) {
		e.preventDefault();
		$('html, body').animate({ 'scrollTop' : 0 }, 1200);
	});


	//  ==========
	//  = Collapse / accordion =
	//  ==========

	$('.accordion-heading a').click(function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('open').parent().find('.accordion-body').slideToggle();
	});


	//  ==========
	//  = jQuery UI datepicker =
	//  ==========
	/**
	 * For time format see: http://trentrichardson.com/examples/timepicker/
	 */
	$('.add-datepicker').datetimepicker({
		stepMinute: 5,
		hourMin: 6,
		hourMax: 21,
		dateFormat: CarpressJS.datetimepicker_date_format,
		//timeFormat: '',
	});

	$('.add-datepicker-icon').click(function(ev) {
		ev.preventDefault();
		$('.add-datepicker').focus();
	});

	//  ==========
	//  = Custom Google Maps =
	//  ==========
	(function () {
		if ( $('#gmaps-wide-container').length > 0 ) {
			var createLatLng = function (argument) {
				var latLng = argument.split(',');

				for ( var i = 0; i < 2; i++ ) {
					latLng[i] = parseFloat( latLng[i] );
				}

				return new google.maps.LatLng( latLng[0],latLng[1] );
			};

			var gmapsCenter = createLatLng( CarpressJS.latLng );

			var mapOptions = {
				zoom:        parseInt( CarpressJS.zoomLevel, 10 ),
				scrollwheel: false,
				center:      gmapsCenter,
				mapTypeId:   eval( 'google.maps.MapTypeId.' + CarpressJS.mapType ),
				styles:      eval( CarpressJS.mapStyle )
			};

			var map = new google.maps.Map(document.getElementById('gmaps-wide-container'), mapOptions);

			var Infowindow = function(contentString) {
				this.marker = null;
				this.cont = new google.maps.InfoWindow({
					content: contentString
				});
				return this;
			};

			Infowindow.prototype.setMarker = function( marker ) {
				this.marker = marker;

				google.maps.event.addListener(this.marker, 'click', $.proxy(function() {
					this.cont.open(map,this.marker);
				}, this ) );

				return this;
			};


			_.forEach( CarpressJS.gmapsLocations, function ( val ) {
				var image = '';
				if( val.image.length > 0 ) {
					image = '<img class="gmaps-window__img" src="' + val.image + '" />';
				}

				var contentString = '<div class="gmaps-window">'+
					'<h3 class="gmaps-window__title">' + val.title + '</h3>'+
					'<div class="gmaps-window__body">'+
					image +
					val.description +
					'</div>';

				new Infowindow(contentString).setMarker(new google.maps.Marker({
					position: createLatLng( val.link ),
					map:      map,
					title:    val.title
				}));
			} );
		}
	})();

	//  ==========
	//  = Navbar stays at the top when scrolled down =
	//  ==========
	(function() {
		var attachedNavbar = function () {
			if( realScreenWidth() > 979 ) {
				if( $('.js--navbar').length > 0 ) {
					$(window).on('scroll.onlyDesktop', _.throttle(function() {
						var topOffset = $('.js--navbar').hasClass( 'more-down' ) ? 70 : 30;
						$('.js--navbar').toggleClass( 'attached', $(window).scrollTop() > topOffset );
					}, 17 ));
				}
			} else {
				$(window).off('scroll.onlyDesktop');
				$('.js--navbar').removeClass( 'attached' );
			}
		};
		attachedNavbar();

		$(window).on( 'resize', _.debounce( function() {
			attachedNavbar();
		}, 300 ) );
	})();


	( function () {
		var sliderWidthHeight = function ( width, height ) {
			var imgRatio = 3.243243243;

			var plannedWidth = parseInt( height * imgRatio ),
				plannedHeight = height;

			if ( plannedWidth < width ) {
				plannedWidth  = width;
				plannedHeight = parseInt( width / imgRatio );
			}

			return [ plannedWidth, plannedHeight ];
		};

		var centerSlider = function () {
			var headerHeight = $( '.js-jumbotron-slider' ).outerHeight(),
				headerWidth = $( '.js-jumbotron-slider' ).outerWidth();

			var sliderDimensions = sliderWidthHeight( headerWidth, headerHeight );

			$('#headerCarousel')
				.show()
				.height( sliderDimensions[1] )
				.width( sliderDimensions[0] )
				.css('margin-left', parseInt( -0.5*( $('#headerCarousel').outerWidth()-$('body').outerWidth() ) ) );
		};
		centerSlider();

		var slider = $('#headerCarousel').carousel({
			interval: CarpressJS.carouselInterval
		});

		// change the text on the slide change
		slider.on( 'slid', function () {
			var current = $('#headerCarousel .item.active').index();

			$( '.js--slide-text-' + current )
				.addClass( 'shown' )
				.siblings( '.shown' ).removeClass( 'shown' );
		} );

		$( window ).on( 'resize', _.debounce( function() {
			centerSlider();
		}, 300 ) );
	} )();
});
