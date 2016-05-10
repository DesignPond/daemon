@extends('frontend.layouts.master')
@section('content')

    <?php $url = $ticket->completed_at ? 'ticket/complete' : 'ticket' ?>

    <p><a href="{{ url($url) }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> &nbsp;Retour</a></p>

    <h2>Ticket</h2>
    <div class="panel panel-primary">
        <header class="panel-header">{{ $ticket->subject }}</header>
        <section class="panel-content">
            <ul class="label-list">
                <li class="label-item label-item-border">Priorité <span class="label" style="background: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span></li>
                <li class="label-item label-item-border">Statut <span class="label" style="background: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span></li>
                <li class="label-item label-item-border">Catégorie <span class="label" style="background: {{ $ticket->category->color }}">{{ $ticket->category->name }}</span></li>
                <li class="label-item label-item-date pull-right"><span class="label label-default">{{ $ticket->created_at->diffForHumans() }}</span></li>
            </ul>
            <hr/>
            <div class="helper mb30">{!! $ticket->content !!}</div>
            @if($ticket->completed_at)
                <p class="text-muted">Résolu le {{ $ticket->completed_at->formatLocalized('%d %B %Y')}}</p>
            @endif
        </section>
    </div>

    @if(!$ticket->comments->isEmpty())
        @foreach($ticket->comments as $comment)
            <div class="panel">
                <section class="panel-content">
                    <div class="helper mb30 text-right"><span class="label label-default">{{ $comment->created_at->diffForHumans() }}</span></div>
                    <div class="helper mb30">{!! $comment->content !!}</div>
                    <div><strong>{!! $comment->name !!}</strong></div>
                </section>
            </div>
        @endforeach
    @endif

    @if(!$ticket->completed_at)
        <div class="panel">
            <header class="panel-header">Commentaire</header>
            <section class="panel-content">
                <div class="helper">
                    <form action="{{ url('comment') }}" method="POST" class="form-horizontal" >{!! csrf_field() !!}
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" name="name" required class="form-control" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="content" required class="form-control redactorFrontend"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-bottom: 0;">
                            <div class="col-md-12">
                                <input name="ticket_id" value="{{ $ticket->id }}" type="hidden">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    @endif
@stop