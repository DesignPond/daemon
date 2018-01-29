$( function() {

    $('.redactor').redactor({
        minHeight  : 250,
        maxHeight: 650,
        focus: true,
        formattingTags: ['p', 'h1','h2', 'h3','h4','h5','blockquote','cite'],
        lang: 'fr',
        plugins: ['imagemanager','filemanager','source','iconic','alignment','fontsize','fontcolor'],
        fileUpload : 'uploadRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload: 'uploadRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson: 'imageJson?_token=' + $('meta[name="_token"]').attr('content'),
        fileManagerJson: 'fileJson?_token=' + $('meta[name="_token"]').attr('content'),
        buttons    : ['source','format','bold','italic','|','lists','|','image','file','link','alignment'],
        formattingAdd: {
            "red-p-add": {
                title: 'Clear',
                args: ['p', 'class', 'clearfix']
            },
        }
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