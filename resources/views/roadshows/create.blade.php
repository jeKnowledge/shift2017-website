@extends('layouts.platform')

@section('content')

    <h3>Novo Roadshow</h3>
    
    {{ Form::open(['action' => 'RoadshowsController@store']) }}

        <div>

            {{ Form::label('location') }}
            {{ Form::text('location') }}

        </div>

        <div>

            {{ Form::label('institution') }}
            {{ Form::text('institution') }}

        </div>

        <div>

            {!! Form::label('Password') !!}
            {!! Form::password('password', ['class' => 'awesome']) !!}

        </div>

        <div>

            {{ Form::submit('Add new roadshow') }}
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
