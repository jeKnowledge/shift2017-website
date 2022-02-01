@extends('layouts.platform')

@section('content')

    <h3>Editar Projecto</h3>

    {{ Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'put']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name', $value = $project->name) }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::text('description', $value = $project->description) }}

        </div>

        <div>

            {{ Form::label('Repository:') }}
            {{ Form::text('repository', $value = $project->repository) }}

        </div>

        <div>

            {{ Form::label('Team ID:') }}
            {{ Form::text('team_id', $value = $project->teamId) }}

        </div>


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
