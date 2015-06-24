if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.advanced = function()
{
    return {
        getTemplate: function()
        {
            return String()
                + '<section id="redactor-modal-advanced">'
                + '<label>Choix</label>'
                + '<div id="redactor-image-manager-box"></div>'
                + '</section>';
        },
        init: function ()
        {
            var button = this.button.add('advanced', 'Advanced');
            this.button.addCallback(button, this.advanced.show);

            // make your added button as Font Awesome's icon
            this.button.setAwesome('advanced', 'fa-flag');
        },
        show: function()
        {
            this.modal.addTemplate('advanced', this.advanced.getTemplate());
            this.modal.load('advanced', 'Advanced Modal', 400);
            this.modal.createCancelButton();

            var button = this.modal.createActionButton('Insert');
            button.on('click', this.advanced.insert);

            $.ajax({
                dataType: "json",
                cache: false,
                url: this.opts.imageManagerJson,
                success: $.proxy(function(data)
                {
                    $.each(data, $.proxy(function(key, val)
                    {
                        // title
                        var thumbtitle = '';
                        if (typeof val.title !== 'undefined') thumbtitle = val.title;

                        var img = $('<img src="' + val.thumb + '" rel="' + val.image + '" data-thumb="' + val.thumb + '" title="' + thumbtitle + '" style="max-width: 100px; height: auto; cursor: pointer;" />');
                        $('#redactor-image-manager-box').append(img);
                        $(img).click($.proxy(this.imagemanager.insert, this));

                    }, this));


                }, this)
            });

            this.selection.save();
            this.modal.show();

            $('#mymodal-textarea').focus();
        },
        insert: function()
        {
            var html = $('#mymodal-textarea').val();

            this.modal.close();
            this.selection.restore();

            this.insert.html(html);

            this.code.sync();

        }
    };
};