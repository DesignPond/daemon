@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-4">
        <h3>Catégories</h3>
    </div>
    <div class="col-md-4">
        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/categorie/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-3">Nom</th>
                            <th class="col-sm-3">Couleur</th>
                            <th class="col-sm-2 no-sort"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">
                            @if(!$categories->isEmpty())
                                @foreach($categories as $categorie)
                                    <tr>
                                        <td><a class="btn btn-sm btn-info" href="{{ url('admin/categorie/'.$categorie->id) }}"><i class="fa fa-edit"></i></a></td>
                                        <td>{{ $categorie->name }}</td>
                                        <td><span class="label label-default" style="background: {{ $categorie->color }}"><i class="fa fa-tint"></i></span></td>
                                        <td class="text-right">
                                            <form action="{{ url('admin/categorie/'.$categorie->id) }}" method="POST" class="form-horizontal">
                                                <input type="hidden" name="_method" value="DELETE">{!! csrf_field() !!}
                                                <button data-what="Supprimer" data-action="{{ $categorie->name }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
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