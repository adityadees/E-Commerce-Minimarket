(function($) {
    "use strict";
    
    /*----------------------------
       stickey menu
    ----------------------------*/
    $(window).on('scroll',function() {    
           var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
           }else{
            $(".sticky-header").addClass("sticky");
           }
    });

    /*----------------------------
    jQuery MeanMenu
    ------------------------------ */
    $('.mobile-menu nav').meanmenu({
        meanScreenWidth: "9901",
        meanMenuContainer: ".mobile-menu",
        onePage: true,
    });
    
    
    /* slider activation */
    $('.slider_active').owlCarousel({
        animateOut: 'fadeOut',
        autoplay: true,
		loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        dots:true,
    });
    
    /* small product activation */
    $('.small_product_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			480:{
				items:1,
			},	
			768:{
				items:1,
			},

		  }
    });
    
    /*  product activation */
    $('.product_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			480:{
				items:2,
			},	
			992:{
				items:3,
			},
            1200:{
				items:4,
			},

		  }
    });
    
  
    
    /*  featured activation */
    $('.featured_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 3,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
                nav:false,
			},
            480:{
				items:2,
			},
			
			1200:{
				items:3,
			},

		  }
		
    });
    
    /*  featured two activation */
    $('.featured_active_two ').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
			
			1200:{
				items:4,
			},

		  }
		
    });
    
    /*  featured three activation */
    $('.featured_active_three ').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 3,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
        
			768:{
				items:3,
			},

		  }
		
    });
     /*  featured activation */
    $('.f_active_four').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 3,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
                nav:false,
			},
            480:{
				items:2,
			},
            768:{
				items:3,
			},
            992:{
				items:2,
			},
            1200:{
				items:3,
			},

		  }
		
    });
    
    /*  brand activation */
    $('.brand_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 6,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:3,
			},
			768:{
				items:4,
			},	
			992:{
				items:5,
			},
            1200:{
				items:6,
			},

		  }
    });
    
     /*  brand two activation */
    $('.brand_active_two').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
			768:{
				items:1,
			},	

		  }
    });
    
    
    /*  blog activation */
    $('.blog_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
            480:{
                items:2,
            },
			768:{
				items:3,
			},	
			992:{
				items:4,
			},

		  }
    });
    
    /*  blog two activation */
    $('.blog_active_two').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
         responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
			768:{
				items:1,
			},	

		  }
    });
    
    /*  blog two activation */
    $('.categorie_banner_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 6,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
         responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:3,
			},
            768:{
				items:4,
			},
            992:{
				items:5,
			},
			1200:{
				items:6,
			},	

		  }
    });
    
     /*  blog thumb activation */
    $('.blog_thumb_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        dots:true,
    });
    
    
    
     /*  details_s_product_active activation */
    $('.details_s_product_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 6,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
         responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
            768:{
				items:3,
			},
            992:{
				items:4,
			},
			1200:{
				items:5,
			},	

		  }
    });
    
    
    
     /*  product fullwidth active activation */
    $('.product_fullwidth_active').owlCarousel({
        autoplay: true,
		loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 4,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
         responsiveClass:true,
		responsive:{
			0:{
				items:1,
			},
            480:{
				items:2,
			},
            768:{
				items:4,
			},

		  }
    });
    
    
    
    /*wow activation*/
    new WOW().init();
    

    /*--------------------------
     ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
	
    
    /*header currencu,languages slideToggle*/
    
    $(".currency").on("click", function() {
        $('.dropdown_currency').slideToggle('medium');
    });
    
    
    $(".languages").on("click", function() {
            $('.dropdown_languages').slideToggle('medium');
    }); 
    
    /*categories slideToggle*/
    
    $(".categori_toggle").on("click", function() {
            $('.categories_menu_inner').slideToggle('medium');
    }); 
    
    
    /*mini cart slideToggle*/
    $(".shopping_cart a").on("click", function() {
            $('.mini_cart').slideToggle('medium');
    }); 
    
    
    
    /*------addClass/removeClass-------*/
   $(".categories_menu_inner > ul > li > a, #cat_toggle.has-sub > a").on("click", function() {
        $(this).removeAttr('href');
        $(this).toggleClass('open').next('.categories_mega_menu,.categorie_sub').toggleClass('open');
        $(this).parents().siblings().find('.categories_mega_menu,#cat_toggle.has-sub > a').removeClass('open');
    });

    $('body').on('click', function (e) {
        var target = e.target;
        if (!$(target).is('.categories_menu_inner > ul > li > a') ) {
            $('.categories_mega_menu').removeClass('open');
        }
    });

	
	
    /*niceSelect*/
     $('select').niceSelect();
    
    
	
    /*countdown activation*/
		
	 $('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<div class="product_countdown"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">Days</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">hrs</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">secs</div></div></div>'));
       });
	});	
	

    
      /*----------------------------
    	slider-range here
    ------------------------------ */
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 0, 500 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    
    
    
    
    /*magnificPopup activation*/
    
    $('.view_large_img,.port_popup').magnificPopup({
       type: 'image',
        gallery:{
        enabled:true,
      }
    });
    $('.view_large_video').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      zoom: {
          enabled: true,
      }
    });

    
    $('.portfolio_gallery').imagesLoaded( function() {
        // init Isotope
        var $grid = $('.portfolio_gallery').isotope({
           itemSelector: '.gird_item',
            percentPosition: true,
            masonry: {
                columnWidth: '.gird_item'
            }
        });
            
        // filter items on button click
        $('.portfolio_tab_button').on( 'click', 'button', function() {
          var filterValue = $(this).attr('data-filter');
          $grid.isotope({ filter: filterValue });
            
           $(this).siblings('.active').removeClass('active');
           $(this).addClass('active');
        });
    });

    
    
    /*counterup activation*/
    $('.counter_number').counterUp({
        delay: 10,
        time: 1000
    });
    


})(jQuery);