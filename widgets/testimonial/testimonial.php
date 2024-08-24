<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class FlexiType_Testimonial extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-testimonials';
    }

    public function get_title()
    {
        return esc_html__('Testimonials', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-review';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'Client', 'carousel', 'slider', 'Testimonial', 'Review'];
    }
    
    public function get_script_depends() {
		return [ 'flexitype-swiper-script' ];
	}

    public function get_style_depends() {
		return [ 'flexitype-swiper-style' ];
	}

    protected function register_controls()

    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Testimonial Content', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'active_slider',
            [
                'label' => esc_html__('Enable Slider', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'yes',          
            ]
        );
        $this->add_control(
            'unique_id',
            [
                'label' => esc_html__('Unique ID', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('sliderid', 'flexitype-lite'),
                'label_block' => false,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'select_design',
            [
                'label' => esc_html__('Select a Style', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'design-1' => esc_html__('Testimonial Style 01', 'flexitype-lite'),
                    'design-2' => esc_html__('Testimonial Style 02', 'flexitype-lite'),
                ],
                'default' => 'design-1',
                'label_block' => false,
            ]
        );
        $this->add_control(
            'testimonial_rating_icon',
            [
                'label' => esc_html__('Rating Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'brands',
                ],
            ]
        );
        $this->add_control(
            'testimonial_quote_icon',
            [
                'label' => esc_html__('Quote Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'default' => [
                    'value' => 'fas fa-quote-right',
                    'library' => 'brands',
                ],
            ]
        );
        $testimonial_item = new Repeater();
        $testimonial_item->add_control(
            'avatar_image',
            [
                'label' => esc_html__('Avatar Image', 'flexitype-lite'),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $testimonial_item->add_control(
            'test_title',
            [
                'label'   => esc_html__('Author Name', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );
        $testimonial_item->add_control(
            'test_subtitle',
            [
                'label'   => esc_html__('Author Position', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );
        $testimonial_item->add_control(
            'test_description',
            [
                'label'   => esc_html__('Write Content', 'flexitype-lite'),
                'type'    => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'testimonial_items',
            [
                'label' => esc_html__('Testimonial Slides', 'flexitype-lite'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $testimonial_item->get_controls(),
                'default' => [
                    [
                        'avatar_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'test_subtitle'     => esc_html__('Web Designer', 'flexitype-lite'),
                        'test_title'        => esc_html__('Sara Albert', 'flexitype-lite'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'flexitype-lite'),
                        'brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'avatar_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'test_subtitle'     => esc_html__('Developer', 'flexitype-lite'),
                        'test_title'        => esc_html__('Richerd William', 'flexitype-lite'),
                        'test_description'  => esc_html__('Proin pretium sem libero, nec aliquet augue lobortis in. Phasellus nibh quam, molestie id est sit amet.', 'flexitype-lite'),
                        'brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ test_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('Settings', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'grid_columns_des',
            [
                'label'   => esc_html__('Columns On Desktop', 'flexitype-lite'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'show_three' => esc_html__('Column 3', 'flexitype-lite'),
                    'show_four' => esc_html__('Column 4', 'flexitype-lite'),
                    'show_five' => esc_html__('Column 5', 'flexitype-lite'),
                ],
                'default'      => 'show_three',
                'label_block'  => false,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'grid_columns_tab',
            [
                'label'   => esc_html__('Columns On Tablet', 'flexitype-lite'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'md_show_one' => esc_html__('Column 1', 'flexitype-lite'),
                    'md_show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'md_show_three' => esc_html__('Column 3', 'flexitype-lite'),
                ],
                'default'      => 'md_show_two',
                'label_block'  => false,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
           
        );
        $this->add_control(
            'grid_columns_mob',
            [
                'label' => esc_html__('Columns On Mobile', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sm_show_one' => esc_html__('Column 1', 'flexitype-lite'),
                    'sm_show_two' => esc_html__('Column 2', 'flexitype-lite'),
                    'sm_show_three' => esc_html__('Column 3', 'flexitype-lite'),
                ],
                'default' => 'sm_show_one',
                'label_block' => false,
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->add_responsive_control(
            'slide_box',
            [
                'label' => esc_html__('Slide Area Box', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'slide_box_yes' => esc_html__('Yes', 'flexitype-lite'),
                    'slide_box_no' => esc_html__('No', 'flexitype-lite'),
                ],
                'default' => 'slide_box_yes',
                'label_block' => false,
                'prefix_class'  => 'slider%s-',
                'condition' => [
                    'active_slider' => ['yes'],
                ]
            ]
        );
		$this->add_control(
			'autoplay_slide',
			[
				'label' => esc_html__( 'Autoplay', 'flexitype-lite' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'flexitype-lite' ),
					'no' => esc_html__( 'No', 'flexitype-lite' ),
				],
                'condition' => [
                    'active_slider' => ['yes'],
                ],
			]
		);
        $this->add_control(
            'centered_slides',
            [
                'label' => esc_html__('Centered Slides', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'true',
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_delay',
            [
                'label' => esc_html__('Autoplay Speed', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 2000,
                'max' => 10000,
                'step' => 500,
                'default' => 4000,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_speed',
            [
                'label' => esc_html__('Animation Speed', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 10000,
                'step' => 100,
                'default' => 500,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_columns_gap',
            [
                'label' => esc_html__('Slide View Gap', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 30,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_columns_des',
            [
                'label' => esc_html__('Slide View Desktop', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 2,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_columns_lap',
            [
                'label' => esc_html__('Slide View Laptop', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 3,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_columns_tab',
            [
                'label' => esc_html__('Slide View Tablet', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'slide_columns_mob',
            [
                'label' => esc_html__('Slide View Mobile', 'flexitype-lite'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 2,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'active_slider' => ['yes'],
                ],
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
                'condition' => [
                    'active_slider' => ['yes'],
                ],
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
                'default' => 'yes',
                'condition' => [
                    'active_slider' => ['yes'],
                ],
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
                    'show_arrow' => ['yes'],
                    'active_slider' => ['yes'],
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
                    'show_arrow' => ['yes'],
                    'active_slider' => ['yes'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item',
            [
                'label' => esc_html__('Testimonial Item', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'item_gap',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
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
					'size' => 25,
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'active_slider!' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'testimonial_item_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item,
				{{WRAPPER}} .flexitype_testimonial_two-item',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item,
                {{WRAPPER}} .flexitype_testimonial_two-item',
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_item_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],                
                'condition' => [
                    'active_slider' => ['yes'],
                ],
            ]
        );
		$this->add_control(
			'rating_name',
			[
				'label' => esc_html__( 'Rating Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
                
			]
		);
        $this->add_control(
            'rating_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
            ]
        );        
        $this->add_responsive_control(
            'rating_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content .rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-reviews i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'testimonial_rating_icon[value]!' => '',
                ],
            ]
        );
		$this->add_control(
			'quote_name',
			[
				'label' => esc_html__( 'Quote Icon', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],                
			]
		);
        $this->add_control(
            'quote_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'quote_size',
            [
                'label' => esc_html__('Front Size', 'flexitype-lite'),
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
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_one-item-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'testimonial_quote_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_item_content',
            [
                'label' => esc_html__('Item Content', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'author_avatar',
			[
				'label' => esc_html__( 'Author Avatar', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                
			]
		);
		$this->add_responsive_control(
			'author_avatar_width',
			[
				'label' => esc_html__( 'Max Width','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .flexitype_testimonial_one-item-client-image img' => 'width: {{SIZE}}px;height: {{SIZE}}px;min-width: {{SIZE}}px;',
					'{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author img' => 'width: {{SIZE}}px;height: {{SIZE}}px;min-width: {{SIZE}}px;',
				],
			]
		);
		$this->add_responsive_control(
			'author_avatar_gap',
			[
				'label' => esc_html__( 'Gap','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .flexitype_testimonial_one-item-client' => 'gap: {{SIZE}}px;',
					'{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author' => 'gap: {{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label' => esc_html__( 'Author Name', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item-client-title h6,
                {{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info h6',
                
            ]
        );
        $this->add_control(
            'author_name_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item-client-title h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info h6' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_position',
			[
				'label' => esc_html__( 'Author Position', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item-client-title span,
                {{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info span',
                
            ]
        );
        $this->add_control(
            'author_position_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item-client-title span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content-bottom-author-info span' => 'color: {{VALUE}}',
                ],                
            ]
        );
		$this->add_control(
			'author_content',
			[
				'label' => esc_html__( 'Author Content', 'flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .flexitype_testimonial_one-item p,
                {{WRAPPER}} .flexitype_testimonial_two-item-content p',
                
            ]
        );
        $this->add_control(
            'author_content_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content p' => 'color: {{VALUE}}',
                ],                
            ]
        );
        $this->add_responsive_control(
            'testimonial_content_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_testimonial_one-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_testimonial_two-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_control(
            'arrow_align_position',
            [
                'label' => esc_html__('Position', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'arrow_top' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'arrow_middle' => [
                        'title' => esc_html__('Middle', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'arrow_bottom' => [
                        'title' => esc_html__('Bottom', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'arrow_middle',
                'toggle' => false,
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
                'condition' => [
                    'arrow_align_position' => ['arrow_top', 'arrow_bottom'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => esc_html__('Vertical', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => -110,
                        'max' => 110,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow .flexitype_slider-arrow-prev' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow .flexitype_slider-arrow-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'arrow_align_position' => ['arrow_middle'],
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => esc_html__('Horizontal', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => -110,
                        'max' => 110,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider-arrow .flexitype_slider-arrow-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_slider-arrow .flexitype_slider-arrow-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'arrow_align_position' => ['arrow_middle'],
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
                ],
            ]
        );
        $this->add_control(
            'dots_border_color',
            [
                'label' => esc_html__('Border Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
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
        $sliderId = wp_rand(10, 1000);
        $settings   = $this->get_settings_for_display();
        $grid_columns = $settings['grid_columns_des'] . ' ' . $settings['grid_columns_tab'] . ' ' . $settings['grid_columns_mob'];

        include ('template/testimonial-style-one.php');
        include ('template/testimonial-style-two.php');


        ?>
        <script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    var autoplayOption = <?php echo wp_json_encode( $this->get_settings('autoplay_slide') ); ?>;
                    var enableAutoplay = (autoplayOption === 'yes');                    
                    var swiper = new Swiper(".flexitype-sliders-<?php echo esc_attr($sliderId);?>", {
                        loop: true,                        
                        spaceBetween: <?php echo wp_json_encode( $settings['slide_columns_gap'])?>,
                        speed: <?php echo wp_json_encode( $settings['slide_speed'])?>,
                        autoplay: enableAutoplay ? {
                            delay: <?php echo wp_json_encode( $settings['slide_delay'])?>,
                            reverseDirection: false,
                            disableOnInteraction: false,
                        } : false,
                        navigation: {
                            nextEl: '.swiper-button-next-<?php echo esc_attr($settings['unique_id']); ?>',
                            prevEl: '.swiper-button-prev-<?php echo esc_attr($settings['unique_id']); ?>',
                        },
                        pagination: {
                            el: ".flexitype_slide_dots-<?php echo esc_attr($settings['unique_id']); ?>",
                            clickable: true,
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: <?php echo wp_json_encode($settings['slide_columns_mob']) ?>,
                            },
                            768: {
                                slidesPerView: <?php echo wp_json_encode($settings['slide_columns_tab']) ?>,
                            },
                            1025: {
                                slidesPerView: <?php echo wp_json_encode($settings['slide_columns_lap']) ?>,
                            },
                            1600: {
                                slidesPerView: <?php echo wp_json_encode($settings['slide_columns_des']) ?>,
                            },
                        },
                        centeredSlides: <?php echo wp_json_encode($settings['centered_slides']) ?>,
                    });
                });
            })(jQuery);
        </script>
        <?php       
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Testimonial);
