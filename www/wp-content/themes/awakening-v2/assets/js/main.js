(function($) {

    $('.menu__toggle').click(function (){
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.menu__mobile').removeClass('active');
        } else {
            $(this).addClass('active');
            $('.menu__mobile').addClass('active');
        }
    });

    $('.menu__mobile .menu__item').click(function (){
        $('.menu__toggle ').removeClass('active');
        $('.menu__mobile  ').removeClass('active');
    });

    //send lead
    if ($('.js-form').length) {
        $('.js-form').each(function () {
            $(this).submit(function (e) {

                e.preventDefault();
                var form = $(this);
                var vdata = form.serializeArray();

                console.log(form);
                console.log(vdata);

                $.ajax({
                    url: '/wp-json/v1/post/lead',
                    data: vdata, // form data
                    type: form.attr('method'),
                    beforeSend:function(xhr){
                        console.log('beforeSend');
                    },
                    success:function(data){
                        console.log(data);
                    }
                });

            });
        });
    }

    $('.js-modal-contact').click(function (e){
        e.preventDefault();
        $('.modal__contact').addClass('active');
    });

    $('.modal__close').click(function (e){
        e.preventDefault();
        $('.modal__contact').removeClass('active');
    });

    $(window).resize(function(){
        if ($('body').height() < window.outerHeight) {
            $('.page').css('height',(window.outerHeight-390) + 'px');
            $('.err404').css('height',(window.outerHeight-390) + 'px');
        }
    });

    if ($('body').height() < window.outerHeight) {
        $('.page').css('height',(window.outerHeight-390) + 'px');
        $('.err404').css('height',(window.outerHeight-390) + 'px');
    }

    $(window).scroll(function () {
        if ($('.header__default').offset().top <= $(window).scrollTop()) {
            $('.header__fixed').attr('style','display: block;');
        } else {
            $('.header__fixed').attr('style','display: none;');
        }
    });

    $('a').each(function (){
        $(this).click(function() {
            $("html, body").animate({
                scrollTop: ($($(this).attr("href")).offset().top - 100) + "px"
            }, {
                duration: 500,
                easing: "swing"
            });
            return false;
        });
    });

    if ( window.location.pathname == '/' ){
        // Index (home) page

    } else {
        $('a.homepage').each(function (){
            var href = $(this).attr('href');
            $(this).attr('href', '/' + href);
        });

        // Other page
        console.log(window.location.pathname);
    }

})( jQuery );