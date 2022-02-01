@extends('layouts.platform')

@section('content')

        <h3>Parceiror</h3>

        <p>Name:{{ $partner->name }}</p>

        {{ Form::model($partner, ['route' => ['partners.destroy', $partner->id], 'method' => 'delete']) }}

            <div>
                {{ Form::submit('Eliminar partner', ['class' => 'button']) }}
            </div>

        {{ Form::close() }}

@endsection
