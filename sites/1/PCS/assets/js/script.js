$(document).ready(function() {

	/*-------------------------------------------------*/
	/* =  Owl Carousel
	 /*-------------------------------------------------*/
	$('.owl-carousel').owlCarousel({
		stagePadding: 70,
		loop:true,
		margin:30,
		nav:false,
		items:1,
		slideSpeed : 300,
		paginationSpeed : 400,
		lazyLoad: true,
		singleItem: true,
		center:true,
        responsive:{
            600:{
                stagePadding: 70,
                margin:30,
            },
            360:{
                stagePadding: 40,
                margin:20,
            }

        }
		//autoPlay:5000

	});
	//Owl-wrapper-outer height
	var slideHeight = $(window).height();
	$('.item').css('height',slideHeight-180);
	$('.owl-item').css('height',slideHeight-80);
	$('.owl-item').css('line-height',slideHeight-80 + 'px');

	$('.owl-item.partenaires').css('height',slideHeight);
	$('.partenaires .item').css('height',slideHeight-80);

	/*-------------------------------------------------*/
	/* =  Fancybox
	 /*-------------------------------------------------*/
	if ($(".fancybox").length) {
		$(".fancybox").fancybox({
			//		openEffect	:	'elastic',
			//		closeEffect	:	'elastic',
			loop: true,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
	}
    $('.fancybox-media').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        helpers : {
            media : {}
        }
    });

    $(".various").fancybox({
        maxWidth	: 800,
        maxHeight	: 600,
        fitToView	: false,
        width		: '100%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

	/*-------------------------------------------------*/
	/* =  SlimScroll
	 /*-------------------------------------------------*/

	$('.inner-content-div').css('height',slideHeight-400);
	setTimeout(function () {
		var hg=$('.inner-content-div').innerHeight();
		$('.inner-content-div').slimScroll({
			height: hg
		});
	},10);

	/*-------------------------------------------------*/
	/* =  Accordion
	 /*-------------------------------------------------*/

	jQuery('.accordion-section-title').click(function(e) {
		var selectedPanel = $(this).next();
		var otherPanels = $(".accordion-section-content").not(selectedPanel);

		otherPanels.slideUp(0);

		// Make other arrows turn right
		var arrows = otherPanels.prev().find("span");
		arrows.removeClass("icon-ExpandMore");

		// Expands/collapses panel
		selectedPanel.slideToggle(0);
		$("span", this).toggleClass("icon-ExpandMore");


	});


});

