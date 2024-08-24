<?php
if (!defined('ABSPATH'))
	exit; // No direct access

class Flexitype_Lite_Addons
{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function init()
	{
		// Register widgets
		add_action('elementor/widgets/register', [$this, 'flexitype_lite_elements_register_widgets']);

		// Enqueue scripts
		add_action('wp_enqueue_scripts', [$this, 'flexitype_lite_elements_enqueue_scripts'], 20);

		add_action('elementor/editor/after_enqueue_styles', [$this, 'flexitype_lite_editor_styles']);

		add_action('elementor/elements/categories_registered', [$this, 'flexitype_lite_widget_categorie']);


	}

	// Register categories
	public function flexitype_lite_widget_categorie($elements_manager)
	{

		$elements_manager->add_category(
			'flexitype',
			[
				'title' => esc_html__('FlexiType Lite','flexitype-lite'),
				'icon' => 'fa fa-plug',
			]
		);
	}

	public function flexitype_lite_editor_styles()
	{

		wp_enqueue_style('flexitype-elements-editor-css', FLEXITYPE_LITE_ASSETS . 'assets/css/editor.css', array(), '1.0.0');


	}



	public function flexitype_lite_elements_enqueue_scripts()
	{
		wp_enqueue_style('flexitype-elements-widget-css', FLEXITYPE_LITE_ASSETS . 'assets/sass/widget.css', array(), '1.0.0');


		wp_enqueue_script('flexitype-elements-widget-js', FLEXITYPE_LITE_ASSETS . 'assets/js/widgets.js', array('jquery'), '1.0.0', true);
	}

	public function flexitype_lite_elements_register_widgets()
	{

		// Custom Widget
		require_once ('accordion/accordion.php');
		require_once ('breadcrumb/breadcrumb.php');
		require_once ('button/button.php');
		require_once ('content-switch/content-switch.php');
		require_once ('flip-box/flip-box.php');
		require_once ('icon-box/icon-box.php');
		require_once ('image-box/image-box.php');
		require_once ('image-slider/image-slider.php');
		require_once ('logo/logo.php');
		require_once ('menu/nav-menu.php');
		require_once ('menu/vertical-menu.php');
		require_once ('search/search.php');
		require_once ('video/video-icon.php');
		require_once ('blog/blog.php');
		require_once('team/team.php');
		require_once('testimonial/testimonial.php');
		require_once('arrow/arrow.php');

		// 3rd Party Widget 
		if (function_exists('wpcf7')) {
			require_once ('contact-form/contact-form7.php');
		}

	}
}

// Instantiate Plugin Class
Flexitype_Lite_Addons::instance()->init();