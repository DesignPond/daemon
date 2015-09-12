@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
                <a href="{{ url('admin/glossaire/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Glossaire</div>
            <div class="panel-body">

                <table class="table" style="margin-bottom: 0px;" id="">
                    <thead>
                    <tr>
                        <th class="col-sm-1">Action</th>
                        <th class="col-sm-2">Mots</th>
                        <th class="col-sm-1">Description</th>
                        <th class="col-sm-1"></th>
                    </tr>
                    </thead>
                    <tbody class="selects">
                        @if(!empty($glossaires))
                            @foreach($glossaires as $glossaire)
                                <tr>
                                    <td><a class="btn btn-sky btn-sm" href="{{ url('admin/glossaire/'.$glossaire->id) }}">&Eacute;diter</a></td>
                                    <td><strong>{{ $glossaire->keyword }}</strong></td>
                                    <td>{{ $glossaire->description }}</td>
                                    <td class="text-right">
                                        <form action="{{ url('admin/glossaire/'.$glossaire->id) }}" method="POST" class="form-horizontal">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {!! csrf_field() !!}
                                            <button data-action="Mots: {{ $glossaire->title }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@stop