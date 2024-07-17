<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class FlexiType_Arrow extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-arrow';
    }

    public function get_title()
    {
        return esc_html__('Arrow & Dots', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-post-navigation';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'next', 'prev', 'carousel', 'slider', 'navigation', 'pagination'];
    }


    protected function register_controls()

    {
        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Arrow & Dots', 'flexitype-lite'),
            ]
        );

        $this->add_control(
            'unique_id',
            [
                'label' => esc_html__('Unique ID', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('sliderid', 'flexitype-lite'),
                'label_block' => false,
            ]
        );
        $this->add_control(
            'show_arrow',
            [
                'label' => esc_html__('Show Arrow', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_dots',
            [
                'label' => esc_html__('Show Dots', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'arrow_prev_icon',
            [
                'label' => esc_html__('Previous Icon', 'flexitype-lite'),
                'label_block' => false,
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'exclude_inline_options' => ['svg'],
                'default' => [
                    'value' => 'fas fa-chevron-left',
                    'library' => 'brands',
                ],
                'condition' => [
                    'show_arrow' => ['yes']
                ],
            ]
        );
        $this->add_control(
            'arrow_next_icon',
            [
                'label' => esc_html__('Next Icon', 'flexitype-lite'),
                'label_block' => false,
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'exclude_inline_options' => ['svg'],
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'brands',
                ],
                'condition' => [
                    'show_arrow' => ['yes']
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'arrow_style',
            [
                'label' => esc_html__('Arrow Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_arrow' => ['yes'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_align',
            [
                'label' => esc_html__('Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'arrow_tabs'
        );
        $this->start_controls_tab(
            'arrow_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );        
        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_max_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-prev' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_max_size',
            [
                'label' => esc_html__('Icon Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 18,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_gap',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow' => 'gap: {{SIZE}}px;',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'arrow_border_type',
				'selector' => '{{WRAPPER}} .flexitype_slider-arrow-prev i,
				{{WRAPPER}} .flexitype_slider-arrow-next i',
			]
		);
        $this->add_responsive_control(
            'arrow_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'arrow_hover_tab',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'arrow_hover_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_hover_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow-prev i:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_slider-arrow-next i:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__('Dot Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_dots' => ['yes'],
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_align',
            [
                'label' => esc_html__('Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'dots_tabs'
        );
        $this->start_controls_tab(
            'dots_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'dots_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_max_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_gap',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'dots_hover_tab',
            [
                'label' => esc_html__('Active', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'dots_hover_background',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet::after' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dots_active_width',
            [
                'label' => esc_html__('Width', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-dots .swiper-pagination-bullet-active' => 'width: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render()
    {   
        $settings   = $this->get_settings_for_display();
        ?>
        <?php if ('yes' === $settings['show_arrow']): ?>
            <div class="flexitype_slider-arrow">
                <div class="flexitype_slider-arrow-prev swiper-button-prev-<?php echo esc_attr($settings['unique_id']); ?>">
                    <i class="<?php echo esc_attr($settings['arrow_prev_icon']['value']); ?>"></i>
                </div>
                <div class="flexitype_slider-arrow-next swiper-button-next-<?php echo esc_attr($settings['unique_id']); ?>">
                    <i class="<?php echo esc_attr($settings['arrow_next_icon']['value']); ?>"></i>
                </div>
            </div>
        <?php endif; ?>
        <?php if ('yes' === $settings['show_dots']): ?>
            <div class="flexitype_slider-dots">
                <div class="flexitype_slide_dots-<?php echo esc_attr($settings['unique_id']); ?>"></div>
            </div>
        <?php endif; ?>
        <?php       
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Arrow);
