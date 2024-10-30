<?php
if( !defined( 'WPINC' ) ){
    die;
}
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.2
  * @author     ThemeAtelier
  * @Websites: http://themeatelier.net
  *
  */


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Bizreview_El_Widgets' ) ) {
    /**
     * Main Bizreview Elementor Widgets Class
     *
     *
     * @since 1.7.0
     */
    final class Bizreview_El_Widgets {
        /**
         *
         * Holds the version of the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string The plugin version.
         */
        const  VERSION = '1.0' ;
        /**
         * Minimum Elementor Version
         *
         * Holds the minimum Elementor version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const  MINIMUM_ELEMENTOR_VERSION = '1.7.0';
        /**
         * Minimum PHP Version
         *
         * Holds the minimum PHP version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Instance
         *
         * Holds a single instance of the `Press_Elements` class.
         *
         * @since 1.7.0
         *
         * @access private
         * @static
         *
         * @var Press_Elements A single instance of the class.
         */
        private static  $_instance = null ;

        /**
         * Instance
         *
         * Ensures only one instance of the class is loaded or can be loaded.
         *
         * @since 1.7.0
         *
         * @access public
         * @static
         *
         * @return Press_Elements An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Clone
         *
         * Disable class cloning.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'bizreview' ), '1.7.0' );
        }

        /**
         * Wakeup
         *
         * Disable unserializing the class.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden.
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'bizreview' ), '1.7.0' );
        }

        /**
         * Constructor
         *
         * Initialize the elementor widgets.
         *
         * @since 1.7.0
         *
         * @access public
         */
        public function __construct() {
           
            $this->init_hooks();
            do_action( 'press_elements_loaded' );
        }


        /**
         * Init Hooks
         *
         * Hook into actions and filters.
         *
         * @since 1.7.0
         *
         * @access private
         */
        private function init_hooks() {
            add_action( 'init', [ $this, 'init' ] );
        }


        /**
         * Init Elementor Widget
         *
         * Load the plugin after Elementor (and other plugins) are loaded.
         *
         * @since 1.0.0
         * @since 1.7.0 The logic moved from a standalone function to this class method.
         *
         * @access public
         */
        public function init() {


            // Check for required PHP version

            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return;
            }

            // Add new Elementor Categories
            add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_category' ] );
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_styles' ] );

            // Register New Widgets
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

            // Companion enqueue style and scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_element_widgets_scripts' ] );

        }



        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @access public
         */
        public function admin_notice_minimum_php_version() {
            $message = sprintf(
            /* translators: 1: PHP 2: Required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bizreview' ),
                '<strong>' . esc_html__( 'BizReview', 'bizreview' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'bizreview' ) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Add new Elementor Categories
         *
         * Register new widget categories for BizReview widgets.
         *
         * @access public
         */
        public function add_elementor_category() {

            \Elementor\Plugin::instance()->elements_manager->add_category( 'bizreview-elements', [
                'title' => __( 'BizReview Review Elements', 'bizreview' ),
            ], 1 );

        }

        /**
         * Enqueue Widgets Scripts
         *
         * Enqueue custom scripts required to run elementor widgets.
         *
         * @access public
         */
        public function enqueue_element_widgets_scripts() {

             
        }

        /**
         * Register Widget Styles
         *
         * Register custom styles required to run.
         *
         * @access public
         */
        public function register_widget_styles() {
            // Typing Effect
            wp_enqueue_style( 'bizreview-elementor-edit', plugins_url( '/assets/css/elementor-edit.css', __FILE__ ) );
        }


        /**
         * Register New Widgets
         *
         * Include widgets files and register them in Elementor.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function on_widgets_registered() {
            $this->include_widgets();
            $this->register_widgets();
        }

        /**
         * Include Widgets Files
         *
         * Load bizreview companion widgets files.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function include_widgets() {
            require_once BIZREVIEW_EW_DIR_PATH . 'widgets/google-review.php';
        }

        /**
         * Register Widgets
         *
         * Register bizreview companion widgets.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function register_widgets() {
            //  Register elements widgets   
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Bizreviewelementor\Widgets\Bizreview_Google() );
        }

    }
}
// Make sure the same function is not loaded twice in free/premium versions.



if ( !function_exists( 'bizreview_el_widgets_load' ) ) {
    /**
     * Load Bizreview elementor widget
     *
     * Main instance of Press_Elements.
     *
     * @since 1.0.0
     * @since 1.7.0 The logic moved from this function to a class method.
     */
    function bizreview_el_widgets_load() {
        return Bizreview_El_Widgets::instance();
    }

    // Run elementor widget
    bizreview_el_widgets_load();
}


add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style('elementor-global');
});