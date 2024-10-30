<?php
namespace Bizreviewelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Elementor about page section widget.
 *
 * @since 1.0
 */
class Bizreview_Google extends Widget_Base {

	public function get_name() {
		return 'bizreview-google';
	}

	public function get_title() {
		return esc_html__( 'Google Review', 'bizreview' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'bizreview-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Google Review Settings ------------------------------
        $this->start_controls_section(
            'bizreview_google_set',
            [
                'label' => esc_html__( 'Google Review Settings', 'bizreview' ),
            ]
        );
        $this->add_control(
            'place_id', [
                'label' => esc_html__( 'Place ID', 'bizreview' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => '<a href="https://developers.google.com/places/place-id" target="_blank">Find google Place ID</a>'

            ]
        );
        $this->add_control(
            'style', [
                'label' => esc_html__( 'Style', 'bizreview' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '1',
                'options' => array(
                    '1'  => esc_html__( 'Style 1 (Grid)', 'bizreview' ),
                    '2'  => esc_html__( 'Style 2 (Grid)', 'bizreview' ),
                    '3'  => esc_html__( 'Style 3 (Grid)', 'bizreview' ),
                    '4'  => esc_html__( 'Style 4 (Grid)', 'bizreview' ),
                    '5'  => esc_html__( 'Style 5 (Grid)', 'bizreview' ),
                    '6'  => esc_html__( 'Style 6 (Grid)', 'bizreview' ),
                    '7'  => esc_html__( 'Style 7 (Grid)', 'bizreview' ),
                    '8'  => esc_html__( 'Style 8 (Masonary)', 'bizreview' ),
                    '9'  => esc_html__( 'Style 9 (Slider)', 'bizreview' ),
                    '10' => esc_html__( 'Style 10 (Slider)', 'bizreview' ),
                    '11' => esc_html__( 'Style 11 (Slider)', 'bizreview' ),
                    '12' => esc_html__( 'Style 12 (Slider)', 'bizreview' ),
                    '13' => esc_html__( 'Style 13 (Slider)', 'bizreview' ),
                    '14' => esc_html__( 'Style 14 (Slider)', 'bizreview' ),
                )

            ]
        );
        $this->add_control(
            'place_info', [
                'label' => esc_html__( 'Place Info', 'bizreview' ),
                'type'  => Controls_Manager::SWITCHER,
                'label_block' => true,
                'label_on' => esc_html__( 'Show', 'bizreview' ),
                'label_off' => esc_html__( 'Hide', 'bizreview' ),
                'return_value' => 'show',
                'default' => 'show',

            ]
        );
        $this->add_control(
            'max_rows', [
                'label' => esc_html__( 'Max Rows', 'bizreview' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '5',
                'options' => array(
                    '1' => esc_html__( '1', 'bizreview' ),
                    '2' => esc_html__( '2', 'bizreview' ),
                    '3' => esc_html__( '3', 'bizreview' ),
                    '4' => esc_html__( '4', 'bizreview' ),
                    '5' => esc_html__( '5', 'bizreview' ),
                )

            ]
        );
        $this->add_control(
            'min_rating', [
                'label' => esc_html__( 'Min Rating', 'bizreview' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => '1',
                'options' => array(
                    '1' => esc_html__( '1', 'bizreview' ),
                    '2' => esc_html__( '2', 'bizreview' ),
                    '3' => esc_html__( '3', 'bizreview' ),
                    '4' => esc_html__( '4', 'bizreview' ),
                    '5' => esc_html__( '5', 'bizreview' ),
                )

            ]
        );

        //
        
        $this->add_control(
            'padding_top', [
                'label'     => esc_html__( 'Section Padding Top', 'bizreview' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => '50'
            ]
        );
        $this->add_control(
            'padding_bottom', [
                'label'     => esc_html__( 'Section Padding Bottom', 'bizreview' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => '50'
            ]
        );
        $this->add_control(
            'bg_color', [
                'label'     => esc_html__( 'Section Background Color', 'bizreview' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff'
            ]
        );

        $this->end_controls_section(); // End section top content

	}

	protected function render() {

    $settings = $this->get_settings();

    // call load widget script
    $this->load_widget_script();
    
    //
    $globalPlaceID = get_option( 'bizreview_options' );

    if( !empty( $settings['place_id'] ) ) {
        $place_id = $settings['place_id'];
    } else {
        $place_id = !empty( $globalPlaceID['gplaceid'] ) ? $globalPlaceID['gplaceid'] : '';
    }

    $data = bizreview_google_api( $place_id );


    if( !empty( $data['reviews'] ) ):

    $args = array(
        'data' => $data, 
        'atts' => $settings
    );

    bizreview_google_review_template_init( $args );

    endif;


    }

    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
         (function($) {

            /* Window on load function */
            $(window).on('load', function () {
                $('.grid').isotope({
                // options
                itemSelector: '.grid-item',
                percentPosition: true,
                layoutMode: 'masonry'
            });
            
            });


            $(function() {

            /****************/ 
            let btSlider1 = $(".bt-slide-1");
            
            if( btSlider1.length ) {

                btSlider1.each( function() {

                    $(this).owlCarousel({
                        dots: true,
                        nav:true,
                        autoplay: true,
                        navText: ['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
                        responsive:{
                            0:{
                                    items:1
                            },
                            768:{
                                    items:1
                            },
                            991:{
                                    items:1
                            }
                        }
                    });

                } );

            }

            /****************/ 

            var action = false, clicked = false;
            var Owl = {

            init: function() {
                Owl.carousel();
            },

            carousel: function() {
                var owl;
                $(document).ready(function() {
                    
                    owl = $('.btImageDots').owlCarousel({
                        items     : 1,
                        center      : true,
                        dots       : true,
                        loop       : true,
                        dotsContainer: '.image-dots',
                        navText: ['prev','next'],
                    });

                    $('.image-dots-wrap').on('click', 'li', function(e) {
                        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
                    });
                });
            }
            };

            Owl.init();



            /****************/ 

            let btSlider2 = $(".bt-slide-2");

            if( btSlider2.length ) {

            btSlider2.each( function() {

                $(this).owlCarousel({
                        dots: false,
                        nav:true,
                        autoplay: true,
                        navText: ["<i class='icofont-thin-left'></i>","<i class='icofont-thin-right'></i>"],
                        responsive:{
                        0:{
                                items:1
                        },
                        768:{
                                items:2
                        },
                        991:{
                                items:3
                        }
                        }
                });

            } );

            }

            // More Button

            // Configure/customize these variables.
            var showChar = 100;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = "Show more >";
            var lesstext = "Show less";
                
            $('.biz-review-more').each(function() {
                var content = $(this).html();

                if(content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function(){
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });



            }) //




            })(jQuery);


        </script>
        <?php 
        }
    }
	
}
