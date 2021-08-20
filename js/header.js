jQuery(function () {
    jQuery(window).on('scroll', function () {
        if ( jQuery(window).scrollTop() > 100 ) {
            jQuery('.navbar').addClass('active');
            // jQuery('.navbar a img').attr('src','images/Logo/black.png')
        } else {
            jQuery('.navbar').removeClass('active');
            // jQuery('.navbar a img').attr('src','images/Logo/white.png')
        }
    });
});