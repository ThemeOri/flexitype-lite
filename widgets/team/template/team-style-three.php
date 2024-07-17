<?php if ('design-3' === $settings['select_design']): ?>
	<div class="flexitype_team_three-item">
		<div class="flexitype_team_three-item-image">
            <?php
            if ($team_image['url']) {
                if (!empty($team_image['alt'])) {
                    echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr($team_image['alt']) . '" />';
                } else {
                    echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr(__('No alt text', 'flexitype-elements')) . '" />';
                }
            } ?>
            <?php if ('yes' === $settings['show_social'] && !empty($settings['social_media'])): ?>
                <div class="flexitype_team_three-item-image-social">
                    <ul>
                            <?php foreach ($settings['social_media'] as $key => $item):

                                if (!empty($item['social_link']['url'])) {
                                    $this->add_link_attributes('social_link', $item['social_link']);
                                }
                                $link_key = 'link_' . $key;
                                $this->add_link_attributes($link_key, $item['social_link']);
                                ?>
                                <li><a <?php $this->print_render_attribute_string($link_key); ?>>
                                    <i class="<?php echo esc_attr($item['social_icon']['value']); ?>"></i>
                                </a></li>
                            <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flexitype_team_three-item-image-content">
                <h6>
                    <?php if ( ! empty( $settings['team_url']['url'] ) ) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'team_url' ); ?>>
                            <?php echo esc_html( $settings['title_one'] ); ?>
                        </a>
                    <?php else : ?>
                        <?php echo esc_html( $settings['title_one'] ); ?>
                    <?php endif; ?>
                </h6>
                <div>
                    <span><?php echo esc_html($settings['sub_title']); ?></span>
                </div>
            </div>
		</div>
	</div>
<?php endif; ?>