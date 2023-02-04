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

})( jQuery );