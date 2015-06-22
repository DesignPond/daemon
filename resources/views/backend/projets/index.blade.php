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
                    <div class="row">
                        <div class="col-md-2">

                            @if(!$projet->structure_groupe->isEmpty())
                                <ol id="guides" class="list-guide">
                                    @foreach($projet->structure_groupe as $slug => $anchors)
                                        <li><a class="expose" data-anchor="{{ $slug }}" href="#">{{ $anchors['title'] }}</a>
                                            <ul>
                                                @foreach($anchors['types'] as $type_slug => $anchor)
                                                    <li><a class="expose" data-anchor="{{ $type_slug }}" href="#">{{ $anchor }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif

                        </div>
                        <div class="col-md-10">
                            <div id="content">
                            <?php
                                $popover      = ' tabindex="0" data-trigger="focus" data-toggle="popover" data-placement="top" ';
                                $structures   = $projet->structures->groupBy('groupe_id');

                                foreach($structures as $groupe => $structure){
                                    $groupe_item = $groupes->where('id',$groupe)->first();

                                    echo '<div '.$popover.' id="'.str_slug($groupe_item->title).'" title="'.$groupe_item->title.'" data-content="'.$groupe_item->description.'">';
                                    $structure->sortBy('rang');
                                    foreach($structure as $item)
                                    {
                                        $item->load('type','groupe');

                                        if($item->type->gabarit == 'arret'){
                                            echo $item->content_text;
                                            echo ($item->type_id == 3 ? '<br/>' : '');
                                        }
                                        else
                                        {
                                            echo $item->content;
                                        }

                                    }
                                    echo '</div>';
                                }

                            ?>
                            </div>
                        </div>
                    </div>

                    @endif
                    
                </div>
            </div>

        </div>
    </div>

@stop