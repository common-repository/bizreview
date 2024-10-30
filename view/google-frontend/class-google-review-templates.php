<?php 
class Google_Review_Template {


   public static $getData;

   function __construct( array $args ) {

      self::$getData = $args;

   }

   // Template Style 1
   public function biz_google_review_template_s1() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
         <?php
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }
         
         // 
         
         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <div class="col-md-6">
            <div class="white-bg bt-shadow-1 p-35px m-15px-t m-15px-b">
               <div class="row">
                  <?php 
                  if( !empty( $value['profile_photo_url'] ) ):
                  ?>
                  <div class="col-md-auto m-15px-b">
                     <div class=" bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2">
                        <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                     </div>
                  </div>
                  <?php 
                  endif;
                  ?>
                  <div class="col-md-auto d-flex align-items-center">
                     <div class="bt-testimonial-grid-title-address">
                        <?php 
                        if( !empty( $value['author_name'] ) ):
                        ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                        <?php 
                        endif;
                        ?>
                        <p class="bt-testimonial-address bt-no-margin">
                           <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                        </p>
                     </div>
                  </div>
                  <div class="col d-flex align-items-center text-left m-15px-b">
                     <?php 
                     if( ! empty( $value['rating'] ) ):
                     ?>
                     <div class="bt-rattings">
                        <?php
                        bizreview_star_review( esc_html( $value['rating'] ) );
                        ?>
                     </div>
                     <?php 
                     endif;
                     ?>

                  </div>
               </div>
               <div class="bt-testimonial-text">
                  <?php 
                  if( !empty( $value['text'] ) ):
                  ?>
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                  <?php 
                  endif;
                  ?>
               </div>
            </div>
         </div>
         <?php
                  endif;
            endforeach;
         endif;

         ?>
      </div>
      </div>
      </section>

      <?php
   } 

   // Template style 2
   function biz_google_review_template_s2 () {


      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
         <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
         <div class="container">
         <div class="row">
            <?php

            // Place info
            if( $atts['place_info'] == 'show' ) {
               bizreview_place_info( $data );
            }


            if( !empty( $data['reviews'] ) ):

               $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
            <div class="col-lg-4 col-md-6">
               <div class="gray-bg-2 bt-shadow-1 p-35px m-15px-t m-15px-b">
                  <div class="row">
                     <?php 
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                     <div class="col-auto">
                        <div class=" bt-avater bt-avater-circle bt-overflow-hidden m-15px-b">
                           <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                        </div>
                     </div>
                     <?php 
                     endif;
                     ?>
                     <div class="col-auto d-flex align-items-center">
                        <div class="bt-testimonial-grid-title-address m-15px-b">
                           <?php
                           if( !empty( $value['author_name'] ) ):
                           ?>
                           <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                           <?php
                           endif;
                           ?>
                           <p class="bt-testimonial-address bt-no-margin">
                              <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                           </p>
                           <?php
                           if( ! empty( $value['rating'] ) ):
                           ?>
                           <div class="bt-rattings">
                              <?php
                              bizreview_star_review( esc_html( $value['rating'] ) );
                              ?>
                           </div>
                           <?php 
                           endif;
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="bt-testimonial-text">
                     <?php 
                     if( !empty( $value['text'] ) ):
                     ?>
                     <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     <?php
                     endif;
                     ?>
                  </div>
               </div>
            </div>
            <?php
                     endif;
               endforeach;
            endif;

            ?>
         </div>
         </div>
         </section>

      <?php
   }

   // Template style 3
   function biz_google_review_template_s3() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

   ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
         <?php
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }

         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <div class="col-lg-4 col-md-6">
            <div class="white-bg bt-shadow-1 p-35px position-relative m-40px-t m-15px-b">
               <?php
               if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="bt-avater bt-avater-circle bt-overflow-hidden top-positioned-avater position-absolute bt-shadow-2">
                  <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
               </div>
               <?php 
               endif;
               ?>
               
               <div class="col-sm-12">
                  <div class="bt-testimonial-grid-title-address text-center m-15px-t m-15px-b">
                     <?php
                        if( !empty( $value['author_name'] ) ):
                     ?>
                     <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                     <?php
                        endif;
                     ?>
                     <p class="bt-testimonial-address bt-no-margin">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                     </p>
                     <?php 
                     if( ! empty( $value['rating'] ) ):
                     ?>
                     <div class="bt-rattings color-google">
                        <?php
                        bizreview_star_review( esc_html( $value['rating'] ) );
                        ?>
                     </div>
                     <?php
                     endif;
                     ?>
                  </div>
               </div>
               <div class="bt-testimonial-text">
                  <?php 
                  if( !empty( $value['text'] ) ):
                  ?>
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                  <?php 
                  endif;
                  ?>
               </div>
            </div>
         </div>
         <?php
                  endif;
            endforeach;
         endif;

         ?>
      </div>
      </div>
      </section>

   <?php
   }

   // Template style 4
   function biz_google_review_template_s4() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">

         <?php 
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }

         //
         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <div class="col-lg-4 col-md-6">
            <div class="gray-bg-2 bt-shadow-1 p-35px position-relative m-15px-t m-40px-b">
               <div class="col-sm-12">
                  <div class="bt-testimonial-grid-title-address text-center">
                     <?php 
                     if( !empty( $value['author_name'] ) ):
                     ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                     <?php 
                     endif;
                     ?>
                     <p class="bt-testimonial-address bt-no-margin">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                     </p>
                  </div>
               </div>
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <div class="bt-testimonial-text"><p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p></div>
               <?php 
               endif;
             //
               if( ! empty( $value['rating'] ) ):
               ?>
               <div class="bt-rattings color-google m-30px-b text-center">
                  <?php
                  bizreview_star_review( esc_html( $value['rating'] ) );
                  ?>
               </div>
               <?php 
               endif;
               //
               if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="bt-avater bt-avater-circle bt-overflow-hidden bottom-positioned-avater position-absolute bt-shadow-2">
                  <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
               </div>
               <?php 
               endif;
               ?>
            </div>
         </div>
         <?php
                  endif;
            endforeach;
         endif;

         ?>

      </div>
      </div>
      </section>
      <?php
   }

   // Template style 5
   function biz_google_review_template_s5() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
         <?php 
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }
         //
         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
         <div class="col-lg-4 col-md-6">
            <div class="white-bg bt-shadow-1 p-35px m-15px-t m-15px-b">
               <?php 
                  if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="col-sm-12">
                  <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto m-15px-b">
                     <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                  </div>
               </div>
               <?php 
               endif;
               ?>
               <div class="col-sm-12">
                  <div class="bt-testimonial-grid-title-address text-center m-15px-b">
                     <?php 
                     if( !empty( $value['author_name'] ) ):
                     ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                     <?php 
                     endif;
                     ?>
                     <p class="bt-testimonial-address bt-no-margin">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                     </p>
                     <?php
                     if( ! empty( $value['rating'] ) ):
                     ?>
                     <div class="bt-rattings color-google">
                        <?php
                        bizreview_star_review( esc_html( $value['rating'] ) );
                        ?>
                     </div>
                     <?php 
                     endif;
                     ?>
                  </div>
               </div>
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <div class="bt-testimonial-text">
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
               </div>
               <?php 
               endif;
               ?>
            </div>
         </div>
         <?php
                  endif;
            endforeach;
         endif;

         ?>

      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 6
   function biz_google_review_template_s6() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">

         <?php
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }
         //
         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>
          <!-- Start single service  -->
         <div class="col-lg-4 col-md-6">
            <div class="gray-bg-2 bt-shadow-1 p-35px m-15px-t m-15px-b">
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <div class="bt-testimonial-text">
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
               </div>
               <?php 
               endif;
               //
               if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto">
                  <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
               </div>
               <?php 
               endif;
               ?>
               <div class="col-sm-12">
                  <div class="bt-testimonial-grid-title-address text-center m-15px-t">
                     <?php 
                     if( !empty( $value['author_name'] ) ):
                     ?>
                     <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                     <?php 
                     endif;
                     ?>
                     <p class="bt-testimonial-address bt-no-margin">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                     </p>
                     <div class="bt-rattings color-google">
                     <?php
                     bizreview_star_review( esc_html( $value['rating'] ) );
                     ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End single service  -->
         <?php
                  endif;
            endforeach;
         endif;

         ?>

      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 7
   function biz_google_review_template_s7() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
      <?php 
      // Place info
      if( $atts['place_info'] == 'show' ) {
         bizreview_place_info( $data );
      }

      //
      if( !empty( $data['reviews'] ) ):

         $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

         foreach ( $reviews as $value ):

            if( $value['rating'] >= $atts['min_rating'] ) :
      ?>
      <div class="col-lg-4 col-md-6">
         <div class="black-bg white-text bt-shadow-1 p-35px bt-radius-3 m-15px-t m-15px-b">
            <?php 
               if( !empty( $value['text'] ) ):
            ?>
            <div class="bt-testimonial-text">
               <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
            </div>
            <?php
            endif; 
            //
            if( !empty( $value['profile_photo_url'] ) ):
            ?>
            <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto">
               <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
            </div>
            <?php 
            endif;
            ?>

            <div class="col-sm-12">
               <div class="bt-testimonial-grid-title-address text-center m-15px-t">
                  <?php 
                     if( !empty( $value['author_name'] ) ):
                  ?>
                  <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                  <?php
                     endif;
                  ?>
                  <p class="bt-testimonial-address bt-no-margin">
                     <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                  </p>
                  <?php 
                  if( ! empty( $value['rating'] ) ):
                  ?>
                  <div class="bt-rattings color-google">
                     <?php
                     bizreview_star_review( esc_html( $value['rating'] ) );
                     ?>
                  </div>
                  <?php 
                  endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
      <?php
               endif;
         endforeach;
      endif;
      ?>

      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 8
   function biz_google_review_template_s8() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <?php 
      // Place info
      if( $atts['place_info'] == 'show' ) {
         echo '<div class="row">';
         bizreview_place_info( $data );
         echo '</div>';
      }
      ?>
      <div class="row grid">
      <?php
      //
      if( !empty( $data['reviews'] ) ):

         $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

         foreach ( $reviews as $value ):

            if( $value['rating'] >= $atts['min_rating'] ) :
      ?>
      <div class="col-lg-4 col-md-6 grid-item">
         <div class="black-bg white-text bt-shadow-1 p-35px bt-radius-3 m-15px-t m-15px-b">
            <?php 
            if( !empty( $value['text'] ) ):
            ?>
            <div class="bt-testimonial-text">
               <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
            </div>
            <?php
            endif; 
            //
            if( !empty( $value['profile_photo_url'] ) ):
            ?>
            <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto">
               <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
            </div>
            <?php 
            endif;
            ?>
            <div class="col-sm-12">
               <div class="bt-testimonial-grid-title-address text-center m-15px-t">
                  <?php 
                  if( !empty( $value['author_name'] ) ):
                  ?>
                  <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                  <?php 
                  endif;
                  ?>
                  <p class="bt-testimonial-address bt-no-margin">
                     <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                  </p>
                  <?php
                  if( ! empty( $value['rating'] ) ):
                  ?>
                  <div class="bt-rattings color-google">
                     <?php
                     bizreview_star_review( esc_html( $value['rating'] ) );
                     ?>
                  </div>
                  <?php 
                  endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
      <?php
               endif;
         endforeach;
      endif;

      ?>

      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 9
   
   function biz_google_review_template_s9() {
      
      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
         <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
         <div class="container">
         <div class="row">
            <?php
            // Place info
            
            if( $atts['place_info'] == 'show' ) {
               bizreview_place_info( $data );
            }
            ?>
            <div class="bt-slide-1 bt-mid-control owl-carousel owl-theme">

               <?php 
               if( !empty( $data['reviews'] ) ):

                  $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

                  foreach ( $reviews as $value ):

                     if( $value['rating'] >= $atts['min_rating'] ) :
               ?>
               
               <div class="col-sm-12">
                  <div class="white-bg bt-shadow-1 p-50px m-15px-t m-15px-b">
                     <div class="row">
                     <?php
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                     <div class="col-md-auto m-15px-b">
                        <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2">
                           <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                        </div>
                     </div>
                     <?php
                     endif;
                     ?>

                        <div class="col-md-auto d-flex align-items-center">
                           <div class="bt-testimonial-grid-title-address">
                              <?php 
                              if( !empty( $value['author_name'] ) ):
                              ?>
                                 <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                              <?php 
                              endif;
                              ?>
                              <p class="bt-testimonial-address bt-no-margin">
                                 <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                              </p>
                           </div>
                        </div>
                        <div class="col d-flex align-items-center text-left m-15px-b">
                           <div class="bt-rattings color-google">
                              <?php
                              bizreview_star_review( esc_html( $value['rating'] ) );
                              ?>
                           </div>
                        </div>
                     </div>
                     <?php 
                     if( !empty( $value['text'] ) ):
                     ?>
                     <div class="bt-testimonial-text">
                        <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     </div>
                     <?php 
                     endif;
                     ?>
                  </div>
               </div>
            <?php
                     endif;
               endforeach;
            endif;

            ?>

               </div>
            
         </div>
         </div>
         </section>

      <?php
   }

   // Template Style 10
   function biz_google_review_template_s10() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
         <?php
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }
         ?>
         <div class="bt-slide-2 bt-mid-control owl-carousel owl-theme">

            <?php 
               if( !empty( $data['reviews'] ) ):

                  $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

                  foreach ( $reviews as $value ):

                     if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
            <div class="col-sm-12">
               <div class="gray-bg-2 bt-shadow-1 p-35px m-15px-t m-15px-b">
                  <div class="row">
                     <?php 
                     if( !empty( $value['profile_photo_url'] ) ):
                     ?>
                     <div class="col-auto">
                        <div class=" bt-avater bt-avater-circle bt-overflow-hidden m-15px-b">
                           <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                        </div>
                     </div>
                     <?php 
                     endif;
                     ?>
                     <div class="col-auto d-flex align-items-center">
                        <div class="bt-testimonial-grid-title-address m-15px-b">
                           <?php
                           if( !empty( $value['author_name'] ) ):
                           ?>
                           <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                           <?php
                           endif;
                           ?>
                           <p class="bt-testimonial-address bt-no-margin">
                              <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                           </p>
                           <div class="bt-rattings color-google">
                              <?php
                              bizreview_star_review( esc_html( $value['rating'] ) );
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="bt-testimonial-text">
                     <?php 
                     if( !empty( $value['text'] ) ):
                     ?>
                     <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                     <?php 
                     endif;
                     ?>
                  </div>
               </div>
            </div>
            <?php
                     endif;
               endforeach;
            endif;
            ?>

         </div>

      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 11

   function biz_google_review_template_s11() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
      <?php
      // Place info
      if( $atts['place_info'] == 'show' ) {
         bizreview_place_info( $data );
      }
      ?>
      <div class="bt-slide-2 bt-mid-control owl-carousel owl-theme">

         <?php 
         if( !empty( $data['reviews'] ) ):

            $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

            foreach ( $reviews as $value ):

               if( $value['rating'] >= $atts['min_rating'] ) :
         ?>

         <div class="col-md-12">
            <div class="white-bg bt-shadow-1 p-35px m-15px-t m-15px-b">
               <?php 
               if( !empty( $value['profile_photo_url'] ) ):
               ?>
               <div class="col-sm-12">
                  <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto m-15px-b">
                     <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                  </div>
               </div>
               <?php 
               endif;
               ?>
               <div class="col-sm-12">
                  <div class="bt-testimonial-grid-title-address text-center m-15px-b">
                     <?php 
                        if( !empty( $value['author_name'] ) ):
                     ?>
                     <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                     <?php 
                     endif;
                     ?>
                     <p class="bt-testimonial-address bt-no-margin">
                        <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                     </p>
                     <div class="bt-rattings color-google">
                        <?php
                        bizreview_star_review( esc_html( $value['rating'] ) );
                        ?>
                     </div>
                  </div>
               </div>
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <div class="bt-testimonial-text">
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
               </div>
               <?php 
               endif;
               ?>
            </div>
         </div>
         <?php
                  endif;
            endforeach;
         endif;
         ?>

      </div>


      </div>
      </div>
      </section>
      <?php
   }

   // Template Style 12
   function biz_google_review_template_s12() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];

      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
         <?php
         // Place info
         if( $atts['place_info'] == 'show' ) {
            bizreview_place_info( $data );
         }
         ?>
         <div class="bt-slide-2 bt-mid-control owl-carousel owl-theme">

            <?php 
            if( !empty( $data['reviews'] ) ):

               $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
            <div class="col-md-12">
               <div class="gray-bg-2 bt-shadow-1 p-35px m-15px-t m-15px-b">
                  <?php 
                  if( !empty( $value['text'] ) ):
                  ?>
                  <div class="bt-testimonial-text">
                     <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                  </div>
                  <?php 
                  endif;
                  //
                  if( !empty( $value['profile_photo_url'] ) ):
                  ?>
                  <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto">
                     <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                  </div>
                  <?php
                  endif;
                  ?>

                  <div class="col-sm-12">
                     <div class="bt-testimonial-grid-title-address text-center m-15px-t">
                        <?php
                        if( !empty( $value['author_name'] ) ):
                        ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                        <?php
                        endif;
                        ?>
                        <p class="bt-testimonial-address bt-no-margin">
                           <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                        </p>
                        <?php
                        if( ! empty( $value['rating'] ) ):
                        ?>
                        <div class="bt-rattings color-google">
                           <?php
                           bizreview_star_review( esc_html( $value['rating'] ) );
                           ?>
                        </div>
                        <?php
                        endif;
                        ?>
                     </div>
                  </div>

               </div>
            </div>
            <?php
                     endif;
               endforeach;
            endif;

            ?>  
         </div>
      </div>
      </div>
      </section>

      <?php
   }

   // Template Style 13
   function biz_google_review_template_s13() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
            <?php
            // Place info
            if( $atts['place_info'] == 'show' ) {
               bizreview_place_info( $data );
            }
            ?>
            <div class="bt-slide-2 bt-mid-control bt-mid-control-white owl-carousel owl-theme">
               
            <?php 
            if( !empty( $data['reviews'] ) ):

               $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );

               foreach ( $reviews as $value ):

                  if( $value['rating'] >= $atts['min_rating'] ) :
            ?>
            <div class="col-md-12">
               <div class="black-bg white-text bt-shadow-1 p-35px bt-radius-3 m-15px-t m-15px-b">
                  <?php
                  if( !empty( $value['text'] ) ):
                  ?>
                  <div class="bt-testimonial-text">
                     <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
                  </div>
                  <?php
                  endif; 
                  //
                  if( !empty( $value['profile_photo_url'] ) ):
                  ?>
                  <div class="bt-avater bt-avater-circle bt-overflow-hidden bt-shadow-2 m-auto">
                     <img src="<?php echo esc_url( $value['profile_photo_url'] ); ?>" alt="<?php echo esc_attr( $value['author_name'] ); ?>"/>
                  </div>
                  <?php
                  endif;
                  ?>
                  <div class="col-sm-12">
                     <div class="bt-testimonial-grid-title-address text-center m-15px-t">
                        <?php
                        if( !empty( $value['author_name'] ) ):
                        ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                        <?php
                        endif;
                        ?>
                        <p class="bt-testimonial-address bt-no-margin">
                           <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                        </p>
                        <div class="bt-rattings color-google">
                           <?php
                           bizreview_star_review( esc_html( $value['rating'] ) );
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
                     endif;
               endforeach;
            endif;

            ?>

            </div>
         </div>
         </div>
         </section>
      <?php
   }

   // Template Style 14
   function biz_google_review_template_s14() {

      $iterateData = self::$getData;

      $data = $iterateData['data'];
      $atts = $iterateData['atts'];


      ?>
      <section class="review-section" style="padding-top: <?php echo esc_attr( $atts['padding_top'] ); ?>px; padding-bottom: <?php echo esc_attr( $atts['padding_bottom'] ); ?>px;background-color: <?php echo esc_attr( $atts['bg_color'] ); ?>">
      <div class="container">
      <div class="row">
      <?php
      // Place info
      if( $atts['place_info'] == 'show' ) {
         bizreview_place_info( $data );
      }
      ?>
      <div class="owl-carousel btImageDots">

      <?php
      if( !empty( $data['reviews'] ) ):

         $reviews = array_slice( $data['reviews'], 0, absint( $atts['max_rows'] ) );
         $profileImg = '';

         $k = 0;
         foreach ( $reviews as $value ):

            if( $value['rating'] >= $atts['min_rating'] ) :



               if( !empty( $value['profile_photo_url'] ) ) {

                  $active = ( $k == 0  )  ? ' active' :''; 

                  $profileImg .= '<li class="bt-avater bt-avater-thumb'.esc_attr( $active ).'" data="'.esc_attr( $k ).'">
                  <img src="'.esc_url( $value['profile_photo_url'] ).'" alt="'.esc_attr( $value['author_name'] ).'">
               </li>';
               }


      ?>

         <div class="col-sm-12">
            <div class="gray-bg-2 bt-shadow-1 p-35px m-15px-t m-15px-b">
               <div class="row">
                  <div class="col-md-auto d-flex align-items-center">
                     <div class="bt-testimonial-grid-title-address">
                        <?php 
                        if( !empty( $value['author_name'] ) ):
                        ?>
                        <h4 class="bt-testimonial-grid-title bt-no-margin"><?php echo esc_html( $value['author_name'] ); ?></h4>
                        <?php 
                        endif;
                        ?>
                        <p class="bt-testimonial-address bt-no-margin">
                           <?php echo esc_html( $value['relative_time_description'] ).' '.__( 'via Google', 'bizreview' ); ?>
                        </p>
                     </div>
                  </div>
                  <?php 
                  if( ! empty( $value['rating'] ) ):
                  ?>
                  <div class="col d-flex align-items-center text-left m-15px-b">
                     <div class="bt-rattings color-google">
                     <?php
                     bizreview_star_review( esc_html( $value['rating'] ) );
                     ?>
                     </div>
                  </div>
                  <?php 
                  endif;
                  ?>

               </div>
               <?php 
               if( !empty( $value['text'] ) ):
               ?>
               <div class="bt-testimonial-text">
                  <p class="biz-review-more"><?php echo esc_html( $value['text'] ); ?></p>
               </div>
               <?php 
               endif;
               ?>
            </div>
         </div>
         <?php
         $k++;
                  endif;
            endforeach;
         endif;
         ?>

      </div>

      <div class="col-sm-12 image-dots-wrap arrow-up">
            <ul class="image-dots">
               <?php echo $profileImg; ?>
            </ul>
      </div>
      
   </div>
   </div>
   </section>
      <?php
   }



} // End Class