$(function(){

    var url  = location.protocol + "//" + location.host+"/";
/*    //$.i18n.load(i18n_dict);
    var content = $('#content').annotator();

    content.annotator('addPlugin','Permissions', {
        user: 1,
        permissions: {
            'read':   [],
            'update': [],
            'delete': [],
            'admin':  []
        },
        showViewPermissionsCheckbox: false,
        showEditPermissionsCheckbox: false
    });

    content.annotator('addPlugin','Categories',{
        regle     :'annotator-hl-regle',
        destacat  :'annotator-hl-destacat',
        subratllat:'annotator-hl-subratllat'
    });

    content.annotator('addPlugin', 'Store', {
        // The endpoint of the store on your server.
        prefix: url + 'api',
        // Attach the uri of the current page to all annotations to allow search.
        annotationData: { 'uri': url + '/loi' },
        // This will perform a "search" action when the plugin loads.
        loadFromSearch: {'limit': 20, 'uri': url}
    });*/

    $('.fancybox').fancybox({
        autoSize:false
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
            //$test.expose({padding: 4});
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