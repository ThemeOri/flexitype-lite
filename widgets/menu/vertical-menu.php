<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_VerticalMenu extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-verticalmenu';
    }

    public function get_title()
    {
        return esc_html__('Vertical Menu','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'elements', 'header', 'Menu', 'Navbar',];
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
            'vertical_menu_style',
            [
                'label' => esc_html__('Nav Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'vertical_menu_typography',
                'selector' => '{{WRAPPER}} .vertical-menu ul li a',
            ]
        );
        $this->add_control(
            'vertical_menu_color',
            [
                'label' => esc_html__('Menu Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'vertical_menu_color_hover',
            [
                'label' => esc_html__('Menu Hover','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li:hover > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'vertical_menu_border',
            [
                'label' => esc_html__('Menu Border','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'vertical_menu_arrow',
            [
                'label' => esc_html__('Dropdown Arrow','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'vertical_menu_arrow_bg',
            [
                'label' => esc_html__('Arrow BG','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li.menu-item-has-children > span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'vertical_menu_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .vertical-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $menuId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();

        ?>
        
        <div class="vertical-menu vertical_menu-<?php echo esc_attr($menuId);?>">
            <?php wp_nav_menu(
                array(
                    'menu' => $settings['nav_menu'],
                    'menu_id' => 'mobilemenu',
                    'menu_class' => 'd-block',
                )
            ); ?>
        </div>
        
        <script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
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

Plugin::instance()->widgets_manager->register(new FlexiType_VerticalMenu);