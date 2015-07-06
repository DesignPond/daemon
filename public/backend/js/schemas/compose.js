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

        this.draggableBox();
    },

    methods: {

        draggableBox: function(){

            var self = this;

            this.boxes.forEach(function(box)
            {
                var current = 'box_' + box.id;

                $('#'+current).draggable({
                    grid: [ 10,10 ],
                    containment: 'parent',
                    start: function() {},
                    drag: function( event, ui ) {},
                    stop: function(event, ui)
                    {
                        self.updateCoordinates(ui);
                    }
                });
            });

        },

        createBox: function(){

            var data = {
                method : 'PUT' , _token: $("meta[name='_token']").attr('content') ,
                width  : 100,
                height : 100,
                top    : 0,
                left   : 0
            };

            var self = this;

            $.ajax({
                type: "POST",
                data: data,
                url: "/box",
                success: function(result) {

                    self.boxes.push({
                        id: result.id, left  : 0, top   : 0, width : 100, height: 100
                    });

                }
            });

        },

        updateCoordinates: function(box){

            // Get the new values
            var id        =  box.helper.attr('id');
            var position  =  box.helper.position();
            var width     =  box.helper.width();
            var height    =  box.helper.height();

            var id = id.replace("box_", "");

            var data = {
                method : 'PUT' , _token: $("meta[name='_token']").attr('content') ,
                id     : id,
                width  : width,
                height : height,
                top    : position.top,
                left   : position.left
            };

            console.log(data);

            $.ajax({
                type: "POST",
                data: data,
                url: "/box/"+id,
                success: function(result) {
                    console.log(result);
                }
            });
        }
    }

});