@extends('backend.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                    <h4><i class="fa fa-edit"></i> &nbsp;Projet </h4>
                </div>
                <div class="panel-body">

                    @if($projet)
                        <?php
                            echo '<pre>';
                            print_r($projet);
                            echo '</pre>';
                        ?>
                    @endif
                    
                </div>
            </div>

        </div>
    </div>

@stop