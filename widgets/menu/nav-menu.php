<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_NavMenu extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-navmenu';
    }

    public function get_title()
    {
        return esc_html__('Nav Menu','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-nav-menu';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'Menu', 'Header', 'elements', 'nav'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Custom Menu','flexitype-lite'),
            ]
        );
        $this->add_control(
            'nav_menu',
            [
                'label' => esc_html__('Select a Menu','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_nav_menu(),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'mobile_content',
            [
                'label' => esc_html__('Mobile Menu','flexitype-lite'),
            ]
        );
        $this->add_control(
            'nav_menu_icon',
            [
                'label' => esc_html__('Navbar Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-bars',
                    'library' => 'brands',
                ],
            ]
        );
        $this->add_control(
            'mobile_logo',
            [
                'label' => esc_html__('Mobile Logo','flexitype-lite'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );        
        $this->add_control(
            'logo_url',
            [
                'label' => esc_html__('URL','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('http://google.com','flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Desktop Nav Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'desktop_menu_align',
            [
                'label' => esc_html__('Menu Alignment','flexitype-lite'),
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
                'default' => 'right',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'selector' => '{{WRAPPER}} .header_nav-menu ul li a',
            ]
        );
        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li.menu-item-has-children > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_hover_color',
            [
                'label' => esc_html__('Hover Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li.menu-item-has-children:hover > a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li.menu-item-has-children:hover > a::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_width',
            [
                'label' => esc_html__('Menu Space','flexitype-lite'),
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
                    '{{WRAPPER}} .header_nav-menu ul > li' => 'margin-right: {{SIZE}}{{UNIT}};margin-left: {{SIZE}}{{UNIT}};',                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'menu_height',
            [
                'label' => esc_html__('Menu Height','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,

            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'selectors' => [
                '{{WRAPPER}} .header_nav-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            ]
        );
        $this->add_control(
            'sub_menu_style',
            [
                'label' => esc_html__('Sub Menu','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_menu_typography',
                'selector' => '{{WRAPPER}} .header_nav-menu ul li .sub-menu li > a',
            ]
        );
        $this->add_control(
            'sub_menu_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sub_menu_box_shadow',
				'selector' => '{{WRAPPER}} .header_nav-menu ul li .sub-menu',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'submenu_border_type',
				'selector' => '{{WRAPPER}} .header_nav-menu ul li .sub-menu',
			]
		);
        $this->add_control(
            'sub_menu_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li.menu-item-has-children > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'sub_menu_hover_color',
            [
                'label' => esc_html__('Hover Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li.menu-item-has-children:hover > a::before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li > a::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu_border',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li .sub-menu li > a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu_height',
            [
                'label' => esc_html__('Sub Menu Top Space','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li > .sub-menu' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );                
        $this->add_control(
            'submenu_dropdown',
            [
                'label' => esc_html__('Dropdown Menu Top Space','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li > .sub-menu li > .sub-menu' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_arrow_icon_space',
            [
                'label' => esc_html__('Menu Arrow Space','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu ul li.menu-item-has-children > a::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_style_section',
            [
                'label' => esc_html__('Mobile Nav Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_align',
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
                'default' => 'right',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .nav_menu_bar' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_icon_color',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar > i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar > i' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_control(
            'mobile_nav_popup',
            [
                'label' => esc_html__('Nav Popup','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'mobile_popup_nav_bg_color',
            [
                'label' => esc_html__('Popup BG','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_icon_color',
            [
                'label' => esc_html__('Close Icon','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup-close i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_icon_bg',
            [
                'label' => esc_html__('Close Icon BG','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup-close i' => 'background: {{VALUE}}',
                ],
            ]
        );        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_popup_nav_menu_typography',
                'selector' => '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li a',
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color',
            [
                'label' => esc_html__('Menu Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_hover',
            [
                'label' => esc_html__('Menu Hover','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li:hover > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_border_color',
            [
                'label' => esc_html__('Menu Border','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup ul li a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_arrow',
            [
                'label' => esc_html__('Dropdown Arrow','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mobile_popup_nav_color_arrow_bg',
            [
                'label' => esc_html__('Arrow BG','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_padding',
            [
                'label' => esc_html__('Popup Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header_nav-menu-responsive .nav_menu_bar-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {   $menuId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();

        ?>
            <div class="header_nav">
                <div class="header_nav-menu">
                    <?php wp_nav_menu(
                        array(
                            'menu' => $settings['nav_menu'],
                            'menu_id' => 'mobile_menu',
                            'menu_class' => 'd-block',
                        )
                    ); ?>
                </div>
                
                <div class="header_nav-menu-responsive">
                    <div class="nav_menu_bar">
                        <i class="<?php echo esc_attr($settings['nav_menu_icon']['value']); ?>"></i>
                    </div>
                    <div class="nav_menu_bar-popup">
                        <div class="nav_menu_bar-popup-top">
                            <?php if($settings['mobile_logo']['url']) : ?>
                            <div class="nav_menu_bar-popup-top-logo">
                                <a href="<?php echo esc_url($settings['logo_url']); ?>"><img src="<?php echo esc_url($settings['mobile_logo']['url']) ?>" alt="Mobile Logo"></a>
                            </div>
                            <?php endif;?>
                            <div class="nav_menu_bar-popup-close"><i class="fa-solid fa-xmark"></i></div>
                        </div>
                        <div class="vertical-menu vertical_menu-<?php echo esc_attr($menuId);?>">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_id' => 'mobilemenu',
                                    'menu_class' => 'd-block',
                                )
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function () {
                        ///============= Nav Menu Sidebar Popup  =============\\\
                        $(".nav_menu_bar i").on("click", function () {
                            $(".nav_menu_bar-popup").addClass("show");
                        });
                        $(".nav_menu_bar-popup-close").on("click", function () {
                            $(".nav_menu_bar-popup").removeClass("show");
                        });	
                        ///============= * Responsive Menu Toggle  =============\\\
                        var mobileItems = jQuery('.vertical_menu-<?php echo esc_js($menuId)?>');
                        mobileItems.find('ul li.menu-item-has-children').append('<span class="mobile-arrows fa-solid fa-plus"></span>');
                                                
                        jQuery(".vertical_menu-<?php echo esc_js($menuId)?> .mobile-arrows").click(function() {
                            jQuery(this).parent().find('ul:first').slideToggle(300);
                            jQuery(this).parent().find('> .mobile-arrows').toggleClass('is-open');
                        });
                    });
                })(jQuery);
            </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_NavMenu);