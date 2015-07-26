@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div id="compose">

                <div id="controls" class="row">
                    <div id="colors" class="col-md-3">
                        <p>Couleur</p><input id="colorPicker" class="simple_color" value="#eeeeee"/>
                    </div>
                    <div id="shapes" class="col-md-7">
                        <button class="btn"  id="add"><i class="fa fa-square"></i> &nbsp;Ajouter</button>
                        <button data-position="down"  class="btn arrow"><i class="fa fa-long-arrow-down"></i> &nbsp;Bas</button>
                        <button data-position="left"  class="btn arrow"><i class="fa fa-long-arrow-left"></i> &nbsp;Gauche</button>
                        <button data-position="right" class="btn arrow"><i class="fa fa-long-arrow-right"></i> &nbsp;Droite</button>
                        <button data-position="up"    class="btn arrow"><i class="fa fa-long-arrow-up"></i> &nbsp;Haut</button>
                    </div>
                </div>

                <div id="application"></div>
                <p id="empty">Le projet est vide</p>

            </div>

        </div>
    </div>

@stop