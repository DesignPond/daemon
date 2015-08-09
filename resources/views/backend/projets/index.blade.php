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
                                                    @if(isset($anchors['types']) && !empty($anchors['types']))
                                                        @foreach($anchors['types'] as $type_slug => $anchor)
                                                            <?php
                                                                $pos   = strpos($type_slug, 'text_');
                                                                $class = ($pos === false ? 'expose' : 'text_content');
                                                            ?>
                                                            <li><a class="{{ $class }}" data-anchor="{{ $type_slug }}" href="#">{{ $anchor }}</a></li>
                                                        @endforeach
                                                    @endif
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

                                    foreach($structures as $groupe => $structure)
                                    {
                                        $groupe_item = $groupes->where('id',$groupe)->first();

                                        echo '<div '.$popover.' id="'.str_slug($groupe_item->title).'" title="'.$groupe_item->title.'" data-content="'.$groupe_item->description.'">';
                                        $structure->sortBy('rang');
                                        foreach($structure as $item)
                                        {
                                            if($item->type_id > 0)
                                            {
                                                $item->load('type','groupe');

                                                if($item->type->gabarit == 'arret')
                                                {
                                                    echo $item->content_text;
                                                    echo ($item->type_id == 3 || $item->type_id == 0 ? '<br/>' : '');
                                                }
                                                else
                                                {
                                                    echo '<div class="text_content" id="text_'.$item->id.'">'.$item->content.'</div>';
                                                }
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