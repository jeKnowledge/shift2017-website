@extends('layouts.platform')

@section('content')

    <h3>Novo Evento</h3>

    {{ Form::open(['action' => 'EventsController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description') }}

        </div>

        <div>

            {{ Form::label('Start date/time:') }}
            {{ Form::text('startDate') }}

        </div>

        <div>

            {{ Form::label('End date/time:') }}
            {{ Form::text('endDate') }}

        </div>

        <div>

            {{ Form::label('Activity:') }}
            {{ Form::radio('isActivity', '1', false) }}
            {{ Form::radio('isActivity', '0', false) }}
        </div>

        <div>

            {{ Form::label('Seats Available') }}
            {{ Form::text('seatsAvailable') }}

        </div>


        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
