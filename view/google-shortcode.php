<?php 
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.2
  * @author     ThemeAtelier
  * @Websites: http://themeatelier.net
  *
  */

add_shortcode( 'bizr_google_place' , 'bizreview_google_place_shortcode' );
function bizreview_google_place_shortcode( $atts ) {

		$atts = shortcode_atts( array(
			'style' 	 => '1',
			'place_id' 	 => '',
			'place_info' => 'show',
			'max_rows' 	 => 5,
			'min_rating' => '1',
			'padding_top' => '50',
			'padding_bottom' => '50',
			'bg_color' 	  => '#fff',
		), $atts );

	ob_start();

	$globalPlaceID = get_option( 'bizreview_options' );

	if( !empty( $atts['place_id'] ) ) {
	    $place_id = $atts['place_id'];
	} else {
	    $place_id = !empty( $globalPlaceID['gplaceid'] ) ? $globalPlaceID['gplaceid'] : '';
	}

	$data = bizreview_google_api( esc_html( $place_id ) );


	/****************/

	$args = array(
		'data' => $data , 
		'atts' => $atts
	);


	bizreview_google_review_template_init( $args );


return ob_get_clean();


}