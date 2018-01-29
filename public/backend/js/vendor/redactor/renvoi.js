(function($)
{

    $.Redactor.prototype.renvoi = function()
    {
        return {
            getTemplate: function($select)
            {
                return '<div class="modal-section" id="redactor-modal-renvoi">'
                        + '<section>'
                        + '<label>Renvois</label>'
                        + '<div id="wrapper-renvoi"></div>'
                        + '</section>'
                        + '<section>'
                        + '<button id="redactor-modal-button-action">Insert</button>'
                        + '<button id="redactor-modal-button-cancel">Cancel</button>'
                        + '</section>'
                        + '</div>';

            },
            init: function ()
            {
                var button = this.button.add('renvoi', 'Renvoi');
                this.button.addCallback(button, this.renvoi.show);
            },
            show: function()
            {
                this.modal.addTemplate('renvoi', this.renvoi.getTemplate());
                this.modal.load('renvoi', 'Renvoi Modal', 600);

                var content_id = $('.redactorSimple').data('content');
                var url = this.opts.adminManagerJson + '&content_id=' + content_id;

                $.ajax({
                    dataType : "json",
                    cache    : false,
                    url      : url,
                    success  : $.proxy(function(data)
                    {
                        var select  = '<select id="redactor-modal-list">';

                        $.each(data, $.proxy(function(key, val)
                        {
                            var num = parseInt(key) + 1;
                            select +=  '<option rel="' + num + '" data-params="' + encodeURI(JSON.stringify(val)) + '" value="#an_' + val.content.id + '-' + val.id + '">' +  val.text + '</option>';
                        }, this));

                        select += '</select>';

                        var $modal = this.modal.getModal();

                        $modal.find('#wrapper-renvoi').append(select);

                        var button = this.modal.getActionButton();
                        button.on('click', this.renvoi.insert);

                        this.modal.show();

                    }, this)
                });
            },
            insert: function()
            {
                var anchor = $('#redactor-modal-list').val();

                var $el  = $('#redactor-modal-list').find(":selected");
                var num  = $el.attr('rel');
                var json = $.parseJSON(decodeURI($el.attr('data-params')));

                var text = this.selection.text();
                var node = text + '<sup><a href="#' + anchor + '">'+ num +'</a></sup>';
                
                console.log(num);

                this.modal.close();
                this.insert.html(node);
            }
        };
    };

})(jQuery);
