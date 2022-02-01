@extends('layouts.platform')

@section('content')

    <h3>Novo Parceiro</h3>

    {{ Form::open(['action' => 'PartnersController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('Logo:') }}
            {{ Form::text('logoPath') }}

        </div>

        <div>

            {{ Form::label('Website:') }}
            {{ Form::text('website') }}

        </div>


        <div>

            {{ Form::label('Type:') }}
            {{ Form::checkbox('type', 'gold', false) }}
            {{ Form::checkbox('type', 'silver', false) }}
            {{ Form::checkbox('type', 'bronze', false) }}
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
