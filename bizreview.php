<?php
/*
Plugin Name:  BizReview - Business and google Place Review WordPress Plugin
Plugin URI:   https://wp-plugins.themeatelier.net/bizreview/
Description:  Bizreview Business and google Place Review WordPress Plugin for display Google Reviews & Ratings to increase user confidence, SEO and traffic of your Business.
Version:      1.5.3
Author:       ThemeAtelier
Author URI:   http://themeatelier.net
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  bizreview
Domain Path:  /languages
*/

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}

// Define Constants for direct access alert message.
if (!defined('BIZREVIEW_ALERT_MSG'))
    define('BIZREVIEW_ALERT_MSG', esc_html__('You should not access this file directly.!', 'bizreview'));

// Define constants for plugin directory path.
if (!defined('BIZREVIEW_DIR_PATH'))
    define('BIZREVIEW_DIR_PATH', plugin_dir_path(__FILE__));

// Define constants for view directory path.
if (!defined('BIZREVIEW_VIEW_DIR_PATH'))
    define('BIZREVIEW_VIEW_DIR_PATH', BIZREVIEW_DIR_PATH . 'view/');

// Define constants for plugin directory path.
if (!defined('BIZREVIEW_EW_DIR_PATH'))
    define('BIZREVIEW_EW_DIR_PATH', BIZREVIEW_VIEW_DIR_PATH . 'elementor-widgets/');

// Define constants for Google Frontend directory path.
if (!defined('BIZREVIEW_GF_DIR_PATH'))
    define('BIZREVIEW_GF_DIR_PATH', BIZREVIEW_VIEW_DIR_PATH . 'google-frontend/');

// Define constants for plugin dirname.
if (!defined('BIZREVIEW_DIR_NAME'))
    define('BIZREVIEW_DIR_NAME', dirname(__FILE__));

// Define constants for plugin directory path.
if (!defined('BIZREVIEW_DIR_URL'))
    define('BIZREVIEW_DIR_URL', plugin_dir_url(__FILE__));

// Define constants for plugin basenam.
if (!defined('BIZREVIEW_BASENAME'))
    define('BIZREVIEW_BASENAME', plugin_basename(__FILE__));

// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'bizreviewFree_settings_link');
function bizreviewFree_settings_link(array $links)
{
    $url = get_admin_url() . "admin.php?page=bizreview-setting-admin";
    $settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Settings', 'bizreview') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Pro version link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'bizreview_pro_link');
function bizreview_pro_link(array $links)
{
    $url = "http://1.envato.market/942x4";
    $settings_link = '<a target="_blank" style="color: #35b747; font-weight: 700;" href="' . esc_url($url) . '">' . esc_html__('Go Pro!', 'bizreview') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Script enqueue class include
require_once BIZREVIEW_DIR_PATH . 'inc/class-enqueue.php';

// Admin file include 
require_once BIZREVIEW_DIR_PATH . 'admin/admin.php';
require_once BIZREVIEW_DIR_PATH . 'inc/google-review/google-api-config.php';
require_once BIZREVIEW_DIR_PATH . 'inc/functions.php';

// google review template
require_once BIZREVIEW_GF_DIR_PATH . 'class-google-review-templates.php';

// View Shortcode
require_once BIZREVIEW_DIR_PATH . 'view/google-shortcode.php';
require_once BIZREVIEW_DIR_PATH . 'view/widgets/widget-google-review.php';
require_once BIZREVIEW_DIR_PATH . 'view/elementor-widgets/elementor-widget.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function bizreview_appsero_init()
{

    if (!class_exists('BizreviewAppSero\Insights')) {
        require_once BIZREVIEW_DIR_PATH . 'admin/appsero/Client.php';
    }

    $client = new BizreviewAppSero\Client('d2398cd0-524d-429e-9c19-c8ee84b0d48c', 'BizReview', __FILE__);
    // Active insights
    $client->insights()->init();
}

bizreview_appsero_init();
