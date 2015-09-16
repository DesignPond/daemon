$(function(){

    var url  = location.protocol + "//" + location.host+"/";

    $('.fancybox').fancybox({
        autoSize:false
    });

    $('[data-toggle="popover"]').popover({
        trigger : 'click'
    });

    $('[data-toggle="popover"]').hover(function(){
        $(this).toggleClass('expose_hover_div');
    });

    $(".expose").click(function(e) {
        e.preventDefault();
        $('.nextpartcontent').removeClass('warning');
        var anchor = $(this).data('anchor');

        var $test = $('#' +anchor), o = $test.offset().top - 300;
        $('html, body').animate({ scrollTop: o }, 500, function(){
            $test.popover('show');
            $test.addClass("warning");
        });

        if($(this).hasClass('nextpart')){
            console.log('next!');
            var next = $(this).data('next');
            $('#' +next).addClass("warning");
        }
    });

    $(".text_content").click(function(e) {
        e.preventDefault();
        $(".text_content").removeClass("warning");
        var anchor = $(this).data('anchor');
        var $test  = $('#' +anchor);
        var o = $test.offset().top - 300;
        $('html, body').animate({ scrollTop: o }, 500, function(){
            $test.addClass("warning");
        });
    });

    $('body, .expose-overlay').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
                $(this).removeClass("warning");
            }
        });
    });

    $.lockfixed("#structures",{offset: {top: 10}});

    if($('#content').length){

        var changePoint = $('#content').offset().top;
        var changePoint2 = $('#dispositions-finales').offset().top;
        var final        = $('#final').offset().top - 450;
        var distance     = (changePoint2 - $(window).scrollTop());

        console.log($(window).scrollTop());
        console.log(changePoint2);

        $('#guides').parent().css({
            'height' : final
        });

        $(window).scroll(function () {

            if ($(window).scrollTop() >= changePoint && $(window).scrollTop() < changePoint2)
            {
                $('#guides').removeClass('sidebarStatic');
                $('#guides').removeClass('sidebarBottom');
                $('#guides').addClass('sidebarFixed');
            }
            else if($(window).scrollTop() >= changePoint2)
            {
                $('#guides').addClass('sidebarStatic');
                $('#guides').addClass('sidebarBottom');
                $('#guides').removeClass('sidebarFixed');
            }
            else
            {
                $('#guides').removeClass('sidebarFixed');
                $('#guides').removeClass('sidebarBottom');
                $('#guides').addClass('sidebarStatic');
            }

        });
    }

});