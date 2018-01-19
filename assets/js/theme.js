/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
(function($) {

	var warby = {

		// Cache selectors
		cache: {
			$document: $(document),
			$body: $('body'),
			$window: $(window)
		},

		// Init functions
		init: function() {
			this.bindEvents();
		},

		// Bind Elements
		bindEvents: function() {

			var self = this;

			// self.navigationInit();
			self.searchInit();

			this.cache.$document.on( 'ready', function() {
				self.fitVidsInit();
			});

		},

		/**
		 * Initialize the mobile menu functionality.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		navigationInit: function() {

			// Add dropdown toggle to display child menu items
			$('.main-navigation .menu > .menu-item-has-children').append( '<span class="dropdown-toggle" />');

		},

		/**
		 * Search init.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		searchInit: function() {
			var self = this;
			var $nav_search = $('.nav-search');

			$nav_search.on( 'click', function(e) {
				e.preventDefault();
				self.cache.$body.addClass('search-open');

				$('.search-modal').on( 'click', function(e) {

					if ( $(e.target).hasClass( 'widget_shopping_cart' ) ) {
						return;
					}

					if ( $(e.target).closest('.widget_shopping_cart').length ) {
						return;
					}

					self.searchClose();
				});

			});

			document.addEventListener('keyup', function(ev) {
				// Escape key
				if ( ev.keyCode == 27 ) {
					self.searchClose();
				}
			});

		},

		searchClose: function() {
			this.cache.$body.removeClass('search-open');
		},

		// Initialize FitVids
		fitVidsInit: function() {

			// Make sure lib is loaded.
			if (!$.fn.fitVids) {
				return;
			}

			// Run FitVids
			$('.hentry').fitVids();

		},

		/**
		 * Debounce function.
		 *
		 * @since  1.0.0
		 * @link http://remysharp.com/2010/07/21/throttling-function-calls
		 *
		 * @return void
		 */
		debounce: function(fn, delay) {
			var timer = null;
			return function () {
				var context = this, args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					fn.apply(context, args);
				}, delay);
			};
		}

	};

	warby.init();

})(jQuery);
