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
