@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p class="pull-left"><a class="btn btn-default" href="{{ url('admin/page') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
        <p class="pull-right"><a href="{{ url('admin/page/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter une page</a></p>
    </div>
</div>

<!-- start row -->
<div class="row">

    @if (!empty($page) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form data-validate-parsley action="{{ url('admin/page/'.$page->id) }}" method="POST" class="form-horizontal" >
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $page->titre }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Hiérarchie</label>
                        <div class="col-sm-4">
                            <?php $helper = new \App\Helper\Helper(); ?>
                            <select class="form-control" name="parent_id">
                                <option value="0">Base</option>
                                @if(!$pages->isEmpty())
                                    @foreach($pages as $p)
                                        <?php echo $helper->renderSelect($p, $page->parent_id); ?>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Appartient au site</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="site_id">
                                <option value="">Choix</option>
                                @if(!$sites->isEmpty())
                                    @foreach($sites as $site)
                                        <option {{ $page->site_id  == $site->id ? 'selected' : '' }} value="{{ $site->id }}">{{ $site->nom }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Titre</label>
                        <div class="col-sm-5">
                            {!! Form::text('title', $page->title , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Ordre</label>
                        <div class="col-sm-1">
                            {!! Form::text('rang', $page->rang , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">Contenu</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('content', $page->content , array('class' => 'form-control  redactor', 'cols' => '50' , 'rows' => '4' )) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer mini-footer ">
                    {!! Form::hidden('id', $page->id ) !!}
                    <div class="col-sm-2"></div>
                    <div class="col-sm-9">
                        <button class="btn btn-primary" type="submit">Envoyer </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @endif

</div>
<!-- end row -->

@stop