$(function(){

    var url  = location.protocol + "//" + location.host+"/";

    $('.fancybox').fancybox({
        autoSize:false
    });

    $('[data-toggle="popover"]').popover({
        trigger : 'hover'
    });

    $('[data-toggle="popover"]').hover(function(){
        $(this).toggleClass('expose_hover_div');
    });

    $(".expose").click(function(e) {
        e.preventDefault();
        var anchor = $(this).data('anchor');

        var $test = $('#' +anchor), o = $test.offset().top - 300;
        $('html, body').animate({ scrollTop: o }, 500, function(){
            $test.popover('show');
            $test.addClass("warning");
        });
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

});