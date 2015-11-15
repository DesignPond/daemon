@extends('frontend.layouts.master')
@section('content')

    <div class="layout with-right-sidebar js-layout">
        <div class="row">
            <div class="col-md-9">
                <div class="main-content">

                    <h2>HOME</h2>
                    <hr/>

                    <h4>Documentation du site internet {!! Registry::get('nom', 'DesignPond') !!}</h4>

                    <!-- File Tree -->
                    <div class="file-tree">
                        <div class="file-tree-title"> Docs file hierarchy</div>
                        <ul class="file-tree-list js-file-tree" data-expanded="">
                            <li class="is-folder">css -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">custom.css -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-folder">fonts -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">fontawesome.otf -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                    <li class="is-file">fontawesome-webfont.eot -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-folder">img -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">img1.jpg -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-folder">js -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">all.js -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-folder">less -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">custom.less -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-folder">swf -
                                <span class="file-tree-description">lorem ipsum dolor sit amet, consectetur.</span>
                                <ul>
                                    <li class="is-file">zeroclipboard.swf -
                                        <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="is-file">index-1.html -
                                <span class="file-tree-description">lorem ipsum dolor sit amet.</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of FIle Tree -->

                </div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <div class="sidebar js-sidebar-fixed">

                    @include('frontend.partials.search')

                    @include('frontend.partials.sidebar')

                </div>
            </div>
        </div>
    </div>

@stop