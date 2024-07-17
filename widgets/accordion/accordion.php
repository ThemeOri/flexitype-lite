<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Accordion extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-accordion';
    }

    public function get_title()
    {
        return esc_html__('Accordion','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-accordion';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'elements', 'toggle', 'accordion', 'faq', 'collapse'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Content','flexitype-lite'),
            ]
        );

        $accordion_item = new Repeater();
        $accordion_item->add_control(
            'accordion_default_active',
            [
                'label' => esc_html__('Active as Default','flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
            ]
        );
        $accordion_item->add_control(
            'accordion_icon_show',
            [
                'label' => esc_html__('Enable Tab Icon','flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'return_value' => 'yes',
            ]
        );
        $accordion_item->start_controls_tabs( 'tab_icons_repeater' );
        $accordion_item->start_controls_tab( 'normal_tab', 
            [ 
                'label' => esc_html__( 'Normal','flexitype-lite' ),
                'condition' => [
                    'accordion_icon_show' => 'yes',
                ],
            ]
        );
        $accordion_item->add_control(
            'accordion_icon_close',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-plus',
                    'library' => 'brands',
                ],
                'condition' => [
                    'accordion_icon_show' => 'yes',
                ],
            ]
        );
        $accordion_item->end_controls_tab();

        $accordion_item->start_controls_tab( 'active_tab', 
            [ 
                'label' => esc_html__( 'Active','flexitype-lite' ),
                'condition' => [
                    'accordion_icon_show' => 'yes',
                ],
            ]
        );
        $accordion_item->add_control(
            'accordion_icon_open',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-minus',
                    'library' => 'brands',
                ],
                'condition' => [
                    'accordion_icon_show' => 'yes',
                ],
            ]
        );
        $accordion_item->end_controls_tab();
        $accordion_item->end_controls_tabs();

        $accordion_item->add_control(
            'accordion_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $accordion_item->add_control(
            'content_type',
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
        $accordion_item->add_control(
            'select_template',
            [
                'label' => esc_html__('Select a Template','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_template(),
                'label_block' => true,
                'condition' => [
                    'content_type' => 'template',
                ],

            ]
        );
        $accordion_item->add_control(
            'accordion_content',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default content','flexitype-lite'),
                'placeholder' => esc_html__('Type your content here','flexitype-lite'),
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'accordion_items',
            [
                'label' => esc_html__('Accordion Items','flexitype-lite'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $accordion_item->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__('Accordion #1','flexitype-lite'),
                        'accordion_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.','flexitype-lite'),
                    ],
                    [
                        'accordion_title' => esc_html__('Accordion #2','flexitype-lite'),
                        'accordion_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.','flexitype-lite'),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );
        $this->add_control(
            'accordion_type',
            [
                'label'         => esc_html__('Active Behavior','flexitype-lite'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'click' => esc_html__('Click','flexitype-lite'),
                    'mouseenter' => esc_html__('Hover','flexitype-lite'),
                ],
                'default'       => 'click',
            ]
        );
        $this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Alignment','flexitype-lite' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'icon_start' => [
						'title' => esc_html__( 'Start','flexitype-lite' ),
						'icon' => 'eicon-h-align-left',
					],
					'icon_end' => [
						'title' => esc_html__( 'End','flexitype-lite' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
                'default' => 'icon_end',
			]
		);
        $this->add_responsive_control(
            'accordion_icon_gap',
            [
                'label' => esc_html__('Icon Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .accordion .accordion_area-item-title.icon_start' => 'gap: {{SIZE}}px;',
                ],
                'condition' => [
                    'icon_align' => ['icon_start'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_item_style',
            [
                'label' => esc_html__('Item','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_item_tabs'
        );
        $this->start_controls_tab(
            'item_normal',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
            ]
        );
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_item_shadow',
				'selector' => '{{WRAPPER}} .accordion_area-item',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_item_border_type',
				'selector' => '{{WRAPPER}} .accordion_area-item',
			]
		);
        $this->add_control(
            'accordion_item_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_gap',
            [
                'label' => esc_html__('Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'item_active',
            [
                'label' => esc_html__('Active','flexitype-lite'),
            ]
        );
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_item_active_shadow',
				'selector' => '{{WRAPPER}} .accordion_area-item.active',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_item_active_border_type',
				'selector' => '{{WRAPPER}} .accordion_area-item.active',
			]
		);
        $this->add_control(
            'accordion_item_active_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_active_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_title_style',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_title_tabs'
        );
        $this->start_controls_tab(
            'title_normal',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_title_typography',
                'selector' => '{{WRAPPER}} .accordion_area-item-title h6',
            ]
        );
        $this->add_control(
            'accordion_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'accordion_title_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .accordion_area-item-title',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border_type',
				'selector' => '{{WRAPPER}} .accordion_area-item-title',
			]
		);
        $this->add_responsive_control(
            'accordion_title_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_item_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'title_active',
            [
                'label' => esc_html__('Active','flexitype-lite'),
            ]
        );
        $this->add_control(
            'accordion_active_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active .accordion_area-item-title h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'accordion_active_title_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .accordion_area-item.active .accordion_area-item-title',
            ]
        );
        $this->add_control(
            'title_active_border_color',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active .accordion_area-item-title' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'title_border_type!' => '',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_section_content_style',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_content_typography',
                'selector' => '{{WRAPPER}} .accordion_area-item-body p',
            ]
        );
        $this->add_control(
            'accordion_content_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border_type',
				'selector' => '{{WRAPPER}} .accordion_area-item-body',
			]
		);
        $this->add_responsive_control(
            'accordion_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_item_icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal','flexitype-lite' ),
			]
		);
        $this->add_control(
            'accordion_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title span i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'accordion_icon_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title span i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title span i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_icon_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 22,
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title span i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'accordion_icon_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item-title span i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Active','flexitype-lite' ),
			]
		);
        $this->add_control(
            'accordion_active_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active .accordion_area-item-title span i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'accordion_active_icon_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_area-item.active .accordion_area-item-title span i' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render()

    {
        $uniqueId = wp_rand(10, 1000);
        $settings = $this->get_settings_for_display();
        ?>
            <div class="accordion">
                <?php foreach ($settings['accordion_items'] as $keys => $item) :
                    $active_class = ($item['accordion_default_active'] == 'yes') ? 'active' : '';
                    ?>
                    <div class="accordion_area-item accordion_item-<?php echo esc_attr($uniqueId); ?>">
                        <div class="accordion_area-item-title <?php echo esc_attr( $settings['icon_align'] ); ?> <?php echo $active_class; ?>">
                            <h6><?php echo esc_html($item['accordion_title']); ?></h6>
                            <?php if (!empty($item['accordion_icon_close']['value'])): ?>
                                <span class="accordion-icon-close"><i class="<?php echo esc_attr($item['accordion_icon_close']['value']); ?>"></i></span>
                            <?php endif; ?>
                            <?php if (!empty($item['accordion_icon_open']['value'])): ?>
                                <span class="accordion-icon-open"><i class="<?php echo esc_attr($item['accordion_icon_open']['value']); ?>"></i></span>
                            <?php endif; ?>                     
                        </div>
                        <div class="accordion_area-item-body">
                            <?php
                                if (!empty($item['select_template']) || ($item['content_type'] === 'template')) {
                                    echo Plugin::$instance->frontend->get_builder_content($item['select_template'], true);
                                } else { ?>
                                    <?php echo wp_kses_post(wpautop($item['accordion_content'])); ?>
                                <?php }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>			
            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function(){
                        $(".accordion_item-<?php echo esc_attr($uniqueId); ?> .accordion_area-item-title.active").closest('.accordion_item-<?php echo esc_attr($uniqueId); ?>').addClass('active').find('.accordion_area-item-body').show();
                        $(".accordion_item-<?php echo esc_attr($uniqueId); ?> .accordion_area-item-title").<?php echo esc_js($settings['accordion_type']); ?>(function(){
                                var $toggle = $(this).closest('.accordion_item-<?php echo esc_attr($uniqueId); ?>');
                                if($(this).hasClass('active')){
                                $(this).removeClass("active");
                                $toggle.removeClass('active').find('.accordion_area-item-body').slideUp(300);
                            }
                            else{
                                $(this).addClass("active");
                                $toggle.addClass('active').find('.accordion_area-item-body').slideDown(300);
                            }
                        });
                    });
                })(jQuery);
            </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Accordion);