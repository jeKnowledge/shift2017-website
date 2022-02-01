@extends('layouts.platform')

@section('content')

	<h1>Contests</h1>
    <div>
        <ul>
            @foreach ($contests as $contest)
                <li><a href="{{ route('contests.show', ['contest' => $contest]) }}">{{ $contest->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <a href="{{route('contests.create')}}" class='button'>Novo Contest</a>

@endsection
