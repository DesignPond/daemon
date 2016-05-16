$( function() {

    // The url to the application
    var base_url = location.protocol + "//" + location.host+"/";

    $('.redactorFrontend').redactor({
        minHeight  : 220,
        maxHeight: 300,
        lang: 'fr',
        plugins : ['advanced','imagemanager','filemanager','fontcolor'],
        fileUpload       : base_url + 'uploadFile?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload      : base_url + 'uploadImage?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson : base_url + 'frontendUploadJson',
        fileManagerJson  : base_url + 'frontendFileJson',
        buttons          : ['html','|','formatting','bold','italic','pre','|','unorderedlist','orderedlist','outdent','indent','|','image','file','link','alignment']
    });

});

// Module name: Filetree Text
// Dependencies: no dependencies
(function(){
    // Select all file trees on the page
    $('.js-file-tree-text').each(function () {
        var folderClass = '.file-tree-text-folder'; // Folder class, used to count the number of parents
        var nameClass = '.file-tree-text-name'; // Folder/File name class, used to prepend the tree prefix
        var fileTreeText = $(this);
        var space = '\u2502&nbsp;&nbsp;&nbsp;';
        var folder = '\u251C\u2500\u2500&nbsp;';

        var getPrefix = function (level) {
            var prefix = '';

            for (var i = 0; i < level; i++) {
                prefix += (i === level-1) ? folder : space;
            }

            return prefix;
        };

        fileTreeText.find('li').each(function () {
            var level = $(this).parents(folderClass).length;

            $(this).children(nameClass).first().prepend(getPrefix(level));
        });
    });
})();

// Module name: Filetree
// Dependencies: jquery.treeView.js
// Docs: https://github.com/samarjeet27/TreeViewJS
(function(){
    $('.js-file-tree').each(function () {
        var fileTree = $(this);
        var expanded = fileTree.data('expanded');
        fileTree.treeView();

        if(expanded === true){
            fileTree.treeView('expandAll');
        }

        $('.js-expand', fileTree.parent()).click(function () {
            fileTree.treeView('expandAll');
        });

        $('.js-collapse', fileTree.parent()).click(function () {
            fileTree.treeView('collapseAll');
        });
    });
})();