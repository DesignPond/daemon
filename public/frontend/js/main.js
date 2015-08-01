$(function(){

    // The url to the application
    var base_url = location.protocol + "//" + location.host+"/";

    var $tree  = $('#tree-simple');
    var $modal = $('#nodeModal');

    if($tree.length)
    {
        var projet = $tree.data('projet');
        makeTree(projet);
    }

    $('body').on('click','.changeNode',function(e){

        e.preventDefault();

        var id = $(this).data('node');
        console.log(id);
        makeTree(id);

    });

    function makeTree(projet)
    {

        $.ajax({
            dataType: "json",
            type    : 'POST',
            url     : base_url + 'schemas/projet/' + projet,
            data: { projet  : projet , _token: $("meta[name='_token']").attr('content') },
            success: function( data ) {
                $tree.empty();

                if(data.children)
                {
                    simple_chart_config = {
                        chart: {
                            container: "#tree-simple",
                            siblingSeparation: 5,
                            levelSeparation : 120,
                            nodeAlign: "TOP",
                            connectors: {
                                type: 'curve'
                            },
                            node: {
                                HTMLclass: 'nodeBloc'
                            }
                        },
                        nodeStructure: data
                    };

                    var my_chart = new Treant(simple_chart_config);
                    resizeCanvas();
                }
                else{
                    $tree.append('<h3>' + data.text.name + '</h3>');
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function resizeCanvas(){
        var con    =  $('#tree-simple'),
            canvas = $("#tree-simple").find('svg');

        height = canvas.height() + 20;
        con.css('height',height+'px');
        con.css('overflow-y','hidden');
    }

});

