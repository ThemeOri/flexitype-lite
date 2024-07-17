<?php 
// No access of directly access
if (!defined('ABSPATH'))
exit; 

// Update Post Support
$cpt_support = get_option('elementor_cpt_support');

//check if option DOESN'T exist in db
if (!$cpt_support) {
$cpt_support = ['page', 'post', 'service', 'portfolio', 'flexitype_builder'];
update_option('elementor_cpt_support', $cpt_support);
}

// Disable default colors & default fonts
$disable_default_colors = 'yes';
$disable_default_fonts = 'yes';
update_option('elementor_disable_color_schemes', $disable_default_colors);
update_option('elementor_disable_typography_schemes', $disable_default_fonts);