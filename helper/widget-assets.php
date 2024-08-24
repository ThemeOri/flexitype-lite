<?php 

function flexitype_lite_widgets_assets() {
    
/* Widget Style */
wp_register_style( 'flexitype-swiper-style', FLEXITYPE_LITE_ASSETS . 'assets/css/swiper-bundle.min.css');
wp_register_style( 'flexitype-magnific-style', FLEXITYPE_LITE_ASSETS . 'assets/css/magnific-popup.css');

/* Widget Script */

wp_register_script( 'flexitype-isotope-script', FLEXITYPE_LITE_ASSETS . 'assets/js/isotope.pkgd.min.js');
wp_register_script( 'flexitype-magnific-script', FLEXITYPE_LITE_ASSETS . 'assets/js/jquery.magnific-popup.min.js');
wp_register_script( 'flexitype-swiper-script', FLEXITYPE_LITE_ASSETS . 'assets/js/swiper-bundle.min.js');


}

add_action( 'wp_enqueue_scripts', 'flexitype_lite_widgets_assets' );