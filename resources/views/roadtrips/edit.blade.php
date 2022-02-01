@extends('layouts.platform')

@section('content')

    <h3>Editar Roadtrip</h3>

    {{ Form::model($roadtrip, ['route' => ['roadtrips.update', $roadtrip->id], 'method' => 'put']) }}

        {{ Form::hidden('action', 'edit') }}
        <div>

            {{ Form::label('location') }}
            {{ Form::text('location', $roadtrip->location) }}

        </div>

        <div>

            {{ Form::label('institution') }}
            {{ Form::text('institution', $roadtrip->institution) }}

        </div>

        <div>

            {!! Form::label('Data') !!}
            {!! Form::text('date', $roadtrip->date) !!}

        </div>

        <div>

            {!! Form::label('Password') !!}
            {!! Form::text('password') !!}

        </div>

        <div>

            {{ Form::submit('Guardar',['class' => 'button']) }}
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
