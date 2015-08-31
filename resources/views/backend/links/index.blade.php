@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
                <a href="{{ url('admin/link/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Liens</div>
            <div class="panel-body">

                <table class="table" style="margin-bottom: 0px;" id="">
                    <thead>
                    <tr>
                        <th class="col-sm-1">Action</th>
                        <th class="col-sm-2">Titre</th>
                        <th class="col-sm-1">Url</th>
                        <th class="col-sm-1"></th>
                    </tr>
                    </thead>
                    <tbody class="selects">
                        @if(!empty($links))
                            <?php $parents = $links->groupBy('parent_id'); ?>
                            @foreach($parents as $parent_id => $parent)
                                <tr class="active"><td><strong>{{ (isset($categories[$parent_id]) ? $categories[$parent_id] : 'Général') }}</strong></td><td></td><td></td><td></td></tr>
                                @foreach($parent as $link)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/link/'.$link->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $link->titre }}</strong></td>
                                        <td>{{ $link->url }}</td>
                                        <td class="text-right">
                                            <form action="{{ url('admin/link/'.$link->id) }}" method="POST" class="form-horizontal">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {!! csrf_field() !!}
                                                <button data-action="lien: {{ $link->title }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@stop