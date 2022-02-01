@extends('layouts.platform')

@section('content')

    <h3>Editar Contest</h3>

    {{ Form::model($contest, ['route' => ['contests.update', $contest->id], 'method' => 'put']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name', $value = $contest->name) }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description', $value = $contest->description) }}

        </div>

        <div>
            {{ Form::submit("Guardar", ['class' => 'button']) }}
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
