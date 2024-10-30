<?php
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.2
  * @author     ThemeAtelier
  * @Websites: http://themeatelier.net
  *
  */
 if( ! defined( 'ABSPATH' ) ) {
    die( BIZREVIEW_ALERT_MSG );
}

if( !class_exists( 'Bizreview_Enqueue' ) ){
	
	class Bizreview_Enqueue{
		
		public function __construct( $args = array() ) {
		
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_scripts' ) );
			
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}
		// Front-End enqueue scripts
		public function frontend_enqueue_scripts() {
			

			wp_enqueue_style( 'icofont', BIZREVIEW_DIR_URL.'assets/icofont/icofont.min.css', array(), '1.0', false );
			wp_enqueue_style( 'fontawesome-all', BIZREVIEW_DIR_URL.'assets/fontawesome/all.min.css', array(), '1.0', false );
			wp_enqueue_style( 'bizreview-bt-grid', BIZREVIEW_DIR_URL.'assets/css/bt-grid.css', array(), '1.0', false );
			wp_enqueue_style( 'owl-carousel', BIZREVIEW_DIR_URL.'assets/css/owl.carousel.min.css', array(), '1.0', false );
			wp_enqueue_style( 'owl-default', BIZREVIEW_DIR_URL.'assets/css/owl.theme.default.min.css', array(), '1.0', false );
			wp_enqueue_style( 'bizreview-main', BIZREVIEW_DIR_URL.'assets/css/main.css', array(), '1.0', false );
			
			/********************
				Js Enqueue
			********************/

			wp_enqueue_script( 'google-place', BIZREVIEW_DIR_URL.'inc/google-review/js/google-place.js', array('jquery'), '1.0', false );
			wp_enqueue_script( 'isotope-pkgd', BIZREVIEW_DIR_URL.'assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true );
			wp_enqueue_script( 'owl-carousel', BIZREVIEW_DIR_URL.'assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
			wp_enqueue_script( 'main-script', BIZREVIEW_DIR_URL.'assets/js/main.js', array('jquery'), '1.0.0', true );
			
			
		}
		
		// Admin enqueue scripts
		public function admin_enqueue_scripts() {
			
			// style			
			wp_enqueue_style( 'bizreview-admin', BIZREVIEW_DIR_URL.'/admin/assets/css/bizreview-admin.css', array(), '1.0', false );

			
			//wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'bizreview-admin', BIZREVIEW_DIR_URL.'/admin/assets/js/bizreview-admin.js', array('jquery' ), '1.0', true );
						
			
		}
		
		
	}

	$obj = new Bizreview_Enqueue();
}

