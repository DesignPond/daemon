@extends('frontend.layouts.master')
@section('content')

<div class="row no-gutter fullwidth"><!-- row -->
    <div class="col-lg-12 clearfix"><!-- featured posts slider -->
        <div id="carousel-featured" class="carousel slide" data-interval="4000" data-ride="carousel"><!-- featured posts slider wrapper; auto-slide -->
            <div class="carousel-inner"><!-- Wrapper for slides -->
                <div class="item active">
                    <img src="{{ asset('frontend/images/slide-3.jpg') }}" alt="Image slide 3" />
                    <div class="k-carousel-caption pos-1-3-right scheme-dark">
                        <div class="caption-content">
                            <h3 class="caption-title">Méthodologie juridique</h3>
                        <!--    <p>Période d'enseignement<br/><strong>Semestre Automne</strong></p>
                            <p>Equipe enseignante<br/><strong>CARRON Blaise, professeur ordinaire</strong></p>-->
                        </div>
                    </div>
                </div>
            </div><!-- Wrapper for slides end -->
        </div><!-- featured posts slider wrapper end -->
    </div><!-- featured posts slider end -->
</div><!-- row end -->

<div class="row no-gutter"><!-- row -->
    <div class="col-lg-9 col-md-9 col-lg-push-3 col-md-push-3"><!-- doc body wrapper -->
        <div class="col-padded"><!-- inner custom column -->
            <div class="row gutter"><!-- row -->
                <div class="col-lg-12 col-md-12">
                    <h1 class="page-title">Objectifs</h1>
                    <div class="news-body">
                        <p class="call-out">
                            Rattaché matériellement au cours d’introduction au droit, le cours de méthodologie juridique a pour but de fournir une formation de base à la
                            méthode, à la rédaction et à la recherche juridiques. Il vise prioritairement à préparer les étudiants à l’élaboration et à la rédaction de travaux
                            juridiques écrits, aussi bien scientifiques que pratiques.
                        </p>
                        <h6>Contenu</h6>
                        <p>
                            Il s’agit dans une première partie d’acquérir des notions indispensables à la recherche juridique, en connaissant d’une part les modes de
                            publication de la législation, de la jurisprudence et de la doctrine et en effectuant d’autre part des recherches dans ces trois domaines. La
                            deuxième partie aborde la rédaction juridique en présentant les usages communément reconnus pour des travaux scientifiques et pratiques.
                            L’accent est mis aussi bien sur la technique de citation que sur la structure des documents. Par ailleurs, le cours est complété par une
                            présentation de la bibliothèque universitaire et la découverte d’une institution fondamentale du système juridique helvétique (p.ex. Parlement
                            fédéral, Tribunal fédéral).
                        </p>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gutter k-equal-height"><!-- row -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h6>Forme de l'évaluation</h6>
                    <p>Examen écrit dans le cadre de l’examen d’introduction au droit.</p>
                    <h6>Forme de l'enseignement</h6>
                    <p> Le cours est donné en plenum. Des séances d’exercices illustrent les thèmes abordés en cours.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h6>Documentation</h6>
                    <p>L’ouvrage de référence est le suivant : P. Tercier/Ch. Roten, La recherche et la rédaction juridiques, 6e éd., Genève / Zurich / Bâle 2011. Les
                        lectures préparatoires supplémentaires ainsi que les présentations Power Point seront disponibles sur Claroline, selon les indications données
                        en début de cours.
                    </p>
                </div>
            </div><!-- row end -->
        </div><!-- inner custom column end -->
    </div><!-- doc body wrapper end -->
    <div id="k-sidebar" class="col-lg-3 col-md-3 col-lg-pull-9 col-md-pull-9"><!-- sidebar wrapper -->
        <div class="col-padded col-shaded"><!-- inner custom column -->

            <!-- Sidebar  -->
            @include('frontend.partials.sidebar')

        </div><!-- inner custom column end -->
    </div><!-- sidebar wrapper end -->
</div><!-- row end -->

@stop