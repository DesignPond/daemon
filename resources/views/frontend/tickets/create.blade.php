@extends('frontend.layouts.master')
@section('content')

    <p><a href="{{ url('ticket') }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> &nbsp;Retour</a></p>
    <h2>Ticket</h2>
    <div class="panel">
       <header class="panel-header">Créer un ticket</header>
       <section class="panel-content">
            <div class="helper mb30">
                <form action="{{ url('ticket') }}" method="POST" class="form-horizontal" >{!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sujet</label>
                        <div class="col-sm-9">
                            <input type="text" name="subject" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description du problème</label>
                        <div class="col-sm-9">
                            <textarea name="content" required class="form-control redactorFrontend"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-4">
                            <label>Catégorie</label>
                            <select name="category_id" class="form-control" required>
                                @if(!$categories->isEmpty())
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Priorité</label>
                            <select name="priority_id" class="form-control" required>
                                @if(!$priorities->isEmpty())
                                    @foreach($priorities as $prioritie)
                                        <option value="{{ $prioritie->id }}">{{ $prioritie->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 text-right">
                            <input name="status_id" value="1" type="hidden">
                            <button type="submit" class="btn btn-info">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
       </section>
    </div>

@stop