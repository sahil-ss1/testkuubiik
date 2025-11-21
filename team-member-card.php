<?php
/**
 * Plugin Name: Team Member Card Elementor Widget
 * Description: Custom Elementor widget for team member cards
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit;
}

class Team_Member_Card_Plugin {

    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action('plugins_loaded', array($this, 'init'));
    }

    public function init() {
        // Check if Elementor is active
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'elementor_missing_notice'));
            return;
        }

        add_action('elementor/widgets/register', array($this, 'register_widgets'));
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets_old')); // legacy support
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'enqueue_styles'));
    }

    public function register_widgets($widgets_manager = null) {
        require_once plugin_dir_path(__FILE__) . 'widgets/team-member-card-widget.php';
        
        if ($widgets_manager) {
            $widgets_manager->register(new Team_Member_Card_Widget());
        } else {
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Team_Member_Card_Widget());
        }
    }

    public function register_widgets_old() {
        require_once plugin_dir_path(__FILE__) . 'widgets/team-member-card-widget.php';
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Team_Member_Card_Widget());
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'team-member-card-style',
            plugin_dir_url(__FILE__) . 'assets/css/team-member-card.css',
            array(),
            '1.0.0'
        );
    }

    public function elementor_missing_notice() {
        ?>
        <div class="notice notice-error">
            <p><?php _e('Team Member Card Widget requires Elementor to be installed and activated.', 'team-member-card'); ?></p>
        </div>
        <?php
    }
}

Team_Member_Card_Plugin::get_instance();
