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

// Google api
function bizreview_google_api( $placeid = '' ) {

  $option = get_option( 'bizreview_options' );

	$args = array(
		'apikey'  => $option['gookey'] ,
		'placeid' => esc_html( $placeid )
	);

	$obj = new BizReview_Google_API( $args );

	return $obj->get_place_data();

}


/**
 * Rating helper function
 *
 *
 */

function bizreview_star_review( $rating ) {

    $j = 0;
    for( $i = 0; $i <= 4; $i++ ) {
      $j++;

      if( $rating  >= $j   || $rating  == '5'   ) {
         echo '<i class="fas fa-star"></i>';
      }elseif( $rating < $j && $rating  > $i )
      {
         echo '<i class="fas fa-star-half-alt"></i>';                     

      } else {
         echo '<i class="far fa-star"></i>';
      }
    }

}

/**
 * Google Place info
 *
 *
 */

function bizreview_place_info( $data ) {

  ?>
  <div class="col-sm-12 text-center">
    <div class="place-info p-20px m-50px-b">
        <?php 
        if( !empty( $data['icon'] ) ):
        ?>
        <img src="<?php echo esc_url( $data['icon'] ); ?>" alt="<?php echo esc_attr( $data['name'] ); ?>" />
        <?php
        endif; 
        //
        if( !empty( $data['name'] ) ):
        ?>
       <h4><a href="<?php echo esc_url( $data['url'] ); ?>" target="_blank"><?php echo esc_html( $data['name'] ); ?></a></h4>
       <?php
        endif;
       //
       if( !empty( $data['formatted_address'] ) ):
       ?>
       <p><?php echo esc_html( $data['formatted_address'] ); ?></p>
       <?php 
        endif;
        //
        if( !empty( $data['formatted_phone_number'] ) ):
       ?>
       <p><?php echo esc_html( $data['formatted_phone_number'] ); ?></p>
       <?php 
        endif;

        //
        if( ! empty( $data['rating'] ) ) {

          echo '<div class="color-google">';
            echo '<strong>'.esc_html( $data['rating'] ).'</strong> ';
            bizreview_star_review( esc_html( $data['rating'] ) );
          echo '</div>';
        }

        //
        if( !empty( $data['user_ratings_total'] ) ):
       ?>
       <p><?php echo sprintf( esc_html__( 'Based on %s reviews', 'bizreview' ), esc_html( $data['user_ratings_total'] ) );  ?></p>

       <?php
        endif;          
       ?>
      <div class="powered-by color-google">
        <p><strong><?php esc_html_e( 'Powered by google.', 'bizreview' ); ?></strong></p>
      </div>
    </div>
  </div>
  <?php

}

/**
 * Widget Google Place info
 *
 *
 */

function bizreview_widget_google_place_info( $data ) {

  ?>
  <div class="widget-place-info text-center single-wreview-item p-15px">
      <?php 
      if( !empty( $data['icon'] ) ):
      ?>
      <img src="<?php echo esc_url( $data['icon'] ); ?>" alt="<?php echo esc_attr( $data['name'] ); ?>" />
      <?php
      endif;
      //
      if( !empty( $data['name'] ) ):
      ?>
     <h4><a href="<?php echo esc_url( $data['url'] ); ?>" target="_blank"><?php echo esc_html( $data['name'] ); ?></a></h4>
     <?php
      endif;
     //
     if( !empty( $data['formatted_address'] ) ):
     ?>
     <p><?php echo esc_html__( 'Address: ', 'bizreview' ).esc_html( $data['formatted_address'] ); ?></p>
     <?php 
      endif;
      //
      if( !empty( $data['formatted_phone_number'] ) ):
     ?>
     <p><?php echo esc_html__( 'Phone Number: ', 'bizreview' ).esc_html( $data['formatted_phone_number'] ); ?></p>
     <?php 
      endif;
     ?>
     
     <?php
     //
     if( ! empty( $data['rating'] ) ) {
        echo '<div class="widget-rating color-google">';
          echo '<strong>'.$data['rating'].'</strong> ';
          bizreview_star_review( $data['rating'] );
        echo '</div>';
     }
       
      //
      if( !empty( $data['user_ratings_total'] ) ):             
     ?>
     <p><?php echo sprintf( esc_html__( 'Based on %s reviews', 'bizreview' ), esc_html( $data['user_ratings_total'] ) );  ?></p>
      <?php 
      endif;
      ?>
  </div>
  <?php

}

/**
 * Google Review Templates init
 *
 *
 */

function bizreview_google_review_template_init( $args ) {


  $reviewObj = new Google_Review_Template( $args );

    // Style Switch
    switch ( $args['atts']['style'] ) {
        case '1':
            $reviewObj->biz_google_review_template_s1();
            break;
        case '2':
            $reviewObj->biz_google_review_template_s2();
            break;
        case '3':
            $reviewObj->biz_google_review_template_s3();
            break;
        case '4':
            $reviewObj->biz_google_review_template_s4();
            break;
        case '5':
            $reviewObj->biz_google_review_template_s5();
            break;
        case '6':
            $reviewObj->biz_google_review_template_s6();
            break;
        case '7':
            $reviewObj->biz_google_review_template_s7();
            break;
        case '8':
            $reviewObj->biz_google_review_template_s8();
            break;
        case '9':
            $reviewObj->biz_google_review_template_s9();
            break;
        case '10':
            $reviewObj->biz_google_review_template_s10();
            break;
        case '11':
            $reviewObj->biz_google_review_template_s11();
            break;
        case '12':
            $reviewObj->biz_google_review_template_s12();
            break;
        case '13':
            $reviewObj->biz_google_review_template_s13();
            break;
        case '14':
            $reviewObj->biz_google_review_template_s14();
            break;
        default:
            $reviewObj->biz_google_review_template_s1();
            break;
    }


}