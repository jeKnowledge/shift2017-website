@extends('layouts.platform')

@section('content')

    <h3>Projectos</h3>



        <div>
                @foreach ($projects as $project)
                    <div display = 'inline-block'>
                        <a href="{{ route('projects.show', ['project' => $project]) }}"> {{ $project->name }}</a>
                        <a href="{{ route('projects.edit', ['project' => $project]) }}"> Edit</a>
                    </div>
                @endforeach
        </div>

        <br>

    <a href="{{route('projects.create')}}" class='button'>New Project</a>

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
