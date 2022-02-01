@extends('layouts.platform')

@section('content')

    <h3>{{ $badge->name }}</h3>


        <div>
            Badge Description: {{ $badge->description }}
        </div>

        {{ Form::model($badge, ['route' => ['badges.destroy', $badge->id], 'method' => 'delete']) }}

            <!-- isto não deve ser para ficar aqui -->
            {{ Form::submit("Eliminar Badge", ['class' => 'button']) }}
        {{ Form::close() }}

@endsection
