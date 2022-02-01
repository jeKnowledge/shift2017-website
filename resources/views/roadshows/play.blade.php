@extends('layouts.platform')

@section('content')
    @if(isset($validated) && $validated == false)
        <h3>Roadshow - {{ $roadshow->location }}</h3>
        {{ Form::open(['route' => ['roadshows.play.post', 'roadshow' => $roadshow], 'method' => 'post']) }}
            <input type="password" class="inputText input-2 dark" name="password">
            @if(isset($error))
                <span>{{ $error }}</span>
            @endif
        {{ Form::close() }}
    @elseif(isset($validated) && $validated == true)
        <h3>Roadshow - {{ $roadshow->location }}</h3>
        <button>Play</button>
    @elseif(!isset($validated))
        <h3>Roadshow - {{ $roadshow->location }}</h3>
        {{ Form::open(['route' => ['roadshows.play.post', 'roadshow' => $roadshow], 'method' => 'post']) }}
            <input type="password" class="inputText input-2 dark" name="password">
        {{ Form::close() }}
    @endif
@endsection
