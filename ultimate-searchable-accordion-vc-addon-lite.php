<?php
/*
  Plugin Name: Ultimate Searchable Accordion Lite - WPBakery Page Builder Addon
  Plugin URI:  https://1.envato.market/usva-wp
  Version: 1.0.0
  Description: The most powerful and advanced content searchable accordion addon for the WPBakery Page Builder. Easy to use and attractive, responsive layout fit any screen, which gives the best user experience for your users.
  Author: xenioushk
  Author URI:  https://bluewindlab.net/
  Text Domain: usa_vc
  Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (!class_exists('USA_VC_Addon')) {

    if ( !defined('USA_VC_PLUGIN_TITLE') ) {
        define("USA_VC_PLUGIN_TITLE", 'Ultimate Searchable Accordion Lite - WPBakery Page Builder Addon');
    }
        
    Class USA_VC_Addon {

        function __construct() {

            if (!defined('WPB_VC_VERSION')) {
                add_action('admin_notices', 'notice_usa_vc_addon_dependencies');
                return;
            }

            /*--- Addon COMMON CONSTANTS---*/

            define("USA_VC_PLUGIN_DIR", plugins_url() . '/ultimate-searchable-accordion-vc-addon-lite/');
            define("USA_VC_PLUGIN_VERSION", '1.0.0');
            define("USA_VC_PLUGIN_PRODUCTION_STATUS", 1); 

            $this->included_files();

            add_action("init", "usa_vc_addon_function");
            add_action("wp_enqueue_scripts", array($this, "enqueue_plugin_scripts"));
            add_action('admin_enqueue_scripts', array($this, 'usa_admin_vc_addon_style'));
            
            //Removed old shortcodes and introduced the following twos.
            add_shortcode('usa_vc_container', 'cb_usa_vc_container');
            add_shortcode('usa_vc_item', 'cb_usa_vc_item');
        }

        function included_files() {
            require_once ( __DIR__ . '/includes/usa-vc-element.php');
            require_once ( __DIR__ . '/includes/usa-vc-shortcodes.php');
        }

        function enqueue_plugin_scripts() {

            /*--- Add Custom Styles---*/

            wp_enqueue_style('usa-vc-animate-styles', plugins_url('assets/css/animate.css', __FILE__), array(), USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-font-awesome-styles', plugins_url('assets/css/font-awesome.min.css', __FILE__), array(), USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-font-awesome-shims-styles', plugins_url('assets/css/v4-shims.min.css', __FILE__), array(), USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-accordion-styles', plugins_url('assets/css/styles.css', __FILE__), array(), USA_VC_PLUGIN_VERSION);

            /*---Add Custom JavaScripts----*/

            wp_register_script('usa-vc-bwlaccordion-script', plugins_url('assets/js/jquery.bwlaccordion.min.js', __FILE__), array('jquery'));
            wp_register_script('usa-vc-custom-script', plugins_url('assets/js/usa-vc-custom.js', __FILE__), array('jquery', 'usa-vc-bwlaccordion-script'), USA_VC_PLUGIN_VERSION, TRUE);
            
        }

        function usa_admin_vc_addon_style() {

            wp_register_style('usa-vc-admin-style', plugins_url('/admin/css/usa-vc-admin-style.css', __FILE__), false, '1.0.0', false);
            wp_enqueue_style('usa-vc-admin-style');
        }

    }

    // Check Dependeines.

    function notice_usa_vc_addon_dependencies() {
        if (!defined('WPB_VC_VERSION')) {
            $plugin_data = get_plugin_data(__FILE__);
            echo '
        <div class="updated">
          <p><strong>' . USA_VC_PLUGIN_TITLE . '</strong> requires <strong><a href="https://1.envato.market/VKEo3" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.</p>
        </div>';
        }
    }

    /*--- Initialization---*/

        new USA_VC_Addon();

}

/*---  TRANSLATION FILE---*/

load_plugin_textdomain('usa_vc', false, plugin_basename(dirname(__FILE__)) . '/languages/');