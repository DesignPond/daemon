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
                        <button class="btn"  id="add"><span class="car"></span>Ajouter</button>
                        <button data-position="down"  class="btn arrow"><span class="down"></span>Bas</button>
                        <button data-position="left"  class="btn arrow"><span class="left"></span>Gauche</button>
                        <button data-position="right" class="btn arrow"><span class="right"></span>Droite</button>
                        <button data-position="up"    class="btn arrow"><span class="up"></span>Haut</button>
                    </div>
                </div>

                <div id="application"></div>
                <p id="empty">Le projet est vide</p>

            </div>

        </div>
    </div>

@stop