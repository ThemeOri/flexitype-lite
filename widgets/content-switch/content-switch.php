<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_ContentSwitch extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-content-switch';
    }

    public function get_title()
    {
        return esc_html__('Content Switch','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-dual-button';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'tab', 'tabs', 'switch'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_setting',
            [
                'label' => esc_html__('Display Settings','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'switch_alignment',
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
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_item_gap',
            [
                'label' => esc_html__('Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn' => 'gap: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_area_gap',
            [
                'label' => esc_html__('Space Between','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_primary',
            [
                'label' => esc_html__('Primary','flexitype-lite'),
            ]
        );
        $this->add_control(
            'primary_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
            ]
        );
        $this->add_responsive_control(
            'primary_icon_position',
            [
                'label' => esc_html__('Icon Position','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'inherit' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'inherit',
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_item:first-child .switch_area-btn-item' => 'flex-direction: {{VALUE}};',
                ],  
                'condition' => [
                    'primary_icon[value]!' => '',
                ],            
            ]
        );
        $this->add_control(
            'primary_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Primary','flexitype-lite'),
            ]
        );
        $this->add_control(
            'primary_content_type',
            [
                'label' => esc_html__('Content Type','flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content','flexitype-lite'),
                    'template' => esc_html__('Template','flexitype-lite'),
                ],
                'default' => 'content',
            ]
        );
        $this->add_control(
            'primary_content',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Cras aliquet finibus lorem a bibendum. Morbi ornare luctus dignissim. Nulla facilisi. Ut id urna lacus. Phasellus pulvinar neque et rhoncus viverra. Mauris eget imperdiet nisi.','flexitype-lite'),
                'placeholder' => esc_html__('Type your content here','flexitype-lite'),
                'condition' => [
                    'primary_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'primary_template',
            [
                'label' => esc_html__('Select a Template','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_template(),
                'label_block' => true,
                'condition' => [
                    'primary_content_type' => 'template',
                ],

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_secondary',
            [
                'label' => esc_html__('Secondary','flexitype-lite'),
            ]
        );
        $this->add_control(
            'secondary_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
            ]
        );
        $this->add_responsive_control(
            'secondary_icon_position',
            [
                'label' => esc_html__('Icon Position','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'inherit' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'inherit',
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_item:last-child .switch_area-btn-item' => 'flex-direction: {{VALUE}};',
                ],  
                'condition' => [
                    'secondary_icon[value]!' => '',
                ],            
            ]
        );
        $this->add_control(
            'secondary_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Secondary','flexitype-lite'),
            ]
        );
        $this->add_control(
            'secondary_content_type',
            [
                'label' => esc_html__('Content Type','flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content','flexitype-lite'),
                    'template' => esc_html__('Template','flexitype-lite'),
                ],
                'default' => 'content',
            ]
        );
        $this->add_control(
            'secondary_content',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Aliquam vulputate, dui et aliquet semper, sapien enim blandit sapien, ac dignissim neque justo a lorem. Morbi a mi eget orci placerat convallis eget eget mauris.','flexitype-lite'),
                'placeholder' => esc_html__('Type your content here','flexitype-lite'),
                'condition' => [
                    'secondary_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'secondary_template',
            [
                'label' => esc_html__('Select a Template','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_template(),
                'label_block' => true,
                'condition' => [
                    'secondary_content_type' => 'template',
                ],

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'switch_content_style',
            [
                'label' => esc_html__('Switch Content','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'switch_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'switch_title_typography',
                'selector' => '{{WRAPPER}} .switch_area-btn-item h6',
            ]
        );
        $this->add_control(
            'switch_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn-item h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'switch_active_title_color',
            [
                'label' => esc_html__('Active Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_item.active .switch_area-btn-item h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'switch_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'switch_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn-item i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'switch_active_icon_color',
            [
                'label' => esc_html__('Active Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_item.active .switch_area-btn-item i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_icon_gap',
            [
                'label' => esc_html__('Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn-item' => 'gap: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'switch_control_style',
            [
                'label' => esc_html__('Switch Control','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'switch_slider_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'switch_slider_active_bg',
            [
                'label' => esc_html__('Active Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle .check:checked + .switch_area-toggle-slider' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_width',
            [
                'label' => esc_html__('Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_height',
            [
                'label' => esc_html__('Height','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'switch_slider_dots',
            [
                'label' => esc_html__('Active Dots','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'switch_slider_dots_bg',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'switch_slider_dots_active_bg',
            [
                'label' => esc_html__('Active Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle .check:checked + .switch_area-toggle-slider::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_dots_width',
            [
                'label' => esc_html__('Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider::after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_dots_height',
            [
                'label' => esc_html__('Height','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_dots_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'switch_slider_dots_x_position',
            [
                'label' => esc_html__('X Position','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle-slider::after' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .switch_area-btn .switch_area-toggle .check:checked + .switch_area-toggle-slider::after' => 'left: calc(100% - {{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $uniqueId = wp_rand(10, 1000);
        ?>
        <div class="switch_area">
            <div class="switch_area-btn">
                <div class="switch_item active" id="filt-monthly<?php echo esc_attr($uniqueId); ?>">
                    <div class="switch_area-btn-item">
                            <?php if (!empty($settings['primary_icon']['value'])):?>
                                <i class="<?php echo esc_attr($settings['primary_icon']['value']); ?>"></i>
                            <?php endif;?>
                            <h6><?php echo esc_html($settings['primary_title']); ?></h6>
                    </div>
                </div>
                <div class="switch_area-toggle">
                    <input type="checkbox" id="switcher<?php echo esc_attr($uniqueId); ?>" class="check">
                    <span class="switch_area-toggle-slider"></span>
                </div>
                <div class="switch_item" id="filt-hourly<?php echo esc_attr($uniqueId); ?>">
                    <div class="switch_area-btn-item">
                            <?php if (!empty($settings['secondary_icon']['value'])):?>
                                <i class="<?php echo esc_attr($settings['secondary_icon']['value']); ?>"></i>
                            <?php endif;?>
                            <h6><?php echo esc_html($settings['secondary_title']); ?></h6>
                    </div>
                </div>
            </div>
            <div class="switch_area-content">
                <div id="monthly<?php echo esc_attr($uniqueId); ?>" class="switch_area-content-item">
                    <div>
                        <?php
                            if (!empty($settings['primary_template']) || ($settings['primary_content_type'] === 'template')) {
                                echo Plugin::$instance->frontend->get_builder_content($settings['primary_template'], true);
                            } else { ?>
                                <?php echo wp_kses_post(wpautop($settings['primary_content'])); ?>
                            <?php }
                        ?>
                    </div>
                </div>
                <div id="hourly<?php echo esc_attr($uniqueId); ?>" class="switch_area-content-item hide">
                    <div>
                        <?php
                            if (!empty($settings['secondary_template']) || ($settings['secondary_content_type'] === 'template')) {
                                echo Plugin::$instance->frontend->get_builder_content($settings['secondary_template'], true);
                            } else { ?>
                                <?php echo wp_kses_post(wpautop($settings['secondary_content'])); ?>
                            <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function($) {
                "use strict";
                $(document).ready(function(){
                    var e = document.getElementById("filt-monthly<?php echo esc_attr($uniqueId); ?>"),
                        d = document.getElementById("filt-hourly<?php echo esc_attr($uniqueId); ?>"),
                        t = document.getElementById("switcher<?php echo esc_attr($uniqueId); ?>"),
                        m = document.getElementById("monthly<?php echo esc_attr($uniqueId); ?>"),
                        y = document.getElementById("hourly<?php echo esc_attr($uniqueId); ?>");
                    e.addEventListener("click", function(){
                        t.checked = false;
                        e.classList.add("active");
                        d.classList.remove("active");
                        m.classList.remove("hide");
                        y.classList.add("hide");
                    });
                    d.addEventListener("click", function(){
                        t.checked = true;
                        d.classList.add("active");
                        e.classList.remove("active");
                        m.classList.add("hide");
                        y.classList.remove("hide");
                    });
                    t.addEventListener("click", function(){
                        d.classList.toggle("active");
                        e.classList.toggle("active");
                        m.classList.toggle("hide");
                        y.classList.toggle("hide");
                    })
                });
            })(jQuery);
        </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_ContentSwitch);