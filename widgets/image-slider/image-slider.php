<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_ImageSlider extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-image-slider';
    }

    public function get_title()
    {
        return esc_html__('Image Carousel', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-nested-carousel';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'slider', 'owl', 'portfolio', 'work', 'gallery'];
    }

    public function get_style_depends()
    {
        return ['flexitype-swiper-style'];
    }

    public function get_script_depends()
    {
        return ['flexitype-swiper-script'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'slider_design',
            [
                'label' => esc_html__('Content', 'flexitype-lite'),
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
        $image_slider_items = new Repeater();
        $image_slider_items->add_control(
            'slide_image',
            [
                'label' => esc_html__('Image', 'flexitype-lite'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $image_slider_items->add_control(
            'image_slide_link_icon_active',
            [
                'label' => esc_html__('Enable Link Icon', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $image_slider_items->add_control(
            'image_slide_link_icon_icon',
            [
                'label' => esc_html__('Link Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'condition' => [
                    'image_slide_link_icon_active' => ['yes'],
                ],
                'default' => [
                    'value' => 'fas fa-link',
                    'library' => 'brands',
                ],
            ]
        );
        $image_slider_items->add_control(
            'slider_subtitle',
            [
                'label' => esc_html__('Subtitle', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );
        $image_slider_items->add_control(
            'slider_title',
            [
                'label' => esc_html__('Title', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $image_slider_items->add_control(
            'image_slide_btn_active',
            [
                'label' => esc_html__('Enable Button', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $image_slider_items->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'flexitype-lite'),
                'label_block' => false,
                'condition' => [
                    'image_slide_btn_active' => ['yes'],
                ],
            ]
        );
        $image_slider_items->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'label_block' => false,
                'exclude_inline_options' => ['svg'],
                'condition' => [
                    'image_slide_btn_active' => ['yes'],
                ],
            ]
        );
        $image_slider_items->add_control(
            'icon_align',
            [
                'label' => esc_html__('Icon Position', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', 'flexitype-lite'),
                    'right' => esc_html__('After', 'flexitype-lite'),
                ],
                'condition' => [
                    'button_icon[value]!' => '',
                    'image_slide_btn_active' => ['yes'],
                ],
            ]
        );
        $image_slider_items->add_control(
            'slider_url',
            [
                'label' => esc_html__('URL', 'flexitype-lite'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->add_control(
            'image_slider_item',
            [
                'label' => esc_html__('Slider Item', 'flexitype-lite'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $image_slider_items->get_controls(),
                'default' => [
                    [
                        'slide_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle' => esc_html__('Strategy', 'flexitype-lite'),
                        'slider_title' => esc_html__('Business strategy', 'flexitype-lite'),
                    ],
                    [
                        'slide_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'slider_subtitle' => esc_html__('Resource', 'flexitype-lite'),
                        'slider_title' => esc_html__('Human Resource', 'flexitype-lite'),
                    ],
                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );
        $this->add_control(
            'content_active',
            [
                'label' => esc_html__('Slide Content Default Active', 'flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'flexitype-lite'),
                'label_off' => esc_html__('No', 'flexitype-lite'),
                'return_value' => 'content_active',
            ]
        );
        $this->add_control(
            'content_text_align',
            [
                'label' => esc_html__('Text Align', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_h_align',
            [
                'label' => esc_html__('Horizontal Align', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-content' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_v_align',
            [
                'label' => esc_html__('Vertical Align', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Bottom', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-content' => 'align-items: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_width',
            [
                'label' => esc_html__('Content Layout', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'inline',
                'options' => [
                    'inline' => [
                        'title' => esc_html__('Inline', 'flexitype-lite'),
                        'icon' => 'eicon-align-start-h',
                    ],
                    'full_width' => [
                        'title' => esc_html__('Full Width', 'flexitype-lite'),
                        'icon' => 'eicon-align-stretch-h',
                    ],
                ],
            ]
        );
        $this->add_control(
            'icon_box_position',
            [
                'label' => esc_html__('Icon Position', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'block',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'display: {{VALUE}}; flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_box_vertical',
            [
                'label' => esc_html__('Vertical Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Middle', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom', 'flexitype-lite'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'icon_box_position' => ['flex', 'row-reverse'],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_setting',
            [
                'label' => esc_html__('Settings', 'flexitype-lite'),
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
            ]
        );
        $this->add_control(
            'autoplay_slide',
            [
                'label' => esc_html__('Autoplay', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__('Yes', 'flexitype-lite'),
                    'no' => esc_html__('No', 'flexitype-lite'),
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
                'default' => 3,
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
                'default' => 1
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
        $this->add_control(
            'slider_content_position',
            [
                'label' => esc_html__('Content Position', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'relative' => esc_html__('Default', 'flexitype-lite'),
                    'absolute' => esc_html__('Absolute', 'flexitype-lite'),
                ],
                'default' => 'absolute',
                'label_block' => false,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-content' => 'position: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'slider_content_visibility',
            [
                'label' => esc_html__('Content Visibility', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'visibility_hidden' => esc_html__('Hidden', 'flexitype-lite'),
                    'visibility_visible' => esc_html__('Visible', 'flexitype-lite'),
                ],
                'default' => 'visibility_hidden',
                'label_block' => false,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__('Item Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'slider_tabs'
		);
		$this->start_controls_tab(
			'slider_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'flexitype-lite' ),
			]
		);        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slide_image_overlay',
                'label' => esc_html__( 'Background Overlay Color','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .flexitype_image_slider-item::after',
            ]
        );
        $this->add_responsive_control(
            'slide_image_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'slide_image_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype_image_slider-item::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'flexitype-lite' ),
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slide_image_hover_overlay',
                'label' => esc_html__( 'Background Overlay Color','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .flexitype_image_slider-item:hover::after,
                {{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item::after',
            ]
        );
        $this->add_control(
            'slider_hover_content_icon',
            [
                'label' => esc_html__('Icon', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-area-icon a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-area-icon a i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_icon_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-area-icon a i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-area-icon a i' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_subtitle_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-area span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-area span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_title',
            [
                'label' => esc_html__('Title', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_title_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-area h5 a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-area h5 a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_button',
            [
                'label' => esc_html__('Button', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_button_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype-button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype-button' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_button_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype-button' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype-button' => 'background: {{VALUE}}; border-color: {{VALUE}};',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content',
            [
                'label' => esc_html__('Content', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_control(
            'slider_hover_content_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-area' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-area' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'slider_content_visibility' => 'visibility_visible',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_y_position',
            [
                'label' => esc_html__('Content Y Position', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -80,
                        'max' => 0,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_slider.content_active .swiper-slide-active .flexitype_image_slider-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .flexitype_image_slider-item:hover .flexitype_image_slider-item-content' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Content Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'slider_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'slider_content_subtitle_typography',
                'selector' => '{{WRAPPER}} .flexitype_image_slider-item-area span',
            ]
        );
        $this->add_control(
            'slider_content_subtitle_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_content_title',
            [
                'label' => esc_html__('Title', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'slider_content_title_typography',
                'selector' => '{{WRAPPER}} .flexitype_image_slider-item-area h5',
            ]
        );
        $this->add_control(
            'slider_content_title_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'slider_content_title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area h5 a:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'slider_content_bg',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_content_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_icon_style',
            [
                'label' => esc_html__('Icon Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Hover Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background_hover',
            [
                'label' => esc_html__('Hover Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_icon_size',
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
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_width',
            [
                'label' => esc_html__('Max Width', 'flexitype-lite'),
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
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .flexitype_image_slider-item-area-icon i',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border_type',
				'selector' => '{{WRAPPER}} .flexitype_image_slider-item-area-icon i',
			]
		);
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .flexitype_image_slider-item-area-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'width',
            [
                'label' => esc_html__('Width (%)', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'width: {{SIZE}}%;',
                ]
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'normal_icon',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .flexitype-button',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_color',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .flexitype-button',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button',
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_text',
            [
                'label' => esc_html__('Icon Style', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_icon_color',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_gap',
            [
                'label' => esc_html__('Gap', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => esc_html__('Font Size', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_position',
            [
                'label' => esc_html__('Vertical Position', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_rotate',
            [
                'label' => esc_html__('Rotate (deg)', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover_icon',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_color',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_border_type',
				'selector' => '{{WRAPPER}} .flexitype-button:hover',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hover_box_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button:hover',
            ]
        );
        $this->add_responsive_control(
            'hover_btn_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_transition',
            [
                'label' => esc_html__('Transition Duration', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'transition: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .flexitype-button i' => 'transition: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'hover_btn_icon_text',
            [
                'label' => esc_html__('Icon Style', 'flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'hover_btn_icon_color',
            [
                'label' => esc_html__('Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_icon_color',
            [
                'label' => esc_html__('Background', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_btn_icon_rotate',
            [
                'label' => esc_html__('Rotate (deg)', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        $settings = $this->get_settings_for_display();
        $uniqueId = wp_rand(10, 1000);



        ?>

        <div class="flexitype_slider <?php echo esc_attr($settings['content_active']); ?>">
            <div class="swiper flexitype_slide<?php echo esc_attr($uniqueId); ?> slide_box">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['image_slider_item'] as $key => $item):

                        if (!empty($item['slider_url']['url'])) {
                            $this->add_link_attributes('slider_url', $item['slider_url']);
                        }
                        $link_key = 'link_' . $key;
                        $this->add_link_attributes($link_key, $item['slider_url']);
                        ?>
                        <div class="swiper-slide">
                            <div class="flexitype_image_slider-item <?php echo esc_attr($settings['slider_content_visibility']); ?>">
                                <img src="<?php echo esc_url($item['slide_image']['url']) ?>" alt="image">
                                <div class="flexitype_image_slider-item-content">
                                    <div
                                        class="flexitype_image_slider-item-area <?php echo esc_attr($settings['content_width']); ?>">
                                        <div class="flexitype_image_slider-item-area-icon">
                                            <?php if ('yes' === $item['image_slide_link_icon_active']): ?>
                                                <a <?php $this->print_render_attribute_string($link_key); ?>>
                                                    <i class="<?php echo esc_attr($item['image_slide_link_icon_icon']['value']); ?>"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <?php if (!empty($item['slider_subtitle'])): ?>
                                                <span><?php echo esc_html($item['slider_subtitle']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($item['slider_title'])): ?>
                                                <h5>
                                                    <a <?php $this->print_render_attribute_string($link_key); ?>><?php echo esc_html($item['slider_title']); ?></a>
                                                </h5>
                                            <?php endif; ?>
                                            <?php if ('yes' === $item['image_slide_btn_active']): ?>
                                                <a class="flexitype-button <?php echo esc_attr($item['icon_align']); ?>" <?php $this->print_render_attribute_string($link_key); ?>>
                                                    <?php echo esc_html($item['btn_text']); ?>
                                                    <?php if (!empty($item['button_icon']['value'])): ?>
                                                        <i class="<?php echo esc_attr($item['button_icon']['value']); ?>"></i>
                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ('yes' === $settings['show_arrow']): ?>
                <div class="flexitype_slider-arrow <?php echo esc_attr($settings['arrow_align_position']); ?>">
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
        </div>
        <script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    var autoplayOption = <?php echo wp_json_encode($this->get_settings('autoplay_slide')); ?>;
                    var enableAutoplay = (autoplayOption === 'yes');
                    var swiper = new Swiper(".flexitype_slide<?php echo esc_attr($uniqueId); ?>", {
                        loop: true,
                        spaceBetween: <?php echo wp_json_encode($settings['slide_columns_gap']) ?>,
                        speed: <?php echo wp_json_encode($settings['slide_speed']) ?>,
                        autoplay: enableAutoplay ? {
                            delay: <?php echo wp_json_encode($settings['slide_delay']) ?>,
                            reverseDirection: false,
                            disableOnInteraction: false,
                        } : false,
                        navigation: {
                            prevEl: '.swiper-button-prev-<?php echo esc_attr($settings['unique_id']); ?>',
                            nextEl: '.swiper-button-next-<?php echo esc_attr($settings['unique_id']); ?>',
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

Plugin::instance()->widgets_manager->register(new FlexiType_ImageSlider);