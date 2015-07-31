@extends('frontend.layouts.master')
@section('content')

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">
                <?php
                $ancestor = $page->getAncestors();
                $parent = $ancestor->last();
                ?>
                <h1 class="title-widget remove-margin-bottom">{{ $parent->title }}</h1>
                <div class="news-title-meta">
                    <h1 class="page-title">{{ $page->title }}</h1>
                    <div class="news-meta">
                        <span class="news-meta-date">TERCIER / ROTEN</span>
                        <span class="news-meta-category">RRJ</span>
                        <span class="news-meta-comments"> n. 14-112</span>
                    </div>
                </div>
                <div class="news-body clearfix"><!-- course content -->
                    {!! $page->content !!}

                    @include('frontend.schemas.index', ['schema' => $schema])


                       <div id="chartOrg"></div>
                       <ul id="org" style="display:none">
                           <li>Food
                               <ul>
                                   <li>Beer</li>
                                   <li>Vegetables
                                       <ul>
                                           <li>Pumpkin</li>
                                           <li><a href="http://tquila.com" target="_blank">Aubergine</a></li>
                                       </ul>
                                   </li>
                                   <li>Bread</li>
                                   <li>Chocolate
                                       <ul>
                                           <li>Topdeck</li>
                                           <li>Reese's Cups</li>
                                       </ul>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>

                </div><!-- course content end -->

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

@stop