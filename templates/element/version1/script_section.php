  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"
  ></script>
  
  
  <script>
    $(document).ready(function ($) {
      $(".card-slider").slick({
        arrows: true,
        //dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 400,
            settings: {
              arrows: false,
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  </script>
  <script>
    $(document).click(function () {
      $(".close").click(function () {
        $("video").each(function () {
          $(this).get(0).pause();
        });
      });

      $(".modal").on("hide.bs.modal", function () {
        //var memory = $(this).html(); $(this).html(memory);
        $("video").each(function () {
          $(this).get(0).pause();
        });
      });
    });
  </script>
  <script>
	$('.close-button').hide();
$('.open-button,.close-button').on('click',function(){
	$('.open-button,.close-button').toggle()
});
</script>
  <script>
        $(document).ready(function () {
            $('.dropdown').hover(function () {
                $(this).find('.dropdown-menu')
                    .stop(true, true).delay(100).fadeIn(200);
            }, function () {
                $(this).find('.dropdown-menu')
                    .stop(true, true).delay(100).fadeOut(200);
            });
        });
    </script>
	
	
<script>
	
	$(window).scroll(function(){
  var sticky = $('#fixed-iti'),
      scroll = $(window).scrollTop();

  if (scroll >= 580) sticky.addClass('fixed-iti');
  else sticky.removeClass('fixed-iti');
});

(function($, window, document){
// Cache selectors
var lastId,
	topMenu = $("#top-menu"),
	topMenuHeight = topMenu.outerHeight() + 150,
	// All list items
	menuItems = topMenu.find("a"),
	// Anchors corresponding to menu items
	scrollItems = menuItems.map(function() {
		var item = $(this).attr("href");
		if(item != '#') {return $(item)}
	});

console.log(scrollItems)


// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e) {
	var href = $(this).attr("href"),
		offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
	$('html, body').stop().animate({
		scrollTop: offsetTop
	}, 300);
	e.preventDefault();
});

// Bind to scroll
$(window).scroll(function() {
	// Get container scroll position
	var fromTop = $(this).scrollTop() + topMenuHeight;

	// Get id of current scroll item
	var cur = scrollItems.map(function() {
		if ($(this).offset().top < fromTop)
			// console.log(this)
			return this;
	});
	// Get the id of the current element
	cur = cur[cur.length - 1];
	var id = cur && cur.length ? cur[0].id : "";

	if (lastId !== id) {
		lastId = id;
		// Set/remove active class
		//console.log(menuItems);
		menuItems
			.parent().removeClass("active")
			.end().filter("[href='#" + id + "']").parent().addClass("active");
	}
});
})(jQuery, window, document);

</script>
<script>
	$(function ()  {
		if (!window.Swiper) return;
	
		// slide width * slidesPerView + spaceBetween * (slidesPerView - 1) =viewport width
		// assume we know the min slide width, we need to get the max slides we can show pre view
		function getMaxSlides(viewport,space,minSlideWidth){
			minSlideWidth=minSlideWidth||120;
	
			return Math.floor((viewport+space)/(minSlideWidth+space));
		}
	
		var breakpoints={
			"xs":{ viewport:320, space:20, speed: 6000, }, //for mobile, which is use as default setting
			"md":{ viewport:768, space:50, speed: 8500, },
			"lg":{ viewport:992, space:60, speed: 8500, },
			"xl":{ viewport:1240, space:10, speed: 10000, },
		};
	
		$(".awards-slider").each(function(i,el){
	
			var totalSlides = $(el).find(".swiper-slide").length;
	
			if(totalSlides<=1) return;
	
			var breakpointsOptions={};
			$.each(breakpoints,function(key,value){
				if(key==='xs') return;
	
				breakpointsOptions[value.viewport]={
					slidesPerView: Math.min(totalSlides-1, getMaxSlides(value.viewport,value.space)),
					spaceBetween: value.space,
					speed: value.speed,
				}
			});
	
			var swiperOptions = {
				loop: true,
				slidesPerView: Math.min(totalSlides-1, getMaxSlides(breakpoints["xs"].viewport,breakpoints["xs"].space)),
				spaceBetween: breakpoints["xs"].space,
				speed: breakpoints["xs"].speed,
				breakpoints: breakpointsOptions,
				autoplay: {
					enabled: true,
					delay: 0,
					disableOnInteraction: false,
					pauseOnMouseEnter: false,
				},
				allowTouchMove: true,
			};
	
			var swiper = new Swiper(el, swiperOptions);
		});
	})
	</script>
<script>
	$('.extra-fields-customer').click(function() {
  $('.customer_records').clone().appendTo('.customer_records_dynamic');
  $('.customer_records_dynamic .customer_records').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.single').append('<button class="btn btn-md remove-field btn-remove-customer">Remove Rooms</button>');
  $('.customer_records_dynamic > .single').attr("class", "remove");

  $('.customer_records_dynamic input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
    count++;
  });

});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>
