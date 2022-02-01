@extends('layouts.platform')

@section('content')

    <h3>Editar Badge</h3>

    {{ Form::model($badge, ['route' => ['badges.update', $badge->id], 'method' => 'put']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name', $value = $badge->name) }}

        </div>

        <div>

            {{ Form::label('Description:') }}
            {{ Form::textarea('description', $value = $badge->description) }}

        </div>

        <div>

            {{ Form::label('Image Path:') }}
            {{ Form::text('imgPath', $value = $badge->imgPath) }}

        </div>


        <div>
            {{ Form::submit('Guardar', ['class' => 'button']) }}
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
