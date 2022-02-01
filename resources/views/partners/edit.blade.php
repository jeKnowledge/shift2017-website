@extends('layouts.platform')

@section('content')

    <h3>Editar Parceiro</h3>

    {{ Form::model($partner, ['route' => ['partners.update', $partner->id], 'method' => 'put']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name', $value = $event->name) }}

        </div>

        <div>

            {{ Form::label('Logo:') }}
            {{ Form::text('logoPath', $value = $event->logoPath) }}

        </div>

        <div>

            {{ Form::label('Website:') }}
            {{ Form::text('website', $value = $event->website) }}

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
