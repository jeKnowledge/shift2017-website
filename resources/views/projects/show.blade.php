@extends('layouts.platform')

@section('content')

    <h3>{{ $project->name }}</h3>


        <div>
            Badge Description: {{ $project->description }}
        </div>

        {{ Form::model($project, ['route' => ['projects.destroy', $project->id], 'method' => 'delete']) }}

            <!-- isto não deve ser para ficar aqui -->
            {{ Form::submit("Eliminar Projecto", ['class' => 'button']) }}
        {{ Form::close() }}

@endsection
