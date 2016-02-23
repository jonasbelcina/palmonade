;(function($){
	$('.home-banner').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		animateOut: 'fadeOut',
		autoplay: true
	});

	$('.testimonial-items').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		autoplay: true,
		autoplayTimeout: 8000
	});

	$('.mobile-articles').owlCarousel({
		items: 1,
		nav: true,
		dots: true,
		// loop: true,
		navText: false,
		autoplay: true,
		autoplayTimeout: 8000
	});

	$('.brand-items').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    320:{
		        items:1
		    },
		    420:{
		        items:2
		    },
		    568:{
		        items:3
		    },
		    767:{
		        items:4
		    },
		    991:{
		        items:5
		    }
		}
	});

	$('.related-slides').owlCarousel({
		items: 3,
		nav: true,
		// loop: true,
		margin: 20,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    320:{
		        items:1
		    },
		    568:{
		        items:2
		    },
		    768:{
		        items:3
		    }
		}
	});


	$('.footer-drop').on('click', function() {
		$(this).closest('.footer-col').toggleClass('opened');
		if($(this).find('span').hasClass('glyphicon-menu-down')) {
			$(this).find('span').removeClass('glyphicon-menu-down');
			$(this).find('span').addClass('glyphicon-menu-up');
		} else {
			$(this).find('span').removeClass('glyphicon-menu-up');
			$(this).find('span').addClass('glyphicon-menu-down');
		}
	});

	$('.expand').on('click', function() {
		if($(this).hasClass('cat-active')) {
			$(this).removeClass('cat-active');
			$(this).next('ul').css('max-height', '1px');
			$(this).find('span').removeClass('glyphicon-minus');
			$(this).find('span').addClass('glyphicon-plus');
		} else {
			$(this).addClass('cat-active');
			$(this).next('ul').css('max-height', '500px');
			$(this).find('span').removeClass('glyphicon-plus');
			$(this).find('span').addClass('glyphicon-minus');
		}
		
	});

	var ww = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	if(ww > 768){
		$(window).scroll(function(e){

			if($('.product-listing').length){
				var windowTop = $(window).scrollTop();
				var productTop = $('.product-listing').offset().top;
				var sidebarHeight = $('.woo-sidebar').height();
				var totalheight = $('.product-listing').height();

				if(windowTop > productTop && ( sidebarHeight + windowTop - productTop ) < totalheight )
					$('.woo-sidebar').css('margin-top' , windowTop - productTop -20 );
				else if(windowTop < productTop)
					$('.woo-sidebar').css('margin-top' , 0 );
			}
		});
	}

})(jQuery);
