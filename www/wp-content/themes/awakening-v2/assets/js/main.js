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

    $('.menu__mobile .menu__item a').each(function (){
        $(this).click(function () {
            $('.header__toggle').each(function (){
                $(this).removeClass('active');
            });
            $('.header__menu').each(function (){
                $(this).removeClass('active');
            });
        });
    });


    // $('input[name="phone"]').inputmask({"mask": "+7 (999)-999-9999"});
    // $('input[name="phone"]').inputmask("99-9999999");

    // $('input[name="phone"]').usPhoneFormat({
    //     format:'x (xxx) xxx-xxxx'
    // });

    //send lead
    if ($('.js-form').length) {
        $('.js-form').each(function () {

            // $(this).find($('input[name=phone]')).usPhoneFormat({
            //     format:'(xxx) xxx-xxxx'
            // });


            $(this).find($('input[name=phone]')).inputmask("+7 (999) 999-99-99");
            // $(this).find($('input[name=email]')).inputmask({
            //     mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            //     greedy: false,
            //     onBeforePaste: function (pastedValue, opts) {
            //         pastedValue = pastedValue.toLowerCase();
            //         return pastedValue.replace("mailto:", "");
            //     },
            //     definitions: {
            //         '*': {
            //             validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
            //             cardinality: 1,
            //             casing: "lower"
            //         }
            //     }
            // });

            $(this).find($('input[name=telegram]')).inputmask({
                mask: "@*{1,100}",
                greedy: false,
                onBeforePaste: function (pastedValue, opts) {
                    pastedValue = pastedValue.toLowerCase();
                    return pastedValue.replace("mailto:", "");
                },
                definitions: {
                    '*': {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            });

            $(this).submit(function (e) {

                e.preventDefault();
                var form = $(this);
                var vdata = form.serializeArray();

                // console.log(form);
                // console.log(vdata);

                $.ajax({
                    url: '/wp-json/v1/post/lead',
                    data: vdata, // form data
                    type: form.attr('method'),
                    beforeSend:function(xhr){
                        // console.log('beforeSend');
                    },
                    success:function(data){
                        if (data['status'] === 1) {
                            form.children('.contact__result').removeClass('declined');
                            form.children('.contact__result').addClass('success');

                            form.find('input').not(':button, :submit, :reset, :hidden')
                                .val('')
                                .prop('checked', false)
                                .prop('selected', false);
                        } else {
                            form.children('.contact__result').removeClass('success');
                            form.children('.contact__result').addClass('declined');
                        }
                        form.children('.contact__result').html(data['msg']);
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

    // $(window).resize(function(){
    //     if (($('body').height() + 150) < window.outerHeight) {
    //         $('footer').addClass('absolute');
    //     } else {
    //         $('footer').removeClass('absolute');
    //     }
    // });

    // if ($('body').height() < window.outerHeight+200) {
    //     $('footer').addClass('absolute');
    // }

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
        // console.log(window.location.pathname);
    }

})( jQuery );