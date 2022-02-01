@extends('layouts.platform')

@section('content')

    <h3>Editar Edição</h3>

    {{ Form::model($edition, ['route' => ['editions.update', $edition->id], 'method' => 'put']) }}

        <div>

            {{ Form::label('Year:') }}
            {{ Form::text('year', $value = $edition->year) }}

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
