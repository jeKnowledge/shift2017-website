@extends('layouts.platform')

@section('content')

        <h3>Edição</h3>

        <p>Year:<P>{{ $edition->year }}

        {{ Form::model($edition, ['route' => ['editions.destroy', $edition->id], 'method' => 'delete']) }}

            <div>
                {{ Form::submit('Eliminar Edição', ['class' => 'button']) }}
            </div>

        {{ Form::close() }}

@endsection
