'use strict';
(function ($) {
	jQuery(window).load(function(){
		jQuery(window).trigger('resize');
	});

	jQuery(window).on('elementor/frontend/init', function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/wb-news-ticker.default', function ($scope, $) {
			$scope.find('.wb-breaking-news-ticker').breakingNews();
		});
	});
})(jQuery);