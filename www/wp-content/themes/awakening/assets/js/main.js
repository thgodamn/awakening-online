(function($) {

    console.log('ffff');

    $('.menu__toggle').click(function (){
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.menu__mobile').removeClass('active');
        } else {
            $(this).addClass('active');
            $('.menu__mobile').addClass('active');
        }
    });

})( jQuery );