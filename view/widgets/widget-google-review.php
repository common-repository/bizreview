<?php 
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.2
  * @author     ThemeAtelier
  * @Websites: http://themeatelier.com
  *
  */
  
// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    die ( BIZREVIEW_ALERT_MSG );
}

/**************************************
*Creating About Widget
***************************************/
 
class bizreview_google_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'bizreview_google_widget',


// Widget name will appear in UI
esc_html__( 'Google Review [BizReview]', 'bizreview' ), 

// Widget description
array( 'description' => esc_html__( 'Add google review widget.', 'bizreview' ), ) 
);

}

// This is where the action happens
public function widget( $args, $instance ) {
$title 		= apply_filters( 'widget_title', $instance['title'] );
$placeid 	= apply_filters( 'widget_placeid', $instance['placeid'] );
$minrating 	= apply_filters( 'widget_minrating', $instance['minrating'] );
$maxrows 	= apply_filters( 'widget_maxrows', $instance['maxrows'] );
$placeinfo 	= apply_filters( 'widget_placeinfo', $instance['placeinfo'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

$globalPlaceID = get_option( 'bizreview_options' );

if( !empty( $placeid ) ) {
    $place_id = $placeid;
} else {
    $place_id = !empty( $globalPlaceID['gplaceid'] ) ? $globalPlaceID['gplaceid'] : '';
}

$data = bizreview_google_api( esc_html( $place_id ) );

/***********/
echo '<div class="review-widget-wrapper">';
if( $placeinfo  ) {
	bizreview_widget_google_place_info( $data );
} 

/********************/

if( !empty( $data['reviews'] ) ):

	$reviews = array_slice( $data['reviews'], 0, absint( $maxrows ) );

	foreach ( $reviews as $value ):

		if( $value['rating'] >= $minrating ) :

?>

<div class="bizr-google-review-inner single-wreview-item p-15px-lr p-30px-t p-30px-b">
	<div class="bizr-google--top">
		<?php 
		if( !empty( $value['profile_photo_url'] ) ):
		?>
		<div class="bizr-google--reviewer-img">
			<div class="review-platform">
				<i class="fab fa-google"></i>
			</div>
			<img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>">
			<?php
			if( !empty( $value['author_name'] ) ):
			?>
			<p class="bizr-google--reviewer-name"><strong><?php echo esc_html( $value['author_name'] ); ?></strong></p>
			<?php 
			endif;
			?>
		</div>
		<?php 
		endif;
		?>
		<div class="bizr-google--details">
			<div class="bizr-google--times">
				<?php echo esc_html( $value['relative_time_description'] ).' '.esc_html__( 'via Google', 'bizreview' ); ?>
			</div>
			<div class="bizr-google--rating">
				<?php bizreview_star_review( esc_html( $value['rating'] ) ); ?>
			</div>
		</div>
	</div>
	<?php 
	if( !empty( $value['text'] ) ):
	?>
	<div class="bizr-google--content">
		<p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
	</div>
	<?php 
	endif;
	?>
</div>

<?php 
	endif;
	endforeach;
	?>
	<div class="powered-by single-wreview-item p-15px text-center color-google">
		<p><?php esc_html_e( 'Powered by google.', 'bizreview' ); ?></p>
	</div>
</div>
	<?php
endif;

echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'Google Review', 'bizreview' );
}

//Place id
if ( isset( $instance[ 'placeid' ] ) ) {
	$placeid = $instance[ 'placeid' ];
}else {
	$placeid = '';
}
// Minimum rating
if ( isset( $instance[ 'minrating' ] ) ) {
	$minrating = $instance[ 'minrating' ];
}else {
	$minrating = '1';
}
//Max Rows
if ( isset( $instance[ 'maxrows' ] ) ) {
	$maxrows = $instance[ 'maxrows' ];
}else {
	$maxrows = '4';
}
// Place info
if ( isset( $instance[ 'placeinfo' ] ) ) {
	$placeinfo = $instance[ 'placeinfo' ];
}else {
	$placeinfo = '';
}


// Widget admin form
?>
<div class="mb-10">
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'bizreview'); ?></label> 
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</div>
<div class="mb-10">
	<label for="<?php echo esc_attr( $this->get_field_id( 'placeid' ) ); ?>"><?php esc_html_e( 'Place ID:' ,'bizreview'); ?></label> 
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'placeid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'placeid' ) ); ?>" type="text" value="<?php echo esc_attr( $placeid ); ?>" />
</div>
<div class="mb-10">
	<label for="<?php echo esc_attr( $this->get_field_id( 'minrating' ) ); ?>"><?php esc_html_e( 'Minimum Rating:' ,'bizreview'); ?></label> 
	<select id="<?php echo esc_attr( $this->get_field_id( 'minrating' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'minrating' ) ); ?>">
		<option value="1" <?php selected( $minrating, '1' ); ?>><?php esc_html_e( '1', 'bizreview' ); ?></option>
		<option value="2" <?php selected( $minrating, '2' ); ?>><?php esc_html_e( '2', 'bizreview' ); ?></option>
		<option value="3" <?php selected( $minrating, '3' ); ?>><?php esc_html_e( '3', 'bizreview' ); ?></option>
		<option value="4" <?php selected( $minrating, '4' ); ?>><?php esc_html_e( '4', 'bizreview' ); ?></option>
		<option value="5" <?php selected( $minrating, '5' ); ?>><?php esc_html_e( '5', 'bizreview' ); ?></option>
	</select>
</div>
<div class="mb-10">
	<label for="<?php echo esc_attr( $this->get_field_id( 'maxrows' ) ); ?>"><?php esc_html_e( 'Max Rows:' ,'bizreview'); ?></label>
	<select id="<?php echo esc_attr( $this->get_field_id( 'maxrows' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'maxrows' ) ); ?>">
		<option value="1" <?php selected( $maxrows, '1' ); ?>><?php esc_html_e( '1', 'bizreview' ); ?></option>
		<option value="2" <?php selected( $maxrows, '2' ); ?>><?php esc_html_e( '2', 'bizreview' ); ?></option>
		<option value="3" <?php selected( $maxrows, '3' ); ?>><?php esc_html_e( '3', 'bizreview' ); ?></option>
		<option value="4" <?php selected( $maxrows, '4' ); ?>><?php esc_html_e( '4', 'bizreview' ); ?></option>
		<option value="5" <?php selected( $maxrows, '5' ); ?>><?php esc_html_e( '5', 'bizreview' ); ?></option>
	</select>
</div>
<div class="mb-10">
	<label for="<?php echo esc_attr( $this->get_field_id( 'placeinfo' ) ); ?>"><?php esc_html_e( 'Place Info Show:' ,'bizreview'); ?></label> 
	<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'placeinfo' ) ); ?>" <?php checked( $placeinfo, 'on' ); ?> name="<?php echo esc_attr( $this->get_field_name( 'placeinfo' ) ); ?>" />
</div>
<p style="color: #e7711b;"><strong><?php echo sprintf( esc_html__( 'Find google %s place id %s', 'bizreview' ), '<a href="https://developers.google.com/places/place-id" target="_blank">', '</a>'  ); ?></strong></p>
<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	
	
$instance = array();
$instance['title'] 	  	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['placeid']  	= ( ! empty( $new_instance['placeid'] ) ) ? strip_tags( $new_instance['placeid'] ) : '';
$instance['minrating']  = ( ! empty( $new_instance['minrating'] ) ) ? strip_tags( $new_instance['minrating'] ) : '';
$instance['maxrows']  	= ( ! empty( $new_instance['maxrows'] ) ) ? strip_tags( $new_instance['maxrows'] ) : '';
$instance['placeinfo']  	= ( ! empty( $new_instance['placeinfo'] ) ) ? strip_tags( $new_instance['placeinfo'] ) : '';

return $instance;
}
} // Class  ends here


// Register and load the widget
function bizreview_goole_init_widget() {
	register_widget( 'bizreview_google_widget' );
}
add_action( 'widgets_init', 'bizreview_goole_init_widget' );
	

?>