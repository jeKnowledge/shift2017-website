@extends('layouts.platform')

@section('content')

    <h3>Nova FAQ</h3>

    {{ Form::open(['action' => 'FAQsController@changePassword']) }}

        <div>
            {{ Form::label('Question') }}
            {{ Form::text('question') }}
        </div>

        <div>
            {{ Form::label('Answer') }}
            {{ Form::textarea('answer') }}
        </div>

        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}
@endsection
