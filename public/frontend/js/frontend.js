$( function() {

    // The url to the application
    var base_url = location.protocol + "//" + location.host+"/";

    $('.redactorFrontend').redactor({
        minHeight  : 250,
        maxHeight: 450,
        focus: true,
        lang: 'fr',
        plugins : ['advanced','imagemanager','filemanager','fontcolor'],
        fileUpload       : base_url + 'uploadFile?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload      : base_url + 'uploadImage?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson : base_url + 'frontendUploadJson',
        fileManagerJson  : base_url + 'frontendFileJson',
        buttons          : ['html','|','formatting','bold','italic','pre','|','unorderedlist','orderedlist','outdent','indent','|','image','file','link','alignment']
    });

});