
@extends('layouts.platform')

@section('content')

    <h3>Editar Evento</h3>

    {{ Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'put']) }}


        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name', $value = $event->name) }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description', $value = $event->description) }}

        </div>

        <div>

            {{ Form::label('Start date/time:') }}
            {{ Form::text('startDate', $value = $event->startDate) }}

        </div>

        <div>

            {{ Form::label('End date/time:') }}
            {{ Form::text('endDate', $value = $event->endDate) }}

        </div>

        <div>

            {{ Form::label('Activity:') }}
            {{ Form::radio('isActivity', '1', $event->isActivity) }} Sim
            {{ Form::radio('isActivity', '0', $event->isActivity) }} Não
        </div>

        <div>

            {{ Form::label('Seats Available') }}
            {{ Form::text('seatsAvailable', $value = $event->seatsAvailable) }}

        </div>


        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

    
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
