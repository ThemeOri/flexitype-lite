(function ($) {
    "use strict";

 
    var customSearch = function ($scope, $) { 
        $(".flexitype-search-icon.open").on("click", function () {
            $(".flexitype-search-box")
                .fadeIn()
                .addClass("active");
            }
        );
        $(".flexitype-search-box-icon").on("click", function () {
            $(this).fadeIn().removeClass("active");
        });
        $(".flexitype-search-box-icon i").on("click", function () {
            $(".flexitype-search-box")
                .fadeOut()
                .removeClass("active");
            }
        );
	}

    var VideoPopup = function () {
        $('.video-popup').magnificPopup({
            type: 'iframe'
        });
    }
 

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/flexitype-search.default', customSearch);
        elementorFrontend.hooks.addAction('frontend/element_ready/flexitype-video.default', VideoPopup);
    });


})(jQuery);