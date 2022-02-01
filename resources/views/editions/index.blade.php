@extends('layouts.platform')

@section('content')

	<h1>Edições</h1>
    <div>
        <ul>
            @foreach ($editions as $edition)
                <li><a href="{{ route('editions.show', ['edition' => $edition]) }}">{{ $edition->year }}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
