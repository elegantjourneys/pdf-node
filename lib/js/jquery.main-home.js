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
    $("#testimonial-home-slide") // Testimonial Home Carousel
        .owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            touchDrag: false,
            mouseDrag: false
        });
 

    




   

}(jQuery));