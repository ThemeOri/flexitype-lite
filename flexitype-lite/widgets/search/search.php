<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Search extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-search';
    }

    public function get_title()
    {
        return esc_html__('Search','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-search';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['elements', 'Search', 'Icon', 'header'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Section Content','flexitype-lite'),
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-magnifying-glass',
                    'library' => 'brands',
                ],
                
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Placeholder','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search...','flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Icon Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
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
                    '{{WRAPPER}} .flexitype-search' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'search_color',
            [
                'label' => esc_html__('Icon Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_size',
            [
                'label' => esc_html__('Icon Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section_popup',
            [
                'label' => esc_html__('Popup Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'search_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_bg_close',
            [
                'label' => esc_html__('Close Icon Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_form',
            [
                'label' => esc_html__('Form Style','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'search_bg_form',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_color_form',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_place_form',
            [
                'label' => esc_html__('Placeholder Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'search_color_icon',
            [
                'label' => esc_html__('Icon Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_input_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_input_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-search-box input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .flexitype-search-box input',
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="flexitype-search">
                <div class="search">
                    <span class="flexitype-search-icon open"><i class="<?php echo esc_attr($settings['search_icon']['value']); ?>"></i></span>
                </div>
                <div class="flexitype-search-box">
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" placeholder="<?php echo esc_attr($settings['btn_text']); ?>"
                            value="<?php the_search_query(); ?>" name="s">
                        <button value="Search" type="submit">
                            <i class="<?php echo esc_attr($settings['search_icon']['value']); ?>"></i>
                        </button>
                    </form>
                    <span class="flexitype-search-box-icon"><i class="fa-solid fa-xmark"></i></span>
                </div>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Search);