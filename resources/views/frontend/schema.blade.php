@extends('frontend.layouts.master')
@section('content')

<div id="k-main-full"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">

                <h1 class="title-widget remove-margin-bottom">fjfj</h1>
                <div class="news-title-meta">
                    <h1 class="page-title">fjzj</h1>
                    <div class="news-meta">
                        <span class="news-meta-date">TERCIER / ROTEN</span>
                        <span class="news-meta-category">RRJ</span>
                        <span class="news-meta-comments"> n. 14-112</span>
                    </div>
                </div>
                <div class="news-body clearfix"><!-- course content -->

                    <?php

                        /*
                        echo '<pre>';
                        print_r($root);
                        echo '</pre>';
                         */

                        $helper = new App\Helper\Helper();
                        $obj    = $helper->jsonObj($root,1);

                    ?>

                    <div id="tree-simple" style="width:100%; height: 400px"> </div>

                    <script>

                        simple_chart_config = {
                            chart: {
                                container: "#tree-simple",
                                siblingSeparation: 15,
                                levelSeparation : 60,
                                nodeAlign: "BOTTOM",
                                connectors: {
                                    type: 'bCurve'
                                },

                                node: {
                                    HTMLclass: 'nodeBloc'
                                }
                            },
                            nodeStructure: <?php echo $obj; ?>
                        };

                        var my_chart = new Treant(simple_chart_config);

                    </script>
                </div><!-- course content end -->

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop