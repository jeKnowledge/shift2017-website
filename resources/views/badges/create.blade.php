@extends('layouts.platform')

@section('content')

    <h3>Novo Badge</h3>

    {{ Form::open(['action' => 'BadgesController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description') }}

        </div>

        <div>

        </div>

            {{ Form::label('Image Path:') }}
            {{ Form::text('imgPath') }}

        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

@endsection
