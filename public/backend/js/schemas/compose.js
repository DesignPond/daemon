new Vue({

    el: '#compose',

    data: {
        boxes: [
            {
                id: 1,
                text: 'Learn JavaScript',
                width:100,
                height:120 ,
                top:10,
                left:30
            },
            {
                id: 2,
                text: 'Learn PHP',
                width:110,
                height:80 ,
                top:40,
                left:150
            }
        ],

        newBox: ''
    },

    ready: function(){

        var self = this;

        this.boxes.forEach(function(box)
        {
            var current = 'box_' + box.id;

            $('#'+current).draggable({
                grid: [ 10,10 ],
                containment: 'parent',
                start: function()
                {
                },
                drag: function( event, ui )
                {
                },
                stop: function(event, ui)
                {
                    self.updateCoordinates(ui);
                }
            });

        });

    },

    methods: {

        updateCoordinates: function(box){

            // Get the new values
            var id        =  box.helper.attr('id');
            var position  =  box.helper.position();
            var width     =  box.helper.width();
            var height    =  box.helper.height();

            var id = id.replace("box_", "");
            console.log(id);

            $.ajax({
                type: "POST",
                data: {
                    method : 'PUT' , _token: $("meta[name='_token']").attr('content') ,id: id, width : width, height : height
                },
                url: "/box/"+id,
                success: function(result) {
                    console.log(result);
                }
            });
        }
    }

});