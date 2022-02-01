@extends('layouts.platform')

@section('content')

    <h3>Roadshow</h3>

    <ul>

        @foreach ($roadshows as $roadshow)

            <li><a href="{{ route('roadshows.show', ['roadshow' => $roadshow]) }}"> {{$roadshow->created_at}}</a></li>

        @endforeach

        {{ Form::open(['action' => 'RoadshowsController@store']) }}
            {{ Form::submit('Novo RoadShow', ['class' => 'button']) }}
        {{ Form::close()}}
    </ul>
@endsection
