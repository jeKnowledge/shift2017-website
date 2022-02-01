@extends('layouts.platform')

@section('content')

        <h3>Evento</h3>

        <div>
            <p>Name:  {{ $event->name }}<p>
        </div>

        @if (\Auth::user()->isAdmin())
            {{ Form::model($event, ['route' => ['events.destroy', $event->id], 'method' => 'delete']) }}

                <div>
                    {{ Form::submit('Eliminar Evento', ['class' => 'button']) }}
                </div>

            {{ Form::close() }}
        @endif

@endsection
