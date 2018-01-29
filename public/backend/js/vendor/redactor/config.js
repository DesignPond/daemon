$( function() {

    $('.redactor').redactor({
        minHeight  : 250,
        maxHeight: 650,
        removeEmpty : [ 'strong' , 'em' , 'span' , 'p' ],
        lang: 'fr',
        plugins: ['imagemanager','filemanager','fontsize','fontcolor'],
        fileUpload : 'uploadFileRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload: 'uploadRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson: 'imageJson?_token=' + $('meta[name="_token"]').attr('content'),
        fileManagerJson: 'fileJson?_token=' + $('meta[name="_token"]').attr('content'),
        imageResizable: true,
        imagePosition: true,
        buttons    : ['html','formatting','bold','italic','|','unorderedlist','orderedlist', '|','image','file','link','alignment']
    });

    $('.redactorSimple').redactor({
        minHeight: 50,
        maxHeight: 270,
        lang: 'fr',
        plugins: ['imagemanager','filemanager'],
        fileUpload : 'uploadFileRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        fileManagerJson: 'fileJson?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload: 'uploadRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson: 'imageJson?_token=' + $('meta[name="_token"]').attr('content'),
        plugins: ['iconic'],
        buttons  : ['html','formatting','bold','italic','link','image','file','|','unorderedlist','orderedlist']
    });

});