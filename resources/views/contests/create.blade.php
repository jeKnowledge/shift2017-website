@extends('layouts.platform')

@section('content')

    <h3>Novo Contest</h3>

    {{ Form::open(['action' => 'ContestsController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description') }}

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
