<?php
/**
 * Plugin Name:  Lazy Blocks: CTA Button Control
 * Description:  SHORT_DESCRIPTION
 * Plugin URI:   PLUGIN_URL
 * Version:      1.0.0
 * Author:       Amor Kumar
 * Author URI:   https://amorkumar.com
 * License:      GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  TEXTDOMAIN
 *
 * @package lzb-Cta
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * NAMESPACE_Lzb_Plugin_Cta Class
 */
class NAMESPACE_Lzb_Plugin_Cta {

    /**
     * Plugin Path.
     *
     * @var string
     */
    public static $plugin_path;

    /**
     * Plugin URL.
     *
     * @var string
     */
    public static $plugin_url;

    /**
     * NAMESPACE_Lzb_Plugin_Cta constructor.
     */
    public function __construct() {}

    /**
     * Init.
     */
    public static function init() {
        add_action( 'init', array( 'NAMESPACE_Lzb_Plugin_Cta', 'plugins_loaded' ), 11 );
    }

    /**
     * Init of LazyBlocks available.
     */
    public static function plugins_loaded() {
        if ( ! class_exists( 'LazyBlocks' ) ) {
            return;
        }

        self::$plugin_path = plugin_dir_path( __FILE__ );
        self::$plugin_url  = plugin_dir_url( __FILE__ );

        // Translations.
        load_plugin_textdomain( 'TEXTDOMAIN', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        // Include control.
        include_once self::$plugin_path . '/controls/Cta.php';
    }
}

NAMESPACE_Lzb_Plugin_Cta::init();
