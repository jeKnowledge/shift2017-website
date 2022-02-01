@extends('layouts.platform')

@section('content')

    <h3>Nova Roadtrip</h3>

    {{ Form::open(['action' => 'RoadTripsController@store']) }}

        <div>

            {{ Form::label('location') }}
            {{ Form::text('location') }}

        </div>

        <div>

            {{ Form::label('institution') }}
            {{ Form::text('institution') }}

        </div>

        <div>

            {!! Form::label('Data') !!}
            {!! Form::text('date') !!}

        </div>

        <div>

            {!! Form::label('Password') !!}
            {!! Form::text('password') !!}

        </div>

        <div>

            {{ Form::submit('Guardar',['class' => 'button']) }}
        </div>

    {{ Form::close()}}

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
