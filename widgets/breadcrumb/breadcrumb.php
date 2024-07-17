<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Breadcrumb extends Widget_Base {

    public function get_name() {
        return 'flexitype-breadcrumb';
    }

    public function get_title() {
        return esc_html__('Breadcrumb','flexitype-lite');
    }

    public function get_icon() {
        return 'flexitype-icon eicon-date';
    }

    public function get_categories() {
        return ['flexitype'];
    }

    public function get_keywords() {
        return ['flexitype', 'banner', 'breadcrumb'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'breadcrumb_alignment',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_breadcrumb' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_icon',
            [
                'label' => esc_html__('Choose Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'brands',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function flexitype_breadcrumb() {
        $settings = $this->get_settings_for_display();

        // Define the home text and URL
        $output = '';

        $home_text = 'Home';
        $home_url = home_url('/');
        // Start outputting the breadcrumbs
        $output = '<div class="flexitype_breadcrumb-area">';
        // Home link
        $output .= '<a href="' . esc_url($home_url) . '">' . esc_html($home_text) . '</a>';
        // icon
        $output .= '<span class="separator"><i class="' . esc_attr($settings['box_icon']['value']) . '"></i></span>';
        // Check if it's a single post
        if (is_single()) {
            // Get the category
            $categories = get_the_category();
            if ($categories) {
                $category = $categories[0];
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                $output .= '<span class="separator"><i class="' . esc_attr($settings['box_icon']['value']) . '"></i></span>';
            }
            // Post title
            $output .= '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_category()) {
            // Category archive
            $output .= '<span class="current">' . esc_html(single_cat_title('', false)) . '</span>';
        } elseif (is_page()) {
            // Standard page
            $output .= '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_search()) {
            // Search results
            $output .= '<span class="current">' . esc_html__('Search Results','flexitype-lite') . '</span>';
        } elseif (is_404()) {
            // 404 page
            $output .= '<span class="current">' . esc_html__('404 Not Found','flexitype-lite') . '</span>';
        }
        $output .= '</div>';
        return $output;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="flexitype_breadcrumb">
                <?php echo wp_kses($this->flexitype_breadcrumb(), wp_kses_allowed_html('post')); ?>
            </div>
        <?php
    }
}


Plugin::instance()->widgets_manager->register_widget_type(new FlexiType_Breadcrumb());