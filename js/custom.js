( function( $ ) {

    
    // search shower
    $('a.search-icon-button').click(function(event) {
        event.preventDefault();
        $(".site-search").slideToggle( "slow", function() {
            $("#woocommerce-product-search-field-0").focus();
        });
    });
    
    /*
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    */
    
    /*
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });   
    */
    
} )( jQuery );