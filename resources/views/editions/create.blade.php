@extends('layouts.platform')

@section('content')

    <h3>Nova Edição</h3>

    {{ Form::open(['action' => 'EditionsController@store']) }}

        <div>

            {{ Form::label('Year:') }}
            {{ Form::text('year') }}

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
