@extends('layouts.platform')

@section('content')

    <p>{{ $roadtrip->location }}</p>

    <p>{{ $roadtrip->institution }}</p>

    <p>{{ $roadtrip->date }}</p>

    <p>{{ $roadtrip->password }}----> ISTO É A PASSWORD</p>


    {{ Form::model($roadtrip, ['route' => ['roadtrips.destroy', $roadtrip->id], 'method' => 'delete']) }}

        <div>
            {{ Form::submit('Eliminar Roadtrip', ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

@endsection
