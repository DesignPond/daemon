@extends('frontend.layouts.master')
@section('content')

<div id="k-sidebar">
    <!-- Sidebar  -->
    @include('frontend.partials.sidebar')
</div><!-- sidebar wrapper end -->

<div id="k-main"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->
        <div class="row gutter"><!-- row -->
            <div class="col-lg-12 col-md-12">
                <h1 class="title-widget remove-margin-bottom">La législation suisse</h1>
                <div class="news-title-meta">
                    <h1 class="page-title">La législation fédérale</h1>
                    <div class="news-meta">
                        <span class="news-meta-date">TERCIER / ROTEN</span>
                        <span class="news-meta-category">RRJ</span>
                        <span class="news-meta-comments"> n. 14-112</span>
                    </div>
                </div>
                <div class="news-body clearfix"><!-- course content -->
                    <h6>Recueil officiel du droit fédéral</h6>
                    <p>
                    <ul>
                        <li>RO Recueil officiel du droit fédéral</li>
                        <li>AS Amtliche Sammlung des Bundesrechts</li>
                        <li>RU Raccolto ufficiale delle leggi federali</li>
                    </ul>
                    </p><br/>
                    <p>
                        <a class="fancybox btn btn-danger" href="{{ asset('images/ro2.jpg') }}"  title="Classeurs (dès 1974)">Classeurs (dès 1974)</a>
                        <a class="fancybox btn btn-danger" href="{{ asset('images/ro.jpg') }}" title="Volumes reliés (1848-1973)">Volumes reliés (1848-1973)</a>
                    </p><br/>
                    <h6>Lorem ipsum</h6>
                    <p>Duis ornare magna sit amet dui eleifend imperdiet. Aliquam at porta elit. Proin lorem lacus, tempus id diam sit amet,
                        <a href="#" title="porttitor tempor">porttitor tempor</a> lectus. Praesent id felis sagittis, suscipit ligula sed,
                        condimentum nisi. In non commodo risus. Praesent fringilla ligula in orci consectetur pulvinar. Nunc
                        <strong>facilisis metus pellentesque</strong>, vestibulum libero eget, varius elit. Aliquam sed gravida dui, a
                        imperdiet eros. Cras dignissim libero id feugiat pharetra. Nullam ut bibendum est, sed tincidunt massa.
                    </p>
                    <p>Duis ornare magna sit amet dui eleifend imperdiet. Aliquam at porta elit. Proin lorem lacus, tempus id diam sit amet,
                        <a href="#" title="porttitor tempor">porttitor tempor</a> lectus. Praesent id felis sagittis, suscipit ligula sed,
                        condimentum nisi. In non commodo risus. Praesent fringilla ligula in orci consectetur pulvinar. Nunc
                        <strong>facilisis metus pellentesque</strong>, vestibulum libero eget, varius elit. Aliquam sed gravida dui, a
                        imperdiet eros. Cras dignissim libero id feugiat pharetra. Nullam ut bibendum est, sed tincidunt massa.
                    </p>
                    <p>Duis ornare magna sit amet dui eleifend imperdiet. Aliquam at porta elit. Proin lorem lacus, tempus id diam sit amet,
                        <a href="#" title="porttitor tempor">porttitor tempor</a> lectus. Praesent id felis sagittis, suscipit ligula sed,
                        condimentum nisi. In non commodo risus. Praesent fringilla ligula in orci consectetur pulvinar. Nunc
                        <strong>facilisis metus pellentesque</strong>, vestibulum libero eget, varius elit. Aliquam sed gravida dui, a
                        imperdiet eros. Cras dignissim libero id feugiat pharetra. Nullam ut bibendum est, sed tincidunt massa.
                    </p>
                    <p>Duis ornare magna sit amet dui eleifend imperdiet. Aliquam at porta elit. Proin lorem lacus, tempus id diam sit amet,
                        <a href="#" title="porttitor tempor">porttitor tempor</a> lectus. Praesent id felis sagittis, suscipit ligula sed,
                        condimentum nisi. In non commodo risus. Praesent fringilla ligula in orci consectetur pulvinar. Nunc
                        <strong>facilisis metus pellentesque</strong>, vestibulum libero eget, varius elit. Aliquam sed gravida dui, a
                        imperdiet eros. Cras dignissim libero id feugiat pharetra. Nullam ut bibendum est, sed tincidunt massa.
                    </p>
                    <hr />

                    <h6>Supports de cours:</h6>
                    <ul class="list-unstyled list-downloads"><!-- downloads list -->
                        <li>
                            <i class="fa fa-cloud-download"></i>
                            <a href="#" title="Course Materials" class="download-link">
                                <span class="dwnld-title">Instructions pour l’examen </span>
                                <span class="help-block">Fusce vitae ultrices tortor, tincidunt consectetur purus (12.5 MB)</span>
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-cloud-download"></i>
                            <a href="#" title="Course Materials" class="download-link">
                                <span class="dwnld-title">Exercices</span>
                                <span class="help-block">Cras dignissim libero id feugiat pharetra. (32.8 MB)</span>
                            </a>
                        </li>
                    </ul><!-- downloads list end -->
                </div><!-- course content end -->

            </div>
        </div><!-- row end -->
    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->

@stop