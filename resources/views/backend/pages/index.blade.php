@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/page/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <textarea id="nestable_list_2_output" style="width:100%" rows="3" class="form-group"></textarea>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Pages</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">

                    <?php

                    function renderNode($node)
                    {
                        if( $node->isLeaf() )
                        {
                            return '<li class="dd-item" data-id="'.$node->id.'"><div class="dd-handle">' . $node->title . '</div></li>';
                        }
                        else
                        {
                            $html = '<li class="dd-item" data-id="'.$node->id.'"><div class="dd-handle">' . $node->title.'</div>';
                            $html .= '<ol class="dd-list">';

                            foreach($node->children as $child)
                                $html .= renderNode($child);

                            $html .= '</ol>';
                            $html .= '</li>';
                        }
                        return $html;
                    }

                    //echo '<pre>';
                   // print_r($root);
                    //print_r($pages->first()->getDescendantsAndSelf()->toHierarchy()->toArray());
                   // echo '</pre>';

                    ?>

                    @if(!$root->isEmpty())
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Nestable List 2</h4></div>
                        <div class="panel-body">
                            @foreach($root as $page)
                            <div class="dd nestable_list" id="nestable_list_2" style="height: auto;">
                                <ol class="dd-list">
                                    <?php echo renderNode($page); ?>
                                </ol>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <table class="table" style="margin-bottom: 0px;" id="generic">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-2">Titre</th>
                            <th class="col-sm-1">Ouvrage</th>
                            <th class="col-sm-2">Page</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">

                            @if(!empty($pages))
                                @foreach($pages as $page)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/page/'.$page->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $page->title or '' }}</strong></td>
                                        <td>{{ $page->ouvrage }}</td>
                                        <td>{{ $page->page }}</td>
                                        <td class="text-right">
                                            <form action="{{ url('admin/page/'.$page->id) }}" method="POST" class="form-horizontal">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {!! csrf_field() !!}
                                                <button data-action="page: {{ $page->title }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
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
</div>

@stop