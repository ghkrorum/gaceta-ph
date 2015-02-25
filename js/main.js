(function ($) {
	$(document).ready(function(){
		$('.header-search .search').hover(
			function(){
				$('#SearchForm').css('width',200);
			},
			function(){
				$('#SearchForm').css('width',0);
			}
		);

		$('.header-search #SearchForm').hover(function(){
			$(this).css('width',200);
		});

		$('.header-search .search').click(function(){
			$('#SearchForm').css('width',0);
		});

		$('.main-slider-cont').slick({
	        adaptiveHeight: true,
	        variableWidth: true,
	        centerMode: true,
	        autoplay: true,
	        infinite: true,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        prevArrow: '.slider-prev',
	        nextArrow: '.slider-next'
	    });

	    $('.header-menu li').hover(
	    	function(){
	    		$(this).children('.header-submenu').css('display', 'block');
	    	},
	    	function(){
				$(this).children('.header-submenu').css('display', 'none');
	    	}
	    );
        
	    $('.header-menu li:nth-last-child(4)').hover(
	    	function(){
	    		$(this).children('.header-submenu').css('left', -44+'px');
	    });

	    $('.header-menu li:nth-last-child(3)').hover(
	    	function(){
	    		$(this).children('.header-submenu').css('left', -30+'px');
	    });
        $('.header-menu li:nth-last-child(2)').hover(
	   		function(){
	    		$(this).children('.header-submenu').css('left', -15+'px');
	    });

	    $('.uparrow a').click(function(event){
	    	event.preventDefault();
	    	var body = $("html, body");
			body.animate({scrollTop:0}, '100', 'swing', function() { 
			});
	    });

	    $('.footer-newsletter-btn').click(function(event){
	    	event.preventDefault();
	    	$('#newsletter-submit').trigger('click');
	    });

	    $( '#post-slideshow' ).on( 'cycle-after', function( event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
		    var html = $(incomingSlideEl).children('.post-slideshow-item-caption').html();
		    $('#post-slider-caption').html(html);
		});

		$('#post-slider-carousel .post-slider-carousel-slide').click(function(){
		    var index = $('#post-slider-carousel').data('cycle.API').getSlideIndex(this);
		    console.log(index);
		    $('#post-slideshow').cycle('goto', index);
		});

		$( '#gallery-slider' ).on( 'cycle-after', function( event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
			console.log('Hola');
		    var htmlTitle = $(incomingSlideEl).children('.gallery-item-title').html();
		    $('.title-galery').html(htmlTitle);
		    var htmlCaption = $(incomingSlideEl).children('.gallery-item-caption').html();
		    $('.footer-galery').html(htmlCaption);
		    var htmlDescription = $(incomingSlideEl).children('.gallery-item-description').html();
		    $('.description-galery').html(htmlDescription);
		});

		$('#show-slider-carousel').click(function(event){
			event.preventDefault();
			var carouselVisibility = $('#post-slider-carousel-cont').css('visibility');
			var carouselDisplay = $('#post-slider-carousel-cont').css('display');
			if ( carouselVisibility == 'visible' && carouselDisplay == 'block' ){
				$('#post-slider-carousel-cont').slideUp();
			}else{
				$('#post-slider-carousel-cont').css('visibility', 'visible');
				$('#post-slider-carousel-cont').css('margin', '0');
				$('#post-slider-carousel-cont').css('display', 'none');
				$('#post-slider-carousel-cont').slideDown();
			}
		});

		//cita Social
		$('#cita-twitter-btn').click(function(event){
			event.preventDefault();
			$url = $(this).attr('href');
			window.open($url, "", "width=550, height=420");
		});

		//menu avisos
		$('.header-menu a').click(function(){
			$('.header-menu a').removeClass('active');
			$(this).addClass('active');
		});

	    //Avisos hover
		$('.section-avisos .category-posts-item .content-image').hover(function(){
	        $(this).addClass('active');
			$('.section-avisos .active .more-btn-content').css('display','block');
		},
		function(){
			$(this).removeClass('active');
			$('.section-avisos .more-btn-content').css('display','none');
		});

		//modal
		$('.modalmask').click(function(){
			$(location).attr('href', '#close');
		});
	    //Antes de redimensionar
		var ventana_ancho = $(window).width();
	    var ventana_alto = $(window).height();
	    if(ventana_ancho>480){
		    var widthSlide=ventana_ancho-350;
		     /*Cuando se Redimensiona el navegador*/
		    $('.width-slider').css('width',widthSlide);
		    $('.galeria .slide').css('width',widthSlide);
		    $('.content-post-col1').css('height',ventana_alto-15);
		    $('.content-sidebar').css('height',ventana_alto-15);
	    }
	    //Redimensionando pantalla
		$(window).resize(function() {
			var ventana_ancho = $(window).width();
		    var ventana_alto = $(window).height();
		    var widthSlide=ventana_ancho-350;
		    if($(window).width()>480){
		     /*Cuando se Redimensiona el navegador*/
			    $('.width-slider').css('width',widthSlide);
			    $('.width-slider').css('height',ventana_alto);
			    $('.width-sidebar').css('width',350+"px");
			    $('.content-post-col1').css('height',ventana_alto-15);
				$('.content-sidebar').css('height',ventana_alto-15);
			}
			else{
				$('.width-slider').css('width',100+'%');
				$('.width-sidebar').css('width',100+'%');
				$('.content-post-col1').css('height','auto');
				$('.content-sidebar').css('height','auto');

			} 
		});

		//menu movil
		$('.navbar-header .navbar-toggle').click(function(){
			if($('.navbar-header button').hasClass('false')){
				$(this).removeClass('false');
				$('.menu-mobile .content-nav').css('display','block');
				$('.menu-mobile .header-menu').css('display','block');
				$('.menu-mobile .header-search').css('display','none');
			}else{
	            $('.menu-mobile .content-nav').css('display','none');
	            $(this).addClass('false');
			}
		});
		//Close-menu
		$('.close-menu').click(function(){
	        $('.menu-mobile .content-nav').css('display','none');
	        $('.navbar-header button').addClass('false');
	        $('.search').addClass('false');
		});
		//search
		$('.search').click(function(){
	        if($(this).hasClass('false')){
				$(this).removeClass('false');
				$('.menu-mobile .content-nav').css('display','block');
				$('.menu-mobile .header-menu').css('display','none');
				$('.menu-mobile .header-search').css('display','block');
			}else{
	            $('.menu-mobile .content-nav').css('display','none');
	            $('.menu-mobile .header-search').css('display','none');
	            $('.menu-mobile .header-menu').css('display','block');
	            $(this).addClass('false');
			}
		});

		//videos
		$('.video-post .category-posts-item-tit a').click(function(event) {
			event.preventDefault();
			var urlVideo = $(this).attr('href');
			$('.content-video .content-image-video iframe').attr('src',urlVideo);
		});
	    $('.video-list .video-list-item a').click(function(event){
	    	var urlVideo = $(this).attr('href');
	        event.preventDefault();
	        $('.section-4 .video iframe').attr('src',urlVideo);
	    });

	});
})(jQuery);


if (typeof newsletter_check !== "function") {
window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
        alert("The email is not correct");
        return false;
    }
    if (f.elements["ny"] && !f.elements["ny"].checked) {
        alert("You must accept the privacy statement");
        return false;
    }
    return true;
}
}