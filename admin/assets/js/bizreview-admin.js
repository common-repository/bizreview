( function($) {
	"use strict";

	$( '.bizreview-tab' ).on( 'click', function() {

		let $selector = $(this).attr('href');

		$('.bizr-active').removeClass('bizr-active').addClass('bizr-hide');

		$($selector).removeClass('bizr-hide').addClass('bizr-active');

	} );


	/******************************

	Shortcode Generator Options

	******************************/
	
	// Selectors 
	var $reviewtype = $('#reviewtype'),
		$buttonArea = $('.button-area'),
		$reviewcat  = $( '#reviewcat' ),
		$gpid 		= $('#gpid'),
		$gplaceinfo = $('#gplaceinfo'),
		$bizstyle 	= $("#bizstyle"),
		$max_rows 	= $("#max_rows"),
		$min_rating = $("#min_rating"),
		$padding_top = $("#padding_top"),
		$padding_bottom = $("#padding_bottom"),
		$bg_color = $("#bg_color"),
		$scodeShow  = $('.scode-show'),
		$scodeCopy  = $( '#scode-copy' );



	// Default events
	$buttonArea.hide();

	if( $reviewtype.val() == '' ) {

		$reviewcat.hide()
		$gpid.hide()
		$gplaceinfo.hide()
		$bizstyle.hide()
		$max_rows.hide()
		$min_rating.hide()
		$padding_top.hide()
		$padding_bottom.hide()
		$bg_color.hide()
	}

	$scodeCopy.hide();

	// Review Type on change events
	
	$reviewtype.on( 'change', function() {

		$buttonArea.show();

		if( $(this).val() == 'bizr_google_place' ) {

			$reviewcat.hide()
			$gpid.show()
			$gplaceinfo.show()
			$bizstyle.show()
			$max_rows.show()
			$min_rating.show()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		}else if( $(this).val() == 'bizr_custom_reviews' ) {

			$reviewcat.show()
			$gpid.hide()
			$gplaceinfo.hide()
			$bizstyle.show()
			$max_rows.show()
			$min_rating.show()
			$padding_top.show()
			$padding_bottom.show()
			$bg_color.show()

		}else {

			$reviewcat.hide()
			$gpid.hide()
			$bizstyle.hide()
			$gplaceinfo.hide()
			$max_rows.hide()
			$min_rating.hide()
			$padding_top.hide()
			$padding_bottom.hide()
			$bg_color.hide()
		}
		

	});

	$( '#scodegenerate' ).on( 'click', function() {

		var $attr ='';

		var $reviewtype = $('#reviewtype').val();

		//
		if( $reviewcat.is(":visible") ) {
			$attr += ' cat="'+$reviewcat.val()+'"';
		}
		//
		if( $gplaceinfo.is(":visible") ) {
			$attr += ' place_info="'+$gplaceinfo.val()+'"';
		}
		//
		if( $gpid.is(":visible") ) {
			$attr += ' place_id="'+$gpid.val()+'"';
		}
		//
		if( $max_rows.is(":visible") ) {
			$attr += ' max_rows="'+$max_rows.val()+'"';
		}
		//
		if( $min_rating.is(":visible") ) {
			$attr += ' min_rating="'+$min_rating.val()+'"';
		}
		//
		if( $padding_top.is(":visible") ) {
			$attr += ' padding_top="'+$padding_top.val()+'"';
		}
		//
		if( $padding_bottom.is(":visible") ) {
			$attr += ' padding_bottom="'+$padding_bottom.val()+'"';
		}
		//
		if( $bg_color.is(":visible") ) {
			$attr += ' bg_color="'+$bg_color.val()+'"';
		}
		//
		if( $bizstyle.is(":visible") ) {
			$attr += ' style="'+$bizstyle.val()+'"';
		}

		$scodeShow.fadeIn('slow');
		$scodeCopy.show();
		$scodeShow.html( '<p class="shortcodearea">['+$reviewtype+' '+$attr+']</p>' );

	});


    // Copy shortcode
    $scodeCopy.on( 'click', function() {

        var $shortcode = $('.shortcodearea');

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($shortcode.text()).select();
        document.execCommand("copy");
        $temp.remove();

        $scodeShow.fadeIn('slow').fadeOut('slow');
        $(this).fadeOut('slow');


    } );


} )(jQuery);