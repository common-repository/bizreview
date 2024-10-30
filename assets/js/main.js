         
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


