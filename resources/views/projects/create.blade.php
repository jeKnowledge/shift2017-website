@extends('layouts.platform')

@section('content')

    <h3>Novo Projecto</h3>

    {{ Form::open(['action' => 'ProjectsController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::text('description') }}

        </div>

        <div>

        </div>

            {{ Form::label('Repository:') }}
            {{ Form::text('repository') }}

        <div>

        </div>

            {{ Form::label('Team ID:') }}
            {{ Form::text('team_id') }}

        <div>

            {{ Form::submit("Save Changes", ['class' => 'button']) }}
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
