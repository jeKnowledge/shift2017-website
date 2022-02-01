@extends('layouts.platform')

@section('content')

    <h3>OLA</h3>

    @foreach ($roadshow->roadtrips()->where('roadshow_id',$roadshow->id)->get() as $roadtrip)
        <div>
            <a href="{{ route('roadtrips.show', ['roadtrip' => $roadtrip]) }}">{{ $roadtrip->location }}</a>
            <a href="{{ route('roadtrips.edit', ['roadtrip' => $roadtrip]) }}">Edit</a>
        </div>
    @endforeach

    <a href="{{ route('roadtrips.create')}}" class='button'>Adicionar Roadtrip</a>
@endsection
