$(function(){

    $('body').on('click','.addBtnNode',function(){

        var id = $(this).data('node');

        alert(id);
    });

});