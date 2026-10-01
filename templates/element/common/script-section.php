<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://www.elegantjourneys.com/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?=WEBROOT?>assets/js/menu.js"></script>
<script>
	(function($) {
    'use strict';
    // Owl Carousel Carousels
    $("#partner-slide") // Partner Block Carousel
        .owlCarousel({
            items: 6,
            slideSpeed: 300,
            itemsTablet: [768, 3],
            itemsMobile: [480, 1],
            autoPlay: 3000,
            touchDrag: false,
            pagination: false,
            mouseDrag: false
        });
}(jQuery));
</script>
<script>
$(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
	});
	//$('#myModal').modal('show');
});
</script>
<script>
    $('.dropdown > .caption').on('click', function() {
        $(this).parent().toggleClass('open');
    });

    // $('.price').attr('data-currency', 'RUB');

    $('.dropdown > .list > .item').on('click', function() {
        $('.dropdown > .list > .item').removeClass('selected');
        $(this).addClass('selected').parent().parent().removeClass('open').children('.caption').html($(this).html());

        if ($(this).data("item") == "RUB") {
            console.log('RUB');
        } else if ($(this).data("item") == "UAH") {
            console.log('UAH');
        } else {
            console.log('USD');
        }
//         if ($(this).data("item") == "RUB") {
//             $('.price').attr('data-currency', 'RUB');
//             $('.currency').text('руб.');

//         } else if ($(this).data("item") == "UAH") {
//             $('.price').attr('data-currency', 'UAH');
//             $('.currency').text('грн.');

//         } else {
//             $('.price').attr('data-currency', 'USD');
//             $('.currency').text('долл.');
//         }
      

      
    });

    $(document).on('keyup', function(evt) {
        if ((evt.keyCode || evt.which) === 27) {
            $('.dropdown').removeClass('open');
        }
    });

    $(document).on('click', function(evt) {
        if ($(evt.target).closest(".dropdown > .caption").length === 0) {
            $('.dropdown').removeClass('open');
        }
    });
</script>