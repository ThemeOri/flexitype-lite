<?php if ('design-2' === $settings['select_design']): ?>
    <?php if ('yes' === $settings['active_slider']) : ?>
        <div class="flexitype_slider">
            <div class="swiper flexitype-sliders-<?php echo esc_attr($sliderId);?> slide_box">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                        <div class="flexitype_testimonial_one-item swiper-slide">
                            <div class="flexitype_testimonial_one-item-client">
                                <?php if (!empty($settings['testimonial_quote_icon']['value'])):?>
                                    <div class="flexitype_testimonial_one-item-icon">				
                                        <i class="<?php echo esc_attr($settings['testimonial_quote_icon']['value']); ?>"></i>
                                    </div>
                                <?php endif;?>
                                <?php if (!empty($slide['avatar_image']['url'])): ?>
                                    <div class="flexitype_testimonial_one-item-client-image">
                                        <img src="<?php echo esc_url($slide['avatar_image']['url']) ?>" alt="avatar">
                                    </div>
                                <?php endif; ?>
                                <div class="flexitype_testimonial_one-item-client-title">
                                    <h6><?php echo esc_html($slide['test_title']); ?></h6>
                                    <span><?php echo esc_html($slide['test_subtitle']); ?></span>
                                </div>
                            </div>
                            <p><?php echo esc_html($slide['test_description']); ?></p>
                            <?php if (!empty($settings['testimonial_rating_icon']['value'])):?>
                                <div class="flexitype_testimonial_one-item-reviews">
                                    <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                                    <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                                    <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                                    <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                                    <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                                </div>
                            <?php endif;?>
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
            <?php if ('yes' === $settings['show_dots']) : ?>
                <div class="flexitype_slider-dots">
                    <div class="flexitype_slide_dots-<?php echo esc_attr($settings['unique_id']); ?>"></div>
                </div>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="flexitype_testimonial <?php echo esc_attr($grid_columns); ?>">
            <?php foreach ($settings['testimonial_items'] as $slide) : ?>
                <div class="flexitype_testimonial_one-item">
                    <div class="flexitype_testimonial_one-item-client">
                        <?php if (!empty($settings['testimonial_quote_icon']['value'])):?>
                            <div class="flexitype_testimonial_one-item-icon">				
                                <i class="<?php echo esc_attr($settings['testimonial_quote_icon']['value']); ?>"></i>
                            </div>
                        <?php endif;?>
                        <?php if (!empty($slide['avatar_image']['url'])): ?>
                            <div class="flexitype_testimonial_one-item-client-image">
                                <img src="<?php echo esc_url($slide['avatar_image']['url']) ?>" alt="avatar">
                            </div>
                        <?php endif; ?>
                        <div class="flexitype_testimonial_one-item-client-title">
                            <h6><?php echo esc_html($slide['test_title']); ?></h6>
                            <span><?php echo esc_html($slide['test_subtitle']); ?></span>
                        </div>
                    </div>
                    <p><?php echo esc_html($slide['test_description']); ?></p>
                    <?php if (!empty($settings['testimonial_rating_icon']['value'])):?>
                        <div class="flexitype_testimonial_one-item-reviews">
                            <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                            <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                            <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                            <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                            <i class="<?php echo esc_attr($settings['testimonial_rating_icon']['value']); ?>"></i>
                        </div>
                    <?php endif;?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>