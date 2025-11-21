<?php

if (!defined('ABSPATH')) {
    exit;
}

class Team_Member_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'team_member_card';
    }

    public function get_title() {
        return __('Team Member Card', 'team-member-card');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        // Content tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'team-member-card'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'member_name',
            [
                'label' => __('Name', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'John Doe',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'member_role',
            [
                'label' => __('Role', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Team Lead',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'member_bio',
            [
                'label' => __('Bio', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Add a brief bio about the team member here.',
                'rows' => 5,
            ]
        );

        $this->add_control(
            'member_photo',
            [
                'label' => __('Photo', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'linkedin_url',
            [
                'label' => __('LinkedIn URL', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://linkedin.com/in/username',
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();

        // Style tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'team-member-card'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label' => __('Card Background Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .team-member-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __('Name Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .team-member-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'role_color',
            [
                'label' => __('Role Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .team-member-role' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bio_color',
            [
                'label' => __('Bio Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#555555',
                'selectors' => [
                    '{{WRAPPER}} .team-member-bio' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Link Button Style Section
        $this->start_controls_section(
            'link_button_style_section',
            [
                'label' => __('Link Button', 'team-member-card'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'link_button_bg_color',
            [
                'label' => __('Background Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0077b5',
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_button_text_color',
            [
                'label' => __('Text Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .linkedin-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_button_hover_bg_color',
            [
                'label' => __('Hover Background Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005885',
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_button_hover_text_color',
            [
                'label' => __('Hover Text Color', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .linkedin-link:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_button_border_radius',
            [
                'label' => __('Border Radius', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '4',
                    'right' => '4',
                    'bottom' => '4',
                    'left' => '4',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'link_button_padding',
            [
                'label' => __('Padding', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_button_typography',
                'label' => __('Typography', 'team-member-card'),
                'selector' => '{{WRAPPER}} .linkedin-link',
                'fields_options' => [
                    'typography' => ['default' => 'custom'],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '14',
                        ],
                    ],
                    'font_weight' => [
                        'default' => '500',
                    ],
                ],
            ]
        );

        $this->add_control(
            'link_button_icon_size',
            [
                'label' => __('Icon Size', 'team-member-card'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .linkedin-link svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $name = $settings['member_name'];
        $role = $settings['member_role'];
        $bio = $settings['member_bio'];
        $photo = $settings['member_photo'];
        $linkedin = isset($settings['linkedin_url']['url']) ? $settings['linkedin_url']['url'] : '';
        $target = isset($settings['linkedin_url']['is_external']) && $settings['linkedin_url']['is_external'] ? 'target="_blank"' : '';
        $nofollow = isset($settings['linkedin_url']['nofollow']) && $settings['linkedin_url']['nofollow'] ? 'rel="nofollow"' : '';

        ?>
        <div class="team-member-card">
            <?php if (!empty($photo['url'])) : ?>
                <div class="team-member-photo">
                    <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($name); ?>">
                </div>
            <?php endif; ?>
            
            <div class="team-member-content">
                <?php if ($name) : ?>
                    <h3 class="team-member-name"><?php echo esc_html($name); ?></h3>
                <?php endif; ?>
                
                <?php if ($role) : ?>
                    <p class="team-member-role"><?php echo esc_html($role); ?></p>
                <?php endif; ?>
                
                <?php if ($bio) : ?>
                    <p class="team-member-bio"><?php echo esc_html($bio); ?></p>
                <?php endif; ?>
                
                <?php if ($linkedin) : ?>
                    <div class="team-member-linkedin">
                        <a href="<?php echo esc_url($linkedin); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="linkedin-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                            <span>LinkedIn</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var photo = settings.member_photo;
        var linkedin = settings.linkedin_url.url || '';
        var target = settings.linkedin_url.is_external ? 'target="_blank"' : '';
        var nofollow = settings.linkedin_url.nofollow ? 'rel="nofollow"' : '';
        #>
        <div class="team-member-card">
            <# if (photo.url) { #>
                <div class="team-member-photo">
                    <img src="{{ photo.url }}" alt="{{ settings.member_name }}">
                </div>
            <# } #>
            
            <div class="team-member-content">
                <# if (settings.member_name) { #>
                    <h3 class="team-member-name">{{{ settings.member_name }}}</h3>
                <# } #>
                
                <# if (settings.member_role) { #>
                    <p class="team-member-role">{{{ settings.member_role }}}</p>
                <# } #>
                
                <# if (settings.member_bio) { #>
                    <p class="team-member-bio">{{{ settings.member_bio }}}</p>
                <# } #>
                
                <# if (linkedin) { #>
                    <div class="team-member-linkedin">
                        <a href="{{ linkedin }}" {{{ target }}} {{{ nofollow }}} class="linkedin-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                            <span>LinkedIn</span>
                        </a>
                    </div>
                <# } #>
            </div>
        </div>
        <?php
    }
}
